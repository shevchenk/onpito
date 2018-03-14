$(document).ready(function(){
	$("#mmasivo").addClass("ui-corner-all active");
	daoUsuarioMasivo.uploadImportar();
	$('#cancelaProcImportar').click(cancelaProcesarImportar);
	$('#ProcImportar').click(procesarImportar);
});

procesarImportar=function(){
    var arch=$('#hddFileImportar').val();//valida si se subio archivo
    if(arch==''){
        _msjAdvertencia('No ha subido Archivo');return false;
    }
    daoUsuarioMasivo.procesaArchivoImportar();
}

cancelaProcesarImportar=function(){
	$('#hddFileImportar').val('');
	$('#spanImportar').html('');
	$('#msg_resultado_importar').css('display', 'none');
}



