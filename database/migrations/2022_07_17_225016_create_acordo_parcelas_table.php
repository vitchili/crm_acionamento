<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcordoParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acordo_parcelas', function (Blueprint $table) {
            $table->integer('acp_fk_aco_codigo');
            $table->integer('acp_fk_par_codigo')->index('acordo_parcela_ibfk_2');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->primary(['acp_fk_aco_codigo', 'acp_fk_par_codigo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acordo_parcela');
    }
}
