<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_parcelas', function (Blueprint $table) {
            $table->integer('par_codigo');
            $table->integer('par_fk_con_codigo')->index('par_fk_con_codigo');
            $table->integer('par_prestacao')->index('par_prestacao_2');
            $table->date('par_vencimento')->index('par_vencimento');
            $table->decimal('par_valor', 16);
            $table->decimal('par_saldo', 16);
            $table->string('par_situacao', 10);
            $table->dateTime('par_data_cadastro');
            $table->dateTime('par_data_atualizacao')->nullable();
            $table->string('par_observacao', 500)->nullable();
            $table->integer('par_fk_aco_codigo')->nullable()->index('par_fk_aco_codigo');
            $table->integer('par_fk_usu_codigo')->index('par_fk_usu_codigo');
            $table->integer('par_fk_bor_codigo')->nullable()->index('par_fk_bor_codigo');
            $table->integer('par_atualizei')->nullable();
            $table->integer('par_fk_emp_codigo_terceirizada')->nullable()->index('par_fk_emp_codigo_terceirizada');
            $table->dateTime('par_data_envio_terceirizada')->nullable();
            $table->integer('par_fk_div_codigo')->nullable()->index('par_fk_div_codigo');
            $table->integer('par_fk_emp_codigo_origem')->nullable();
            $table->integer('par_fk_par_codigo_origem')->nullable()->index('par_fk_par_codigo_origem');
            $table->string('par_versao_registro', 100)->nullable()->index('par_versao_registro');
            $table->string('par_flag_importado_batimento', 1)->nullable()->index('par_flag_importado_batimento')->comment('esse campo sempre é zerado no inicio de qualquer importação que seja estilo batimneto, ao atualizar ou inserir parcela ele é marcado, então aí a parcela e baixa nos casos null');
            $table->string('par_id_lote', 50)->nullable();
            $table->string('par_id_titulo', 50)->nullable();
            $table->string('par_seller_codigo_cobranca', 8)->nullable();
            $table->string('par_seller_codigo_carta', 8)->nullable();
            $table->string('par_seller_sequencia', 5)->nullable();
            $table->string('par_seller_modelo_carta', 2)->nullable();
            $table->string('par_seller_id_titulo', 40)->nullable();
            $table->string('par_seller_numero_filial', 3)->nullable();
            $table->decimal('par_valor_despesa', 16)->nullable();
            $table->decimal('par_saldo_despesa', 16)->nullable();
            $table->integer('par_fk_nov_codigo_baixado')->nullable()->index('par_fk_nov_codigo_baixado')->comment('codigo novação que baixou essa parcela');
            $table->integer('par_fk_aco_codigo_matriz')->nullable()->index('par_fk_aco_codigo_matriz');
            $table->integer('par_ID_DIVIDA_EC')->nullable()->index('par_ID_DIVIDA_EC');
            $table->integer('par_ID_DIVIDA')->nullable();
            $table->date('par_DATA_CORRECAO')->nullable();
            $table->decimal('par_VALOR_CORRECAO', 16)->nullable();
            $table->decimal('par_VALOR_MINIMO', 16)->nullable();
            $table->string('par_novada_carsystem', 1)->nullable();
            $table->string('par_wedoo_tipo_divida', 50)->nullable();
            $table->string('par_wedoo_marcado', 50)->nullable();
            $table->string('par_wedoo_DividaCedente', 50)->nullable();
            $table->date('par_data_limite_cobranca')->nullable();
            $table->string('par_NumeroPrestacao', 100)->nullable();
            $table->string('par_IdAcordo', 100)->nullable();
            $table->integer('par_filial_gazin')->nullable();
            $table->string('par_numero_processo_gazin', 14)->nullable();
            $table->decimal('par_valor_original', 16)->nullable();
            $table->string('par_nota_fiscal_air', 100)->nullable();
            $table->string('par_observacao2', 200)->nullable();
            $table->string('par_observacao3', 200)->nullable();
            $table->string('par_observacao4', 200)->nullable();
            $table->string('par_observacao5', 200)->nullable();
            $table->string('par_observacao6', 200)->nullable();
            $table->string('par_observacao7', 200)->nullable();
            $table->string('par_observacao8', 200)->nullable();
            $table->string('par_nr_documento_otis', 200)->nullable()->index('par_nr_documento_otis');
            $table->string('par_estabelecimento_air', 100)->nullable();
            $table->string('par_emissao_air', 100)->nullable();
            $table->string('par_serie_air', 100)->nullable();
            $table->string('par_valor_total_nota_air', 100)->nullable();
            $table->string('par_nome_parceiro_gazin', 100)->nullable();
            $table->string('par_produtos_gazin', 500)->nullable();
            $table->integer('par_score')->nullable();
            $table->string('par_carteira', 100)->nullable();
            $table->decimal('par_valor_com_futuro', 10)->nullable();
            $table->integer('par_lancamento_futuro')->nullable();
            $table->integer('par_lancamento_futuro_obrigatorio')->nullable();
            $table->date('par_data_maxima_do_lf')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            
            $table->index(['par_codigo'], 'Index_1');
            $table->index(['par_prestacao'], 'par_prestacao');
            $table->unique(['par_codigo'], 'par_codigo');
            $table->index(['par_fk_con_codigo'], 'par_fk_con_codigo_2');
            $table->index(['par_fk_con_codigo'], 'par_fk_con_codigo_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato_parcela');
    }
}
