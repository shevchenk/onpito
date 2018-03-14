<?php
class daoVotoMasivo{
    
    public function procesaArchivoImportar ($file,$idtipovoto) {        
        $registros = file('../archivos/'.$file);
        //recorremos las diferentes lineas de texto
        $nrofila=0;
        $nrocolu=0;
        $partidos=array();

        $db=creadorConexion::crear('MySql');
        $db->iniciaTransaccion();
        foreach($registros as $fila){
            $nrofila++;
            $nrocolu=0;
            $f = explode("\t",$fila);

            if($nrofila==1){
                for($i=2;$i<count($f);$i++){
                    $partidos[$i]=trim($f[$i]);
                }
            }

            if($nrofila>1){            
            $ubigeo=$f[0];
            $mesa=$f[1];
                $sqlmesa="  SELECT idmesa
                            FROM mesas 
                            WHERE nombre='$mesa'";
                $db->setQuery($sqlmesa);
                $dmesa=$db->loadObjectList();
                
                if( count($dmesa)>0 ){ // si la mesa existe en la BD
                    $idmesa=$dmesa[0]['idmesa'];

                    for($i=2;$i<count($f);$i++){
                        $nrocolu++;
                        $cparpol=$partidos[$i];
                        $nrovoto=$f[$i];

                        $sqlparticipacion=" SELECT p.idparticipacion
                                            FROM participaciones p
                                            INNER JOIN partidos pa ON (p.idpartido=pa.idpartido)
                                            INNER JOIN distritos d ON (d.iddistrito=p.iddistrito)
                                            WHERE pa.cparpol='$cparpol'
                                            AND d.ubigeo='$ubigeo'
                                            AND p.idtipovoto='$idtipovoto'";
                        $db->setQuery($sqlparticipacion);
                        $dparticipacion=$db->loadObjectList();
                        
                        if( count($dparticipacion)>0 ){
                            $idparticipacion=$dparticipacion[0]['idparticipacion'];
                            $sql="  SELECT *
                                    FROM votaciones
                                    WHERE idparticipacion='$idparticipacion'
                                    AND idmesa='$idmesa'
                                    AND idtipovoto='$idtipovoto'";
                            $db->setQuery($sql);
                            $dvalidaparticipacion=$db->loadObjectList();                            

                            if( count($dvalidaparticipacion)>0 ){                                
                                $sqlupdate="UPDATE votaciones
                                            SET nrovoto='$nrovoto'
                                            WHERE idparticipacion='$idparticipacion'
                                            AND idmesa='$idmesa'
                                            AND idtipovoto='$idtipovoto'";
                                $db->setQuery($sqlupdate);
                                if(!$db->executeQuery()){
                                    $db->rollbackTransaccion();
                                    return array('rst'=>'3','msj'=>'Error al Registrar Datos Actualiza');
                                    exit();
                                }
                            }
                            else{
                                $sqlinsert="INSERT INTO votaciones (idparticipacion,idmesa,idtipovoto,nrovoto)
                                            VALUES ('$idparticipacion','$idmesa','$idtipovoto','$nrovoto')";
                                $db->setQuery($sqlinsert);
                                if(!$db->executeQuery()){
                                    $db->rollbackTransaccion();
                                    return array('rst'=>'3','msj'=>'Error al Registrar Datos Inserta');
                                    exit();
                                }
                            }

                            $sqlinsert_aux="INSERT INTO votaciones_aux (idparticipacion,idmesa,idtipovoto,nrovoto)
                                            VALUES ('$idparticipacion','$idmesa','$idtipovoto','$nrovoto')";
                            $db->setQuery($sqlinsert_aux);
                            if(!$db->executeQuery()){
                                $db->rollbackTransaccion();
                                return array('rst'=>'3','msj'=>'Error al Registrar Datos Inserta Aux');
                                exit();
                            }

                        }// fin de validar participacion                        

                    }// fin del recorrido de los votos por mesa
                    
                }// fin de validar mesa
                        
            }// fin de listado de mesas 2do registro

        }//fin del recorrido del archivo cargado
        $db->commitTransaccion();
        return array('rst'=>'1','msj'=>'Se registraron los '.($nrofila-1).' registros','nrofila'=>$nrofila,'nrocolu'=>$nrocolu);
    }

    public function uploadImportar ( $_post, $_files ) {
        /***archivo a subir***/
        $cargado=$_files['uploadFileImportar']['name'];
        /*******elimino si existe el archivo******/
        if(file_exists('../archivos/'.$cargado) ) {
            if(!unlink("../archivos/".$cargado)){
                echo json_encode(array('rst'=>2,'msj'=>'Error al eliminar archivo antiguo','file'=>''));exit();       
            }
        }
        /****proceso de carga del archivo****/
        if( opendir('../archivos/') ) {
            if($_files['uploadFileImportar']['type']!='text/plain'){//tipo excel 2007
                echo json_encode(array('rst'=>2,'msj'=>'Formato Incorrecto, solo se acepta <b>.TXT</b>','file'=>''));       
            }else{                
                if(move_uploaded_file($_files['uploadFileImportar']['tmp_name'],'../archivos/'.$cargado)){                    
                    echo json_encode(array('rst'=>1,'msj'=>'Archivo Subido','file'=>$_files['uploadFileImportar']['name'],'file_upload'=>$cargado));                        
                    
                }else{
                    echo json_encode(array('rst'=>2,'msj'=>'Error al subir archivo al servidor','file'=>''));       
                }
            }
        }else{
            echo json_encode(array('rst'=>2,'msg'=>'Error al abrir carpeta contenedora','file'=>''));       
        }   
    }
}
?>
