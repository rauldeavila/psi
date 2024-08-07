<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosBase extends Model
{
    use HasFactory;

    protected $table = 'dados_base';

    protected $fillable = [
        'NU_CONTRATO',
        'DT_ASSINATURA',
        'VR_FINANCIAMENTO',
        'PC_TAXA_JUROS',
        'PZ_CARENCIA',
        'NO_MUTUARIO',
        'NU_CPF',
        'NU_IDENTIDADE',
        'DT_NASCIMENTO',
        'IC_ESTADO_CIVIL',
        'IC_SEXO',
        'SG_UF',
        'NO_MUNICIPIO',
        'ED_ENDERECO',
        'NU_CEP',
    ];
}
