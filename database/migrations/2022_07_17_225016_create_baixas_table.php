<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaixasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baixas', function (Blueprint $table) {
            $table->integer('bai_codigo');
            $table->string('bai_tipo', 15)->index('bai_tipo_3')->comment('devolucao | ploja | pescritorio | implantacao');
            $table->integer('bai_fk_pes_codigo')->index('bai_fk_pes_codigo');
            $table->integer('bai_fk_loj_codigo')->index('bai_fk_loj_codigo');
            $table->integer('bai_fk_par_codigo')->index('bai_fk_par_codigo');
            $table->integer('bai_fk_aci_codigo')->nullable()->index('bai_fk_aci_codigo');
            $table->integer('bai_fk_usu_codigo_baixou')->index('bai_fk_usu_codigo_baixou');
            $table->integer('bai_fk_usu_codigo_honorario')->nullable()->index('bai_fk_usu_codigo_honorario');
            $table->integer('bai_fk_bor_codigo')->nullable()->index('bai_fk_bor_codigo');
            $table->dateTime('bai_data_cadastro')->index('bai_data_cadastro');
            $table->decimal('bai_principal', 16);
            $table->decimal('bai_desconto', 16);
            $table->decimal('bai_juros', 16);
            $table->decimal('bai_multa', 16);
            $table->decimal('bai_honorario', 16);
            $table->decimal('bai_encargo', 16);
            $table->decimal('bai_comissao', 16);
            $table->date('bai_data_baixa_credor');
            $table->integer('bai_fk_bpd_codigo')->nullable()->index('bpd_codigo');
            $table->string('bai_tipo_baixa_clinipam', 10)->nullable();
            $table->integer('bai_fk_emp_codigo_origem')->nullable();
            $table->integer('bai_fk_bai_codigo_origem')->nullable();
            $table->string('bai_enviado_clinipam', 1)->nullable()->default('N');
            $table->string('bai_nome_arquivo', 100)->nullable();
            $table->decimal('bai_porcentagem_terceirizada', 5)->nullable()->default(100);
            $table->string('bai_motivo_devolucao', 200)->nullable();
            $table->string('bai_motivo_comissao', 210)->nullable();
            $table->integer('bai_fk_fec_codigo')->nullable()->index('bai_fk_fec_codigo');
            $table->decimal('bai_comissao_matriz_pela_terc', 16)->nullable();
            $table->string('bai_inpc', 16)->nullable();
            $table->string('bai_igpm', 16)->nullable();
            $table->decimal('bai_comissao_agespisa', 16)->nullable();
            $table->integer('bai_fk_aic_codigo')->nullable()->index('bai_fk_aic_codigo');
            $table->integer('bai_fk_cpp_codigo')->nullable()->index('bai_fk_cpp_codigo');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            
            $table->index(['bai_data_cadastro'], 'bai_data_cadastro_2');
            $table->index(['bai_tipo'], 'bai_tipo');
            $table->index(['bai_tipo'], 'bai_tipo_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baixa');
    }
}
