var myTimeout;
$(document).ready(function(){
	$("#mreportes").addClass("ui-corner-all active");
	jqgridDistrito.DistritoR(visualizar);  
	recargaImagen();
});

myTimeout = setInterval("recargaImagen()",6000);

visualizar=function(){
	$("#txt_iddistrito").val('');
	$("#txt_distrito").val('');	
var id=$("#table_distrito").jqGrid("getGridParam",'selrow');
	if (id) {
		var data = $("#table_distrito").jqGrid('getRowData',id);
		$("#txt_iddistrito").val(id);
		$("#txt_distrito").val(data.distrito);		
		Mostrar_Ocultar('listado_distrito');
		recargaImagen();	
    }
	else {_msjAdvertencia('Seleccione <b>Distrito</b> a Cargar','200')
	}
	
}

recargaImagen=function(){
	//$( "#reporte_general" ).load( "../reporte/IMG/generarReporteGeneral.php?usuario="+$("#hd_idusuario").val());
	daoParticipacion.listarPartidosDistritalRanking(HTMLlistarPartidosRanking);
}

HTMLlistarPartidosRanking=function(datos,texto){
	$("#texto").val(texto);
	$(".elimina").remove();
	var htm='';
	var posicion=0;
	if(datos.length>0){
		$.each(datos,function(index,data){
			posicion++;
			htm='';
			htm='<tr class="elimina">'+
					'<td><font size="+2">'+posicion+'° </font></td>'+
			    	'<td><img width="60px" heigth="50px" src="'+$("#_IMAGES_").val()+'Votos/'+data.imagen+'" alt="'+data.imagen.split("jpg").join("")+'" ></td>'+
			    	'<td aling="center"><b>'+data.partido.substring(0,20)+'</b></td>'+
			    	'<td><font size="+2">'+data.votos+' </font></td>'+			    	
			    	'<td><font size="+2">'+data.porcentaje+' % </font></td>'+
			    '</tr>';
			$("#listaPartidos").append(htm);
		});

	}		
}

Exportar=function(){
	window.location='../reporte/Excel/EXCELRanking.php?idtipovoto=2&iddistrito='+$("#txt_iddistrito").val()+'&estado='+$("#slct_agrupado").val()+'&reporte=DISTRITAL';	
}