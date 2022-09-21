<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_enderecos', function (Blueprint $table) {
            $table->integer('pee_codigo', true)->index('pee_codigo');
            $table->integer('pee_fk_pes_codigo')->nullable();
            $table->integer('pee_fk_tie_codigo')->nullable()->index('pee_fk_tie_codigo');
            $table->string('pee_cep', 8);
            $table->string('pee_endereco');
            $table->string('pee_numero', 10);
            $table->string('pee_bairro');
            $table->string('pee_cidade', 150);
            $table->string('pee_estado', 50);
            $table->string('pee_observacao', 500)->nullable();
            $table->integer('pee_fk_qen_codigo')->nullable()->index('pee_fk_qen_codigo');
            $table->timestamp('pee_data_cadastro')->nullable()->useCurrent();
            $table->integer('pee_id_endereco_ec')->nullable()->index('pee_id_endereco_ec')->comment('ID Endereco EC');
            $table->string('pee_preferencial', 1)->nullable()->default('N');
            $table->string('pee_black_list', 1)->nullable()->default('N')->comment('S = Para endereço bloqueado, N = Para não bloqueado');
            $table->date('pee_higienizado_assertiva')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            
            $table->index(['pee_codigo'], 'pee_codigo_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_endereco');
    }
}
