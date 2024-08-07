<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaDadosBase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_base', function (Blueprint $table) {
            $table->id();
            $table->string('NU_CONTRATO');
            $table->date('DT_ASSINATURA');
            $table->decimal('VR_FINANCIAMENTO', 15, 2);
            $table->decimal('PC_TAXA_JUROS', 8, 3);
            $table->integer('PZ_CARENCIA');
            $table->string('NO_MUTUARIO');
            $table->string('NU_CPF');
            $table->string('NU_IDENTIDADE');
            $table->date('DT_NASCIMENTO');
            $table->string('IC_ESTADO_CIVIL');
            $table->string('IC_SEXO');
            $table->string('SG_UF');
            $table->string('NO_MUNICIPIO');
            $table->string('ED_ENDERECO');
            $table->string('NU_CEP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_base');
    }
}