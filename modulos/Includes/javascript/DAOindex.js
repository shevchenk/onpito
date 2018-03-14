var indexDAO={
    url:'modulos/Includes/php/servletLogin.php',
    idLayerMessage:'layerMessage',
    checkUser:function(){
        $.ajax({
            url:this.url,
            type:'POST',
            dataType:'json',
            data:{
                accion:'check',
                dni:$('#txt_usuario').val(),
                password:$('#txt_pass').val()
            },
            beforeSend:function(){
                $('#layerOverlay').css('display','block');
                $('#layerLoading').css('display','block');				
            },
            success:function(obj){
                $('#layerOverlay').css('display','none');
                $('#layerLoading').css('display','none');
                if(obj.rst=='1'){                    
                    window.location.href='modulos/Index/vista/vst-inicio.php';
                }
				else if(obj.rst=='2'){
                    _msjAdvertencia("Verifique usuario y/o contraseña",200);
                }
				else{
                    _msjAdvertencia("Solicitar apoyo a sistemas",200);
                }
                
            },
            error:function(){
                $('#layerOverlay').css('display','none');
                $('#layerLoading').css('display','none');
                sistema.sliderFade(indexDAO.idLayerMessage);
                $('#'+indexDAO.idLayerMessage).html(templates.msjError("Error en el Servidor", "200"));
                sistema.ocultaError(indexDAO.idLayerMessage,'3000');
            }
        });
    }
}

