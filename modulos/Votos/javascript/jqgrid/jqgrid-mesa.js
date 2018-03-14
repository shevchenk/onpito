var jqgridMesa={
    type:'json',
    idLayerMessage:'layerMessage',
    Mesa: function(evento){
        var gridC=$('#table_mesa').jqGrid({
            url:'../servlet/controllerSistema.php?servlet=mesa&dao=jqgridMesa',
            datatype:this.type,
            gridview:true,
            height:140,
            colNames:['Mesa'],
            colModel:[                
				{name:'mesa',index:'mesa',align:'center',width:320,editable:true,editrules:{required:true},sorttype:"text"}				
            ],
            rowNum:5,            
            rownumbers:true,
            pager:'#pager_table_mesa',
            sortname:'idmesa',
            sortorder:'asc',
            loadui: "block",
			caption:'MESA',
            ondblClickRow: function() {
                evento();
            }
        });
        $("#table_mesa").jqGrid('filterToolbar');
        //gridC[0].toggleToolbar();
        $('#table_mesa').jqGrid('navGrid','#pager_table_mesa',{edit:false,add:false,del:false,view:false,search:false});
        $("#table_mesa").jqGrid('navButtonAdd',"#pager_table_mesa",{
            caption:"",
            title:"Cargar Mesa", 
            buttonicon :'icon-ok-sign', 
            onClickButton:function(){
                evento();
            } 
        });    
    }
}


