<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use App\Filament\Resources\RoleResource\Widgets;
use App\Models\Role;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Manage Accounts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->rules(['required', 'alpha-dash', 'min:3', 'max:15']),
//                    ->disabled(static fn ($state) => $state == 'super-admin'),
                        Forms\Components\Select::make('guard_name')
                            ->rules('required', 'in:web,api')
                            ->options([
                                'web' => 'Web',
                                'api' => 'API',
                            ])
                            ->default('web'),
//                            ->disabled(!auth()->user()->hasRole('super-admin')),
                    ])->columns(2),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\MultiSelect::make('permissions')
                            ->relationship('permissions', 'name'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('name')->sortable()->searchable(),
                Tables\Columns\BadgeColumn::make('guard_name')->sortable()->searchable(),
                Tables\Columns\TagsColumn::make('permissions.name')->sortable(),
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
//                Tables\Actions\DeleteBulkAction::make(),
//                Tables\Actions\ForceDeleteBulkAction::make(),
//                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PermissionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
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
