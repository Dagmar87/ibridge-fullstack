<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = ['id', 'nome', 'campanha_id'];
}
