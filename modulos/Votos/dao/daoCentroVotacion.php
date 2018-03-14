<?php
class daoCentroVotacion{
    
    public function jqgridCentroVotacionCount ( $where ) {
       	$db=creadorConexion::crear('MySql');
        $sql=" 	SELECT COUNT(*) AS count 
                FROM centro_votaciones c
                INNER JOIN distritos d ON c.iddistrito=d.iddistrito
                WHERE c.estado=1 $where";
        
        $db->setQuery($sql);
        $data=$db->loadObjectList();
        
        if( count($data)>0 ){
            return $data;
        }
        else{
            return array(array('COUNT'=>0));
        }
    }
	
    public function jqgridCentroVotacionRows ( $sidx, $sord, $start, $limit, $where) {
        $sql = "SELECT c.nombre centro_votacion,c.idcentrovotacion
                FROM centro_votaciones c
                INNER JOIN distritos d ON c.iddistrito=d.iddistrito
                WHERE c.estado=1 $where
	            ORDER BY  $sidx $sord
	            LIMIT $limit OFFSET $start";

        $db=creadorConexion::crear('MySql');	

        $db->setQuery($sql);
        $data=$db->loadObjectList();        
        return $data;        
    }
}
?>
