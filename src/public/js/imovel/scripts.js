$(document).ready(function(){
    var url = window.location.href;
    url = url.split('/');
    url = url[4]+'/'+url[5];
    if(url === 'imoveis/editar'){
        $("#form-imovel").validate({
            rules: {
                titulo: {
                    required: true,
                    maxlength: 255
                },
                descricao: {
                    required: true,
                    maxlength: 255
                },
                status: {
                    required: true
                },
                tipo_id: {
                    required: true
                },
                endereco: {
                    required: true,
                    maxlength: 255
                },
                cep: {
                    required: true,
                    maxlength: 255
                },
                valor: {
                    required: true,
                    maxlength: 255
                },
                cidade_id: {
                    required: true
                },
                dormitorios: {
                    required: true
                },
                detalhes: {
                    required: true
                },
                publicar: {
                    required: true,
                }
            },
            messages: {
                titulo: {
                    required: "Preencha o título",
                    maxlength: "Preencha no máximo 255 caracteres"
                },
                descricao: {
                    required: "Preencha a descrição",
                    maxlength: "Preencha no máximo 255 caracteres"
                },
                status: {
                    required: "Informe um status"
                },
                tipo_id: {
                    required: "Informe um tipo"
                },
                endereco: {
                    required: "Informe um endereço",
                    maxlength: "Preencha no máximo 255 caracteres"
                },
                cep: {
                    required: "Informe um CEP",
                    maxlength: "Preencha no máximo 255 caracteres"
                },
                valor: {
                    required: "Informe o valor do imóvel",
                    maxlength: "Preencha no máximo 255 caracteres"
                },
                cidade_id: {
                    required: "Informe uma cidade"
                },
                dormitorios: {
                    required: "Informe a quantidade de durmitórios"
                },
                detalhes: {
                    required: "Informe os detalhes"
                },
                publicar: {
                    required: "Informe a publicação"
                }
            },
            errorClass: "form-error",
            errorElement: "div",
            errorPlacement: function(error, element) {
                if(element[0].nodeName.toLowerCase() == "select" ){
                    element.siblings( "input" ).addClass("invalid");
                    error.insertAfter(element.siblings( "input" )).slideDown(400).fadeIn("slow");
                }else{
                    element.addClass("invalid");
                    error.insertAfter(element.next()).slideDown(400).fadeIn("slow");
                }
            },
            onfocusout: false,
            onkeyup: false,
        });
    }else{
        $("#form-imovel").validate({
            rules: {
                titulo: {
                    required: true,
                    maxlength: 255
                },
                descricao: {
                    required: true,
                    maxlength: 255
                },
                status: {
                    required: true
                },
                tipo_id: {
                    required: true
                },
                endereco: {
                    required: true,
                    maxlength: 255
                },
                cep: {
                    required: true,
                    maxlength: 255
                },
                valor: {
                    required: true,
                    maxlength: 255
                },
                cidade_id: {
                    required: true
                },
                dormitorios: {
                    required: true
                },
                detalhes: {
                    required: true
                },
                publicar: {
                    required: true,
                }
            },
            messages: {
                titulo: {
                    required: "Preencha o título",
                    maxlength: "Preencha no máximo 255 caracteres"
                },
                descricao: {
                    required: "Preencha a descrição",
                    maxlength: "Preencha no máximo 255 caracteres"
                },
                status: {
                    required: "Informe um status"
                },
                tipo_id: {
                    required: "Informe um tipo"
                },
                endereco: {
                    required: "Informe um endereço",
                    maxlength: "Preencha no máximo 255 caracteres"
                },
                cep: {
                    required: "Informe um CEP",
                    maxlength: "Preencha no máximo 255 caracteres"
                },
                valor: {
                    required: "Informe o valor do imóvel",
                    maxlength: "Preencha no máximo 255 caracteres"
                },
                cidade_id: {
                    required: "Informe uma cidade"
                },
                dormitorios: {
                    required: "Informe a quantidade de durmitórios"
                },
                detalhes: {
                    required: "Informe os detalhes"
                },
                publicar: {
                    required: "Informe a publicação"
                }
            },
            errorClass: "form-error",
            errorElement: "div",
            errorPlacement: function(error, element) {
                if(element[0].nodeName.toLowerCase() == "select" ){
                    element.siblings( "input" ).addClass("invalid");
                    error.insertAfter(element.siblings( "input" )).slideDown(400).fadeIn("slow");
                }else{
                    element.addClass("invalid");
                    error.insertAfter(element.next()).slideDown(400).fadeIn("slow");
                }
            },
            onfocusout: false,
            onkeyup: false,
        });
    }
});