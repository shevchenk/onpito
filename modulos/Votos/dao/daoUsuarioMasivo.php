<?php
class daoUsuarioMasivo{
    
    public function procesaArchivoImportar ($file) {        
        $registros = file('../archivos/usuarios/'.$file);
        //recorremos las diferentes lineas de texto
        $nrofila=0;
        $nrocolu=0;
        $usuarios=array();
        $dniaux="";

        $db=creadorConexion::crear('MySql');
        $db->iniciaTransaccion();
        foreach($registros as $fila){
            $nrofila++;
            $nrocolu=0;
            $f = explode("\t",$fila);

            if($nrofila>1){
                $dni=trim($f[0]);
                $nombre=trim($f[1]);
                $paterno=trim($f[2]);
                $materno=trim($f[3]);                
                $idcargo=trim($f[5]);
                $ubigeo=trim($f[4]);
                $password=trim($f[6]);

                if($dniaux!=$dni){
                    $sql="  SELECT *
                            FROM usuarios
                            WHERE dni='$dni'";
                    $db->setQuery($sql);
                    $dusuario=$db->loadObjectList();

                    if( count($dusuario)>0 ){
                        $idusuario=$dusuario[0]['idusuario'];
                        $sqlupdate="UPDATE usuarios
                                    SET idcargo='$idcargo'
                                    ,paterno='$paterno'
                                    ,materno='$materno'
                                    ,nombre='$nombre'
                                    ,password='$password'
                                    WHERE idusuario='$idusuario'";
                        $db->setQuery($sqlupdate);
                               
                            if(!$db->executeQuery()){
                                $db->rollbackTransaccion();
                                return array('rst'=>'3','msj'=>'Error al Registrar Datos Actualiza');
                                exit();
                            }
                    }
                    else{
                        $sqlinserta="INSERT INTO usuarios (dni,nombre,paterno,materno,password,idcargo)
                                     VALUES ('$dni','$nombre','$paterno','$materno','$password','$idcargo')";
                        $db->setQuery($sqlinserta);
                            if(!$db->executeQuery()){
                                $db->rollbackTransaccion();
                                return array('rst'=>'3','msj'=>'Error al Registrar Datos Actualiza');
                                exit();
                            }
                        $idusuario=$db->last_insert_id();                    
                    }

                    $sqlupdate="UPDATE usuario_distrito 
                                SET estado='0'
                                WHERE idusuario='$idusuario'";
                    $db->setQuery($sqlupdate);
                        if(!$db->executeQuery()){
                            $db->rollbackTransaccion();
                            return array('rst'=>'3','msj'=>'Error al Registrar Datos Actualiza Desactivados','sql'=>$sqlupdate);
                            exit();
                        }
                    $dniaux=$dni;
                }

                

                $sql="  SELECT ud.idusuario,ud.iddistrito
                        FROM usuario_distrito ud 
                        INNER JOIN distritos d ON (ud.iddistrito=d.iddistrito)
                        WHERE d.ubigeo='$ubigeo'
                        AND ud.idusuario='$idusuario'";
                $db->setQuery($sql);
                $ddistrito=$db->loadObjectList();

                if( count($ddistrito)>0 ){
                    $iddistrito=$ddistrito[0]['iddistrito'];
                    $sqlupdate="UPDATE usuario_distrito
                                SET estado='1'
                                WHERE idusuario='$idusuario'
                                AND iddistrito='$iddistrito'";
                    $db->setQuery($sqlupdate);
                        if(!$db->executeQuery()){
                            $db->rollbackTransaccion();
                            return array('rst'=>'3','msj'=>'Error al Registrar Datos Actualiza');
                            exit();
                        }

                }
                else{
                    $sqlinserta="INSERT INTO usuario_distrito (idusuario,iddistrito)
                                 VALUES ('$idusuario',(SELECT iddistrito FROM distritos WHERE ubigeo='$ubigeo'))";
                    $db->setQuery($sqlinserta);
                        if(!$db->executeQuery()){
                            $db->rollbackTransaccion();
                            return array('rst'=>'3','msj'=>'Error al Registrar Datos');
                            exit();
                        }// falta validar
                }

               
                        
            }// fin de listado de mesas 2do registro

        }//fin del recorrido del archivo cargado
        $db->commitTransaccion();
        return array('rst'=>'1','msj'=>'Se registraron los '.($nrofila-1).' registros','nrofila'=>$nrofila,'nrocolu'=>$nrocolu);
    }

    public function uploadImportar ( $_post, $_files ) {
        /***archivo a subir***/
        $cargado=$_files['uploadFileImportar']['name'];
        /*******elimino si existe el archivo******/
        if(file_exists('../archivos/usuarios/'.$cargado) ) {
            if(!unlink("../archivos/usuarios/".$cargado)){
                echo json_encode(array('rst'=>2,'msj'=>'Error al eliminar archivo antiguo','file'=>''));exit();       
            }
        }
        /****proceso de carga del archivo****/
        if( opendir('../archivos/usuarios/') ) {
            if($_files['uploadFileImportar']['type']!='text/plain'){//tipo excel 2007
                echo json_encode(array('rst'=>2,'msj'=>'Formato Incorrecto, solo se acepta <b>.TXT</b>','file'=>''));       
            }else{                
                if(move_uploaded_file($_files['uploadFileImportar']['tmp_name'],'../archivos/usuarios/'.$cargado)){                    
                    echo json_encode(array('rst'=>1,'msj'=>'Archivo Subido','file'=>$_files['uploadFileImportar']['name'],'file_upload'=>$cargado));                        
                    
                }else{
                    echo json_encode(array('rst'=>2,'msj'=>'Error al subir archivo al servidor','file'=>''));       
                }
            }
        }else{
            echo json_encode(array('rst'=>2,'msj'=>'Error al abrir carpeta contenedora','file'=>''));       
        }   
    }
}
?>
