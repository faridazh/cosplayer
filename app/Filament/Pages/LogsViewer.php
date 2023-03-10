<?php

namespace App\Filament\Pages;

use Closure;
use Filament\Facades\Filament;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ViewField;
use Filament\Pages\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class LogsViewer extends \RyanChandler\FilamentLog\Logs
{
    protected static string $view = 'filament.pages.logs-viewer';

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationGroup = 'Logs';

    protected static ?Closure $can = null;

    public $log;

    public $contents = 'Empty...';

    public function mount()
    {
        abort_unless(static::canAccessPage(), 403);
    }

    public static function can(Closure $callback): void
    {
        static::$can = $callback;
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make([
                Select::make('log')
                    ->searchable()
                    ->reactive()
                    ->placeholder('Select a log file...')
                    ->disableLabel()
                    ->getSearchResultsUsing(function (string $query) {
                        return collect($this->getFinder()->name("*{$query}*"))->mapWithKeys(function (SplFileInfo $file) {
                            return [$file->getRealPath() => $file->getRealPath()];
                        });
                    }),
            ]),

            Card::make([
                ViewField::make('contents')
                    ->disableLabel()
                    ->view('filament.pages.logs-viewer-contents'),
            ]),
        ];
    }

    public function updatedLog()
    {
        $this->contents = File::get($this->log);
    }

    protected function getFinder(): Finder
    {
        return Finder::create()
            ->ignoreDotFiles(true)
            ->ignoreUnreadableDirs()
            ->files()
            ->in(config('filament-log.paths'));
    }

    protected static function canAccessPage(): bool
    {
        return static::$can || Auth::user()->can('access-logs-viewer');
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return static::canAccessPage();
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->makeForm()
                ->schema($this->getFormSchema())
                ->model($this->getFormModel())
                ->statePath($this->getFormStatePath()),
        ];
    }

    public function render(): View
    {
        Filament::registerStyles([]);
        return parent::render();
    }
}
