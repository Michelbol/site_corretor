$(document).ready(function(){
    $("#save-tipo").validate({
            rules: {
                titulo: {
                    required: true,
                    maxlength: 191
                }
            },
            messages: {
                titulo: {
                    required: "Preencha o título",
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
});