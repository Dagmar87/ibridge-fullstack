<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Campanha;
use App\Lista;
use App\Operador;
use App\Situacao;
use App\Categoria;
use App\Contato;
use App\Chamada;

class ImportJson extends Command
{
    protected $signature = 'import:json';
    protected $description = 'Importa dados do JSON remoto';

    public function handle()
    {
        $url = 'https://www.ibridge.com.br/dados-teste-tecnico.json';
        $response = Http::get($url);

        if (!$response->successful()) {
            $this->error('Erro ao baixar JSON');
            return;
        }

        $dados = $response->json();

        foreach ($dados as $item) {

            // Criar ou atualizar campanha
            Campanha::updateOrCreate(
                ['id' => $item['campanha_id']],
                ['nome' => $item['campanha_nome']]
            );

            Lista::updateOrCreate(
                ['id' => $item['lista_id']],
                [
                    'nome' => $item['lista_nome'],
                    'campanha_id' => $item['campanha_id']
                ]
            );

            Operador::updateOrCreate(
                ['id' => $item['chamada_operador_id']],
                ['nome' => $item['chamada_operador_nome']]
            );

            Situacao::updateOrCreate(
                ['id' => $item['chamada_situacao_id']],
                ['nome' => $item['chamada_situacao_nome']]
            );

            Categoria::updateOrCreate(
                ['id' => $item['chamada_categoria_id']],
                ['nome' => $item['chamada_categoria_nome']]
            );

            $telefone = preg_replace('/\D/', '', $item['chamada_telefone']);

            Contato::updateOrCreate(
                ['id' => $item['contato_id']],
                [
                    'nome' => $item['contato_nome'],
                    'telefone' => $telefone
                ]
            );

            $datahora = Carbon::createFromFormat(
                'd/m/Y H:i',
                $item['chamada_datahora']
            )->format('Y-m-d H:i:s');

            Chamada::updateOrCreate(
                ['id' => $item['chamada_id']],
                [
                    'datahora' => $datahora,
                    'contato_id' => $item['contato_id'],
                    'lista_id' => $item['lista_id'],
                    'campanha_id' => $item['campanha_id'],
                    'operador_id' => $item['chamada_operador_id'],
                    'situacao_id' => $item['chamada_situacao_id'],
                    'categoria_id' => $item['chamada_categoria_id']
                ]
            );
        }

        $this->info('Importação finalizada com sucesso!');
    }
}
