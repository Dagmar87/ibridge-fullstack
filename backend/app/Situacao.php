<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    protected $table = 'situacaos';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = ['id', 'nome'];
}
