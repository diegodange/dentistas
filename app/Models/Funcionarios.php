<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'sobrenome',
        'sexo',
        'raca',
        'cargo',
        'horario_entrada',
        'horario_saida',
        'salario',
        'telefone',
        'celular',
        'email',
    ];
}
