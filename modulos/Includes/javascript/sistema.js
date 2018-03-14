
$(document).ready(function(){		
    $("#oculta_cabecera").click(oculta_cabecera);    
});
var sistema={
    sliderFade:function(id){
        $('#'+id).fadeIn('slow');
    },
    ocultaError:function(id,tiempo){
        setTimeout("sistema.hide_message_personalizado('"+id+"')",tiempo);
    },
    hide_message_personalizado:function(id){
        $('#'+id).fadeOut('slow');
    },
    idLayerMessage:'layerMessage'    
};
oculta_cabecera=function(){
    var estado=$('#menu_cabecera').css('display');
    if(estado=='block'){
        $('#menu_cabecera').animate({opacity: 0},1000);
        $('#menu_cabecera').css('display','none');
        $('#cabecera').animate({height: '-=50'},200);
        $('#menu_principal').animate({top: '-=50'},200);
        
        $('#oculta_cabecera').find('span').removeClass('icon_arrnegro').addClass('icon_abanegro');
    }else{
        $('#cabecera').animate({height: '+=50'},200);
        $('#menu_principal').animate({top: '+=50'},200);
        $('#menu_cabecera').animate({opacity: 1},2000);
        $('#menu_cabecera').css('display','block');
        
        $('#oculta_cabecera').find('span').removeClass('icon_abanegro').addClass('icon_arrnegro');
    }
}
getFechaActual= function(){
    var currentTime = new Date(); 
    var month = parseInt(currentTime.getMonth() + 1);month = month <= 9 ? "0"+month : month; 
    var day = currentTime.getDate();day = day <= 9 ? "0"+day : day; 
    var year = currentTime.getFullYear(); 
    return year+"-"+month + "-"+day; 
};
validacajatiempo=function(id,t){
	if(t=="s"){
		if($("#"+id).val()>59){
		$("#"+id).val("");
		$("#"+id).focus();
		_msjAdvertencia('Error: El segundo tiene como maximo 59',200);
		}	
	}
	else if(t=="m"){
		if($("#"+id).val()>59){
		$("#"+id).val("");
		$("#"+id).focus();
		_msjAdvertencia('Error: El minuto tiene como maximo 59',200);
		}
	}
	else if(t=="h"){
		if($("#"+id).val()>23){
		$("#"+id).val("");
		$("#"+id).focus();
		_msjAdvertencia('Error: La hora tiene como maximo 23',200);
		}
	}
}

muestraCheckMsg=function(check,div){
    if($('#'+check).is(':checked')){
        $('#'+div).slideDown('fast');
    }else{
        $('#'+div).slideUp('fast');
    }
};
mostrar_cerrar_buscar=function(id,id_icon){
    var ico=$('#'+id_icon).attr('class');
    if(ico=="icon_content icon_lupa1"){
        $('#'+id_icon).removeClass('icon_lupa1').addClass('icon_cerrar2');
    }else{
        $('#'+id_icon).removeClass('icon_cerrar2').addClass('icon_lupa1');
    }
    
    var display=$('#'+id).css('display');
    if(display=='none'){
        $('#'+id).css('display','block');
    }else{
        $('#'+id).css('display','none')
    }
};
buscarEnTable= function ( xtext, xidtable ) {
    var text = xtext;
    text = text.toUpperCase();
    $('#'+xidtable).find('tr').css('display','none');
    //$('#'+xidtable+' tr').find('td:contains("'+text+'")').parent().css('display','block'); //altera el css
    $('#'+xidtable+' tr').find('td:contains("'+text+'")').parent().attr('style', ''); // NO altera el css, usar siempre y cuando no halla "style"
};
limpiaSelect=function(slct_dest){
    var html='';html+='<option value="0">--Seleccione--</option>';
    $("#"+slct_dest).html(html);
};
llenaSelect=function(obj,slct_dest,id_slct){
    var html='';
    $.each(obj,function(key,data){		
        html+='<option value="'+data.id+'">'+data.nombre+'</option>';		
    });
    $('#'+slct_dest).html('<option value="0">--Seleccione--</option>'+html);
	$('#'+slct_dest).val(id_slct);
return html;	
};
validaDNI=function(e,id){ 
    tecla = (document.all) ? e.keyCode : e.which;//captura evento teclado
    if (tecla==8 || tecla==0) return true;//8 barra, 0 flechas desplaz
    if($('#'+id).val().length==8)return false;
    patron = /\d/; // Solo acepta números
    te = String.fromCharCode(tecla); 
    return patron.test(te);
};
validaLetras=function(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8 || tecla==0) return true;//8 barra, 0 flechas desplaz
    patron =/[A-Za-zñÑ\s]/; // 4 ,\s espacio en blanco, patron = /\d/; // Solo acepta números, patron = /\w/; // Acepta números y letras, patron = /\D/; // No acepta números, patron =/[A-Za-z\s]/; //sin ñÑ
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
};
validaAlfaNumerico=function(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8 || tecla==0 || tecla==46) return true;//8 barra, 0 flechas desplaz
    patron =/[A-Za-zñÑ\s\d]/; // 4 ,\s espacio en blanco, patron = /\d/; // Solo acepta números, patron = /\w/; // Acepta números y letras, patron = /\D/; // No acepta números, patron =/[A-Za-z\s]/; //sin ñÑ
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
};
validaNumeros=function(e,id,c) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8 || tecla==0 || tecla==46) return true;//8 barra, 0 flechas desplaz
    if($('#'+id).val().length==c)return false;
    patron = /\d/; // Solo acepta números
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
};

arma_link=function(){
    window.location.href='vst-'+this.id.substring(4)+'.php';
};

quitarenter=function(e){
	tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==13 || tecla==34 || tecla==39) return false;//8 barra, 0 flechas desplaz        
};
_ocultaSubMenu=function(){
    var display=$('#submenu').css('display');
    if(display=='none'){
        $("#submenu").css('display','');
		$("#contenido").removeClass('span12').addClass('span10');
    }
	else{
        $("#submenu").css('display','none');
		$("#contenido").removeClass('span10').addClass('span12');
    }
};
_mostrarDialog=function(idFrm){
	$('#'+idFrm).dialog('open');
};
_msjOk=function(msj,width){
    $('#layerMessage').css('display','block').html(templates.msjOK(msj, width));
    sistema.ocultaError('layerMessage','4500');
};
_msjAdvertencia=function(msj,width){
    $('#layerMessage').css('display','block').html(templates.msjAdvertencia(msj, width));
    sistema.ocultaError('layerMessage','3000');
};
_msjAdvertenciaTiempo=function(msj,ancho,tiempo){
    $('#layerMessage').css('display','block').html(templates.msjAdvertencia(msj, ancho));
    sistema.ocultaError('layerMessage',tiempo);
};
_msjError=function(msj,width){
    $('#layerMessage').css('display','block').html(templates.msjError(msj, width));
    sistema.ocultaError('layerMessage','10000');
};
_msjErrorCerrar=function(msj,width){
    $('#layerMessage').css('display','block').html(templates.msjErrorCerrar(msj, width));
};
_frmError=function(id){
    $('#'+id).fadeIn('fast');
    sistema.ocultaError(id,'3000');
};

Mostrar_Ocultar=function(id){
    if($("#"+id).css("display")=="none"){
    $("#"+id).css("display","");   
    }
    else{
    $("#"+id).css("display","none");
    }
};
