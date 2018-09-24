<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    protected $fillable = ['service', 'horasMaquina', 'cargasCaminhao', 'quantidadeKM', 'situacao', 'client_id'];

}
