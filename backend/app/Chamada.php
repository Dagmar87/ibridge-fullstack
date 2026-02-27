<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamada extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'id',
		'datahora',
		'contato_id',
		'lista_id',
		'campanha_id',
		'operador_id',
		'situacao_id',
		'categoria_id'
	];

	public function operador()
	{
		return $this->belongsTo(Operador::class);
	}

	public function lista()
	{
		return $this->belongsTo(Lista::class);
	}

	public function campanha()
	{
		return $this->belongsTo(Campanha::class);
	}

	public function situacao()
	{
		return $this->belongsTo(Situacao::class);
	}
}
