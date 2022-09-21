<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreAcordoPreCalculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_acordo_pre_calculo', function (Blueprint $table) {
            $table->integer('pac_fk_pre_codigo');
            $table->integer('pac_fk_pra_codigo')->index('pac_fk_pra_codigo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_acordo_pre_calculo');
    }
}
