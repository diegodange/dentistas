<?php

namespace App\Filament\Resources\FuncionariosResource\Pages;

use App\Filament\Resources\FuncionariosResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageFuncionarios extends ManageRecords
{
    protected static string $resource = FuncionariosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
