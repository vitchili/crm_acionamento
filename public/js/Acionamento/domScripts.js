/*DATATABLES*/
$(document).ready(function () {
    var table = $('#endereco_table').DataTable({
        "paging":   true,
        "ordering": true,
        "order": [[ 0, 'desc' ]],
        "language": {
            "lengthMenu": false,
            "zeroRecords": "Nenhum item encontrado",
            "info": false,
            "infoEmpty": "Nenhum item encontrado",
            "infoFiltered": false,
        }
    });
    var table2 = $('#contratos_table').DataTable({
        "paging":   true,
        "ordering": true,
        "order": [[ 0, 'desc' ]],
        "language": {
            "lengthMenu": false,
            "zeroRecords": "Nenhum item encontrado",
            "info": false,
            "infoEmpty": "Nenhum item encontrado",
            "infoFiltered": false,
        }
    });
});
/*NAVEGA ENTRE ABAS*/
$(document).ready(function () {
    $('#contratos_div').show();
    $('#baixas_div').hide();
    
    $('#endereco_div').show();
    $('#email_div').hide();
    $('#observacoes_div').hide();
    $('#outros_dados_div').hide();

    $('#ocorrencias_div').show();
    $('#whatsapp_div').hide();
    $('#propostas_div').hide();
    

    //SCROLL PARA O FIM DA DIV DE PARCELAS
    var objDiv = document.getElementById("contratos_div");
    var tabela = document.getElementById("contratos_table");
    objDiv.scrollTo({ top: tabela.offsetHeight, behavior: 'smooth' });

});
//CONTRATOS/BAIXAS
$( "#aba_contratos" ).click(function() {
    $('#aba_contratos').removeClass('active');
    $('#aba_baixas').removeClass('active');

    $('#aba_contratos').addClass('active');

    $('#contratos_div').show();
    $('#baixas_div').hide();
});
$( "#aba_baixas" ).click(function() {
    $('#aba_contratos').removeClass('active');
    $('#aba_baixas').removeClass('active');

    $('#aba_baixas').addClass('active');

    $('#contratos_div').hide();
    $('#baixas_div').show();
});
//ENDERECOS/EMAIL/OBS
$( "#aba_endereco" ).click(function() {
    $('#aba_endereco').removeClass('active');
    $('#aba_email').removeClass('active');
    $('#aba_observacoes').removeClass('active');

    $('#aba_endereco').addClass('active');

    $('#endereco_div').show();
    $('#email_div').hide();
    $('#observacoes_div').hide();
    $('#outros_dados_div').hide();

});
$( "#aba_email" ).click(function() {
    $('#aba_endereco').removeClass('active');
    $('#aba_email').removeClass('active');
    $('#aba_observacoes').removeClass('active');
    

    $('#aba_email').addClass('active');

    $('#endereco_div').hide();
    $('#email_div').show();
    $('#observacoes_div').hide();
    $('#outros_dados_div').hide();

});
$( "#aba_observacoes" ).click(function() {
    $('#aba_endereco').removeClass('active');
    $('#aba_email').removeClass('active');
    $('#aba_observacoes').removeClass('active');

    $('#aba_observacoes').addClass('active');

    $('#endereco_div').hide();
    $('#email_div').hide();
    $('#observacoes_div').show();
    $('#outros_dados_div').hide();


});
$( "#aba_outros_dados" ).click(function() {
    $('#aba_endereco').removeClass('active');
    $('#aba_email').removeClass('active');
    $('#aba_observacoes').removeClass('active');
    $('#aba_outros_dados').removeClass('active');
 
    $('#aba_outros_dados').addClass('active');

    $('#endereco_div').hide();
    $('#email_div').hide();
    $('#observacoes_div').hide();
    $('#outros_dados_div').show();
});
/*OCORRENCIAS*/
$( "#aba_whatsapp" ).click(function() {
    $('#aba_ocorrencias').removeClass('active');
    $('#aba_propostas').removeClass('active');
    $('#aba_whatsapp').removeClass('active');
    $('#aba_whatsapp').addClass('active');

    $('#ocorrencias_div').hide();
    $('#propostas_div').hide();
    $('#whatsapp_div').show();
});
$( "#aba_ocorrencias" ).click(function() {
    $('#aba_ocorrencias').removeClass('active');
    $('#aba_propostas').removeClass('active');
    $('#aba_whatsapp').removeClass('active');
    $('#aba_ocorrencias').addClass('active');

    $('#ocorrencias_div').show();
    $('#propostas_div').hide();
    $('#whatsapp_div').hide();
});
$( "#aba_propostas" ).click(function() {
    $('#aba_ocorrencias').removeClass('active');
    $('#aba_propostas').removeClass('active');
    $('#aba_whatsapp').removeClass('active');
    $('#aba_propostas').addClass('active');

    $('#propostas_div').show();
    $('#ocorrencias_div').hide();
    $('#whatsapp_div').hide();
});
/*COLLAPSE*/
$( "#collapse_ocorrencias_expandidas" ).click(function() {
    if($("#ocorrencias_expandidas").hasClass("show")){
        $('#contratos_div').removeClass('max-height-150');
        $('#contratos_expandidos').css({'height':'350px'});
        $('#contratos_expandidos').css({'overflow-y':'scroll'});
        $('#contratos_div').css({'height':'350px'});
        $('#contratos_div').css({'overflow-y':'scroll'});
    }else{
        $('#ocorrencias_div').addClass('max-height-120');
        $('#ocorrencias_expandidas').css({'height':'120px'});
        $('#ocorrencias_div').css({'height':'120px'});
    }
});
$( "#collapse_contratos_expandidos" ).click(function() {
    if($("#contratos_expandidos").hasClass("show")){
        $('#ocorrencias_div').removeClass('max-height-120');
        $('#ocorrencias_expandidas').css({'height':'350px'});
        $('#ocorrencias_expandidas').css({'overflow-y':'scroll'});
        $('#ocorrencias_div').css({'height':'350px'});
        $('#ocorrencias_div').css({'overflow-y':'scroll'});
    }else{
        $('#contratos_div').addClass('max-height-150');
        $('#contratos_expandidos').css({'height':'150'});
        $('#contratos_div').css({'height':'150px'});
    }
});