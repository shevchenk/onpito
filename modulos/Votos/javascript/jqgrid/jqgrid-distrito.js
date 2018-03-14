var jqgridDistrito={
    type:'json',
    idLayerMessage:'layerMessage',
    Distrito: function(evento){
        var gridC=$('#table_distrito').jqGrid({
            url:'../servlet/controllerSistema.php?servlet=distrito&dao=jqgridDistrito',
            datatype:this.type,
            gridview:true,
            height:140,
            colNames:['DISTRITO','PROVINCIA','DEPARTAMENTO'],
            colModel:[
                {name:'distrito',index:'distrito',align:'left',width:280,editable:true,editrules:{required:true},sorttype:"text"},
                {name:'provincia',index:'provincia',align:'center',width:120,editable:true,editrules:{required:true},sorttype:"text",hidden:true},
                {name:'departamento',index:'departamento',align:'center',width:120,editable:true,editrules:{required:true},sorttype:"text",hidden:true}
				
            ],
            rowNum:5,            
            rownumbers:true,
            pager:'#pager_table_distrito',
            sortname:'iddistrito',
            sortorder:'asc',
            loadui: "block",
			caption:'DISTRITO',
            ondblClickRow: function() {
                evento();
            }
        });
        $("#table_distrito").jqGrid('filterToolbar');
        //gridC[0].toggleToolbar();
        $('#table_distrito').jqGrid('navGrid','#pager_table_distrito',{edit:false,add:false,del:false,view:false,search:false});
        $("#table_distrito").jqGrid('navButtonAdd',"#pager_table_distrito",{
            caption:"",
            title:"Cargar Registro", 
            buttonicon :'icon-ok-sign', 
            onClickButton:function(){
                evento();
            } 
        });
    },
    DistritoR: function(evento){
        var gridC=$('#table_distrito').jqGrid({
            url:'../servlet/controllerSistema.php?servlet=distrito&dao=jqgridDistritoR',
            datatype:this.type,
            gridview:true,
            height:140,
            colNames:['DISTRITO','PROVINCIA','DEPARTAMENTO'],
            colModel:[
                {name:'distrito',index:'distrito',align:'left',width:280,editable:true,editrules:{required:true},sorttype:"text"},
                {name:'provincia',index:'provincia',align:'center',width:120,editable:true,editrules:{required:true},sorttype:"text",hidden:true},
                {name:'departamento',index:'departamento',align:'center',width:120,editable:true,editrules:{required:true},sorttype:"text",hidden:true}
                
            ],
            rowNum:5,            
            rownumbers:true,
            pager:'#pager_table_distrito',
            sortname:'iddistrito',
            sortorder:'asc',
            loadui: "block",
            caption:'DISTRITO',
            ondblClickRow: function() {
                evento();
            }
        });
        $("#table_distrito").jqGrid('filterToolbar');
        //gridC[0].toggleToolbar();
        $('#table_distrito').jqGrid('navGrid','#pager_table_distrito',{edit:false,add:false,del:false,view:false,search:false});
        $("#table_distrito").jqGrid('navButtonAdd',"#pager_table_distrito",{
            caption:"",
            title:"Cargar Registro", 
            buttonicon :'icon-ok-sign', 
            onClickButton:function(){
                evento();
            } 
        });
    }
}


