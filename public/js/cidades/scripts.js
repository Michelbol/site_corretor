$("#form-cidades").validate({
    rules: {
        nome: {
            required: true,
            maxlength: 191
        },
        estado: {
            required: true,
            maxlength: 191
        },
        sigla_estado: {
            required: true,
            maxlength: 191
        }
    },
    messages: {
        nome: {
            required: "Preencha o nome",
            maxlength: "Preencha no máximo 191 caracteres"
        },
        estado: {
            required: "Preencha o estado",
            maxlength: "Preencha no máximo 191 caracteres"
        },
        sigla_estado: {
            required: "Preencha a sigla do estado",
            maxlength: "Preencha no máximo 191 caracteres"
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
    onkeyup: false
});