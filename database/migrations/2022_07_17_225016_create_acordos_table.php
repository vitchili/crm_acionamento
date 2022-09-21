<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcordosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acordos', function (Blueprint $table) {
            $table->integer('aco_codigo');
            $table->integer('aco_fk_pes_codigo')->index('aco_fk_pes_codigo');
            $table->integer('aco_fk_loj_codigo')->index('aco_fk_loj_codigo');
            $table->dateTime('aco_data_cadastro');
            $table->string('aco_status', 1)->default('N')->index('aco_status')->comment('N - NORMAL | C - CANCELADO | A - AGUARDANDO APROVACAO');
            $table->integer('aco_fk_usu_codigo')->nullable()->index('aco_fk_usu_codigo');
            $table->dateTime('aco_data_cancelamento')->nullable();
            $table->integer('aco_fk_usu_codigo_cancelamento')->nullable()->index('aco_fk_usu_codigo_cancelamento');
            $table->string('aco_origem', 1)->comment('S SITE | A APP | B BOLETAGEM | C -  COMISSÃO BORDERO');
            $table->integer('aco_fk_pra_codigo')->nullable()->index('aco_fk_pra_codigo');
            $table->integer('aco_fk_usu_codigo_aprovacao')->nullable()->index('aco_fk_usu_codigo_aprovacao');
            $table->integer('codigo_acordo_nacional')->nullable()->index('codigo_acordo_nacional');
            $table->dateTime('aco_data_aprovacao')->nullable();
            $table->integer('codigo_loja_nacional')->nullable();
            $table->string('aco_fk_cam_codigo')->nullable();
            $table->string('aco_tipo_pagamento', 1)->nullable();
            $table->integer('aco_fk_ema_codigo')->nullable()->index('aco_fk_ema_codigo');
            $table->integer('aco_fk_boc_codigo')->nullable()->index('aco_fk_boc_codigo');
            $table->string('aco_forma_envio', 5)->nullable()->comment('SMS | EMAIL');
            $table->string('aco_fone_email', 100)->nullable();
            $table->string('aco_link_novacao', 200)->nullable();
            $table->string('aco_enviado_varejo', 1)->nullable()->default('N');
            $table->integer('aco_id_varejo')->nullable();
            $table->string('aco_fk_usu_codigo_aprovacao_matriz', 1)->nullable();
            $table->string('aco_fk_usu_codigo_cancelamento_matriz', 1)->nullable();
            $table->string('aco_motivo_cancelamento', 200)->nullable();
            $table->string('aco_ignorar_inclusao', 1)->nullable()->default('N')->comment('QUANDO INCLUSÃO VERIFICAR ESTE ACORDO, NÃO IRÁ INCLUIR DUAS VEZES POR ELE');
            $table->dateTime('aco_data_ignorou_inclusao')->nullable();
            $table->string('aco_codigo_acordo_wedoo', 25)->nullable();
            $table->decimal('aco_honorario', 16)->nullable();
            $table->decimal('aco_custas', 16)->nullable();
            $table->string('aco_lotacaoes', 500)->nullable();
            $table->string('aco_anexo_termo', 250)->nullable();
            $table->string('aco_nr_interno', 50)->nullable()->comment('nr_interno carsystem');
            $table->date('aco_data_termo')->nullable();
            $table->string('aco_fk_bos_codigo')->nullable();
            $table->integer('aco_fase_primeiro_vencimento')->nullable();
            $table->integer('aco_fase_ultimo_vencimento')->nullable();
            $table->string('aco_flag_clinipam', 1)->nullable();
            $table->dateTime('aco_data_flag')->nullable();
            $table->date('aco_primeiro_vencimento')->nullable();
            $table->date('aco_ultimo_vencimento')->nullable();
            $table->string('aco_fk_caa_codigo')->nullable();
            $table->string('aco_acquirer_transaction_id', 12)->default('');
            $table->string('aco_authorization_code', 10)->default('');
            $table->string('aco_link_confissao', 200)->nullable();
            $table->integer('aco_codigo_acordo_externo')->nullable();
            $table->string('aco_cod_mannesoft', 100)->nullable();
            $table->string('aco_identificador', 250)->nullable();
            $table->string('aco_getnet_payment_id', 300)->nullable();
            $table->string('aco_cielo_payment_id', 150)->nullable();
            $table->decimal('aco_valor_acordo_cartao', 16)->nullable();
            $table->integer('aco_fk_car_codigo')->nullable();
            $table->string('aco_pode_gerar_nalin', 1)->nullable();
            $table->integer('aco_codigo_original_')->nullable();
            $table->integer('aco_usuario_original_')->nullable();
            $table->decimal('aco_valor_principal', 16)->nullable();
            $table->decimal('aco_valor_juros', 16)->nullable();
            $table->decimal('aco_valor_multa', 16)->nullable();
            $table->decimal('aco_valor_honorario', 16)->nullable();
            $table->decimal('aco_valor_desconto_principal', 16)->nullable();
            $table->decimal('aco_valor_desconto_juros', 16)->nullable();
            $table->decimal('aco_valor_desconto_multa', 16)->nullable();
            $table->decimal('aco_valor_desconto_honorario', 16)->nullable();
            $table->decimal('aco_valor_igpm', 16)->nullable();
            $table->decimal('aco_valor_inpc', 16)->nullable();
            $table->decimal('aco_valor_desconto_igpm', 16)->nullable();
            $table->decimal('aco_valor_desconto_inpc', 16)->nullable();
            $table->string('aco_cobransaas_id', 50)->nullable();
            $table->string('aco_ativo_passivo_senff', 1)->nullable();
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
        Schema::dropIfExists('acordo');
    }
}
