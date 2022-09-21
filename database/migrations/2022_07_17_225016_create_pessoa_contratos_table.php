<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_contratos', function (Blueprint $table) {
            $table->integer('con_codigo')->index('con_codigo');
            $table->date('con_data_credito')->nullable();
            $table->string('con_contrato')->index('index_con_contrato');
            $table->dateTime('con_data_atualizacao')->nullable();
            $table->dateTime('con_data_cadastro');
            $table->string('con_descricao', 1000)->nullable()->comment('DESCRIÇÃO DO QUE ERA A DÍVIDA');
            $table->integer('con_fk_bor_codigo')->nullable()->index('con_fk_bor_codigo');
            $table->integer('con_fk_loj_codigo')->index('con_fk_loj_codigo');
            $table->integer('con_fk_pes_codigo')->index('con_fk_pes_codigo');
            $table->integer('con_fk_usu_codigo')->index('con_fk_usu_codigo');
            $table->string('con_observacao', 1000)->nullable()->comment('ALGUM COMENTARIO OU OBSERVAÇÃO NECESSÁRIA');
            $table->string('con_pode_parcelar', 1)->default('S');
            $table->string('con_obito', 1)->default('I');
            $table->integer('con_filtro_zenf')->nullable();
            $table->string('con_filial_credor', 50)->nullable();
            $table->string('con_cuenta', 2)->nullable();
            $table->string('con_tienda', 50)->nullable();
            $table->integer('con_fk_nov_codigo')->nullable()->index('con_fk_nov_codigo')->comment('mostra o id da novação que gerou esse contrato');
            $table->string('con_serasa_negativado', 1)->default('S');
            $table->string('con_serasa_acp_negativado', 1)->default('S');
            $table->string('con_onde_negativa', 10)->nullable()->index('con_onde_negativa');
            $table->decimal('con_valor_negativado', 16)->nullable();
            $table->date('con_data_expiracao')->nullable();
            $table->string('con_cobranca_judicial', 1)->nullable()->default('N');
            $table->date('con_data_cadastro_credor')->nullable();
            $table->integer('con_plano')->nullable();
            $table->string('con_produto', 500)->nullable();
            $table->integer('con_id_contrato_ec')->nullable()->index('con_id_contrato_ec')->comment('ID Contrato EC');
            $table->date('con_data_vencimento_contabil')->nullable();
            $table->string('con_nome_loja', 250)->nullable();
            $table->string('con_nome_produto', 250)->nullable();
            $table->string('con_legenda', 250)->nullable()->comment('Coluna AV do arquivo da TOPONE');
            $table->string('con_observacao2', 200)->nullable();
            $table->string('con_observacao3', 200)->nullable();
            $table->string('con_observacao4', 200)->nullable();
            $table->string('con_observacao5', 200)->nullable();
            $table->string('con_observacao6', 200)->nullable();
            $table->string('con_observacao7', 200)->nullable();
            $table->string('con_observacao8', 200)->nullable();
            $table->decimal('con_soma_lancamentos_futuros', 10)->nullable();
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
        Schema::dropIfExists('pessoa_contrato');
    }
}
