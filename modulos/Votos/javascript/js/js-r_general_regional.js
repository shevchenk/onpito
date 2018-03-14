var myTimeout;
$(document).ready(function(){
	$("#mreportes").addClass("ui-corner-all active");
	recargaImagen();
});

myTimeout = setInterval("recargaImagen()",5000);

recargaImagen=function(){
	//$( "#reporte_general" ).load( "../reporte/IMG/generarReporteGeneral.php?usuario="+$("#hd_idusuario").val());
	daoParticipacion.listarPartidosRegionalRanking(HTMLlistarPartidosRanking);
}

HTMLlistarPartidosRanking=function(datos){
	$(".elimina").remove();
	var htm='';
	var posicion=0;
	if(datos.length>0){
		$.each(datos,function(index,data){
			posicion++;
			htm='';
			htm='<tr class="elimina">'+
			    	'<td><img width="60px" heigth="50px" src="'+$("#_IMAGES_").val()+'Votos/'+data.imagen+'" alt="'+data.imagen.split("jpg").join("")+'" ></td>'+
			    	'<td aling="center"><b>'+data.partido.substring(0,20)+'</b></td>'+
			    	'<td><font size="+2">'+data.votos+' </font></td>'+
			    	'<td><font size="+2">'+posicion+'° </font></td>'+
			    	'<td><font size="+2">'+data.porcentaje+' % </font></td>'+
			    '</tr>';
			$("#listaPartidos").append(htm);
		});

	}		
}

