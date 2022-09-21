<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_emails', function (Blueprint $table) {
            $table->integer('pem_codigo');
            $table->integer('pem_fk_pes_codigo');
            $table->string('pem_email', 250);
            $table->integer('pem_fk_qum_codigo')->index('pem_fk_qum_codigo');
            $table->string('pem_observacao', 100)->nullable();
            $table->timestamp('pem_data_cadastro')->nullable()->useCurrent();
            $table->char('pem_confirmacao', 1)->nullable()->default('N');
            $table->integer('pem_id_email_ec')->nullable()->index('pem_id_email_ec')->comment('ID Email EC');
            $table->string('pem_preferencial', 1)->default('N');
            $table->string('pem_black_list', 1)->nullable()->default('N')->comment('S = Para e-mail bloqueado, N = Para não bloqueado');
            $table->date('pem_higienizado_assertiva')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            
            $table->unique(['pem_fk_pes_codigo', 'pem_email'], 'pem_fk_pes_codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_email');
    }
}
