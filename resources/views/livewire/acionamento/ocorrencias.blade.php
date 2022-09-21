<div class="container_app">
    <div class="cabecalho_container">
        <a class="label-text-padrao a-com-hover-laranja" data-toggle="collapse" id="collapse_ocorrencias_expandidas" href="#ocorrencias_expandidas" role="button" aria-expanded="false" aria-controls="collapseExample">Ocorrências&nbsp;&nbsp;<i class="fas fa-angle-up"></i></a>
        <div class="btn-group float-right">
            <button class="btn btn-warning py-0 mt-1 btn-sm botao-custom-texto-branco"><i class="fas fa-plus"></i>&nbsp;Gerar protocolo</button>&nbsp;&nbsp;
            <button class="btn btn-success py-0 mt-1 btn-sm botao-custom-texto-branco"><i class="fas fa-upload"></i></button>
        </div>
    </div>
    <div class="collapse show" id="ocorrencias_expandidas">
        <div> 
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active label-text-padrao" style="color: #212529;" id="aba_ocorrencias" href="#">Ocorrências</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link label-text-padrao" style="color: #212529;" id="aba_whatsapp" href="#">Whatsapp</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link label-text-padrao" style="color: #212529;" id="aba_propostas" href="#">Propostas</a>
                </li>
            </ul>
        </div>
        <!-- *****************Divs separados por abas - Ocorrências ******************** -->
        <div id="ocorrencias_div" class="max-height-120">
            <div class="conteudo_ocorrencias_div">
                <table id="ocorrencias_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm label-text-padrao">Data do acionamento
                            </th>
                            <th class="th-sm label-text-padrao">Acionador
                            </th>
                            <th class="th-sm label-text-padrao">Loja
                            </th>
                            <th class="th-sm label-text-padrao">Descrição
                            </th>
                            <th class="th-sm label-text-padrao">Observação
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label-text-padrao-light">23/11/2021 10:45</td>
                            <td class="label-text-padrao-light">Mário Sérgio</td>
                            <td class="label-text-padrao-light">Guanabara Card</td>
                            <td class="label-text-padrao-light">Acordo</td>
                            <td class="label-text-padrao-light">Obs.: Valor Acordo: R$10,07. 1º Vencimento: 22/12/2021. Gerado por mario.clinipam</td>
                        </tr>
                        <tr>
                            <td class="label-text-padrao-light">23/11/2021 10:45</td>
                            <td class="label-text-padrao-light">Mário Sérgio</td>
                            <td class="label-text-padrao-light">Guanabara Card</td>
                            <td class="label-text-padrao-light">Acordo</td>
                            <td class="label-text-padrao-light">Obs.: Valor Acordo: R$10,07. 1º Vencimento: 22/12/2021. Gerado por mario.clinipam</td>
                        </tr>
                        <tr>
                            <td class="label-text-padrao-light">23/11/2021 10:45</td>
                            <td class="label-text-padrao-light">Mário Sérgio</td>
                            <td class="label-text-padrao-light">Guanabara Card</td>
                            <td class="label-text-padrao-light">Acordo</td>
                            <td class="label-text-padrao-light">Obs.: Valor Acordo: R$10,07. 1º Vencimento: 22/12/2021. Gerado por mario.clinipam</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="whatsapp_div" class="max-height-120">
            <div class="conteudo_whatsapp_div">
                <table id="whatsapp_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm label-text-padrao">Robô
                            </th>
                            <th class="th-sm label-text-padrao">Mensagem
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label-text-padrao-light">Exemplo robô 1</td>
                            <td class="label-text-padrao-light">Teste de mensagem 1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="propostas_div" class="max-height-120">
            <div class="conteudo_propostas_div">
                <table id="propostas_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm label-text-padrao">Exemplo
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="label-text-padrao-light">Exemplo2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>