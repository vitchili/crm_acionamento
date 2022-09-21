<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaFonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_fones', function (Blueprint $table) {
            $table->integer('pef_codigo', true)->unique('pef_codigo_2');
            $table->integer('pef_fk_pes_codigo')->nullable()->index('pef_fk_pes_codigo_3');
            $table->integer('pef_fk_tif_codigo')->nullable()->index('pef_fk_tif_codigo');
            $table->string('pef_fone', 15)->index('telefone');
            $table->string('pef_descricao');
            $table->integer('pef_fk_qua_codigo')->nullable()->index('pef_fk_qua_codigo');
            $table->timestamp('pef_data_cadastro')->useCurrent();
            $table->integer('pef_quantidade_ligacoes')->default(0);
            $table->integer('pef_ultimo_fk_asr_codigo')->nullable();
            $table->string('pef_whatsapp', 1)->nullable();
            $table->integer('pef_id_telefone_ec')->nullable()->index('pef_id_telefone_ec')->comment('ID Telefone EC');
            $table->string('pef_preferencial', 1)->nullable()->default('N');
            $table->string('pef_black_list', 1)->nullable()->default('N')->comment('S = Para telefone bloqueado, N = Para não bloqueado');
            $table->date('pef_higienizado_assertiva')->nullable();
            $table->integer('pef_score')->nullable();
            $table->timestamp('pef_portal')->nullable();
            $table->string('pef_fone_portal', 15)->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            
            $table->index(['pef_codigo'], 'pef_codigo');
            $table->index(['pef_fk_pes_codigo', 'pef_fone'], 'pef_fk_pes_codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_fone');
    }
}
