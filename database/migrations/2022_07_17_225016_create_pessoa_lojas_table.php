<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaLojasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_lojas', function (Blueprint $table) {
            $table->integer('pel_fk_loj_codigo')->index('pel_fk_loj_codigo');
            $table->integer('pel_fk_pes_codigo')->index('pel_fk_pes_codigo');
            $table->integer('pel_fk_sit_codigo');
            $table->integer('pel_fk_str_codigo')->nullable()->index('pel_fk_str_codigo');
            $table->integer('pel_fk_usu_codigo')->nullable()->index('pel_fk_usu_codigo');
            $table->date('pel_data_agenda')->nullable()->index('pel_data_agenda');
            $table->time('pel_hora')->nullable()->index('pel_hora');
            $table->string('pel_acionado_agenda', 1)->nullable()->default('N')->index('pel_acionado_agenda');
            $table->integer('pel_quantidade_acionado');
            $table->timestamp('pel_data_hora_atualizacao')->nullable()->useCurrent();
            $table->index(['pel_fk_sit_codigo', 'pel_fk_usu_codigo'], 'pel_fk_sit_codigo');
            $table->primary(['pel_fk_loj_codigo', 'pel_fk_pes_codigo']);
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_loja');
    }
}
