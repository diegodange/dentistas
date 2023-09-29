<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FuncionariosResource\Pages;
use App\Filament\Resources\FuncionariosResource\RelationManagers;
use App\Models\Funcionarios;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// FORMS
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
// FORMS

// TABLES
use Filament\Tables\Columns\TextColumn;
// TABLES
class FuncionariosResource extends Resource
{
    protected static ?string $model = Funcionarios::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('nome')->required(),
            TextInput::make('sobrenome')->required(),
            Select::make('sexo')->options([
                'masculino' => 'Masculino',
                'feminino' => 'Feminino',
            ])->required(),
            TextInput::make('raca')->required(),
            TextInput::make('cargo')->nullable(),
            TimePicker::make('horario_entrada')->nullable(),
            TimePicker::make('horario_saida')->nullable(),
            TextInput::make('salario')->nullable()->numeric(),
            TextInput::make('telefone')->nullable(),
            TextInput::make('celular')->nullable(),
            TextInput::make('email')->nullable()->email(), // Adiciona validação de e-mail
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nome')->sortable()->searchable(),
            TextColumn::make('sobrenome')->sortable()->searchable(),
            // TextColumn::make('sexo')->sortable()->searchable(),
            // TextColumn::make('raca')->sortable()->searchable(),
            TextColumn::make('cargo')->sortable()->searchable(),
            TextColumn::make('horario_entrada')->sortable()->searchable(),
            TextColumn::make('horario_saida')->sortable()->searchable(),
            // TextColumn::make('salario')->sortable()->searchable(),
            // TextColumn::make('telefone')->sortable()->searchable(),
            // TextColumn::make('celular')->sortable()->searchable(),
            // TextColumn::make('email')->sortable()->searchable(),
            // Adicione outras colunas conforme necessário
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageFuncionarios::route('/'),
        ];
    }    
}
