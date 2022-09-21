<?php

namespace App\Http\Controllers;

use App\Models\ContratoParcela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pessoa;
use App\Models\PessoaEndereco;
use App\Models\PessoaLoja;
use App\Models\PessoaFone;
use App\Models\PessoaEmail;
use App\Models\PessoaAcionamento;
use App\Models\PessoaContrato;
use App\Models\Loja;
use App\Models\Acordo;
use App\Models\AcordoItem;
use App\Models\Baixa;

class SincronizaDadosCalculo extends Controller {
    private $response;
    public function __invoke() {
        $this->response = json_decode(Http::withoutVerifying()
            ->withOptions(["verify" => false])
            ->post('https://homolog.aquicob.com.br/api.php?a=dados_gerais&b=envia_dados_gerais&token=F69CCF5FD4F4FA2096C56159D7A13472AB9B545566DFE95F28760C8863E357A5', [
                'emp_codigo' => '183',
                'pes_codigo' => '1142785',
            ]));
        $this->sincronizaPessoa();
        $this->sincronizaPessoaLoja();
        $this->sincronizaLojas();
        $this->sincronizaPessoaEndereco();
        $this->sincronizaPessoaFone();
        $this->sincronizaPessoaEmail();
        $this->sincronizaPessoaAcionamento();
        $this->sincronizaPessoaContrato();
        $this->sincronizaContratoParcela();
        $this->sincronizaAcordo();
        $this->sincronizaAcordoItem();
        $this->sincronizaBaixa();

        return redirect("/acionamento/12345");

    }

    public function sincronizaPessoa() {
        if (!empty($this->response->dados->pessoa)) {
            $pessoa = new Pessoa();

            $pessoa->pes_codigo = $this->response->dados->pessoa[0]->pes_codigo;
            $pessoa->pes_nome = $this->response->dados->pessoa[0]->pes_nome;
            $pessoa->pes_cpf_cnpj = $this->response->dados->pessoa[0]->pes_cpf_cnpj;
            $pessoa->pes_data_cadastro = $this->response->dados->pessoa[0]->pes_data_cadastro;
            $pessoa->pes_data_nascimento = $this->response->dados->pessoa[0]->pes_data_nascimento;
            $pessoa->pes_estado_civil = $this->response->dados->pessoa[0]->pes_estado_civil;
            $pessoa->pes_tipo_pessoa = $this->response->dados->pessoa[0]->pes_tipo_pessoa;
            $pessoa->pes_sexo = $this->response->dados->pessoa[0]->pes_sexo;
            $pessoa->pes_obs = $this->response->dados->pessoa[0]->pes_obs;
            $pessoa->pes_rg = $this->response->dados->pessoa[0]->pes_rg;
            $pessoa->pes_nome_pai = $this->response->dados->pessoa[0]->pes_nome_pai;
            $pessoa->pes_nome_mae = $this->response->dados->pessoa[0]->pes_nome_mae;
            $pessoa->pes_email = $this->response->dados->pessoa[0]->pes_email;
            $pessoa->pes_tipo = $this->response->dados->pessoa[0]->pes_tipo;
            $pessoa->pes_avalista = $this->response->dados->pessoa[0]->pes_avalista;
            $pessoa->pes_fone_avalista = $this->response->dados->pessoa[0]->pes_fone_avalista;
            $pessoa->pes_trabalho_cnpj = $this->response->dados->pessoa[0]->pes_trabalho_cnpj;
            $pessoa->pes_trabalho_empresa = $this->response->dados->pessoa[0]->pes_trabalho_empresa;
            $pessoa->pes_trabalho_cargo = $this->response->dados->pessoa[0]->pes_trabalho_cargo;
            $pessoa->pes_trabalho_salario = $this->response->dados->pessoa[0]->pes_trabalho_salario;
            $pessoa->pes_trabalho_vale = $this->response->dados->pessoa[0]->pes_trabalho_vale;
            $pessoa->pes_trabalho_dia_pagamento = $this->response->dados->pessoa[0]->pes_trabalho_dia_pagamento;
            $pessoa->pes_rg_emissor = $this->response->dados->pessoa[0]->pes_rg_emissor;
            $pessoa->pes_naturalidade = $this->response->dados->pessoa[0]->pes_naturalidade;
            $pessoa->pes_nacionalidade = $this->response->dados->pessoa[0]->pes_nacionalidade;
            $pessoa->pes_profissao = $this->response->dados->pessoa[0]->pes_profissao;
            $pessoa->pes_nome_fantasia = $this->response->dados->pessoa[0]->pes_nome_fantasia;
            $pessoa->pes_escolaridade_txt = $this->response->dados->pessoa[0]->pes_escolaridade_txt;
            $pessoa->pes_status_cpf = $this->response->dados->pessoa[0]->pes_status_cpf;

            $res = Pessoa::where('pes_codigo', $this->response->dados->pessoa[0]->pes_codigo)->get();
            if ($res->isEmpty()) {
                $pessoa->save();
            } else {
                $pessoa->update();
            }
        }
    }

    public function sincronizaPessoaLoja() {
        if (!empty($this->response->dados->pessoa_loja)) {

            foreach ($this->response->dados->pessoa_loja as $eachStore) {
                $pessoa_loja = new PessoaLoja();
                $pessoa_loja->pel_fk_loj_codigo = $eachStore->pel_fk_loj_codigo;
                $pessoa_loja->pel_fk_pes_codigo = $eachStore->pel_fk_pes_codigo;
                $pessoa_loja->pel_fk_sit_codigo = $eachStore->pel_fk_sit_codigo;
                $pessoa_loja->pel_fk_str_codigo = $eachStore->pel_fk_str_codigo;
                $pessoa_loja->pel_fk_usu_codigo = $eachStore->pel_fk_usu_codigo;
                $pessoa_loja->pel_data_agenda = $eachStore->pel_data_agenda;
                $pessoa_loja->pel_hora = $eachStore->pel_hora;
                $pessoa_loja->pel_acionado_agenda = $eachStore->pel_acionado_agenda;
                $pessoa_loja->pel_quantidade_acionado = $eachStore->pel_quantidade_acionado;
                $pessoa_loja->pel_data_hora_atualizacao = $eachStore->pel_data_hora_atualizacao;

                $res = PessoaLoja::where('pel_fk_pes_codigo', $this->response->dados->pessoa[0]->pes_codigo)->where('pel_fk_loj_codigo', $eachStore->pel_fk_loj_codigo)->get();
                if ($res->isEmpty()) {
                    $pessoa_loja->save();
                } else {
                    $pessoa_loja->update();
                }
            }
        }
    }

    public function sincronizaPessoaEndereco() {
        if (!empty($this->response->dados->pessoa_endereco)) {

            foreach ($this->response->dados->pessoa_endereco as $eachAddress) {
                $pessoa_endereco = new PessoaEndereco();
                $pessoa_endereco->pee_codigo = $eachAddress->pee_codigo;
                $pessoa_endereco->pee_fk_pes_codigo = $eachAddress->pee_fk_pes_codigo;
                $pessoa_endereco->pee_fk_tie_codigo = $eachAddress->pee_fk_tie_codigo;
                $pessoa_endereco->pee_cep = $eachAddress->pee_cep;
                $pessoa_endereco->pee_endereco = $eachAddress->pee_endereco;
                $pessoa_endereco->pee_numero = $eachAddress->pee_numero;
                $pessoa_endereco->pee_bairro = $eachAddress->pee_bairro;
                $pessoa_endereco->pee_cidade = $eachAddress->pee_cidade;
                $pessoa_endereco->pee_estado = $eachAddress->pee_estado;
                $pessoa_endereco->pee_observacao = $eachAddress->pee_observacao;
                $pessoa_endereco->pee_fk_qen_codigo = $eachAddress->pee_fk_qen_codigo;
                $pessoa_endereco->pee_data_cadastro = $eachAddress->pee_data_cadastro;
                $pessoa_endereco->pee_id_endereco_ec = $eachAddress->pee_id_endereco_ec;
                $pessoa_endereco->pee_preferencial = $eachAddress->pee_preferencial;
                $pessoa_endereco->pee_black_list = $eachAddress->pee_black_list;
                $pessoa_endereco->pee_higienizado_assertiva = $eachAddress->pee_higienizado_assertiva;

                $res = PessoaEndereco::where('pee_codigo', $eachAddress->pee_codigo)->get();
                if ($res->isEmpty()) {
                    $pessoa_endereco->save();
                } else {
                    $pessoa_endereco->update();
                }
            }
        }
    }

    public function sincronizaPessoaFone() {
        if (!empty($this->response->dados->pessoa_fone)) {

            foreach ($this->response->dados->pessoa_fone as $eachPhone) {
                $pessoa_fone = new PessoaFone();
                $pessoa_fone->pef_codigo = $eachPhone->pef_codigo;
                $pessoa_fone->pef_fk_pes_codigo = $eachPhone->pef_fk_pes_codigo;
                $pessoa_fone->pef_fk_tif_codigo = $eachPhone->pef_fk_tif_codigo;
                $pessoa_fone->pef_fone = $eachPhone->pef_fone;
                $pessoa_fone->pef_descricao = $eachPhone->pef_descricao;
                $pessoa_fone->pef_fk_qua_codigo = $eachPhone->pef_fk_qua_codigo;
                $pessoa_fone->pef_data_cadastro = $eachPhone->pef_data_cadastro;
                $pessoa_fone->pef_quantidade_ligacoes = $eachPhone->pef_quantidade_ligacoes;
                $pessoa_fone->pef_ultimo_fk_asr_codigo = $eachPhone->pef_ultimo_fk_asr_codigo;
                $pessoa_fone->pef_whatsapp = $eachPhone->pef_whatsapp;
                $pessoa_fone->pef_id_telefone_ec = $eachPhone->pef_id_telefone_ec;
                $pessoa_fone->pef_preferencial = $eachPhone->pef_preferencial;
                $pessoa_fone->pef_black_list = $eachPhone->pef_black_list;
                $pessoa_fone->pef_higienizado_assertiva = $eachPhone->pef_higienizado_assertiva;
                $pessoa_fone->pef_score = $eachPhone->pef_score;
                // $pessoa_fone->pef_portal = $eachPhone->pef_portal;
                $pessoa_fone->pef_fone_portal = $eachPhone->pef_fone_portal;

                $res = PessoaFone::where('pef_codigo', $eachPhone->pef_codigo)->get();
                if ($res->isEmpty()) {
                    $pessoa_fone->save();
                } else {
                    $pessoa_fone->update();
                }
            }
        }
    }

    public function sincronizaPessoaEmail() {
        if (!empty($this->response->dados->pessoa_email)) {

            foreach ($this->response->dados->pessoa_email as $eachEmail) {
                $pessoa_email = new PessoaEmail();
                $pessoa_email->pem_codigo = $eachEmail->pem_codigo;
                $pessoa_email->pem_fk_pes_codigo = $eachEmail->pem_fk_pes_codigo;
                $pessoa_email->pem_email = $eachEmail->pem_email;
                $pessoa_email->pem_fk_qum_codigo = $eachEmail->pem_fk_qum_codigo;
                $pessoa_email->pem_observacao = $eachEmail->pem_observacao;
                $pessoa_email->pem_data_cadastro = $eachEmail->pem_data_cadastro;
                $pessoa_email->pem_confirmacao = $eachEmail->pem_confirmacao;
                $pessoa_email->pem_id_email_ec = $eachEmail->pem_id_email_ec;
                $pessoa_email->pem_preferencial = $eachEmail->pem_preferencial;
                $pessoa_email->pem_black_list = $eachEmail->pem_black_list;
                $pessoa_email->pem_higienizado_assertiva = $eachEmail->pem_higienizado_assertiva;
                $res = PessoaEmail::where('pem_codigo', $eachEmail->pem_codigo)->get();
                if ($res->isEmpty()) {
                    $pessoa_email->save();
                } else {
                    $pessoa_email->update();
                }
            }
        }
    }

    public function sincronizaPessoaAcionamento() {
        if (!empty($this->response->dados->pessoa_acionamento)) {
            foreach ($this->response->dados->pessoa_acionamento as $eachContact) {
                $pessoa_acionamento = new PessoaAcionamento();
                $pessoa_acionamento->pea_codigo = $eachContact->pea_codigo;
                $pessoa_acionamento->pea_fk_pes_codigo = $eachContact->pea_fk_pes_codigo;
                $pessoa_acionamento->pea_data = $eachContact->pea_data;
                $pessoa_acionamento->pea_fk_usu_codigo = $eachContact->pea_fk_usu_codigo;
                $pessoa_acionamento->pea_fk_loj_codigo = $eachContact->pea_fk_loj_codigo;
                $pessoa_acionamento->pea_tipo = $eachContact->pea_tipo;
                $pessoa_acionamento->pea_tipo_acionamento = $eachContact->pea_tipo_acionamento;
                $pessoa_acionamento->pea_frase_acionamento = $eachContact->pea_frase_acionamento;
                $pessoa_acionamento->pea_fk_fra_codigo = $eachContact->pea_fk_fra_codigo;
                $pessoa_acionamento->pea_obs_acionamento = $eachContact->pea_obs_acionamento;
                $pessoa_acionamento->pea_situacao = $eachContact->pea_situacao;
                $pessoa_acionamento->pea_fk_paa_codigo = $eachContact->pea_fk_paa_codigo;
                $pessoa_acionamento->pea_fk_aco_codigo = $eachContact->pea_fk_aco_codigo;
                $pessoa_acionamento->pea_sms = $eachContact->pea_sms;
                $pessoa_acionamento->pea_email = $eachContact->pea_email;
                $pessoa_acionamento->pea_cidade = $eachContact->pea_cidade;
                $pessoa_acionamento->pea_bairro = $eachContact->pea_bairro;
                $pessoa_acionamento->pea_naturgy_email = $eachContact->pea_naturgy_email;
                $pessoa_acionamento->pea_naturgy_fone = $eachContact->pea_naturgy_fone;
                $pessoa_acionamento->pea_tma_discador = $eachContact->pea_tma_discador;
                $pessoa_acionamento->pea_valor_promessa = $eachContact->pea_valor_promessa;
                $pessoa_acionamento->pea_fk_fun_codigo = $eachContact->pea_fk_fun_codigo;
                $pessoa_acionamento->pea_fk_sit_codigo = $eachContact->pea_fk_sit_codigo;
                $pessoa_acionamento->pea_enviou_gazin = $eachContact->pea_enviou_gazin;
                $pessoa_acionamento->pea_visivel = $eachContact->pea_visivel;
                $pessoa_acionamento->pea_enviou_credishop = $eachContact->pea_enviou_credishop;

                $res = PessoaAcionamento::where('pea_codigo', $eachContact->pea_codigo)->get();
                if ($res->isEmpty()) {
                    $pessoa_acionamento->save();
                } else {
                    $pessoa_acionamento->update();
                }
            }
        }
    }

    public function sincronizaPessoaContrato() {
        if (!empty($this->response->dados->pessoa_contrato)) {
            foreach ($this->response->dados->pessoa_contrato as $eachContract) {
                $pessoa_contrato = new PessoaContrato();
                $pessoa_contrato->con_codigo = $eachContract->con_codigo;
                $pessoa_contrato->con_data_credito = $eachContract->con_data_credito;
                $pessoa_contrato->con_contrato = $eachContract->con_contrato;
                $pessoa_contrato->con_data_atualizacao = $eachContract->con_data_atualizacao;
                $pessoa_contrato->con_data_cadastro = $eachContract->con_data_cadastro;
                $pessoa_contrato->con_descricao = $eachContract->con_descricao;
                $pessoa_contrato->con_fk_bor_codigo = $eachContract->con_fk_bor_codigo;
                $pessoa_contrato->con_fk_loj_codigo = $eachContract->con_fk_loj_codigo;
                $pessoa_contrato->con_fk_pes_codigo = $eachContract->con_fk_pes_codigo;
                $pessoa_contrato->con_fk_usu_codigo = $eachContract->con_fk_usu_codigo;
                $pessoa_contrato->con_observacao = $eachContract->con_observacao;
                $pessoa_contrato->con_pode_parcelar = $eachContract->con_pode_parcelar;
                $pessoa_contrato->con_obito = $eachContract->con_obito;
                $pessoa_contrato->con_filtro_zenf = $eachContract->con_filtro_zenf;
                $pessoa_contrato->con_filial_credor = $eachContract->con_filial_credor;
                $pessoa_contrato->con_cuenta = $eachContract->con_cuenta;
                $pessoa_contrato->con_tienda = $eachContract->con_tienda;
                $pessoa_contrato->con_fk_nov_codigo = $eachContract->con_fk_nov_codigo;
                $pessoa_contrato->con_serasa_negativado = $eachContract->con_serasa_negativado;
                $pessoa_contrato->con_serasa_acp_negativado = $eachContract->con_serasa_acp_negativado;
                $pessoa_contrato->con_onde_negativa = $eachContract->con_onde_negativa;
                $pessoa_contrato->con_valor_negativado = $eachContract->con_valor_negativado;
                $pessoa_contrato->con_data_expiracao = $eachContract->con_data_expiracao;
                $pessoa_contrato->con_cobranca_judicial = $eachContract->con_cobranca_judicial;
                $pessoa_contrato->con_data_cadastro_credor = $eachContract->con_data_cadastro_credor;
                $pessoa_contrato->con_plano = $eachContract->con_plano;
                $pessoa_contrato->con_produto = $eachContract->con_produto;
                $pessoa_contrato->con_id_contrato_ec = $eachContract->con_id_contrato_ec;
                $pessoa_contrato->con_data_vencimento_contabil = $eachContract->con_data_vencimento_contabil;
                $pessoa_contrato->con_nome_loja = $eachContract->con_nome_loja;
                $pessoa_contrato->con_nome_produto = $eachContract->con_nome_produto;
                $pessoa_contrato->con_legenda = $eachContract->con_legenda;
                $pessoa_contrato->con_observacao2 = $eachContract->con_observacao2;
                $pessoa_contrato->con_observacao3 = $eachContract->con_observacao3;
                $pessoa_contrato->con_observacao4 = $eachContract->con_observacao4;
                $pessoa_contrato->con_observacao5 = $eachContract->con_observacao5;
                $pessoa_contrato->con_observacao6 = $eachContract->con_observacao6;
                $pessoa_contrato->con_observacao7 = $eachContract->con_observacao7;
                $pessoa_contrato->con_observacao8 = $eachContract->con_observacao8;
                $pessoa_contrato->con_soma_lancamentos_futuros = $eachContract->con_soma_lancamentos_futuros;

                $res = PessoaContrato::where('con_codigo', $eachContract->con_codigo)->get();
                if ($res->isEmpty()) {
                    $pessoa_contrato->save();
                } else {
                    $pessoa_contrato->update();
                }
            }
        }
    }

    public function sincronizaContratoParcela() {
        if (!empty($this->response->dados->contrato_parcela)) {
            foreach ($this->response->dados->contrato_parcela as $eachParcel) {
                $contrato_parcela = new ContratoParcela();
                $contrato_parcela->par_codigo = $eachParcel->par_codigo;
                $contrato_parcela->par_fk_con_codigo = $eachParcel->par_fk_con_codigo;
                $contrato_parcela->par_prestacao = $eachParcel->par_prestacao;
                $contrato_parcela->par_vencimento = $eachParcel->par_vencimento;
                $contrato_parcela->par_valor = $eachParcel->par_valor;
                $contrato_parcela->par_saldo = $eachParcel->par_saldo;
                $contrato_parcela->par_situacao = $eachParcel->par_situacao;
                $contrato_parcela->par_data_cadastro = $eachParcel->par_data_cadastro;
                $contrato_parcela->par_data_atualizacao = $eachParcel->par_data_atualizacao;
                $contrato_parcela->par_observacao = $eachParcel->par_observacao;
                $contrato_parcela->par_fk_aco_codigo = $eachParcel->par_fk_aco_codigo;
                $contrato_parcela->par_fk_usu_codigo = $eachParcel->par_fk_usu_codigo;
                $contrato_parcela->par_fk_bor_codigo = $eachParcel->par_fk_bor_codigo;
                $contrato_parcela->par_atualizei = $eachParcel->par_atualizei;
                $contrato_parcela->par_fk_emp_codigo_terceirizada = $eachParcel->par_fk_emp_codigo_terceirizada;
                $contrato_parcela->par_data_envio_terceirizada = $eachParcel->par_data_envio_terceirizada;
                $contrato_parcela->par_fk_div_codigo = $eachParcel->par_fk_div_codigo;
                $contrato_parcela->par_fk_emp_codigo_origem = $eachParcel->par_fk_emp_codigo_origem;
                $contrato_parcela->par_fk_par_codigo_origem = $eachParcel->par_fk_par_codigo_origem;
                $contrato_parcela->par_versao_registro = $eachParcel->par_versao_registro;
                $contrato_parcela->par_flag_importado_batimento = $eachParcel->par_flag_importado_batimento;
                $contrato_parcela->par_id_lote = $eachParcel->par_id_lote;
                $contrato_parcela->par_id_titulo = $eachParcel->par_id_titulo;
                $contrato_parcela->par_seller_codigo_cobranca = $eachParcel->par_seller_codigo_cobranca;
                $contrato_parcela->par_seller_codigo_carta = $eachParcel->par_seller_codigo_carta;
                $contrato_parcela->par_seller_sequencia = $eachParcel->par_seller_sequencia;
                $contrato_parcela->par_seller_modelo_carta = $eachParcel->par_seller_modelo_carta;
                $contrato_parcela->par_seller_id_titulo = $eachParcel->par_seller_id_titulo;
                $contrato_parcela->par_seller_numero_filial = $eachParcel->par_seller_numero_filial;
                $contrato_parcela->par_valor_despesa = $eachParcel->par_valor_despesa;
                $contrato_parcela->par_saldo_despesa = $eachParcel->par_saldo_despesa;
                $contrato_parcela->par_fk_nov_codigo_baixado = $eachParcel->par_fk_nov_codigo_baixado;
                $contrato_parcela->par_fk_aco_codigo_matriz = $eachParcel->par_fk_aco_codigo_matriz;
                $contrato_parcela->par_ID_DIVIDA_EC = $eachParcel->par_ID_DIVIDA_EC;
                $contrato_parcela->par_ID_DIVIDA = $eachParcel->par_ID_DIVIDA;
                $contrato_parcela->par_DATA_CORRECAO = $eachParcel->par_DATA_CORRECAO;
                $contrato_parcela->par_VALOR_CORRECAO = $eachParcel->par_VALOR_CORRECAO;
                $contrato_parcela->par_VALOR_MINIMO = $eachParcel->par_VALOR_MINIMO;
                $contrato_parcela->par_novada_carsystem = $eachParcel->par_novada_carsystem;
                $contrato_parcela->par_wedoo_tipo_divida = $eachParcel->par_wedoo_tipo_divida;
                $contrato_parcela->par_wedoo_marcado = $eachParcel->par_wedoo_marcado;
                $contrato_parcela->par_wedoo_DividaCedente = $eachParcel->par_wedoo_DividaCedente;
                $contrato_parcela->par_data_limite_cobranca = $eachParcel->par_data_limite_cobranca;
                $contrato_parcela->par_NumeroPrestacao = $eachParcel->par_NumeroPrestacao;
                $contrato_parcela->par_IdAcordo = $eachParcel->par_IdAcordo;
                $contrato_parcela->par_filial_gazin = $eachParcel->par_filial_gazin;
                $contrato_parcela->par_numero_processo_gazin = $eachParcel->par_numero_processo_gazin;
                // $contrato_parcela->par_valor_original = $eachParcel->par_valor_original;
                $contrato_parcela->par_nota_fiscal_air = $eachParcel->par_nota_fiscal_air;
                $contrato_parcela->par_observacao2 = $eachParcel->par_observacao2;
                $contrato_parcela->par_observacao3 = $eachParcel->par_observacao3;
                $contrato_parcela->par_observacao4 = $eachParcel->par_observacao4;
                $contrato_parcela->par_observacao5 = $eachParcel->par_observacao5;
                $contrato_parcela->par_observacao6 = $eachParcel->par_observacao6;
                $contrato_parcela->par_observacao7 = $eachParcel->par_observacao7;
                $contrato_parcela->par_observacao8 = $eachParcel->par_observacao8;
                $contrato_parcela->par_nr_documento_otis = $eachParcel->par_nr_documento_otis;
                $contrato_parcela->par_estabelecimento_air = $eachParcel->par_estabelecimento_air;
                $contrato_parcela->par_emissao_air = $eachParcel->par_emissao_air;
                $contrato_parcela->par_serie_air = $eachParcel->par_serie_air;
                $contrato_parcela->par_valor_total_nota_air = $eachParcel->par_valor_total_nota_air;
                $contrato_parcela->par_nome_parceiro_gazin = $eachParcel->par_nome_parceiro_gazin;
                $contrato_parcela->par_produtos_gazin = $eachParcel->par_produtos_gazin;
                $contrato_parcela->par_score = $eachParcel->par_score;
                $contrato_parcela->par_carteira = $eachParcel->par_carteira;
                $contrato_parcela->par_valor_com_futuro = $eachParcel->par_valor_com_futuro;
                // $contrato_parcela->par_lancamento_futuro = $eachParcel->par_lancamento_futuro;
                // $contrato_parcela->par_lancamento_futuro_obrigatorio = $eachParcel->par_lancamento_futuro_obrigatorio;
                // $contrato_parcela->par_data_maxima_do_lf = $eachParcel->par_data_maxima_do_lf;

                $res = ContratoParcela::where('par_codigo', $eachParcel->par_codigo)->get();
                if ($res->isEmpty()) {
                    $contrato_parcela->save();
                } else {
                    $contrato_parcela->update();
                }
            }
        }
    }
    
    public function sincronizaLojas() {
        if (!empty($this->response->dados->loja)) {

            foreach ($this->response->dados->loja as $eachStore) {
                $loja = new Loja();
                $loja->loj_codigo = $eachStore->loj_codigo;
                $loja->loj_razao = $eachStore->loj_razao;
                $loja->loj_fantasia = $eachStore->loj_fantasia;
                $loja->loj_cpf_cnpj = $eachStore->loj_cpf_cnpj;
                $loja->loj_contato = $eachStore->loj_contato;
                $loja->loj_obs = $eachStore->loj_obs;
                $loja->loj_fk_cob_codigo = $eachStore->loj_fk_cob_codigo;
                $loja->loj_envio_baixa_spc = $eachStore->loj_envio_baixa_spc;
                $loja->loj_envio_baixa_protesto = $eachStore->loj_envio_baixa_protesto;
                $loja->loj_endereco = $eachStore->loj_endereco;
                $loja->loj_bairro = $eachStore->loj_bairro;
                $loja->loj_numero = $eachStore->loj_numero;
                $loja->loj_cep = $eachStore->loj_cep;
                $loja->loj_cidade = $eachStore->loj_cidade;
                $loja->loj_estado = $eachStore->loj_estado;
                $loja->loj_email_disparo_scpc = $eachStore->loj_email_disparo_scpc;
                $loja->loj_email_1 = $eachStore->loj_email_1;
                $loja->loj_email_2 = $eachStore->loj_email_2;
                $loja->loj_email_3 = $eachStore->loj_email_3;
                $loja->loj_tipo_calculo = $eachStore->loj_tipo_calculo;
                $loja->loj_fone = $eachStore->loj_fone;
                $loja->loj_fone_2 = $eachStore->loj_fone_2;
                $loja->loj_tipo_juros = $eachStore->loj_tipo_juros;
                $loja->loj_fk_usu_codigo = $eachStore->loj_fk_usu_codigo;
                $loja->loj_data_cadastro = $eachStore->loj_data_cadastro;
                $loja->loj_status = $eachStore->loj_status;
                $loja->loj_fk_coi_codigo = $eachStore->loj_fk_coi_codigo;
                $loja->loj_prazo_dias_baixas = $eachStore->loj_prazo_dias_baixas;
                $loja->loj_fk_usu_codigo_comissao_empresa = $eachStore->loj_fk_usu_codigo_comissao_empresa;
                $loja->loj_usa_situacao_padrao = $eachStore->loj_usa_situacao_padrao;
                $loja->loj_minimo_dias_quebra = $eachStore->loj_minimo_dias_quebra;
                $loja->loj_tipo_agrupamento_nagociacao = $eachStore->loj_tipo_agrupamento_nagociacao;
                $loja->loj_fk_coi_codigo_baixa = $eachStore->loj_fk_coi_codigo_baixa;
                $loja->loj_diferencia_cedente_balcao = $eachStore->loj_diferencia_cedente_balcao;
                $loja->loj_dispara_scpc = $eachStore->loj_dispara_scpc;
                $loja->loj_email_scpc_1 = $eachStore->loj_email_scpc_1;
                $loja->loj_email_scpc_2 = $eachStore->loj_email_scpc_2;
                $loja->loj_email_scpc_3 = $eachStore->loj_email_scpc_3;
                $loja->loj_email_scpc_4 = $eachStore->loj_email_scpc_4;
                $loja->loj_email_scpc_5 = $eachStore->loj_email_scpc_5;
                $loja->loj_email_scpc_remetente_1 = $eachStore->loj_email_scpc_remetente_1;
                $loja->loj_email_scpc_remetente_2 = $eachStore->loj_email_scpc_remetente_2;
                $loja->loj_email_scpc_remetente_3 = $eachStore->loj_email_scpc_remetente_3;
                $loja->loj_email_scpc_remetente_4 = $eachStore->loj_email_scpc_remetente_4;
                $loja->loj_email_scpc_remetente_5 = $eachStore->loj_email_scpc_remetente_5;
                $loja->loj_observacao_cobranca = $eachStore->loj_observacao_cobranca;
                $loja->loj_baixa_automatico = $eachStore->loj_baixa_automatico;
                $loja->loj_fone_gratuito = $eachStore->loj_fone_gratuito;
                $loja->loj_aparece_site = $eachStore->loj_aparece_site;
                $loja->loj_atraso_minimo_site = $eachStore->loj_atraso_minimo_site;
                $loja->loj_nome_site = $eachStore->loj_nome_site;
                $loja->loj_negocia_site = $eachStore->loj_negocia_site;
                $loja->loj_texto_nao_negocia = $eachStore->loj_texto_nao_negocia;
                $loja->loj_faixa_fiep = $eachStore->loj_faixa_fiep;
                $loja->loj_usa_comissao_variavel = $eachStore->loj_usa_comissao_variavel;
                $loja->loj_tarifa_diferenciada = $eachStore->loj_tarifa_diferenciada;
                $loja->loj_usa_boleto_fases_taxa = $eachStore->loj_usa_boleto_fases_taxa;
                $loja->loj_tercerizada = $eachStore->loj_tercerizada;
                $loja->loj_fk_emp_codigo_origem = $eachStore->loj_fk_emp_codigo_origem;
                $loja->loj_demonstrativo1 = $eachStore->loj_demonstrativo1;
                $loja->loj_usa_inpc = $eachStore->loj_usa_inpc;
                $loja->loj_acordo_varejo = $eachStore->loj_acordo_varejo;
                $loja->loj_id_company = $eachStore->loj_id_company;
                $loja->loj_termo_novacao = $eachStore->loj_termo_novacao;
                $loja->loj_usa_novacao = $eachStore->loj_usa_novacao;
                $loja->loj_msg_nao_negocia = $eachStore->loj_msg_nao_negocia;
                $loja->loj_baixa_juros_hono = $eachStore->loj_baixa_juros_hono;
                $loja->loj_usa_taxa_capital = $eachStore->loj_usa_taxa_capital;
                $loja->loj_sincroniza = $eachStore->loj_sincroniza;
                $loja->loj_banco = $eachStore->loj_banco;
                $loja->loj_agencia = $eachStore->loj_agencia;
                $loja->loj_conta_corrente = $eachStore->loj_conta_corrente;
                $loja->loj_cpf_cnpj_titular_conta = $eachStore->loj_cpf_cnpj_titular_conta;
                $loja->loj_usa_comissao_por_valor = $eachStore->loj_usa_comissao_por_valor;
                $loja->loj_fk_pes_codigo = $eachStore->loj_fk_pes_codigo;
                $loja->loj_carteira_comissao = $eachStore->loj_carteira_comissao;
                $loja->loj_confirma_cpf_email = $eachStore->loj_confirma_cpf_email;
                $loja->loj_integra_wedoo = $eachStore->loj_integra_wedoo;
                $loja->loj_host_wedoo = $eachStore->loj_host_wedoo;
                $loja->loj_usuario_wedoo = $eachStore->loj_usuario_wedoo;
                $loja->loj_senha_wedoo = $eachStore->loj_senha_wedoo;
                $loja->loj_gerar_boleto_acordo = $eachStore->loj_gerar_boleto_acordo;
                $loja->loj_aprovacao_matriz = $eachStore->loj_aprovacao_matriz;
                $loja->loj_acionar_cadastro_parcela = $eachStore->loj_acionar_cadastro_parcela;
                $loja->loj_calculo_pela_fase = $eachStore->loj_calculo_pela_fase;
                $loja->loj_fk_ent_codigo = $eachStore->loj_fk_ent_codigo;
                $loja->loj_usa_infos_boleto = $eachStore->loj_usa_infos_boleto;
                $loja->loj_atualiza_boleto = $eachStore->loj_atualiza_boleto;
                $loja->loj_sigla = $eachStore->loj_sigla;
                $loja->loj_primeiro_vencimento_comissao = $eachStore->loj_primeiro_vencimento_comissao;
                $loja->loj_dias_inclusao_scpc = $eachStore->loj_dias_inclusao_scpc;
                $loja->loj_dispara_inclusao_scpc = $eachStore->loj_dispara_inclusao_scpc;
                $loja->loj_atualizar_juros_multa = $eachStore->loj_atualizar_juros_multa;
                $loja->loj_orgao_negativacao = $eachStore->loj_orgao_negativacao;
                $loja->loj_vencimento_comissao = $eachStore->loj_vencimento_comissao;
                $loja->loj_hoepers = $eachStore->loj_hoepers;
                $loja->loj_integra_acordo_ftp = $eachStore->loj_integra_acordo_ftp;
                $loja->loj_ftp_host = $eachStore->loj_ftp_host;
                $loja->loj_ftp_usuario = $eachStore->loj_ftp_usuario;
                $loja->loj_ftp_senha = $eachStore->loj_ftp_senha;
                $loja->loj_ftp_pasta_externa = $eachStore->loj_ftp_pasta_externa;
                $loja->loj_modo_passivo = $eachStore->loj_modo_passivo;
                $loja->loj_altera_acordo_manual = $eachStore->loj_altera_acordo_manual;
                $loja->loj_fk_car_codigo = $eachStore->loj_fk_car_codigo;
                $loja->loj_ocorrencia_recibo = $eachStore->loj_ocorrencia_recibo;
                $loja->loj_caminho_logo = $eachStore->loj_caminho_logo;
                $loja->loj_troca_situacao_boletagem = $eachStore->loj_troca_situacao_boletagem;
                $loja->loj_confirma_endereco_site = $eachStore->loj_confirma_endereco_site;
                $loja->loj_confirma_endereco_cartao = $eachStore->loj_confirma_endereco_cartao;
                $loja->loj_troca_situacao_gerar_boletagem = $eachStore->loj_troca_situacao_gerar_boletagem;
                $loja->loj_terceirizada_baixa = $eachStore->loj_terceirizada_baixa;
                $loja->loj_confirma_dados_site = $eachStore->loj_confirma_dados_site;
                $loja->loj_appname_infocard = $eachStore->loj_appname_infocard;
                $loja->loj_loja_infocard = $eachStore->loj_loja_infocard;
                $loja->loj_rede_infocard = $eachStore->loj_rede_infocard;
                $loja->loj_unidade_infocard = $eachStore->loj_unidade_infocard;
                $loja->loj_integra_infocard = $eachStore->loj_integra_infocard;
                $loja->loj_api_id_infocard = $eachStore->loj_api_id_infocard;
                $loja->loj_api_key_infocard = $eachStore->loj_api_key_infocard;
                $loja->loj_avisa_importacao_por_email = $eachStore->loj_avisa_importacao_por_email;
                $loja->loj_email_importacao = $eachStore->loj_email_importacao;
                $loja->loj_fk_mod_codigo_email_importacao = $eachStore->loj_fk_mod_codigo_email_importacao;
                $loja->loj_email_remetente = $eachStore->loj_email_remetente;
                $loja->loj_nome_remetente = $eachStore->loj_nome_remetente;
                $loja->loj_endereco_acionamento = $eachStore->loj_endereco_acionamento;
                $loja->loj_fk_cna_codigo = $eachStore->loj_fk_cna_codigo;
                $loja->loj_fk_fun_codigo = $eachStore->loj_fk_fun_codigo;
                $loja->loj_usa_aviso_boleto = $eachStore->loj_usa_aviso_boleto;
                $loja->loj_termo_confissao = $eachStore->loj_termo_confissao;
                $loja->loj_promissoria = $eachStore->loj_promissoria;
                $loja->loj_sincroniza_situacao = $eachStore->loj_sincroniza_situacao;
                $loja->loj_texto_acima_boleto = $eachStore->loj_texto_acima_boleto;
                $loja->loj_assunto_email = $eachStore->loj_assunto_email;
                $loja->loj_demonstrativo_boleto = $eachStore->loj_demonstrativo_boleto;
                $loja->loj_usa_igpm = $eachStore->loj_usa_igpm;
                $loja->loj_retira_honorario_comissao = $eachStore->loj_retira_honorario_comissao;
                $loja->loj_robo_prev_extraju = $eachStore->loj_robo_prev_extraju;
                $loja->loj_usa_peso_situacao = $eachStore->loj_usa_peso_situacao;
                $loja->loj_negocia_robo = $eachStore->loj_negocia_robo;
                $loja->loj_negociacao_boleto = $eachStore->loj_negociacao_boleto;
                $loja->loj_resto_contrato = $eachStore->loj_resto_contrato;
                $loja->loj_tira_total_contrato = $eachStore->loj_tira_total_contrato;
                $loja->loj_integra_mannesoft = $eachStore->loj_integra_mannesoft;
                $loja->loj_robo_envia_boleto = $eachStore->loj_robo_envia_boleto;
                $loja->loj_prazo_entrada_robo = $eachStore->loj_prazo_entrada_robo;
                $loja->loj_robo_valida_dados = $eachStore->loj_robo_valida_dados;
                $loja->loj_gera_acordo_sem_endereco = $eachStore->loj_gera_acordo_sem_endereco;
                $loja->loj_nao_valida_cpf = $eachStore->loj_nao_valida_cpf;
                $loja->loj_tela_calcular = $eachStore->loj_tela_calcular;
                $loja->loj_baixa_aciona = $eachStore->loj_baixa_aciona;
                $loja->loj_frase_acionamento_guia_protesto = $eachStore->loj_frase_acionamento_guia_protesto;
                $loja->loj_dispara_email_sem_baixas = $eachStore->loj_dispara_email_sem_baixas;
                $loja->loj_usa_giving = $eachStore->loj_usa_giving;
                $loja->loj_atualiza_vlacordo = $eachStore->loj_atualiza_vlacordo;
                $loja->loj_usa_campo_nfe = $eachStore->loj_usa_campo_nfe;
                $loja->loj_usa_mmi = $eachStore->loj_usa_mmi;
                $loja->loj_usa_bordero_concatenado = $eachStore->loj_usa_bordero_concatenado;
                $loja->loj_envia_email_credor = $eachStore->loj_envia_email_credor;
                $loja->loj_email_credor = $eachStore->loj_email_credor;
                $loja->loj_usa_juro_importado = $eachStore->loj_usa_juro_importado;
                $loja->loj_usa_taxa_boleto_parcelamento = $eachStore->loj_usa_taxa_boleto_parcelamento;
                $loja->loj_usa_credishop = $eachStore->loj_usa_credishop;
                $loja->loj_codigo_honorario = $eachStore->loj_codigo_honorario;
                $loja->loj_usa_api_dental = $eachStore->loj_usa_api_dental;
                $loja->loj_usa_frase_acionamento_especifica = $eachStore->loj_usa_frase_acionamento_especifica;
                $loja->loj_logo_boleto = $eachStore->loj_logo_boleto;
                $loja->loj_nome_remetente_scpc = $eachStore->loj_nome_remetente_scpc;
                $loja->loj_usa_desconto_boleto_variavel = $eachStore->loj_usa_desconto_boleto_variavel;
                $loja->loj_desconto_boleto_variavel = $eachStore->loj_desconto_boleto_variavel;
                $loja->loj_informa_dados = $eachStore->loj_informa_dados;
                $loja->loj_fk_mod_codigo_padrao = $eachStore->loj_fk_mod_codigo_padrao;
                $loja->loj_tipo_integracao = $eachStore->loj_tipo_integracao;
                $loja->loj_integra_totvs_protheus = $eachStore->loj_integra_totvs_protheus;
                $loja->loj_utiliza_vencimentos_configurados = $eachStore->loj_utiliza_vencimentos_configurados;


                $res = Loja::where('loj_codigo', $eachStore->loj_codigo)->get();
                if ($res->isEmpty()) {
                    $loja->save();
                } else {
                    $loja->update();
                }
            }
        }
    }

    public function sincronizaAcordo() {
        if (!empty($this->response->dados->acordo)) {

            foreach ($this->response->dados->acordo as $eachDeal) {
                $acordo = new Acordo();
                $acordo->aco_codigo = $eachDeal->aco_codigo;
                $acordo->aco_fk_pes_codigo = $eachDeal->aco_fk_pes_codigo;
                $acordo->aco_fk_loj_codigo = $eachDeal->aco_fk_loj_codigo;
                $acordo->aco_data_cadastro = $eachDeal->aco_data_cadastro;
                $acordo->aco_status = $eachDeal->aco_status;
                $acordo->aco_fk_usu_codigo = $eachDeal->aco_fk_usu_codigo;
                $acordo->aco_data_cancelamento = $eachDeal->aco_data_cancelamento;
                $acordo->aco_fk_usu_codigo_cancelamento = $eachDeal->aco_fk_usu_codigo_cancelamento;
                $acordo->aco_origem = $eachDeal->aco_origem;
                $acordo->aco_fk_pra_codigo = $eachDeal->aco_fk_pra_codigo;
                $acordo->aco_fk_usu_codigo_aprovacao = $eachDeal->aco_fk_usu_codigo_aprovacao;
                $acordo->codigo_acordo_nacional = $eachDeal->codigo_acordo_nacional;
                $acordo->aco_data_aprovacao = $eachDeal->aco_data_aprovacao;
                $acordo->codigo_loja_nacional = $eachDeal->codigo_loja_nacional;
                $acordo->aco_fk_cam_codigo = $eachDeal->aco_fk_cam_codigo;
                $acordo->aco_tipo_pagamento = $eachDeal->aco_tipo_pagamento;
                $acordo->aco_fk_ema_codigo = $eachDeal->aco_fk_ema_codigo;
                $acordo->aco_fk_boc_codigo = $eachDeal->aco_fk_boc_codigo;
                $acordo->aco_forma_envio = $eachDeal->aco_forma_envio;
                $acordo->aco_fone_email = $eachDeal->aco_fone_email;
                $acordo->aco_link_novacao = $eachDeal->aco_link_novacao;
                $acordo->aco_enviado_varejo = $eachDeal->aco_enviado_varejo;
                $acordo->aco_id_varejo = $eachDeal->aco_id_varejo;
                $acordo->aco_fk_usu_codigo_aprovacao_matriz = $eachDeal->aco_fk_usu_codigo_aprovacao_matriz;
                $acordo->aco_fk_usu_codigo_cancelamento_matriz = $eachDeal->aco_fk_usu_codigo_cancelamento_matriz;
                $acordo->aco_motivo_cancelamento = $eachDeal->aco_motivo_cancelamento;
                $acordo->aco_ignorar_inclusao = $eachDeal->aco_ignorar_inclusao;
                $acordo->aco_data_ignorou_inclusao = $eachDeal->aco_data_ignorou_inclusao;
                $acordo->aco_codigo_acordo_wedoo = $eachDeal->aco_codigo_acordo_wedoo;
                $acordo->aco_honorario = $eachDeal->aco_honorario;
                $acordo->aco_custas = $eachDeal->aco_custas;
                $acordo->aco_lotacaoes = $eachDeal->aco_lotacaoes;
                $acordo->aco_anexo_termo = $eachDeal->aco_anexo_termo;
                $acordo->aco_nr_interno = $eachDeal->aco_nr_interno;
                $acordo->aco_data_termo = $eachDeal->aco_data_termo;
                $acordo->aco_fk_bos_codigo = $eachDeal->aco_fk_bos_codigo;
                $acordo->aco_fase_primeiro_vencimento = $eachDeal->aco_fase_primeiro_vencimento;
                $acordo->aco_fase_ultimo_vencimento = $eachDeal->aco_fase_ultimo_vencimento;
                $acordo->aco_flag_clinipam = $eachDeal->aco_flag_clinipam;
                $acordo->aco_data_flag = $eachDeal->aco_data_flag;
                $acordo->aco_primeiro_vencimento = $eachDeal->aco_primeiro_vencimento;
                $acordo->aco_ultimo_vencimento = $eachDeal->aco_ultimo_vencimento;
                $acordo->aco_fk_caa_codigo = $eachDeal->aco_fk_caa_codigo;
                $acordo->aco_acquirer_transaction_id = $eachDeal->aco_acquirer_transaction_id;
                $acordo->aco_authorization_code = $eachDeal->aco_authorization_code;
                $acordo->aco_link_confissao = $eachDeal->aco_link_confissao;
                $acordo->aco_codigo_acordo_externo = $eachDeal->aco_codigo_acordo_externo;
                $acordo->aco_cod_mannesoft = $eachDeal->aco_cod_mannesoft;
                $acordo->aco_identificador = $eachDeal->aco_identificador;
                $acordo->aco_getnet_payment_id = $eachDeal->aco_getnet_payment_id;
                $acordo->aco_cielo_payment_id = $eachDeal->aco_cielo_payment_id;
                $acordo->aco_valor_acordo_cartao = $eachDeal->aco_valor_acordo_cartao;
                $acordo->aco_fk_car_codigo = $eachDeal->aco_fk_car_codigo;
                $acordo->aco_pode_gerar_nalin = $eachDeal->aco_pode_gerar_nalin;
                $acordo->aco_codigo_original_ = $eachDeal->aco_codigo_original_;
                $acordo->aco_usuario_original_ = $eachDeal->aco_usuario_original_;
                $acordo->aco_valor_principal = $eachDeal->aco_valor_principal;
                $acordo->aco_valor_juros = $eachDeal->aco_valor_juros;
                $acordo->aco_valor_multa = $eachDeal->aco_valor_multa;
                $acordo->aco_valor_honorario = $eachDeal->aco_valor_honorario;
                $acordo->aco_valor_desconto_principal = $eachDeal->aco_valor_desconto_principal;
                $acordo->aco_valor_desconto_juros = $eachDeal->aco_valor_desconto_juros;
                $acordo->aco_valor_desconto_multa = $eachDeal->aco_valor_desconto_multa;
                $acordo->aco_valor_desconto_honorario = $eachDeal->aco_valor_desconto_honorario;
                $acordo->aco_valor_igpm = $eachDeal->aco_valor_igpm;
                $acordo->aco_valor_inpc = $eachDeal->aco_valor_inpc;
                $acordo->aco_valor_desconto_igpm = $eachDeal->aco_valor_desconto_igpm;
                $acordo->aco_valor_desconto_inpc = $eachDeal->aco_valor_desconto_inpc;
                $acordo->aco_cobransaas_id = $eachDeal->aco_cobransaas_id;
                $acordo->aco_ativo_passivo_senff = $eachDeal->aco_ativo_passivo_senff;
                $res = Acordo::where('aco_codigo', $eachDeal->aco_codigo)->get();
                if ($res->isEmpty()) {
                    $acordo->save();
                } else {
                    $acordo->update();
                }
            }
        }
    }

    public function sincronizaAcordoItem() {
        if (!empty($this->response->dados->acordo_item)) {

            foreach ($this->response->dados->acordo_item as $eachItemDeal) {
                $acordo_item = new AcordoItem();
                $acordo_item->aci_codigo = $eachItemDeal->aci_codigo;
                $acordo_item->aci_caminho_boleto = $eachItemDeal->aci_caminho_boleto;
                $acordo_item->aci_fk_aco_codigo = $eachItemDeal->aci_fk_aco_codigo;
                $acordo_item->aci_valor = $eachItemDeal->aci_valor;
                $acordo_item->aci_vencimento = $eachItemDeal->aci_vencimento;
                $acordo_item->aci_prestacao = $eachItemDeal->aci_prestacao;
                $acordo_item->aci_status = $eachItemDeal->aci_status;
                $acordo_item->aci_fk_cob_codigo = $eachItemDeal->aci_fk_cob_codigo;
                $acordo_item->aci_nosso_numero = $eachItemDeal->aci_nosso_numero;
                $acordo_item->aci_data_pagamento = $eachItemDeal->aci_data_pagamento;
                $acordo_item->aci_valor_pagamento = $eachItemDeal->aci_valor_pagamento;
                $acordo_item->codigo_acordo_nacional = $eachItemDeal->codigo_acordo_nacional;
                $acordo_item->aci_tipo_pagamento = $eachItemDeal->aci_tipo_pagamento;
                $acordo_item->aci_fk_ftm_codigo = $eachItemDeal->aci_fk_ftm_codigo;
                $acordo_item->codigo_loja_nacional = $eachItemDeal->codigo_loja_nacional;
                $acordo_item->aci_taxa_boleto = $eachItemDeal->aci_taxa_boleto;
                $acordo_item->aci_fk_cbr_codigo = $eachItemDeal->aci_fk_cbr_codigo;
                $acordo_item->aci_tipo_pagamento_loja = $eachItemDeal->aci_tipo_pagamento_loja;
                $acordo_item->aci_fk_rec_codigo = $eachItemDeal->aci_fk_rec_codigo;
                $acordo_item->aci_codigo_barras = $eachItemDeal->aci_codigo_barras;
                $acordo_item->aci_fk_cbr_codigo_baixa = $eachItemDeal->aci_fk_cbr_codigo_baixa;
                $acordo_item->aci_boleto_liberado = $eachItemDeal->aci_boleto_liberado;
                $acordo_item->aci_boleto_enviado = $eachItemDeal->aci_boleto_enviado;
                $acordo_item->aci_boleto_mensagem_retorno = $eachItemDeal->aci_boleto_mensagem_retorno;
                $acordo_item->aci_boleto_data_leitura = $eachItemDeal->aci_boleto_data_leitura;
                $acordo_item->aci_quantidade_despesa = $eachItemDeal->aci_quantidade_despesa;
                $acordo_item->aci_valor_despesa = $eachItemDeal->aci_valor_despesa;
                $acordo_item->aci_pagamento_manual = $eachItemDeal->aci_pagamento_manual;
                $acordo_item->aci_codigo_parcela = $eachItemDeal->aci_codigo_parcela;
                $acordo_item->aci_segunda_via = $eachItemDeal->aci_segunda_via;
                $acordo_item->aci_enviado_hoepers = $eachItemDeal->aci_enviado_hoepers;
                $acordo_item->aci_arquivo_hoepers = $eachItemDeal->aci_arquivo_hoepers;
                $acordo_item->aci_data_repasse = $eachItemDeal->aci_data_repasse;
                $acordo_item->aci_data_baixa = $eachItemDeal->aci_data_baixa;
                $acordo_item->aci_data_pagamento_devedor = $eachItemDeal->aci_data_pagamento_devedor;
                $acordo_item->aci_codigo_banco = $eachItemDeal->aci_codigo_banco;
                $acordo_item->aci_origem_pagamento = $eachItemDeal->aci_origem_pagamento;
                $acordo_item->aci_pagamento_credor = $eachItemDeal->aci_pagamento_credor;
                $acordo_item->aci_fk_rea_codigo = $eachItemDeal->aci_fk_rea_codigo;
                $acordo_item->aci_linha_digitavel = $eachItemDeal->aci_linha_digitavel;
                $acordo_item->aci_charge_id = $eachItemDeal->aci_charge_id;
                $acordo_item->aci_cod_titulo_novo = $eachItemDeal->aci_cod_titulo_novo;
                $acordo_item->aci_multa = $eachItemDeal->aci_multa;
                $acordo_item->aci_igpm = $eachItemDeal->aci_igpm;
                $acordo_item->aci_inpc = $eachItemDeal->aci_inpc;
                $acordo_item->aci_honorario = $eachItemDeal->aci_honorario;
                $acordo_item->aci_juro = $eachItemDeal->aci_juro;
                $acordo_item->aci_encargos = $eachItemDeal->aci_encargos;
                $acordo_item->aci_original = $eachItemDeal->aci_original;
                $acordo_item->aci_desconto = $eachItemDeal->aci_desconto;
                $acordo_item->aci_desconto_sicoob = $eachItemDeal->aci_desconto_sicoob;
                $acordo_item->aci_desconto_principal = $eachItemDeal->aci_desconto_principal;
                $acordo_item->aci_desconto_juros = $eachItemDeal->aci_desconto_juros;
                $acordo_item->aci_desconto_multa = $eachItemDeal->aci_desconto_multa;
                $acordo_item->aci_desconto_honorario = $eachItemDeal->aci_desconto_honorario;
                $acordo_item->aci_getnet_payment_id = $eachItemDeal->aci_getnet_payment_id;
                $acordo_item->aci_negociada_cartao = $eachItemDeal->aci_negociada_cartao;
                $acordo_item->aci_acquirer_transaction_id = $eachItemDeal->aci_acquirer_transaction_id;
                $acordo_item->aci_taxa_boleto_parcelamento = $eachItemDeal->aci_taxa_boleto_parcelamento;
                $acordo_item->aci_cobransaas_id = $eachItemDeal->aci_cobransaas_id;
                $res = AcordoItem::where('aci_codigo', $eachItemDeal->aci_codigo)->get();
                if ($res->isEmpty()) {
                    $acordo_item->save();
                } else {
                    $acordo_item->update();
                }
            }
        }
    }

    public function sincronizaBaixa() {
        if (!empty($this->response->dados->acordo_item)) {

            foreach ($this->response->dados->baixa as $eachDischarge) {
                $baixa = new Baixa();
                $baixa->bai_codigo = $eachDischarge->bai_codigo;
                $baixa->bai_tipo = $eachDischarge->bai_tipo;
                $baixa->bai_fk_pes_codigo = $eachDischarge->bai_fk_pes_codigo;
                $baixa->bai_fk_loj_codigo = $eachDischarge->bai_fk_loj_codigo;
                $baixa->bai_fk_par_codigo = $eachDischarge->bai_fk_par_codigo;
                $baixa->bai_fk_aci_codigo = $eachDischarge->bai_fk_aci_codigo;
                $baixa->bai_fk_usu_codigo_baixou = $eachDischarge->bai_fk_usu_codigo_baixou;
                $baixa->bai_fk_usu_codigo_honorario = $eachDischarge->bai_fk_usu_codigo_honorario;
                $baixa->bai_fk_bor_codigo = $eachDischarge->bai_fk_bor_codigo;
                $baixa->bai_data_cadastro = $eachDischarge->bai_data_cadastro;
                $baixa->bai_principal = $eachDischarge->bai_principal;
                $baixa->bai_desconto = $eachDischarge->bai_desconto;
                $baixa->bai_juros = $eachDischarge->bai_juros;
                $baixa->bai_multa = $eachDischarge->bai_multa;
                $baixa->bai_honorario = $eachDischarge->bai_honorario;
                $baixa->bai_encargo = $eachDischarge->bai_encargo;
                $baixa->bai_comissao = $eachDischarge->bai_comissao;
                $baixa->bai_data_baixa_credor = $eachDischarge->bai_data_baixa_credor;
                $baixa->bai_fk_bpd_codigo = $eachDischarge->bai_fk_bpd_codigo;
                $baixa->bai_tipo_baixa_clinipam = $eachDischarge->bai_tipo_baixa_clinipam;
                $baixa->bai_fk_emp_codigo_origem = $eachDischarge->bai_fk_emp_codigo_origem;
                $baixa->bai_fk_bai_codigo_origem = $eachDischarge->bai_fk_bai_codigo_origem;
                $baixa->bai_enviado_clinipam = $eachDischarge->bai_enviado_clinipam;
                $baixa->bai_nome_arquivo = $eachDischarge->bai_nome_arquivo;
                $baixa->bai_porcentagem_terceirizada = $eachDischarge->bai_porcentagem_terceirizada;
                $baixa->bai_motivo_devolucao = $eachDischarge->bai_motivo_devolucao;
                $baixa->bai_motivo_comissao = $eachDischarge->bai_motivo_comissao;
                $baixa->bai_fk_fec_codigo = $eachDischarge->bai_fk_fec_codigo;
                $baixa->bai_comissao_matriz_pela_terc = $eachDischarge->bai_comissao_matriz_pela_terc;
                $baixa->bai_inpc = $eachDischarge->bai_inpc;
                $baixa->bai_igpm = $eachDischarge->bai_igpm;
                $baixa->bai_comissao_agespisa = $eachDischarge->bai_comissao_agespisa;
                $baixa->bai_fk_aic_codigo = $eachDischarge->bai_fk_aic_codigo;
                $baixa->bai_fk_cpp_codigo = $eachDischarge->bai_fk_cpp_codigo;
                $res = Baixa::where('bai_codigo', $eachDischarge->bai_codigo)->get();
                if ($res->isEmpty()) {
                    $baixa->save();
                } else {
                    $baixa->update();
                }
            }
        }
    }
    

}
