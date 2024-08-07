<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DadosBase;
use Illuminate\Support\Facades\Storage;

class ImportarDadosBase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar:dadosbase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar dados base do CSV';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filePath = storage_path('app/csv/base.csv');
        if (!file_exists($filePath)) {
            $this->error('Arquivo CSV não encontrado.');
            return 1;
        }

        // Abrir o arquivo CSV
        if (($handle = fopen($filePath, 'r')) !== FALSE) {
            // Pular a primeira linha (cabeçalho)
            fgetcsv($handle, 1000, ';');

            // Processar cada linha do CSV
            while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
                DadosBase::create([
                    'NU_CONTRATO' => $data[0],
                    'DT_ASSINATURA' => $this->formatDate($data[1]),
                    'VR_FINANCIAMENTO' => $data[2],
                    'PC_TAXA_JUROS' => $data[3],
                    'PZ_CARENCIA' => $data[4],
                    'NO_MUTUARIO' => $data[5],
                    'NU_CPF' => $data[6],
                    'NU_IDENTIDADE' => $data[7],
                    'DT_NASCIMENTO' => $this->formatDate($data[8]),
                    'IC_ESTADO_CIVIL' => $data[9],
                    'IC_SEXO' => $data[10],
                    'SG_UF' => $data[11],
                    'NO_MUNICIPIO' => $data[12],
                    'ED_ENDERECO' => $data[13],
                    'NU_CEP' => $data[14],
                ]);
            }
            fclose($handle);
        }

        $this->info('Dados importados com sucesso.');
        return 0;
    }

    private function formatDate($date)
    {
        return \DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }
}

