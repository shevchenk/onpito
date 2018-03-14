<?php
class daoDistrito{
    
    public function jqgridDistritoCount ( $where ) {
       	$db=creadorConexion::crear('MySql');
        $iddistrito=$_SESSION['SISTEMA']['iddistrito'];
        $sql=" 	SELECT COUNT(*) AS count         		
				FROM distritos d
				INNER JOIN provincias p on p.idprovincia=d.idprovincia
				INNER JOIN departamentos de on de.iddepartamento=p.iddepartamento
 				WHERE de.nombre='LIMA'
                AND p.nombre='LIMA' 
                AND d.iddistrito IN ($iddistrito) $where";
        
        $db->setQuery($sql);
        $data=$db->loadObjectList();
        
        if( count($data)>0 ){
            return $data;
        }
        else{
            return array(array('COUNT'=>0));
        }
    }
	
    public function jqgridDistritoRows ( $sidx, $sord, $start, $limit, $where) {
        $iddistrito=$_SESSION['SISTEMA']['iddistrito'];
        $sql = "SELECT de.nombre as departamento,p.nombre as provincia,d.nombre as distrito
        		,d.ubigeo,d.iddistrito,p.idprovincia,de.iddepartamento 
				FROM distritos d
				INNER JOIN provincias p on p.idprovincia=d.idprovincia
				INNER JOIN departamentos de on de.iddepartamento=p.iddepartamento
	            WHERE de.nombre='LIMA'
                AND p.nombre='LIMA' 
                AND d.iddistrito IN ($iddistrito) $where
	            ORDER BY  $sidx $sord
	            LIMIT $limit OFFSET $start";

        $db=creadorConexion::crear('MySql');	

        $db->setQuery($sql);
        $data=$db->loadObjectList();        
        return $data;        
    }
}
?>
