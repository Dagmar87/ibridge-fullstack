<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Chamada;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/resumo', function () {
    return Chamada::selectRaw("chamadas.lista_id,
        COUNT(*) as total,
        SUM(CASE WHEN categorias.nome = 'Sem Contato' THEN 1 ELSE 0 END) as sem_contato,
        SUM(CASE WHEN categorias.nome = 'Contato' THEN 1 ELSE 0 END) as contato,
        SUM(CASE WHEN categorias.nome = 'Abordagem' THEN 1 ELSE 0 END) as abordagem,
        SUM(CASE WHEN situacao_id = 4 THEN 1 ELSE 0 END) as fechamentos")
        ->join('categorias', 'categorias.id', '=', 'chamadas.categoria_id')
        ->groupBy('chamadas.lista_id')
        ->with('lista.campanha')
        ->get();
});

Route::get('/top-operadores', function () {
    return Chamada::selectRaw('operador_id,
        COUNT(*) as total_fechamentos')
        ->where('situacao_id', 4)
        ->groupBy('operador_id')
        ->orderByDesc('total_fechamentos')
        ->with('operador')
        ->limit(10)
        ->get();
});

Route::get('/top-listas', function () {
    return Chamada::selectRaw('lista_id,
        COUNT(*) as total_fechamentos')
        ->where('situacao_id', 4)
        ->groupBy('lista_id')
        ->orderByDesc('total_fechamentos')
        ->with('lista')
        ->limit(10)
        ->get();
});

Route::get('/top-campanhas', function () {
    return Chamada::selectRaw('campanha_id,
        COUNT(*) as total_fechamentos')
        ->where('situacao_id', 4)
        ->groupBy('campanha_id')
        ->orderByDesc('total_fechamentos')
        ->with('campanha')
        ->limit(10)
        ->get();
});
