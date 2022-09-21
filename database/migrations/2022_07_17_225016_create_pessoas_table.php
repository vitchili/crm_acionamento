<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->integer('pes_codigo');
            $table->string('pes_nome')->index('pes_nome');
            $table->string('pes_cpf_cnpj', 14)->index('pes_cpf_cnpj');
            $table->timestamp('pes_data_cadastro')->useCurrent();
            $table->dateTime('pes_ultima_alteracao')->nullable();
            $table->date('pes_data_nascimento')->nullable();
            $table->string('pes_estado_civil', 1)->nullable()->default('S');
            $table->string('pes_tipo_pessoa', 1)->nullable()->default('F');
            $table->string('pes_sexo', 1)->nullable();
            $table->text('pes_obs')->nullable();
            $table->string('pes_rg', 15)->nullable();
            $table->string('pes_nome_pai', 150)->nullable();
            $table->string('pes_nome_mae', 150)->nullable();
            $table->string('pes_email', 350)->nullable();
            $table->string('pes_tipo', 25)->default('DEVEDOR')->comment('DEVEDOR | AVALISTA | CONJUGE | LEAD | CREDOR ')->nullable();
            $table->string('pes_avalista', 100)->nullable();
            $table->binary('pes_fone_avalista')->nullable();
            $table->integer('pes_fk_pes_codigo')->nullable()->index('pes_fk_pes_codigo')->comment('REFERENTE A QUEM');
            $table->string('pes_trabalho_cnpj', 14)->nullable();
            $table->string('pes_trabalho_empresa', 100)->nullable();
            $table->string('pes_trabalho_tipo_organizacao', 50)->nullable();
            $table->date('pes_trabalho_data_admissao')->nullable();
            $table->string('pes_trabalho_cargo', 100)->nullable();
            $table->decimal('pes_trabalho_salario', 16)->nullable();
            $table->decimal('pes_trabalho_vale', 16)->nullable();
            $table->string('pes_trabalho_dia_pagamento', 50)->nullable();
            $table->string('pes_rg_emissor', 25)->nullable();
            $table->string('pes_uf_orgao_expedido', 2)->nullable();
            $table->date('pes_data_expedido')->nullable();
            $table->string('pes_naturalidade', 100)->nullable();
            $table->string('pes_nacionalidade', 100)->nullable();
            $table->string('pes_pensionista_inss', 3)->nullable();
            $table->string('pes_trabalho_antigo', 100)->nullable();
            $table->string('pes_profissao', 100)->nullable();
            $table->dateTime('pes_ultima_sincronizacao')->nullable();
            $table->string('pes_nome_fantasia', 100)->nullable();
            $table->integer('pes_emp_codigo_destino')->nullable();
            $table->integer('pes_loj_codigo_destino')->nullable();
            $table->string('pes_origem_renda', 3)->nullable();
            $table->integer('pes_dia_recebimento_salario')->nullable()->comment('Em dia útil');
            $table->string('pes_link_facebook', 200)->nullable()->comment('Link do perfil do facebook');
            $table->string('pes_confirmou_dados', 1)->default('N');
            $table->string('pes_confirmou_endereco', 1)->default('N');
            $table->string('pes_motivo_situacao', 250)->nullable();
            $table->string('pes_origem_cadastro', 2)->nullable();
            $table->decimal('pes_score', 16)->nullable();
            $table->decimal('pes_credito_pre_aprovado', 16)->nullable();
            $table->decimal('pes_faturamento', 16)->nullable();
            $table->string('pes_atividade_principal', 250)->nullable();
            $table->string('pes_atividade_principal_codigo', 50)->nullable();
            $table->string('pes_atividade_secundaria', 250)->nullable();
            $table->string('pes_atividade_secundaria_codigo', 50)->nullable();
            $table->string('pes_natureza_juridica', 250)->nullable();
            $table->string('pes_tipo_empresa', 50)->nullable();
            $table->date('pes_data_abertura')->nullable();
            $table->string('pes_porte', 50)->nullable();
            $table->string('pes_situacao_empresa', 50)->nullable();
            $table->integer('pes_fk_cna_codigo')->nullable();
            $table->decimal('pes_capital_social', 16)->nullable();
            $table->dateTime('pes_data_consulta_cnpj')->nullable();
            $table->integer('pes_fk_esc_codigo')->nullable();
            $table->string('pes_escolaridade_txt', 150)->nullable();
            $table->string('pes_status', 1)->nullable()->comment('A - Ativo | I - Inativo');
            $table->dateTime('pes_data_ultimo_envio_ocorrencia_gazin')->nullable()->comment('Data do último envio de ocorrência p/ WS Gazin');
            $table->dateTime('pes_data_validade_ocorrencia_gazin')->nullable()->comment('Data de validade do último envio de ocorrência p/ WS Gazin');
            $table->string('pes_imagem', 250)->nullable();
            $table->integer('pes_codigo_credor')->nullable();
            $table->string('pes_inscricao_estadual', 30)->nullable();
            $table->date('pes_emissao')->nullable();
            $table->string('pes_tem_protesto', 1)->nullable();
            $table->integer('pes_nota_fiscal')->nullable();
            $table->string('pes_serie', 10)->nullable();
            $table->decimal('pes_valor_total_nota', 16)->nullable();
            $table->integer('pes_estabelecimento')->nullable();
            $table->string('pes_provavel_obito', 1)->nullable();
            $table->date('pes_data_ultima_higienizacao')->nullable();
            $table->string('pes_token_portal')->nullable();
            $table->string('pes_codigo_cliente_externo', 150)->nullable();
            $table->string('pes_carteirinha_externo', 150)->nullable();
            $table->string('pes_cliente_situacao_externa', 50)->nullable();
            $table->integer('pes_fk_pdd_codigo')->nullable();
            $table->string('pes_cobransaas_id', 50)->nullable();
            $table->string('pes_status_cpf', 50)->nullable();
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
        Schema::dropIfExists('pessoa');
    }
}
