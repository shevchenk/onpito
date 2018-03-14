var templates={
    txtError:function(message,ancho){
        html='';
        html='<div class="txt_11 txt_rojo" style="width:'+ancho+'px;padding-left:20px;">'+message+'</div>';
        return html;
    },
    msjError:function(message,ancho){
        html='';
        html='<div align="center" class="errorPopup txt_11 txt_tema corner_all" style="width:'+ancho+'px;">'+
                '<span class="icon iconSemafRojo" style="float:left"></span>'+
                message +
            '</div>';
        return html;
    },
    msjErrorCerrar:function(message,ancho){
        html='';
        html='<div align="center" class="errorPopup txt_11 txt_tema corner_all" style="width:'+ancho+'px;">'+
                '<span class="icon iconSemafRojo" style="float:left"></span>'+
                message +
                '<span class="icon_content icon_cerrar3" style="float:right" onclick="$(this).parent().parent().fadeOut(\'slow\')"></span>'
            '</div>';
        return html;
    },
    msjAdvertencia:function(message,ancho){
        html='';
        html='<div align="center" class="advertenciaPopup txt_11 txt_tema corner_all" style="width:'+ancho+'px;">'+
                '<span class="icon iconSemafAmarillo" style="float:left"></span>'+
                message +
            '</div>';
        return html;
    },
    msjOK:function(message,ancho){
        html='';
        html='<div align="center" class="okPopup txt_11 txt_tema corner_all" style="width:'+ancho+'px;">'+
                '<span class="icon iconSemafVerde" style="float:left"></span>'+
                message +
            '</div>';
        return html;
    }
}

