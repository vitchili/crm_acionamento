<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcordoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acordo_items', function (Blueprint $table) {
            $table->integer('aci_codigo', true)->index('aci_codigo');
            $table->string('aci_caminho_boleto', 250)->nullable();
            $table->integer('aci_fk_aco_codigo')->index('aci_fk_aco_codigo');
            $table->decimal('aci_valor', 16);
            $table->date('aci_vencimento')->index('aci_vencimento');
            $table->integer('aci_prestacao')->index('aci_prestacao');
            $table->string('aci_status', 1)->index('aci_status')->comment('A-ABERTO | P-PAGO | B-BAIXADO');
            $table->integer('aci_fk_cob_codigo')->nullable()->index('aci_fk_cob_codigo');
            $table->string('aci_nosso_numero', 50)->nullable();
            $table->dateTime('aci_data_pagamento')->nullable();
            $table->decimal('aci_valor_pagamento', 16)->nullable();
            $table->integer('codigo_acordo_nacional')->nullable()->index('codigo_acordo_nacional');
            $table->string('aci_tipo_pagamento', 2)->nullable();
            $table->integer('aci_fk_ftm_codigo')->nullable()->index('aci_fk_ftm_codigo');
            $table->integer('codigo_loja_nacional')->nullable();
            $table->decimal('aci_taxa_boleto', 16)->default(0);
            $table->integer('aci_fk_cbr_codigo')->nullable()->index('aci_fk_cbr_codigo')->comment('CODIGO DA REMESSA BANCARIA, SE NULL NÃO MANDOU AINDA');
            $table->string('aci_tipo_pagamento_loja', 15)->nullable();
            $table->integer('aci_fk_rec_codigo')->nullable()->index('aci_fk_rec_codigo');
            $table->string('aci_codigo_barras', 100)->nullable();
            $table->integer('aci_fk_cbr_codigo_baixa')->nullable()->index('aci_fk_cbr_codigo_baixa');
            $table->dateTime('aci_boleto_liberado')->nullable();
            $table->dateTime('aci_boleto_enviado')->nullable();
            $table->string('aci_boleto_mensagem_retorno', 100)->nullable();
            $table->dateTime('aci_boleto_data_leitura')->nullable();
            $table->integer('aci_quantidade_despesa')->nullable();
            $table->decimal('aci_valor_despesa', 16)->nullable();
            $table->string('aci_pagamento_manual', 1)->nullable()->default('N');
            $table->string('aci_codigo_parcela', 50)->nullable()->comment('codigo carsystem');
            $table->string('aci_segunda_via', 1)->nullable()->default('N');
            $table->string('aci_enviado_hoepers', 1)->nullable()->default('N');
            $table->string('aci_arquivo_hoepers', 1000)->nullable();
            $table->date('aci_data_repasse')->nullable();
            $table->date('aci_data_baixa')->nullable();
            $table->date('aci_data_pagamento_devedor')->nullable();
            $table->string('aci_codigo_banco', 6)->nullable();
            $table->string('aci_origem_pagamento', 1)->nullable()->comment('M=matriz T=terceirizada');
            $table->string('aci_pagamento_credor', 1)->nullable()->default('N');
            $table->integer('aci_fk_rea_codigo')->nullable()->comment('Remessa Acordo');
            $table->string('aci_linha_digitavel', 11)->nullable();
            $table->string('aci_charge_id')->nullable();
            $table->string('aci_cod_titulo_novo', 100)->nullable()->index('aci_cod_titulo_novo');
            $table->float('aci_multa', 16)->nullable();
            $table->float('aci_igpm', 16)->nullable();
            $table->float('aci_inpc', 16)->nullable();
            $table->float('aci_honorario', 16)->nullable();
            $table->float('aci_juro', 16)->nullable();
            $table->float('aci_encargos', 16)->nullable();
            $table->float('aci_original', 16)->nullable();
            $table->float('aci_desconto', 16)->nullable();
            $table->string('aci_desconto_sicoob', 1)->nullable();
            $table->decimal('aci_desconto_principal', 16)->nullable();
            $table->decimal('aci_desconto_juros', 16)->nullable();
            $table->decimal('aci_desconto_multa', 16)->nullable();
            $table->decimal('aci_desconto_honorario', 16)->nullable();
            $table->string('aci_getnet_payment_id', 250)->nullable();
            $table->string('aci_negociada_cartao', 1)->nullable();
            $table->string('aci_acquirer_transaction_id', 250)->nullable();
            $table->decimal('aci_taxa_boleto_parcelamento', 16)->nullable();
            $table->string('aci_cobransaas_id', 50)->nullable();

            $table->unique(['aci_fk_cob_codigo', 'aci_nosso_numero'], 'aci_fk_cob_codigo_2');
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
        Schema::dropIfExists('acordo_item');
    }
}
