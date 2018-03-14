$(document).ready(function(){
	$("#mvotos").addClass("ui-corner-all active");
	jqgridDistrito.Distrito(visualizarCentroVotacion);  
	jqgridCentroVotacion.CentroVotacion(visualizarMesa);  
	jqgridMesa.Mesa(listarCandidatos);
});

visualizarCentroVotacion=function(){
var id=$("#table_distrito").jqGrid("getGridParam",'selrow');
	if (id) {
		var data = $("#table_distrito").jqGrid('getRowData',id);
		$("#txt_iddistrito").val(id);
		$("#txt_distrito").val(data.distrito);
		$("#btnCentroVotacion").css("display","");
		var url='../servlet/controllerSistema.php?servlet=centro_votacion&dao=jqgridCentroVotacion&iddistrito='+id;
		$("#table_centro_votacion").jqGrid('setGridParam',{url:url}).trigger('reloadGrid'); 
		$('#listado_centro_votacion').fadeIn('slow');
		Mostrar_Ocultar('listado_distrito'); 
		$("#txt_idcentrovotacion").val('');
		$("#txt_centro_votacion").val('');
		$("#txt_idmesa").val('');
		$("#txt_mesa").val('');
		$("#listado_partidos").css("display",'none');
		daoParticipacion.listarPartidosRegional(HTMLlistarPartidos,id);		
    }
	else {_msjAdvertencia('Seleccione <b>Distrito</b> a Cargar','200')
	}
	
}

visualizarMesa=function(){
var id=$("#table_centro_votacion").jqGrid("getGridParam",'selrow');
	if (id) {
		var data = $("#table_centro_votacion").jqGrid('getRowData',id);
		$("#txt_idcentrovotacion").val(id);
		$("#txt_centro_votacion").val(data.centro_votacion);
		$("#btnMesa").css("display","");
		var url='../servlet/controllerSistema.php?servlet=mesa&dao=jqgridMesa&idcentrovotacion='+id;
		$("#table_mesa").jqGrid('setGridParam',{url:url}).trigger('reloadGrid'); 
		$('#listado_mesa').fadeIn('slow');
		Mostrar_Ocultar('listado_centro_votacion');
		$("#txt_idmesa").val('');
		$("#txt_mesa").val('');
		$('#gs_mesa').remove();
		$( "#gview_table_mesa tr:nth-child(2) th:nth-child(2) div" ).append('<input id="gs_mesa" class="span12" min="0" onKeyPress="return validaNumeros(event,this.id,20);" type="number">');
		$('#gs_mesa').keypress(recargarMesa);
		$('#gs_mesa').blur(recargarMesa2);
		$("#listado_partidos").css("display",'none');
    }
	else {_msjAdvertencia('Seleccione <b>Centro de Votación</b> a Cargar','200')
	}
	
}

recargarMesa=function(e){	
	if(e.which == 13){ 
		var url='../servlet/controllerSistema.php?servlet=mesa&dao=jqgridMesa&mesa='+$("#gs_mesa").val()+'&idcentrovotacion='+$("#txt_idcentrovotacion").val();
		$("#table_mesa").jqGrid('setGridParam',{url:url}).trigger('reloadGrid'); 	
    }
}

recargarMesa2=function(){
	var url='../servlet/controllerSistema.php?servlet=mesa&dao=jqgridMesa&mesa='+$("#gs_mesa").val()+'&idcentrovotacion='+$("#txt_idcentrovotacion").val();
	$("#table_mesa").jqGrid('setGridParam',{url:url}).trigger('reloadGrid');    
}

listarCandidatos=function(){
var id=$("#table_mesa").jqGrid("getGridParam",'selrow');
	if (id) {	
		var data = $("#table_mesa").jqGrid('getRowData',id);
		$("#txt_idmesa").val(id);
		$("#txt_mesa").val(data.mesa);	
		Mostrar_Ocultar('listado_mesa');
		$("#listado_partidos").css("display",'');
		$('#listado_partidos input[type="number"]').val('');
    }
	else {_msjAdvertencia('Seleccione <b>Mesa</b> a Cargar','200')
	}

}

HTMLlistarPartidos=function(datos){
	$(".elimina").remove();
	var htm='';
	if(datos.length>0){
		$.each(datos,function(index,data){
			htm='';
			htm='<tr class="elimina" id="'+data.idparticipacion+'" data-pos="'+data.nroorden+'">'+
			    	'<td><img width="60px" heigth="50px" src="'+$("#_IMAGES_").val()+'Votos/'+data.imagen+'" alt="'+data.imagen.split("jpg").join("")+'" ></td>'+
			    	'<td><b>'+data.nroorden+'-'+data.partido.substring(0,20)+'</b></td>'+
			    	'<td><input type="number" class="span9 input-lg" id="regional_'+data.idparticipacion+'" placeholder="Ing. Voto" min="0" onKeyPress="return validaNumeros(event,this.id,4);" autofocus required></td>'+
			    '</tr>';
			$("#listaPartidos").append(htm);
		});	

		htm='<tr id="btnguardar2" class="elimina">'+
            	'<td colspan="3" style="text-align:center">'+
	                '<div class="bar_contenido button_icon ui-corner-all" onclick="GuardarVotos();">'+
						'<i class="input-lg">Guardar</i>'+
						'<i class="icon-envelope"></i>'+
					'</div>'+
                '</td>'+
            '</tr>';
        $("#listaPartidos").append(htm);
	}		
}

GuardarVotos=function(){
	var error=0;
	var contador=0;
	var datos=new Array();
	$(".elimina").each(function() {
		contador++;
		if($("#regional_"+this.id).val()=='' && error==0){
			error=1;
			_msjAdvertencia('Ingrese su Voto Regional Nro:<b>'+this.getAttribute("data-pos"))+'</b>';
			$("#regional_"+this.id).focus();			
		}
		else{
			if(this.id!='btnguardar2'){
				datos.push(this.id+'_'+$("#regional_"+this.id).val());
			}			
		}		
	});	

	if(error==0 && contador>0){
		daoParticipacion.guardarRegistrosRegional(datos.join("|"));		
	}
}
