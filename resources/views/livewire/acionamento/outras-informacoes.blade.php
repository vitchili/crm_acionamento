<div class="container_app">
    <div class="cabecalho_container">
        <a class="label-text-padrao a-com-hover-laranja" data-toggle="collapse" href="#outras_informacoes_expandida" role="button" aria-expanded="false" aria-controls="collapseExample">Outras Informações&nbsp;&nbsp;<i class="fas fa-angle-up"></i></a>
        <div class="dropdown float-right">
            <button class="btn btn-success py-0 mt-0 btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-plus"></i>&nbsp;Cadastrar
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item label-text-padrao-light" href="#">Endereço</a></li>
                <li><a class="dropdown-item label-text-padrao-light" href="#">Telefone</a></li>
                <li><a class="dropdown-item label-text-padrao-light" href="#">E-mail</a></li>
                <li><a class="dropdown-item label-text-padrao-light" href="#">Observações</a></li>
            </ul>
        </div>
    </div>
    <div class="collapse show" id="outras_informacoes_expandida">
        <div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active label-text-padrao" style="color: #212529;" id="aba_endereco" href="#">Endereço</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link label-text-padrao" style="color: #212529;" id="aba_email" href="#">E-mail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link label-text-padrao" style="color: #212529;" id="aba_observacoes" href="#">Observações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link label-text-padrao" style="color: #212529;" id="aba_outros_dados" href="#">Outros Dados</a>
                </li>
            </ul>
        </div>

        <!-- *****************Divs separados por abas - Endereco ******************** -->
        <div id="endereco_div" style="max-height: 80px; overflow-y: scroll;">
            <div class="conteudo_endereco_div">
                <table id="endereco_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm label-text-padrao">CEP
                            </th>
                            <th class="th-sm label-text-padrao">Endereço
                            </th>
                            <th class="th-sm label-text-padrao">Número
                            </th>
                            <th class="th-sm label-text-padrao">Bairro
                            </th>
                            <th class="th-sm label-text-padrao">Cidade
                            </th>
                            <th class="th-sm label-text-padrao">Estado
                            </th>
                            <th class="th-sm label-text-padrao">Higienizado
                            </th>
                            <th class="th-sm label-text-padrao">Obs
                            </th>
                            <th class="th-sm label-text-padrao">Status
                            </th>
                            <th class="th-sm label-text-padrao">Tipo
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label-text-padrao-light">31030360</td>
                            <td class="label-text-padrao-light">Rua Joaquim Santos</td>
                            <td class="label-text-padrao-light">727</td>
                            <td class="label-text-padrao-light">Centro</td>
                            <td class="label-text-padrao-light">Belo Horizonte</td>
                            <td class="label-text-padrao-light">Minas Gerais</td>
                            <td class="label-text-padrao-light">26/04/2016</td>
                            <td class="label-text-padrao-light">Residencial</td>
                            <td class="label-text-padrao-light"><select name="" id="" class="input-text-sm">
                                <option value="" class="label-text-padrao">Ativo</option>
                            </select></td>
                            <td class="label-text-padrao-light"><select name="" id="" class="input-text-sm">
                                <option value="" class="label-text-padrao">-- Selecione --</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td class="label-text-padrao-light">31030360</td>
                            <td class="label-text-padrao-light">Rua Joaquim Santos</td>
                            <td class="label-text-padrao-light">727</td>
                            <td class="label-text-padrao-light">Centro</td>
                            <td class="label-text-padrao-light">Belo Horizonte</td>
                            <td class="label-text-padrao-light">Minas Gerais</td>
                            <td class="label-text-padrao-light">26/04/2016</td>
                            <td class="label-text-padrao-light">Residencial</td>
                            <td class="label-text-padrao-light"><select name="" id="" class="input-text-sm">
                                <option value="" class="label-text-padrao">Ativo</option>
                            </select></td>
                            <td class="label-text-padrao-light"><select name="" id="" class="input-text-sm">
                                <option value="" class="label-text-padrao">-- Selecione --</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td class="label-text-padrao-light">31030360</td>
                            <td class="label-text-padrao-light">Rua Joaquim Santos</td>
                            <td class="label-text-padrao-light">727</td>
                            <td class="label-text-padrao-light">Centro</td>
                            <td class="label-text-padrao-light">Belo Horizonte</td>
                            <td class="label-text-padrao-light">Minas Gerais</td>
                            <td class="label-text-padrao-light">26/04/2016</td>
                            <td class="label-text-padrao-light">Residencial</td>
                            <td class="label-text-padrao-light"><select name="" id="" class="input-text-sm">
                                <option value="" class="label-text-padrao">Ativo</option>
                            </select></td>
                            <td class="label-text-padrao-light"><select name="" id="" class="input-text-sm">
                                <option value="" class="label-text-padrao">-- Selecione --</option>
                            </select></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <!-- *****************Divs separados por abas - Email ******************** -->
        <div id="email_div" style="max-height: 80px; overflow-y: scroll;">
            <div class="conteudo_email_div">
                <table id="email_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm label-text-padrao">E-mail
                            </th>
                            <th class="th-sm label-text-padrao">Higienizado
                            </th>
                            <th class="th-sm label-text-padrao">Observação
                            </th>
                            <th class="th-sm label-text-padrao">Status
                            </th>
                            <th class="th-sm label-text-padrao">Preferencial
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label-text-padrao-light">pimenta@aquicob.com.br</td>
                            <td class="label-text-padrao-light">-</td>
                            <td class="label-text-padrao-light">e-mail pessoal</td>
                            <td class="label-text-padrao-light">
                                <select name="" id="" class="input-text-sm">
                                    <option value="" class="label-text-padrao">Ativo</option>
                                </select>
                            </td>
                            <td class="label-text-padrao-light">Não</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- *****************Divs separados por abas - Observacoes ******************** -->
        <div id="observacoes_div" style="max-height: 80px; overflow-y: scroll;">
            <div class="conteudo_observacoes_div">
                <table id="observacoes_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm label-text-padrao">Observação
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- *****************Divs separados por abas - Outros Dados ******************** -->
        <div id="outros_dados_div" style="max-height: 80px; overflow-y: scroll;">
            <div class="conteudo_outros_dados_div">
                <table id="outros_dados_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm label-text-padrao">Nome Fantasia
                            </th>
                            <th class="th-sm label-text-padrao">Tipo Pessoa
                            </th>
                            <th class="th-sm label-text-padrao">Estado Civil
                            </th>
                            <th class="th-sm label-text-padrao">RG/IE
                            </th>
                            <th class="th-sm label-text-padrao">Data Nascimento
                            </th>
                            <th class="th-sm label-text-padrao">Sexo
                            </th>
                            <th class="th-sm label-text-padrao">Escolaridade
                            </th>
                            <th class="th-sm label-text-padrao">Aposentado/Afins
                            </th>
                            <th class="th-sm label-text-padrao">Avalista
                            </th>
                            <th class="th-sm label-text-padrao">Fone Avalista
                            </th>
                            <th class="th-sm label-text-padrao">Nome Pai
                            </th>
                            <th class="th-sm label-text-padrao">Nome Mãe
                            </th>
                            <th class="th-sm label-text-padrao">Profissão
                            </th>
                            <th class="th-sm label-text-padrao">Local de Trabalho
                            </th>
                            <th class="th-sm label-text-padrao">Data de Admissão
                            </th>
                            <th class="th-sm label-text-padrao">Cargo
                            </th>
                            <th class="th-sm label-text-padrao">Salário
                            </th>
                            <th class="th-sm label-text-padrao">Vale
                            </th>
                            <th class="th-sm label-text-padrao">Dia Útil Pagamento
                            </th>
                            <th class="th-sm label-text-padrao">Trabalho Anterior
                            </th>
                            <th class="th-sm label-text-padrao">Link Facebook
                            </th>
                            <th class="th-sm label-text-padrao">Código do Credor
                            </th>
                            <th class="th-sm label-text-padrao">Inscrição Estadual
                            </th>
                            <th class="th-sm label-text-padrao">Emissão
                            </th>
                            <th class="th-sm label-text-padrao">Tem Protesto
                            </th>
                            <th class="th-sm label-text-padrao">Nota Fiscal
                            </th>
                            <th class="th-sm label-text-padrao">Série
                            </th>
                            <th class="th-sm label-text-padrao">Valor Total da Nota
                            </th>
                            <th class="th-sm label-text-padrao">Estabelecimento
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                            <td class="label-text-padrao-light">Sem observações encontradas</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>