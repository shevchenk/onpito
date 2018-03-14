<?php     
	require_once('../dao/daoUsuarioMasivo.php');
    	$daoUsuarioMasivo=new daoUsuarioMasivo();
    if($_POST['dao']!=''){
    	switch($_POST['dao']):
    		case 'procesaArchivoImportar':
                $file=$_POST['file'];
                echo json_encode($daoUsuarioMasivo->procesaArchivoImportar($file));
                break;
            case 'uploadImportar':
                $daoUsuarioMasivo->uploadImportar($_POST, $_FILES);
                break;
		    default:
	            echo json_encode(array('rst'=>3,'msj'=>'dao no encontrado'));
	            exit();
	    endswitch; 
    }
    elseif($_GET['dao']!=''){
    	switch($_GET['dao']):
			default:
	            echo json_encode(array('rst'=>3,'msj'=>'dao no encontrado'));
	            exit();
   		endswitch;	
    }

            
?>
