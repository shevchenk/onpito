var daoParticipacion={
    url:'../servlet/controllerSistema.php',
    idLayerMessage:'layerMessage',
    listarPartidosProvincial:function(evento,iddistrito){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
				servlet         : 'participacion',
				dao             : 'listarPartidosProvincial',
				iddistrito      : iddistrito
			},
            beforeSend : function() {
            },
            success : function(obj) {
                if(obj.rst==1){
                    evento(obj.datos);
                }
				else{
					evento('');
                    _msjAdvertencia(obj.msj,300);
				}
            },
            error: this.error_ajax
        });
    },
    listarPartidosDistrital:function(evento,iddistrito){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'listarPartidosDistrital',
                iddistrito      : iddistrito
            },
            beforeSend : function() {
            },
            success : function(obj) {
                if(obj.rst==1){
                    evento(obj.datos);
                }
                else{
                    evento('');
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    },
    listarPartidosRegional:function(evento,iddistrito){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'listarPartidosRegional',
                iddistrito      : iddistrito
            },
            beforeSend : function() {
            },
            success : function(obj) {
                if(obj.rst==1){
                    evento(obj.datos);
                }
                else{
                    evento('');
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    },
    listarPartidosPD:function(evento,iddistrito){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'listarPartidosPD',
                iddistrito      : iddistrito
            },
            beforeSend : function() {
            },
            success : function(obj) {
                if(obj.rst==1){
                    evento(obj.datos);
                }
                else{
                    evento('');
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    },
    guardarRegistrosProvincial:function(datos,estado){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'guardarRegistrosProvincial',
                idmesa          : $("#txt_idmesa").val(),
                datos           : datos,
                estado          : estado
            },
            beforeSend : function() {
                $('#layerOverlay_panel').css('display','block');
            },
            success : function(obj) {
                $('#layerOverlay_panel').css('display','none');
                if(obj.rst==1){
                    _msjOk(obj.msj,300);
                }
                else{
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    },
    guardarRegistrosDistrital:function(datos,estado){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'guardarRegistrosDistrital',
                idmesa          : $("#txt_idmesa").val(),
                datos           : datos,
                estado          : estado
            },
            beforeSend : function() {
                $('#layerOverlay_panel').css('display','block');
            },
            success : function(obj) {
                $('#layerOverlay_panel').css('display','none');
                if(obj.rst==1){
                    _msjOk(obj.msj,300);
                }
                else{
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    },
    guardarRegistrosRegional:function(datos,estado){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'guardarRegistrosRegional',
                idmesa          : $("#txt_idmesa").val(),
                datos           : datos,
                estado          : estado
            },
            beforeSend : function() {
                $('#layerOverlay_panel').css('display','block');
            },
            success : function(obj) {
                $('#layerOverlay_panel').css('display','none');
                if(obj.rst==1){
                    _msjOk(obj.msj,300);
                }
                else{
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    },
    guardarRegistrosProvincialDistrital:function(datos,estado){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'guardarRegistrosProvincialDistrital',
                idmesa          : $("#txt_idmesa").val(),
                datos           : datos,
                estado          : estado
            },
            beforeSend : function() {
                $('#layerOverlay_panel').css('display','block');
            },
            success : function(obj) {
                $('#layerOverlay_panel').css('display','none');
                if(obj.rst==1){
                    _msjOk(obj.msj,300);
                }
                else{
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    },    
    listarPartidosProvincialRanking:function(evento){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'listarPartidosProvincialRanking',
                iddistrito      : $("#txt_iddistrito").val(),
                estado          : $("#slct_agrupado").val()
            },
            beforeSend : function() {
            },
            success : function(obj) {
                if(obj.rst==1){
                    evento(obj.datos,obj.texto);                    
                }
                else{
                    evento('');
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    },
    listarPartidosDistritalRanking:function(evento){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'listarPartidosDistritalRanking',
                iddistrito      : $("#txt_iddistrito").val(),
                estado          : $("#slct_agrupado").val()
            },
            beforeSend : function() {
            },
            success : function(obj) {
                if(obj.rst==1){
                    evento(obj.datos,obj.texto);
                }
                else{
                    evento('');
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    },
    listarPartidosRegionalRanking:function(evento){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'listarPartidosRegionalRanking',
                iddistrito      : $("#txt_iddistrito").val()
            },
            beforeSend : function() {
            },
            success : function(obj) {
                if(obj.rst==1){
                    evento(obj.datos,obj.texto);
                }
                else{
                    evento('');
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    },
    listarDistritosComputados:function(evento){
        $.ajax({
            url : this.url,
            type : 'POST',
            dataType : 'json',
            data : {
                servlet         : 'participacion',
                dao             : 'listarDistritosComputados'
            },
            beforeSend : function() {
            },
            success : function(obj) {
                if(obj.rst==1){
                    evento(obj.datos);
                }
                else{
                    evento('');
                    _msjAdvertencia(obj.msj,300);
                }
            },
            error: this.error_ajax
        });
    }
}