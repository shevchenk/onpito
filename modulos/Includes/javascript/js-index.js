$(document).ready(function(){
    $('#login').click(login);
    $('#txt_usuario').keypress(loginEnterPress);
    $('#txt_pass').keypress(loginEnterPress);
});
var sistema={ //se repite en sistema.js, se pone aca para evitar llamarlo solo por 6 lineas de codigo
    sliderFade:function(id){
        $('#'+id).fadeIn('slow');
    },
    ocultaError:function(id,tiempo){
        setTimeout("sistema.hide_message_personalizado('"+id+"')",tiempo);
    },
    hide_message_personalizado:function(id){
        $('#'+id).fadeOut('slow');
    }
}
loginEnterPress=function(e){
    if(e.which == 13){ 
      login();
    }
}
login= function() {
    //valida ambos
    if($.trim($('#txt_usuario').val())=='' && $.trim($('#txt_pass').val())==''){
        sistema.sliderFade('errorUser');sistema.sliderFade('errorPass');
        $('#errorUser').html(templates.txtError('Ingrese Usuario','150'));
        $('#errorPass').html(templates.txtError('Ingrese Contrase&ntilde;a', '150'));
        sistema.ocultaError('errorUser','2000');sistema.ocultaError('errorPass','2000');
        return false;
    }
    //valida uno
    var idvacio='';var idText='';
    if($.trim($('#txt_pass').val())==''){
        idvacio='errorPass';idText='txt_pass';
    }else if($.trim($('#txt_usuario').val())==''){
        idvacio='errorUser';idText='txt_usuario';
    }
    if(idvacio!=''){
        sistema.sliderFade(idvacio);
        $('#'+idvacio).html(templates.txtError('Ingrese Contrase&ntilde;a', '150'));
        sistema.ocultaError(idvacio,'2000');
        return false;
    }
    indexDAO.checkUser();	
}

_msjOk=function(msj,width){
    $('#layerMessage').css('display','block').html(templates.msjOK(msj, width));
    sistema.ocultaError('layerMessage','4500');
};
_msjAdvertencia=function(msj,width){
    $('#layerMessage').css('display','block').html(templates.msjAdvertencia(msj, width));
    sistema.ocultaError('layerMessage','3000');
};
validaDNI=function(e,id){ 
    tecla = (document.all) ? e.keyCode : e.which;//captura evento teclado
    if (tecla==8 || tecla==0) return true;//8 barra, 0 flechas desplaz
    if($('#'+id).val().length==8)return false;
    patron = /\d/; // Solo acepta números
    te = String.fromCharCode(tecla); 
    return patron.test(te);
};