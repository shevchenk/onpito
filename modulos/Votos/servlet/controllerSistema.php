<?php
    session_start();
    date_default_timezone_set('America/Lima');
    
    require_once('../../../conexion/creadorConexion.php');
    require_once('../../../conexion/MySqlConexion.php');
    require_once('../../../conexion/config.php');
    
    switch($_REQUEST['servlet']):
        case 'distrito':
            include_once('servletDistrito.php');
        break;
        case 'centro_votacion':
            include_once('servletCentroVotacion.php');
        break;
        case 'mesa':
            include_once('servletMesa.php');
        break;
        case 'participacion':            
            include_once('servletParticipacion.php');
        break;
        case 'voto_masivo':            
            include_once('servletVotoMasivo.php');
        break;        
        case 'usuario_masivo':            
            include_once('servletUsuarioMasivo.php');
        break;        
        default:
            echo json_encode(array('rst'=>3,'msj'=>'servlet no encontrado'));
            exit();                    
    endswitch;
	
?>
