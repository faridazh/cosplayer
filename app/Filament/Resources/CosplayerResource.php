<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CosplayerResource\Pages;
use App\Filament\Resources\CosplayerResource\RelationManagers;
use App\Models\Cosplayer;
use Faker\Core\File;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CosplayerResource extends Resource
{
    protected static ?string $model = Cosplayer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Manage Cosplayer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\FileUpload::make('avatar')
                            ->rules(['required', 'image', 'max:1024'])
                            ->avatar()
                            ->required()
                            ->directory('uploads/cosplayer/avatar')
                            ->hint('Fixed resize to 250 x 250 pixels.')
                            ->hintIcon('heroicon-o-exclamation')
                            ->hintColor('warning'),
                        Forms\Components\FileUpload::make('cover')
                            ->rules(['required', 'image', 'max:5120'])
                            ->image()
                            ->required()
                            ->directory('uploads/cosplayer/cover')
                            ->hint('Fixed resize to 1000 x 300 pixels.')
                            ->hintIcon('heroicon-o-exclamation')
                            ->hintColor('warning'),
                    ])->columns(1),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->rules(['required', 'string', 'max:100'])
                            ->required()
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                            ->reactive(),
                        Forms\Components\TextInput::make('slug')
                            ->rules(['required', 'alpha-dash'])
                            ->required()
                            ->disabled(),
                        Forms\Components\MarkdownEditor::make('description')
                            ->columnSpanFull()
                            ->rules(['nullable', 'string', 'max:5000']),
                        Forms\Components\Section::make('Social Media')
                            ->statePath('social')
                            ->schema([
                                Forms\Components\TextInput::make('facebook')
                                    ->label('Facebook')
                                    ->rules(['nullable', 'url']),
                                Forms\Components\TextInput::make('instagram')
                                    ->label('Instagram')
                                    ->rules(['nullable', 'url']),
                                Forms\Components\TextInput::make('twitter')
                                    ->label('Twitter')
                                    ->rules(['nullable', 'url']),
                            ]),
                        Forms\Components\Section::make('Shop')
                            ->statePath('shop')
                            ->schema([
                                Forms\Components\TextInput::make('gumroad')
                                    ->label('Gumroad')
                                    ->rules(['nullable', 'url']),
                                Forms\Components\TextInput::make('karyakarsa')
                                    ->label('Karyakarsa')
                                    ->rules(['nullable', 'url']),
                                Forms\Components\TextInput::make('ko-fi')
                                    ->label('Ko-fi')
                                    ->rules(['nullable', 'url']),
                                Forms\Components\TextInput::make('onlyfans')
                                    ->label('Onlyfans')
                                    ->rules(['nullable', 'url']),
                                Forms\Components\TextInput::make('trakteer')
                                    ->label('Trakteer')
                                    ->rules(['nullable', 'url']),
                            ]),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
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
            'index' => Pages\ListCosplayers::route('/'),
            'create' => Pages\CreateCosplayer::route('/create'),
            'edit' => Pages\EditCosplayer::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
