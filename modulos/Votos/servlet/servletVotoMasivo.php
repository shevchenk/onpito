<?php     
	require_once('../dao/daoVotoMasivo.php');
    	$daoVotoMasivo=new daoVotoMasivo();
    if($_POST['dao']!=''){
    	switch($_POST['dao']):
    		case 'procesaArchivoImportarProvincial':
                $file=$_POST['file'];
                $idtipovoto='1';
                echo json_encode($daoVotoMasivo->procesaArchivoImportar($file,$idtipovoto));
                break;
            case 'procesaArchivoImportarDistrital':
                $file=$_POST['file'];
                $idtipovoto='2';
                echo json_encode($daoVotoMasivo->procesaArchivoImportar($file,$idtipovoto));
                break;
            case 'uploadImportar':
                $daoVotoMasivo->uploadImportar($_POST, $_FILES);
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
