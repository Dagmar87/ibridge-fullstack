<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chamadas', function (Blueprint $table) {
			$table->unsignedBigInteger('id')->primary();
			$table->dateTime('datahora');

			$table->foreignId('contato_id')->constrained('contatos');
			$table->foreignId('lista_id')->constrained('listas');
			$table->foreignId('campanha_id')->constrained('campanhas');
			$table->foreignId('operador_id')->constrained('operadors');
			$table->foreignId('situacao_id')->constrained('situacaos');
			$table->foreignId('categoria_id')->constrained('categorias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('chamadas');
	}
}
