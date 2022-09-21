<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
    'pes_codigo',
    'pes_nome',
    'pes_cpf_cnpj',
    'pes_data_cadastro',
    'pes_data_nascimento',
    'pes_estado_civil',
    'pes_tipo_pessoa',
    'pes_sexo',
    'pes_obs',
    'pes_rg',
    'pes_nome_pai',
    'pes_nome_mae',
    'pes_email',
    'pes_tipo',
    'pes_avalista',
    'pes_fone_avalista',
    'pes_trabalho_cnpj',
    'pes_trabalho_empresa',
    'pes_trabalho_cargo',
    'pes_trabalho_salario',
    'pes_trabalho_vale',
    'pes_trabalho_dia_pagamento',
    'pes_rg_emissor',
    'pes_naturalidade',
    'pes_nacionalidade',
    'pes_profissao',
    'pes_nome_fantasia',
    'pes_escolaridade_txt',
    'pes_status_cpf'];
}
