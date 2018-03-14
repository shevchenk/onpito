var myTimeout;
$(document).ready(function(){
	$("#mreportes").addClass("ui-corner-all active");
	recargaImagen();
});

myTimeout = setInterval("recargaImagen()",5000);


recargaImagen=function(){
	daoParticipacion.listarDistritosComputados(HTMLlistarDistritosComputados);
}

HTMLlistarDistritosComputados=function(datos){	
	$(".elimina").remove();
	var htm='';
	var posicion=0;
	if(datos.length>0){
		$.each(datos,function(index,data){
			posicion++;
			htm='';
			htm='<tr class="elimina">'+
			    	'<td aling="center"><b>'+data.distrito+'</b></td>'+
			    	'<td><font size="+2">'+data.cantm+' </font></td>'+
			    	'<td><font size="+2">'+data.cantmvp+'</font></td>'+
			    	'<td><font size="+2">'+data.cantmvd+'</font></td>'+
			    	'<td><font size="+2">'+data.pp+' %</font></td>'+
			    	'<td><font size="+2">'+data.pd+' %</font></td>'+
			    '</tr>';
			$("#listaPartidos").append(htm);
		});

	}		
}

Exportar=function(){
	window.location='../reporte/Excel/EXCELDistritosComputadas.php';	
}


