<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracaoEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracao_empresas', function (Blueprint $table) {
            $table->integer('cem_codigo');
            $table->string('cem_descricao', 250)->unique('cem_descricao');
            $table->string('cem_valor', 4000);
            $table->timestamp('cem_data_atualizacao')->useCurrentOnUpdate()->useCurrent();
            $table->string('descricao', 4000);
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
        Schema::dropIfExists('configuracao_empresa');
    }
}
