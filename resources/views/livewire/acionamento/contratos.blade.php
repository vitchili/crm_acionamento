<div class="container_app">
    <div class="cabecalho_container">
        <a class="label-text-padrao a-com-hover-laranja" data-toggle="collapse" id="collapse_contratos_expandidos" href="#contratos_expandidos" role="button" aria-expanded="false" aria-controls="collapseExample">Contratos&nbsp;&nbsp;<i class="fas fa-angle-up"></i></a>
        <div class="btn-group float-right">
            <button class="btn btn-warning py-0 mt-1 btn-sm botao-custom-texto-branco" data-toggle="modal" data-target=".div_calcular">
                <i class="fas fa-calculator"></i>&nbsp;Calcular
            </button>
        </div>
    </div>
    <div class="collapse show" id="contratos_expandidos">
        <div class="float-right m-1">
            <input type="radio" name="select_tipo_parcelamento" id="select_tipo_parcelamento_a_vista" value="1">&nbsp;
            <label for="select_tipo_parcelamento_a_vista" class="label-text-padrao">À Vista</label>
            <input type="radio" name="select_tipo_parcelamento" id="select_tipo_parcelamento_a_prazo" value="2">&nbsp;
            <label for="select_tipo_parcelamento_a_prazo" class="label-text-padrao">A Prazo</label>
        </div>
        <div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active label-text-padrao" style="color: #212529;" id="aba_contratos" href="#">Parcelas com Saldo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link label-text-padrao" style="color: #212529;" id="aba_baixas" href="#">Baixas</a>
                </li>
            </ul>
        </div>

        <!-- *****************Divs separados por abas - Contratos ******************** -->
        <div id="contratos_div" class="max-height-150">
            <div class="conteudo_contratos_div">
                <table id="contratos_table" class="table table-striped table-bordered" cellspacing="0" width="100%" heigth="100%">
                    <thead>
                        <tr>
                            <th class="th-sm label-text-padrao">
                            </th>
                            <th class="th-sm label-text-padrao">Loja
                            </th>
                            <th class="th-sm label-text-padrao">Vencimento
                            </th>
                            <th class="th-sm label-text-padrao">Contrato
                            </th>
                            <th class="th-sm label-text-padrao">Valor
                            </th>
                            <th class="th-sm label-text-padrao">Parc
                            </th>
                            <th class="th-sm label-text-padrao">Saldo
                            </th>
                            <th class="th-sm label-text-padrao">Fase
                            </th>
                            <th class="th-sm label-text-padrao">Acordo
                            </th>
                            <th class="th-sm label-text-padrao">%Multa
                            </th>
                            <th class="th-sm label-text-padrao">%Juros
                            </th>
                            <th class="th-sm label-text-padrao">%Encargos
                            </th>
                            <th class="th-sm label-text-padrao">%Honorários
                            </th>
                            <th class="th-sm label-text-padrao">% Desconto Juros
                            </th>
                            <th class="th-sm label-text-padrao">% Desconto Multa
                            </th>
                            <th class="th-sm label-text-padrao">% Desconto Principal
                            </th>
                            <th class="th-sm label-text-padrao">% Desconto Honorários
                            </th>
                            <th class="th-sm label-text-padrao">% Desconto Corrigido
                            </th>
                            <th class="th-sm label-text-padrao">Total (R$)
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label-text-padrao-light"><input type="checkbox" name="select_parcela" id="select_parcela"></td>
                            <td class="label-text-padrao-light">Guanabara Card</td>
                            <td class="label-text-padrao-light">10/02/2021</td>
                            <td class="label-text-padrao-light">856985</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">1</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">90 dias</td>
                            <td class="label-text-padrao-light">-</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">5%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_juros"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_multa"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_principal"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_hono"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_corrigido"></td>
                            <td class="label-text-padrao-light">R$78,75</td>
                        </tr>
                        <tr>
                            <td class="label-text-padrao-light"><input type="checkbox" name="select_parcela" id="select_parcela"></td>
                            <td class="label-text-padrao-light">Guanabara Card</td>
                            <td class="label-text-padrao-light">10/02/2021</td>
                            <td class="label-text-padrao-light">856985</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">1</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">90 dias</td>
                            <td class="label-text-padrao-light">-</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">5%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_juros"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_multa"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_principal"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_hono"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_corrigido"></td>
                            <td class="label-text-padrao-light">R$78,75</td>
                        </tr>
                        <tr>
                            <td class="label-text-padrao-light"><input type="checkbox" name="select_parcela" id="select_parcela"></td>
                            <td class="label-text-padrao-light">Guanabara Card</td>
                            <td class="label-text-padrao-light">10/02/2021</td>
                            <td class="label-text-padrao-light">856985</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">1</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">90 dias</td>
                            <td class="label-text-padrao-light">-</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">5%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_juros"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_multa"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_principal"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_hono"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_corrigido"></td>
                            <td class="label-text-padrao-light">R$78,75</td>
                        </tr>
                        <tr>
                            <td class="label-text-padrao-light"><input type="checkbox" name="select_parcela" id="select_parcela"></td>
                            <td class="label-text-padrao-light">Guanabara Card</td>
                            <td class="label-text-padrao-light">10/02/2021</td>
                            <td class="label-text-padrao-light">856985</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">1</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">90 dias</td>
                            <td class="label-text-padrao-light">-</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">5%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_juros"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_multa"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_principal"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_hono"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_corrigido"></td>
                            <td class="label-text-padrao-light">R$78,75</td>
                        </tr>
                        <tr>
                            <td class="label-text-padrao-light"><input type="checkbox" name="select_parcela" id="select_parcela"></td>
                            <td class="label-text-padrao-light">Guanabara Card</td>
                            <td class="label-text-padrao-light">10/02/2021</td>
                            <td class="label-text-padrao-light">856985</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">1</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">90 dias</td>
                            <td class="label-text-padrao-light">-</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">5%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_juros"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_multa"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_principal"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_hono"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_corrigido"></td>
                            <td class="label-text-padrao-light">R$78,75</td>
                        </tr>
                        <tr>
                            <td class="label-text-padrao-light"><input type="checkbox" name="select_parcela" id="select_parcela"></td>
                            <td class="label-text-padrao-light">Guanabara Card</td>
                            <td class="label-text-padrao-light">10/02/2021</td>
                            <td class="label-text-padrao-light">856985</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">1</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light">90 dias</td>
                            <td class="label-text-padrao-light">-</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">5%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light">0%</td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_juros"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_multa"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_principal"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_hono"></td>
                            <td class="label-text-padrao-light"><input type="text" class="input-text-sm" id="desc_corrigido"></td>
                            <td class="label-text-padrao-light">R$78,75</td>
                        </tr>
                        <tr>
                            <td class="label-text-padrao-light"></td>
                            <td class="label-text-padrao-light" colspan="3">Totais (R$)</td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light"></td>
                            <td class="label-text-padrao-light">R$75,00</td>
                            <td class="label-text-padrao-light" colspan="6"></td>
                            <td class="label-text-padrao-light">R$0,00</td>
                            <td class="label-text-padrao-light">R$0,00</td>
                            <td class="label-text-padrao-light">R$0,00</td>
                            <td class="label-text-padrao-light">R$0,00</td>
                            <td class="label-text-padrao-light">R$0,00</td>
                            <td class="label-text-padrao-light">R$472,50</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <input type="range" class="form-range" id="range_desconto" style="width: 100%;">
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr;">
                    <button class="btn-success label-text-padrao">Marcar Todos</button>
                    <button class="btn-danger label-text-padrao">Desmarcar Todos</button>
                </div>
                <div class="modal fade bd-example-modal-lg div_calcular" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <h5 class="modal-title m-2">Lançar parcelas</h5>
                            <div id="div_calcular_cima">
                                <div class="bloco_detalhe_div_parcelas">
                                    <div class="cabecalho_container">
                                        <h5 class="label-text-padrao">Forma Pagamento</h5>
                                    </div>
                                    <div class="d-flex flex-row p-2 justify-content-around">
                                        <div>
                                            <input type="radio" name="forma_pagamento" id="boleto" checked>
                                            <label for="forma_pagamento"  class="label-text-padrao-light">Boleto</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="forma_envio" id="envia_correio">
                                            <label for="forma_pagamento"  class="label-text-padrao-light">Envia boleto por correio</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="bloco_detalhe_div_parcelas">
                                    <div class="cabecalho_container">
                                        <h5 class="label-text-padrao">Regras de Parcelamento</h5>
                                    </div>
                                    <div class="d-flex flex-row p-2 justify-content-around">
                                        <div>
                                            <span class="label-text-padrao-light">Entrada mínima de: 0%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bloco_detalhe_div_parcelas">
                                    <div class="cabecalho_container">
                                        <h5 class="label-text-padrao">Juros Parcelamento</h5>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <span class="label-text-padrao-light">Mínimo: 0,00%</span>&nbsp;
                                            <span class="label-text-padrao-light">Máximo: 0,00%</span>
                                        </div>
                                        <div class="d-flex flex-row p-2 justify-content-around">
                                            <div>
                                                <input type="text" class="input-text-sm mt-2" id="juros_parcelamento" style="max-width: 70px;">
                                            </div>
                                            <div>
                                                <button class="btn btn-warning btn-sm botao-custom-texto-branco label-text-padrao">Recalcular</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="div_calcular_baixo">
                                <div class="bloco_detalhe_div_parcelas">
                                    <div class="orange_cabecalho_container">
                                        <h5 class="label-text-padrao">Parcelamento - Tabulado (entrada + parcelas)</h5>
                                    </div>
                                    <div class="d-flex flex-row p-2 justify-content-around">
                                        <div style="width: 170px;">
                                            <span class="label-text-padrao">Data Entrada</span>
                                            <input type="text" class="form-control" id="data_entrada" value="04/08/2022" disabled>
                                        </div>
                                        <div style="width: 170px;">
                                            <span class="label-text-padrao">Quantidade Parcelas</span>
                                            <select class="input-text custom-select" id="data_entrada">
                                                <option value="exemple">--Selecione--</option>
                                            </select>
                                        </div>
                                        <div style="width: 170px;">
                                            <span class="label-text-padrao">Entrada (R$)</span>
                                            <input type="text" class="form-control" id="valor_entrada" placeholder="Valor entrada" disabled>
                                        </div>
                                        <div style="width: 170px;">
                                            <span class="label-text-padrao">Parcela (R$)</span>
                                            <input type="text" class="form-control" id="valor_parcela" placeholder="Valor parcela" disabled>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="div_calcular_baixo">
                                <div class="bloco_detalhe_div_parcelas">
                                    <div class="orange_cabecalho_container">
                                        <h5 class="label-text-padrao">Dados Extras</h5>
                                    </div>
                                    <div class="d-flex flex-row p-2 justify-content-around">
                                        <div style="width: 350px;">
                                            <span class="label-text-padrao">Observação</span>
                                            <input type="text" class="form-control" id="observacao_acordo" placeholder="Observação">
                                        </div>
                                        <div style="width: 250px;">
                                            <span class="label-text-padrao">Usuário</span>
                                            <select class="input-text custom-select" id="usuario_acordo">
                                                <option value="exemple">--Selecione--</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary label-text-padrao" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary label-text-padrao">Gravar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="baixas_div" class="max-height-150">
            <div class="conteudo_baixas_div">
                <table id="baixas_table" class="table table-striped table-bordered" cellspacing="0" width="100%" heigth="100%">
                    <thead>
                        <tr>
                            <th class="th-sm label-text-padrao">Contrato
                            </th>
                            <th class="th-sm label-text-padrao">Data Pag.
                            </th>
                            <th class="th-sm label-text-padrao">Vencimento
                            </th>
                            <th class="th-sm label-text-padrao">Data Baixa
                            </th>
                            <th class="th-sm label-text-padrao">Principal
                            </th>
                            <th class="th-sm label-text-padrao">Desconto
                            </th>
                            <th class="th-sm label-text-padrao">Encargo
                            </th>
                            <th class="th-sm label-text-padrao">Juros
                            </th>
                            <th class="th-sm label-text-padrao">Multa
                            </th>
                            <th class="th-sm label-text-padrao">Honorário
                            </th>
                            <th class="th-sm label-text-padrao">Total
                            </th>
                            <th class="th-sm label-text-padrao">Acionador
                            </th>
                            <th class="th-sm label-text-padrao">Usuário Baixa
                            </th>
                            <th class="th-sm label-text-padrao">Comissão
                            </th>
                            <th class="th-sm label-text-padrao">Situação
                            </th>
                            <th class="th-sm label-text-padrao">Borderô
                            </th>
                            <th class="th-sm label-text-padrao">Data Borderô
                            </th>
                            <th class="th-sm label-text-padrao">Data Pag. Loja
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label-text-padrao-light">Teste123</td>
                            <td class="label-text-padrao-light">10/02/2021</td>
                            <td class="label-text-padrao-light">02/01/2021</td>
                            <td class="label-text-padrao-light">02/01/2021</td>
                            <td class="label-text-padrao-light">91,00</td>
                            <td class="label-text-padrao-light">75,00</td>
                            <td class="label-text-padrao-light">0,00</td>
                            <td class="label-text-padrao-light">0,00</td>
                            <td class="label-text-padrao-light">0,00</td>
                            <td class="label-text-padrao-light">0,00</td>
                            <td class="label-text-padrao-light">0,00</td>
                            <td class="label-text-padrao-light">Sistema</td>
                            <td class="label-text-padrao-light">Carlos Gama</td>
                            <td class="label-text-padrao-light">0,00</td>
                            <td class="label-text-padrao-light">Pagamento Escritório</td>
                            <td class="label-text-padrao-light">-</td>
                            <td class="label-text-padrao-light">-</td>
                            <td class="label-text-padrao-light">02/01/2021</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        



    </div>
    <!-- *****************Divs separados por abas - Baixas ******************** -->

</div>