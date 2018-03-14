<?php
class daoMesa{
    
    public function jqgridMesaCount ( $where ) {
       	$db=creadorConexion::crear('MySql');
        $sql=" 	SELECT COUNT(*) AS count 
                FROM mesas m
                WHERE m.estado=1 $where";
        
        $db->setQuery($sql);
        $data=$db->loadObjectList();
        
        if( count($data)>0 ){
            return $data;
        }
        else{
            return array(array('COUNT'=>0));
        }
    }
	
    public function jqgridMesaRows ( $sidx, $sord, $start, $limit, $where) {
        $sql = "SELECT m.nombre mesa,m.idmesa
                FROM mesas m
                WHERE m.estado=1 $where
	            ORDER BY  $sidx $sord
	            LIMIT $limit OFFSET $start";

        $db=creadorConexion::crear('MySql');	

        $db->setQuery($sql);
        $data=$db->loadObjectList();        
        return $data;        
    }
}
?>
