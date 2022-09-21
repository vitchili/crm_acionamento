<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaAcionamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_acionamentos', function (Blueprint $table) {
            $table->integer('pea_codigo');
            $table->integer('pea_fk_pes_codigo')->index('pea_fk_pes_codigo_2');
            $table->timestamp('pea_data')->useCurrent()->index('pea_data');
            $table->integer('pea_fk_usu_codigo')->nullable();
            $table->integer('pea_fk_loj_codigo')->nullable()->index('pea_fk_loj_codigo');
            $table->string('pea_tipo', 1)->default('A')->index('pea_tipo');
            $table->string('pea_tipo_acionamento', 1)->default('N');
            $table->string('pea_frase_acionamento', 4000);
            $table->integer('pea_fk_fra_codigo')->nullable()->index('pea_fk_fra_codigo');
            $table->string('pea_obs_acionamento', 4000);
            $table->string('pea_situacao', 150);
            $table->integer('pea_fk_paa_codigo')->index('pea_fk_paa_codigo_2');
            $table->integer('pea_fk_aco_codigo')->nullable();
            $table->string('pea_sms', 14)->nullable();
            $table->string('pea_email', 150)->nullable();
            $table->string('pea_cidade', 250)->nullable();
            $table->string('pea_bairro', 250)->nullable();
            $table->string('pea_naturgy_email', 150)->nullable();
            $table->string('pea_naturgy_fone', 20)->nullable();
            $table->string('pea_tma_discador', 10)->nullable();
            $table->string('pea_valor_promessa', 100)->nullable();
            $table->integer('pea_fk_fun_codigo')->nullable();
            $table->integer('pea_fk_sit_codigo')->nullable();
            $table->string('pea_enviou_gazin', 1)->nullable()->default('N');
            $table->string('pea_visivel', 1)->default('S')->index('pea_visivel');
            $table->string('pea_enviou_credishop', 1)->nullable()->default('N');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            
            $table->index(['pea_fk_paa_codigo'], 'pea_fk_paa_codigo');
            $table->index(['pea_fk_pes_codigo', 'pea_fk_usu_codigo', 'pea_fk_loj_codigo'], 'pea_fk_pes_codigo');
            $table->index(['pea_fk_aco_codigo', 'pea_sms', 'pea_email'], 'pea_fk_aco_codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_acionamento');
    }
}
