<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = ['id', 'nome', 'telefone'];
}
