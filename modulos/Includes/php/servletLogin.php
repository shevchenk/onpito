<?php
session_start();
include_once('../../../conexion/config.php');
include_once('../../../conexion/creadorConexion.php');
include_once('../../../conexion/MySqlConexion.php');
include_once('mysqlLoginDAO.php');

$daoLogin=new mysqlLoginDAO;
switch ($_POST['accion']):
    case 'check':
        $array=array();
        $array['dni']=trim($_POST['dni']);
        $array['password']=trim($_POST['password']);
        
        $dataUsuario=$daoLogin->loginUsuario($array);
        if(count($dataUsuario)>0){
            $cabecera="";
            $menu="";
            $listados="";

            foreach($dataUsuario as $r){
                
                if($cabecera!=$r['cabecera']){
                    if($cabecera!=''){
                        $menu=str_replace("<listados>",$listados,$menu);
                        $listados="";
                    }
                $menu.='<li class="divider-vertical"></li>'
                      .'<li id="'.$r['cursor'].'" class="dropdown">'
                      .'    <a href="#" class="dropdown-toggle ui-corner-all hover1" data-toggle="dropdown">'
                      .     $r['cabecera'].' <b class="caret"></b>'
                      .'    </a>'
                      .'    <ul class="dropdown-menu">'
                      .'    <listados>'
                      .'    </ul>'
                      .'</li>'; 
                $cabecera=$r['cabecera'];
                }
                $listados.='<li><a href="'.$r['url'].'">'.$r['opcion'].'</a></li>';
            }
            $menu=str_replace("<listados>",$listados,$menu);

            $_SESSION['SISTEMA']['idusuario']=$dataUsuario[0]['idusuario'];
            $_SESSION['SISTEMA']['usuario']=$dataUsuario[0]['usuario'];
            $_SESSION['SISTEMA']['iddistrito']=$dataUsuario[0]['iddistrito'];
            $_SESSION['SISTEMA']['menu']=$menu;
			echo json_encode(array('rst'=>1,'msg'=>'Ok'));
        }
		else{
            echo json_encode(array('rst'=>2,'msg'=>'Verifique Usuario y Contraseña'));
        }										
    break;				
    default:
        echo json_encode(array('rst'=>3,'msg'=>'action no encontrado'));
endswitch;
?>

