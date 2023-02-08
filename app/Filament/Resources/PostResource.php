<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationLabel = 'Cosplay';
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Manage Cosplayer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\FileUpload::make('cover')
                            ->rules(['required', 'image', 'max:5120'])
                            ->image()
                            ->required()
                            ->directory('uploads/cosplayer/post/cover')
                            ->hint('Fixed resize to 500 x 250 pixels.')
                            ->hintIcon('heroicon-o-exclamation')
                            ->hintColor('warning'),
                    ])->columns(1),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\BelongsToSelect::make('user_id')
                            ->label('Author')
                            ->required()
                            ->searchable()
                            ->default(auth()->user()->id)
                            ->relationship('author', 'username'),
                        Forms\Components\Select::make('cosplayer_id')
                            ->label('Cosplayer')
                            ->required()
                            ->searchable()
                            ->relationship('cosplayer', 'name'),
                        Forms\Components\TextInput::make('title')
                            ->rules(['required', 'string', 'min:5', 'max:80'])
                            ->required()
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                            ->reactive(),
                        Forms\Components\TextInput::make('slug')
                            ->rules(['required', 'alpha-dash'])
                            ->required()
                            ->disabled(),
                        Forms\Components\MarkdownEditor::make('description')
                            ->rules(['nullable', 'max:5000'])
                            ->columnSpan(2),
                    ])->columns(2),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TagsInput::make('tags')
                            ->columnSpanFull()
                            ->nullable()
                            ->rules(['nullable','array','max:3']),
                        Forms\Components\Toggle::make('is_nsfw')
                            ->label('Content NSFW')
                            ->default(true),
                        Forms\Components\Toggle::make('is_hidden')
                            ->label('Post Hidden')
                            ->default(false),
                        Forms\Components\Toggle::make('is_approved')
                            ->label('Post Approved')
                            ->default(true),
                    ])->columns(3),
                Forms\Components\Card::make()
                    ->schema([
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
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover'),
                Tables\Columns\TextColumn::make('title')->sortable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TagsColumn::make('tags'),
                Tables\Columns\TextColumn::make('likes'),
                Tables\Columns\TextColumn::make('dislikes'),
                Tables\Columns\IconColumn::make('is_nsfw')
                    ->label('NSFW')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_hidden')
                    ->label('Hidden')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean()
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
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
