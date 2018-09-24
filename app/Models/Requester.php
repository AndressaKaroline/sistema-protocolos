<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Requester extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'rg', 'cpf', 'address', 'telephone', 'user_id'];

    // protected $primaryKey = 'cpf';
}
