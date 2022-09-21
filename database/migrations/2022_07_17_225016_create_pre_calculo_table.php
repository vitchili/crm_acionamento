<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreCalculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_calculo', function (Blueprint $table) {
            $table->integer('pre_codigo');
            $table->integer('pre_fk_par_codigo')->index('pre_fk_par_codigo');
            $table->decimal('pre_valor_original', 16);
            $table->decimal('pre_valor_juro', 16);
            $table->decimal('pre_valor_multa', 16);
            $table->decimal('pre_valor_honorario', 16);
            $table->decimal('pre_valor_desconto', 16);
            $table->timestamp('pre_data')->useCurrent();
            $table->integer('pre_quantidade_despesa')->nullable();
            $table->decimal('pre_valor_despesa', 16)->nullable();
            $table->integer('pre_fase')->default(0);
            $table->decimal('pre_desconto_site', 19)->nullable();
            $table->decimal('pre_valor_inpc', 16)->nullable();
            $table->decimal('pre_valor_igpm', 16)->nullable();
            $table->decimal('pre_valor_encargo', 16)->nullable();
            $table->decimal('pre_desconto_principal', 16)->nullable();
            $table->decimal('pre_desconto_juros', 16)->nullable();
            $table->decimal('pre_desconto_multa', 16)->nullable();
            $table->decimal('pre_desconto_honorario', 16)->nullable();
            $table->string('pre_valor_antecipado_senff', 100)->nullable();
            $table->string('pre_hash_contrato_senff', 100)->nullable();
            $table->decimal('pre_desconto_igpm', 16)->nullable();
            $table->decimal('pre_desconto_inpc', 16)->nullable();
            $table->text('pre_json_cobransaas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_calculo');
    }
}
