<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLojasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lojas', function (Blueprint $table) {
            $table->integer('loj_codigo')->index('loj_codigo');
            $table->text('loj_razao')->nullable();
            $table->text('loj_fantasia')->nullable();
            $table->text('loj_cpf_cnpj')->nullable();
            $table->text('loj_contato')->nullable();
            $table->text('loj_obs')->nullable();
            $table->integer('loj_fk_cob_codigo')->nullable();
            $table->text('loj_envio_baixa_spc')->nullable();
            $table->text('loj_envio_baixa_protesto')->nullable();
            $table->text('loj_endereco')->nullable();
            $table->text('loj_bairro')->nullable();
            $table->text('loj_numero')->nullable();
            $table->text('loj_cep')->nullable();
            $table->text('loj_cidade')->nullable();
            $table->text('loj_estado')->nullable();
            $table->text('loj_email_disparo_scpc')->nullable();
            $table->text('loj_email_1')->nullable();
            $table->text('loj_email_2')->nullable();
            $table->text('loj_email_3')->nullable();
            $table->text('loj_tipo_calculo')->nullable();
            $table->text('loj_fone')->nullable();
            $table->text('loj_fone_2')->nullable();
            $table->text('loj_tipo_juros')->nullable();
            $table->integer('loj_fk_usu_codigo')->nullable();
            $table->datetime('loj_data_cadastro')->nullable();
            $table->text('loj_status')->nullable();
            $table->integer('loj_fk_coi_codigo')->nullable();
            $table->text('loj_prazo_dias_baixas')->nullable();
            $table->integer('loj_fk_usu_codigo_comissao_empresa')->nullable();
            $table->text('loj_usa_situacao_padrao')->nullable();
            $table->text('loj_minimo_dias_quebra')->nullable();
            $table->text('loj_tipo_agrupamento_nagociacao')->nullable();
            $table->integer('loj_fk_coi_codigo_baixa')->nullable();
            $table->text('loj_diferencia_cedente_balcao')->nullable();
            $table->text('loj_dispara_scpc')->nullable();
            $table->text('loj_email_scpc_1')->nullable();
            $table->text('loj_email_scpc_2')->nullable();
            $table->text('loj_email_scpc_3')->nullable();
            $table->text('loj_email_scpc_4')->nullable();
            $table->text('loj_email_scpc_5')->nullable();
            $table->text('loj_email_scpc_remetente_1')->nullable();
            $table->text('loj_email_scpc_remetente_2')->nullable();
            $table->text('loj_email_scpc_remetente_3')->nullable();
            $table->text('loj_email_scpc_remetente_4')->nullable();
            $table->text('loj_email_scpc_remetente_5')->nullable();
            $table->text('loj_observacao_cobranca')->nullable();
            $table->text('loj_baixa_automatico', 1)->nullable();
            $table->text('loj_fone_gratuito')->nullable();
            $table->text('loj_aparece_site', 1)->nullable();
            $table->text('loj_atraso_minimo_site')->nullable();
            $table->text('loj_nome_site')->nullable();
            $table->text('loj_negocia_site')->nullable();
            $table->text('loj_texto_nao_negocia')->nullable();
            $table->text('loj_faixa_fiep')->nullable();
            $table->text('loj_usa_comissao_variavel', 1)->nullable();
            $table->decimal('loj_tarifa_diferenciada', 16)->nullable();
            $table->text('loj_usa_boleto_fases_taxa', 1)->nullable();
            $table->text('loj_tercerizada', 1)->nullable();
            $table->integer('loj_fk_emp_codigo_origem')->nullable();
            $table->text('loj_demonstrativo1', 1)->nullable();
            $table->text('loj_usa_inpc', 1)->nullable();
            $table->text('loj_acordo_varejo', 1)->nullable();
            $table->text('loj_id_company')->nullable();
            $table->text('loj_termo_novacao')->nullable();
            $table->text('loj_usa_novacao')->nullable();
            $table->text('loj_msg_nao_negocia')->nullable();
            $table->text('loj_baixa_juros_hono', 1)->nullable();
            $table->text('loj_usa_taxa_capital', 1)->nullable();
            $table->text('loj_sincroniza', 1)->nullable();
            $table->text('loj_banco')->nullable();
            $table->text('loj_agencia')->nullable();
            $table->text('loj_conta_corrente')->nullable();
            $table->text('loj_cpf_cnpj_titular_conta')->nullable();
            $table->text('loj_usa_comissao_por_valor')->nullable();
            $table->text('loj_fk_pes_codigo')->nullable();
            $table->text('loj_carteira_comissao')->nullable();
            $table->text('loj_confirma_cpf_email')->nullable();
            $table->text('loj_integra_wedoo')->nullable();
            $table->text('loj_host_wedoo')->nullable();
            $table->text('loj_usuario_wedoo')->nullable();
            $table->text('loj_senha_wedoo')->nullable();
            $table->text('loj_gerar_boleto_acordo')->nullable();
            $table->text('loj_aprovacao_matriz')->nullable();
            $table->text('loj_acionar_cadastro_parcela')->nullable();
            $table->text('loj_calculo_pela_fase')->nullable();
            $table->integer('loj_fk_ent_codigo')->nullable();
            $table->text('loj_usa_infos_boleto')->nullable();
            $table->text('loj_atualiza_boleto')->nullable();
            $table->text('loj_sigla')->nullable();
            $table->text('loj_primeiro_vencimento_comissao', 1)->nullable();
            $table->text('loj_dias_inclusao_scpc')->nullable();
            $table->text('loj_dispara_inclusao_scpc', 1)->nullable();
            $table->text('loj_atualizar_juros_multa', 1)->nullable();
            $table->text('loj_orgao_negativacao')->nullable();
            $table->text('loj_vencimento_comissao')->nullable();
            $table->text('loj_hoepers', 1)->nullable();
            $table->text('loj_integra_acordo_ftp', 1)->nullable();
            $table->text('loj_ftp_host')->nullable();
            $table->text('loj_ftp_usuario')->nullable();
            $table->text('loj_ftp_senha')->nullable();
            $table->text('loj_ftp_pasta_externa')->nullable();
            $table->text('loj_modo_passivo')->nullable();
            $table->text('loj_altera_acordo_manual', 1)->nullable();
            $table->integer('loj_fk_car_codigo')->nullable();
            $table->text('loj_ocorrencia_recibo', 1)->nullable();
            $table->text('loj_caminho_logo')->nullable();
            $table->text('loj_troca_situacao_boletagem', 1)->nullable();
            $table->text('loj_confirma_endereco_site', 1)->nullable();
            $table->text('loj_confirma_endereco_cartao', 1)->nullable();
            $table->text('loj_troca_situacao_gerar_boletagem', 1)->nullable();
            $table->text('loj_terceirizada_baixa', 1)->nullable();
            $table->text('loj_confirma_dados_site', 1)->nullable();
            $table->text('loj_appname_infocard')->nullable();
            $table->text('loj_loja_infocard')->nullable();
            $table->text('loj_rede_infocard')->nullable();
            $table->text('loj_unidade_infocard')->nullable();
            $table->text('loj_integra_infocard', 1)->nullable();
            $table->text('loj_api_id_infocard')->nullable();
            $table->text('loj_api_key_infocard')->nullable();
            $table->text('loj_avisa_importacao_por_email')->nullable();
            $table->text('loj_email_importacao')->nullable();
            $table->integer('loj_fk_mod_codigo_email_importacao')->nullable();
            $table->text('loj_email_remetente')->nullable();
            $table->text('loj_nome_remetente')->nullable();
            $table->text('loj_endereco_acionamento', 1)->nullable();
            $table->integer('loj_fk_cna_codigo')->nullable();
            $table->integer('loj_fk_fun_codigo')->nullable();
            $table->text('loj_usa_aviso_boleto', 1)->nullable();
            $table->text('loj_termo_confissao')->nullable();
            $table->text('loj_promissoria')->nullable();
            $table->text('loj_sincroniza_situacao', 1)->nullable();
            $table->text('loj_texto_acima_boleto')->nullable();
            $table->text('loj_assunto_email')->nullable();
            $table->text('loj_demonstrativo_boleto')->nullable();
            $table->text('loj_usa_igpm', 1)->nullable();
            $table->text('loj_retira_honorario_comissao', 1)->nullable();
            $table->text('loj_robo_prev_extraju', 1)->nullable();
            $table->text('loj_usa_peso_situacao', 1)->nullable();
            $table->text('loj_negocia_robo', 1)->nullable();
            $table->text('loj_negociacao_boleto', 1)->nullable();
            $table->text('loj_resto_contrato', 1)->nullable();
            $table->decimal('loj_tira_total_contrato', 16)->nullable();
            $table->text('loj_integra_mannesoft', 1)->nullable();
            $table->text('loj_robo_envia_boleto', 1)->nullable();
            $table->text('loj_prazo_entrada_robo')->nullable();
            $table->text('loj_robo_valida_dados', 1)->nullable();
            $table->text('loj_gera_acordo_sem_endereco', 1)->nullable();
            $table->text('loj_nao_valida_cpf', 1)->nullable();
            $table->text('loj_tela_calcular')->nullable();
            $table->text('loj_baixa_aciona', 1)->nullable();
            $table->text('loj_frase_acionamento_guia_protesto')->nullable();
            $table->text('loj_dispara_email_sem_baixas', 1)->nullable();
            $table->text('loj_usa_giving', 1)->nullable();
            $table->text('loj_atualiza_vlacordo', 1)->nullable();
            $table->text('loj_usa_campo_nfe', 1)->nullable();
            $table->text('loj_usa_mmi', 1)->nullable();
            $table->text('loj_usa_bordero_concatenado', 1)->nullable();
            $table->text('loj_envia_email_credor', 1)->nullable();
            $table->text('loj_email_credor')->nullable();
            $table->text('loj_usa_juro_importado', 1)->nullable();
            $table->text('loj_usa_taxa_boleto_parcelamento', 1)->nullable();
            $table->text('loj_usa_credishop', 1)->nullable();
            $table->text('loj_codigo_honorario', 1)->nullable();
            $table->text('loj_usa_api_dental', 2)->nullable();
            $table->text('loj_usa_frase_acionamento_especifica')->nullable();
            $table->text('loj_logo_boleto')->nullable();
            $table->text('loj_nome_remetente_scpc')->nullable();
            $table->text('loj_usa_desconto_boleto_variavel', 1)->nullable();
            $table->text('loj_desconto_boleto_variavel')->nullable();
            $table->text('loj_informa_dados', 1)->nullable();
            $table->integer('loj_fk_mod_codigo_padrao')->nullable();
            $table->text('loj_tipo_integracao')->nullable();
            $table->text('loj_integra_totvs_protheus', 1)->nullable();
            $table->text('loj_utiliza_vencimentos_configurados', 1)->nullable();

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
        Schema::dropIfExists('pessoa_loja');
    }
}
