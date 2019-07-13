$(document).ready(function() {

    //Mask para CEP
    $('#cep').mask('00000-000');

    //aparecer load quando clicar em cadastrar carta
    $('#btn-enviar').on('click', function() {
        $('#btn-load').addClass(' spinner-border spinner-border-sm');
    });

    //aparecer load quando clicar em excluir carta
    $('#btn-excluir').on('click', function() {
        $('#btn-load-excluir').addClass(' spinner-border spinner-border-sm');
    });

});