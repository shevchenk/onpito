var jqgridCentroVotacion={
    type:'json',
    idLayerMessage:'layerMessage',
    CentroVotacion: function(evento){
        var gridC=$('#table_centro_votacion').jqGrid({
            url:'../servlet/controllerSistema.php?servlet=centro_votacion&dao=jqgridDistrito',
            datatype:this.type,
            gridview:true,
            height:140,
            colNames:['CENTRO VOTACION'],
            colModel:[
                {name:'centro_votacion',index:'centro_votacion',align:'left',width:320,editable:true,editrules:{required:true},sorttype:"text"}               
            ],
            rowNum:5,            
            rownumbers:true,
            pager:'#pager_table_centro_votacion',
            sortname:'idcentrovotacion',
            sortorder:'asc',
            loadui: "block",
			caption:'CENTRO VOTACION',
            ondblClickRow: function() {
                evento();
            }
        });
        $("#table_centro_votacion").jqGrid('filterToolbar');
        //gridC[0].toggleToolbar();
        $('#table_centro_votacion').jqGrid('navGrid','#pager_table_centro_votacion',{edit:false,add:false,del:false,view:false,search:false});
        $("#table_centro_votacion").jqGrid('navButtonAdd',"#pager_table_centro_votacion",{
            caption:"",
            title:"Cargar Registro", 
            buttonicon :'icon-ok-sign', 
            onClickButton:function(){
                evento();
            } 
        });
    }
}


