function validarEmail(valor) {if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(valor)){return true;} else {return false;}}
            
function validarFormulario(){
    var nombre = $("input[name='nombre']").val();
    var apellido = $("input[name='apellido']").val();
    var email = $("input[name='email']").val();
    var mensaje = $("textarea[name='mensaje']").val();

    var retorno = {
        vars : {
            nombre  : nombre,
            apellido: apellido,
            email   : email,
            mensaje : mensaje
        },
        msg : false
    };

    if(nombre.length === 0){
        retorno['msg'] = 'Debe Ingresar Un Nombre';
        return retorno;
    }
    if(apellido.length === 0){
        retorno['msg'] = 'Debe Ingresar Un Apellido';
        return retorno;
    }
    if(!validarEmail(email)){
        retorno['msg'] = 'Debe Ingresar Un E-Mail Válido';
        return retorno;
    }
    if(mensaje.length === 0){
        retorno['msg'] = 'Debe Ingresar Un Mensaje';
        return retorno;
    }
    return retorno;
}

function showError(msg){
    $(".error").fadeOut(100, function(){
        console.error("Error : "+msg);
        $(".error").html(msg);
        $(".error").fadeIn('slow');
    });
}

function showSuccess(msg){
    $(".success").fadeOut(100, function(){
        $(".success").html(msg);
        $(".success").fadeIn('slow');
    });
}