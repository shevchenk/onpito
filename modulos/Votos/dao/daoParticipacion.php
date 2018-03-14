<?php
class daoParticipacion{
    
    public function listarPartidos ( $array ) {
       	$db=creadorConexion::crear('MySql');
        $sql=" 	SELECT l.idpartido,l.nroorden,pa.nombre partido,pa.imagen,p.idtipovoto
                ,IFNULL(p.idparticipacion,'') idparticipacion 
                FROM (
                    SELECT idpartido,nroorden
                    FROM participaciones
                    WHERE iddistrito='$array[iddistrito]'
                    GROUP BY idpartido
                    ) l
                INNER JOIN partidos pa ON (pa.idpartido=l.idpartido)
                LEFT JOIN participaciones p ON (l.idpartido=p.idpartido AND p.iddistrito='$array[iddistrito]' and p.idtipovoto='$array[idtipovoto]')
                WHERE pa.estado=1
                ORDER BY l.nroorden";
        
        $db->setQuery($sql);
        $datos=$db->loadObjectList();
        
        if( count($datos)>0 ){
            return array('rst'=>1,'msj'=>'Partidos Listados','datos'=>$datos);
        }
        else{
            return array('rst'=>2,'msj'=>'No hay para Listar');//,'sql'=>$sql);
        }
    }

    public function listarPartidosPD( $array ){
        $db=creadorConexion::crear('MySql');
        $sql="  SELECT l.idpartido,l.nroorden,pa.nombre partido,pa.imagen,p.idtipovoto,p2.idtipovoto
                ,CONCAT(IFNULL(p.idparticipacion,''),'-',IFNULL(p2.idparticipacion,'')) idparticipacion
                FROM (
                    SELECT idpartido,nroorden
                    FROM participaciones
                    WHERE iddistrito='$array[iddistrito]'
                    GROUP BY idpartido
                    ) l
                INNER JOIN partidos pa ON (pa.idpartido=l.idpartido)
                LEFT JOIN participaciones p ON (l.idpartido=p.idpartido AND p.iddistrito='$array[iddistrito]' and p.idtipovoto='1')
                LEFT JOIN participaciones p2 ON (l.idpartido=p2.idpartido AND p2.iddistrito='$array[iddistrito]' and p2.idtipovoto='2')
                WHERE pa.estado=1
                ORDER BY l.nroorden";

        $db->setQuery($sql);
        $datos=$db->loadObjectList();
        
        if( count($datos)>0 ){
            return array('rst'=>1,'msj'=>'Partidos Listados','datos'=>$datos);
        }
        else{
            return array('rst'=>2,'msj'=>'No hay para Listar');//,'sql'=>$sql);
        }
    }

    public function guardarRegistros ($array){
        $db=creadorConexion::crear('MySql');
        $db->iniciaTransaccion();
        $idtipovoto=explode("^^",$array['idtipovoto']);
        $ddatos=explode("^^",$array['datos']);
        $contador=0;
        $mensaje="<b><font size='3'>ACTA Inválida;</font><b> ";
            if($array['estado']==1){
                $mensaje="<b><font size='3'>ACTA Válida;</font><b> ";
            }

        $idusuario=$_SESSION['SISTEMA']['idusuario'];
        $now=date("Y-m-d H:i:s");

        foreach($idtipovoto as $itv){
            if($ddatos[$contador]!=''){
                $datos=explode("|",$ddatos[$contador]);

                $sql="  SELECT *
                        FROM votaciones
                        WHERE idmesa='$array[idmesa]'
                        AND idtipovoto='$itv'";
                //echo $sql;
                $db->setQuery($sql);
                $votos=$db->loadObjectList();
                $contadori=0;
                $contadoru=0;        
                
                    for($i=0;$i<count($datos);$i++){
                        $d=explode("_",$datos[$i]);
                        if(count($votos)==0){
                            $contadori++;
                            $sqlinsert="INSERT INTO votaciones (idparticipacion,idmesa,idtipovoto,nrovoto,estado,fecha_creacion,usuario_creacion)
                                  VALUES ('$d[0]','$array[idmesa]','$itv','$d[1]','$array[estado]','$now','$idusuario')";
                            $db->setQuery($sqlinsert);
                                if(!$db->executeQuery()){
                                    $db->rollbackTransaccion();
                                    return array('rst'=>'3','msj'=>'Error al Registrar Datos'.$sqlinsert);
                                    exit();
                                }
                        }
                        else{
                            $contadoru++;
                            $sqlupdate="UPDATE votaciones 
                                        SET nrovoto='$d[1]',estado='$array[estado]'
                                        ,fecha_modificacion=now(),usuario_modificacion='$idusuario'
                                        WHERE idmesa='$array[idmesa]'
                                        AND idtipovoto='$itv'
                                        AND idparticipacion='$d[0]'";
                            $db->setQuery($sqlupdate);
                                if(!$db->executeQuery()){
                                    $db->rollbackTransaccion();
                                    return array('rst'=>'3','msj'=>'Error al Registrar Datos'.$sqlupdate);
                                    exit();
                                }
                        }


                        $sqlinsert="INSERT INTO votaciones_aux (idparticipacion,idmesa,idtipovoto,nrovoto,estado,fecha_creacion,usuario_creacion)
                              VALUES ('$d[0]','$array[idmesa]','$itv','$d[1]','$array[estado]','$now','$idusuario')";
                        $db->setQuery($sqlinsert);
                            if(!$db->executeQuery()){
                                $db->rollbackTransaccion();
                                return array('rst'=>'3','msj'=>'Error al Registrar Datos'.$sqlinsert);
                                exit();
                            }

                    }// fin del for de votos
            }// valida si el registro contiene datos
            $contador++;
        }// fin del for de tipos de votos

        $db->commitTransaccion();
        if($contadori>0 and $contadoru>0){
        return array('rst'=>1,'msj'=>$mensaje.'Registro y Actualización realizado con éxito');
        }
        elseif($contadoru==0){
        return array('rst'=>1,'msj'=>$mensaje.'Registro realizado con éxito');
        }
        elseif($contadori==0){
        return array('rst'=>1,'msj'=>$mensaje.'Actualización realizado con éxito');    
        }
    }

    public function listarPartidosRanking ( $array ) {
        $db=creadorConexion::crear('MySql');

        $and="";
        $group=" pa.idpartido ";
        if($array['iddistrito']!='' OR $array['idtipovoto']=='2'){
            $and = "AND d.iddistrito='$array[iddistrito]'";
            $group=" v.idparticipacion ";
        }

        $sql="  SELECT count(m.idmesa) cant
                FROM mesas m
                INNER JOIN centro_votaciones c ON c.idcentrovotacion=m.idcentrovotacion
                INNER JOIN distritos d ON d.iddistrito=c.iddistrito
                WHERE d.idprovincia='127'
                $and 
            ";

        $estado="";
        if($array['estado']!=''){
            $estado=" AND v.estado='$array[estado]' ";
        }
            
        $db->setQuery($sql);
        $datos1=$db->loadObjectList();
        $tmesas=$datos1[0]['cant'];

        $sql="  SELECT IFNULL(sum(v.nrovoto),'0') Total,count(DISTINCT(v.idmesa)) cantm
                FROM votaciones v
                INNER JOIN participaciones p ON v.idparticipacion=p.idparticipacion 
                INNER JOIN distritos d ON d.iddistrito=p.iddistrito 
                WHERE v.idtipovoto='$array[idtipovoto]'                
                AND d.idprovincia='127' 
                 $estado 
                 $and 
            ";
        $db->setQuery($sql);
        $datos1=$db->loadObjectList();
        $totaldatos=$datos1[0]['Total'];
        $totalmesas=$datos1[0]['cantm'];
        $porcentajemesas=round(($totalmesas/$tmesas),4)*100;
        //echo $sql;echo "<br>";

        $sql="  SELECT v.idparticipacion,pa.imagen,pa.nombre partido,sum(v.nrovoto) votos,$totaldatos,
                round((sum(v.nrovoto)/$totaldatos)*100) porcentaje
                FROM votaciones v
                INNER JOIN participaciones p ON v.idparticipacion=p.idparticipacion
                INNER JOIN distritos d ON d.iddistrito=p.iddistrito 
                INNER JOIN partidos pa ON pa.idpartido=p.idpartido
                WHERE v.idtipovoto='$array[idtipovoto]' -- Para Alcalde                 
                AND d.idprovincia='127' 
                 $estado 
                 $and 
                GROUP BY $group 
                ORDER BY votos DESC,p.nroorden";
        //echo $sql;echo "<br>";
        $db->setQuery($sql);
        $datos=$db->loadObjectList();
        
        $texto='VOTOS AL '.$porcentajemesas.'% => '.$totalmesas.' MESAS COMPUTADAS DE '.$tmesas;
        if( count($datos)>0 ){
            return array('rst'=>1,'msj'=>'Cargado correctamente','texto'=>$texto,'datos'=>$datos);
        }
        else{
            return array('rst'=>2,'msj'=>'No hay registros que mostrar','texto'=>'.::Sin Registros::.','sql'=>$sql);
        }
    }

    public function listarDistritosComputados(){
        $db=creadorConexion::crear('MySql');

        $sql="  SELECT d.nombre distrito,count(m.idmesa) cantm,IFNULL(mvp.cantmvp,'0') cantmvp,IFNULL(mvd.cantmvd,'0') cantmvd
                ,ROUND((IFNULL(mvp.cantmvp,'0')/count(m.idmesa))*100,2) pp,ROUND((IFNULL(mvd.cantmvd,'0')/count(m.idmesa))*100,2) pd
                FROM distritos d
                INNER JOIN centro_votaciones c ON (d.iddistrito=c.iddistrito)
                INNER JOIN mesas m ON (m.idcentrovotacion=c.idcentrovotacion) 
                LEFT JOIN (
                    SELECT p.iddistrito,count(DISTINCT(v.idmesa)) cantmvp
                    FROM votaciones v
                    INNER JOIN participaciones p ON (v.idparticipacion=p.idparticipacion)
                    WHERE v.idtipovoto='1'
                    GROUP BY p.iddistrito
                ) mvp ON (mvp.iddistrito=d.iddistrito)
                LEFT JOIN (
                    SELECT p.iddistrito,count(DISTINCT(v.idmesa)) cantmvd
                    FROM votaciones v
                    INNER JOIN participaciones p ON (v.idparticipacion=p.idparticipacion)
                    WHERE v.idtipovoto='2'
                    GROUP BY p.iddistrito
                ) mvd ON (mvd.iddistrito=d.iddistrito)
                WHERE idprovincia=127
                GROUP BY d.iddistrito";
        
        $db->setQuery($sql);
        $datos=$db->loadObjectList();
        
        if( count($datos)>0 ){
            return array('rst'=>1,'msj'=>'Cargado correctamente','datos'=>$datos);
        }
        else{
            return array('rst'=>2,'msj'=>'No hay registros que mostrar');
        }
    }

}
?>
