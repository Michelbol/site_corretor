$(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.slider').slider({full_width: true});
    $('select').material_select();

    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
    $('.percent').mask('##0,00%', {reverse: true});
});

function sliderPrev(){
    $('.slider').slider('pause');
    $('.slider').slider('prev');
}

function sliderNext(){
    $('.slider').slider('pause');
    $('.slider').slider('next');
}

$.validator.setDefaults({
    ignore: []
});

$(document).ready(function(){
    $('.tooltipped').tooltip();
});

$('.close-card').on('click', function () {
    $(this).parent().parent().parent().remove();
});

function URLBASE(){
    var url_full = window.location.href;
    var url_split = url_full.split('/');
    return url_split[0]+'//'+url_split[1]+url_split[2];
}
