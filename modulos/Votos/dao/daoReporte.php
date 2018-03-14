<?php
class daoReporte{
    
    public function listarReporteActasPorcentajes ( $array ) {
       	$db=creadorConexion::crear('MySql');

        $sql="  SELECT sum(nrovoto) Total1
                FROM votaciones
                WHERE idtipovoto=1";
        $db->setQuery($sql);
        $datos1=$db->loadObjectList();

        $sql=" 	SELECT v.idparticipacion,pa.nombre partido,sum(v.nrovoto) votos,'$datos1[Total1]',
                round((sum(v.nrovoto)/'$datos1[0][Total1]')*100) porcentaje
                FROM votaciones v
                INNER JOIN participaciones p ON v.idparticipacion=p.idparticipacion
                INNER JOIN partidos pa ON pa.idpartido=p.idpartido
                WHERE v.idtipovoto=1 -- Para Alcalde
                GROUP BY v.idparticipacion
                ORDER BY 2 DESC";
        
        $db->setQuery($sql);
        $datos=$db->loadObjectList();
        
        if( count($datos)>0 ){
            return array('rst'=>1,'msj'=>'Cargado correctamente','datos'=>$datos);
        }
        else{
            return array('rst'=>2,'msj'=>'No hay registros que mostrar','sql'=>$sql);
        }
    }

}
?>
