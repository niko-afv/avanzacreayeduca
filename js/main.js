$(document).on('ready', function(){

    
    /* Smooth scrolling para anclas */
    $('a.smooth').on('click', function(e) {
        console.log(e);
        e.preventDefault();
        var $link = $(this);  
        var anchor  = $link.attr('href');
        $('html, body').stop().animate({
            scrollTop: $(anchor).offset().top
        }, 2000);
    });
                
                
    $("form").on('submit', function(e){
        e.preventDefault();
        var validacion = validarFormulario();                    
        if(!validacion['msg']){
            var url = './sendMsg.php';
                    
            $.post(url,{vars:validacion['vars']}, function(data){
                data = data.trim();
                if(data === 'true'){
                    showSuccess("Sus datos han sido enviados correctamente");
                }else if(data === 'false'){
                    showError("No se han enviado sus datos, intentelo mas tarde");
                }else{
                    alert(data.trim());
                }
            });
        }else{
            showError(validacion['msg']);
        }
    });
    

    $("a.folleto").colorbox({
        href:'./img/CUADRIPTICO_VERONICA_MONSALVE.jpg',
        width: 900
    });
    $("a.html").colorbox({
        href:'./propuestas_cambios.html',
        width: 600,
        height : 600
    });
    $("a.gallery").colorbox({
        rel:'gallery'
    });
});