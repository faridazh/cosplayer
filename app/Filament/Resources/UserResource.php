<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\RoleResource\Widgets;
use App\Models\User;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Manage Accounts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\FileUpload::make('avatar')
                        ->avatar()
                        ->directory('uploads/avatar'),
                ])->columns(1),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('username')
                            ->rules(['required', 'min:5', 'max:30'])
                            ->unique(ignoreRecord: true)
                            ->disableAutocomplete(),
                        Forms\Components\TextInput::make('email')
                            ->rules(['required', 'email'])
                            ->unique(ignoreRecord: true)
                            ->disableAutocomplete(),
                        Forms\Components\TextInput::make('password')
                            ->rules(['min:8'])
                            ->password()
                            ->same('password_confirmation')
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (Page $livewire) => ($livewire instanceof CreateRecord)),
                        Forms\Components\TextInput::make('password_confirmation')
                            ->password()
                            ->dehydrated(false)
                            ->required(fn (Page $livewire) => ($livewire instanceof CreateRecord)),
                        Forms\Components\Toggle::make('verified')
                            ->label('Email Verified')
                            ->hidden(fn (Page $livewire) => ($livewire instanceof CreateRecord))
                            ->dehydrated(false)
                            ->afterStateHydrated(function (Forms\Components\Toggle $component, ?User $record) {
                                if (!empty($record->email_verified_at))
                                {
                                    $component->state(true);
                                }
                            }),
//                        Forms\Components\Toggle::make('2fa')
//                            ->label('Two Factor Authentication')
//                            ->nullable()
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular(),
                Tables\Columns\TextColumn::make('username')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TagsColumn::make('roles.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->options([
                        'heroicon-o-x-circle',
                        'heroicon-o-check-circle' => fn ($state): bool => !empty($state),
                    ])
                    ->colors([
                        'danger',
                        'success' => fn ($state): bool => !empty($state),
                    ])
                    ->sortable()
                    ->label('Verified'),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->date('d F Y')
                    ->tooltip(fn (User $record): string => date_format($record->created_at, 'd M Y, h:i:s A')),
                Tables\Columns\IconColumn::make('deleted_at')
                    ->options([
                        'heroicon-o-trash' => fn ($state): bool => !empty($state),
                    ])
                    ->colors([
                        'danger' => fn ($state): bool => !empty($state),
                    ])
                    ->sortable()
                    ->label('Trashed'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\TernaryFilter::make('email_verified_at')
                    ->nullable()
                    ->label('Verified'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
        ];
    }
}
