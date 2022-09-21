<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreAcordoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_acordo', function (Blueprint $table) {
            $table->integer('pra_codigo');
            $table->integer('pra_quantidade');
            $table->decimal('pra_valor_parcela', 16);
            $table->decimal('pra_valor_entrada', 16);
            $table->date('pra_primeiro_vcto');
            $table->timestamp('pra_data')->useCurrent();
            $table->integer('pra_quantidade_despesa')->nullable();
            $table->decimal('pra_valor_despesa', 16)->nullable();
            $table->integer('pra_fase_taxa_boleto')->nullable();
            $table->longText('pra_xml_wedoo')->nullable();
            $table->decimal('pra_valor_desconto', 16)->nullable();
            $table->decimal('pra_taxa_boleto_diferenciada', 16)->nullable();
            $table->decimal('pra_soma_lancamento_futuro', 16)->nullable();
            $table->text('pra_json_cobransaas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_acordo');
    }
}
