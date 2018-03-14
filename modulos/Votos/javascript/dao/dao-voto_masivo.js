var daoVotoMasivo={
    url:'../servlet/controllerSistema.php', 
    idLayerMessage:'layerMessage',
    procesaArchivoImportarProvincial:function(){
        $.ajax({
            url :this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet     : 'voto_masivo',
                dao         : 'procesaArchivoImportarProvincial',
                file        : $("#hddFileImportar").val()
            },
            beforeSend : function ( ) {
                $('#layerOverlay_panel').css('display','block');
            },
            success : function ( obj ) {
                $('#layerOverlay_panel').css('display','none');
                if(obj.rst=='1'){
                    _msjOk(obj.msj);
                    cancelaProcesarImportar();//limpia la vista de "procesa"
                }else if(obj.rst=='2'){
                    _msjAdvertencia(obj.msj);
                    cancelaProcesarImportar();
                }else{
                    _msjErrorCerrar(obj.msj);
                }
            },
            error: this.msjErrorAjax
        });
    },
    procesaArchivoImportarDistrital:function(){
        $.ajax({
            url :this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet     : 'voto_masivo',
                dao         : 'procesaArchivoImportarDistrital',
                file        : $("#hddFileImportar").val()
            },
            beforeSend : function ( ) {
                $('#layerOverlay_panel').css('display','block');
            },
            success : function ( obj ) {
                $('#layerOverlay_panel').css('display','none');
                if(obj.rst=='1'){
                    _msjOk(obj.msj);
                    cancelaProcesarImportar();//limpia la vista de "procesa"
                }else if(obj.rst=='2'){
                    _msjAdvertencia(obj.msj);
                    cancelaProcesarImportar();
                }else{
                    _msjErrorCerrar(obj.msj);
                }
            },
            error: this.msjErrorAjax
        });
    },
    uploadImportar:function() {
        $('#file_uploadImportar').fileUploadUI({
            url : this.url,
            fieldName : 'uploadFileImportar',
            uploadTable: $('#filesImportar'),
            autoUpload : true,
            buildUploadRow: function (files, index, handler) {
                return $('<tr><td>' + files[index].name + '<\/td>' +
                    '<td class="file_upload_progress"><div><\/div><\/td>' +
                    '<td class="file_upload_cancel">' +
                    '<button class="ui-state-default ui-corner-all" title="Cancel">' +
                    '<span class="ui-icon ui-icon-cancel">Cancel<\/span>' +
                    '<\/button><\/td><\/tr>');
            },
            buildDownloadRow: function (file, handler) {
            },
            onSend : function (event, files, index, xhr, handler) {
            },
            onComplete : function (event, files, index, xhr, handler) {
                var obj;
                if (typeof xhr.responseText !== 'undef') {
                    obj = $.parseJSON(xhr.responseText);
                } else {
                        // Instead of an XHR object, an iframe is used for legacy browsers:
                    obj = $.parseJSON(xhr.contents().text());
                }
                $('#hddFileImportar').val(obj.file);//si viene vacio, limpia no hay resultado
                $('#spanImportar').html(obj.file);//si viene vacio, limpia no hay resultado
                if( obj.rst==2 ){
                    _msjAdvertencia(obj.msj);
                    $('#msg_resultado_importar').css('display', 'none');
                }
                if( obj.rst==1 ){
                    $('#msg_resultado_importar').fadeIn('fast');
                    $('#hddFileImportar').val(obj.file_upload);
                }
            },
            beforeSend : function (event, files, index, xhr, handler, callBack) {
                handler.formData = [
                    {name : 'servlet',  value : 'voto_masivo'},
                    {name : 'dao',      value : 'uploadImportar'},
                ];
                callBack();
            }
        }); 
    },   
    msjErrorAjax:function(){
        $('#layerOverlay_panel').css('display','none');
        _msjErrorCerrar('<b>Error, pongase en contacto con Sistemas</b>');
    }
}