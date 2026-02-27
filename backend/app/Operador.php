<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    protected $table = 'operadors';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = ['id', 'nome'];
}
