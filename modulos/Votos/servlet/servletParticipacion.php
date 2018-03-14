<?php     
	require_once('../dao/daoParticipacion.php');
    	$daoParticipacion=new daoParticipacion();
    if($_POST['dao']!=''){
    	switch($_POST['dao']):
	    	case 'listarPartidosProvincial':
				$array=array();
				$array['iddistrito']	=trim($_POST['iddistrito']);
				$array['idtipovoto']	=1;				
				echo json_encode($daoParticipacion->listarPartidos($array));
				break;
			case 'listarPartidosDistrital':
				$array=array();
				$array['iddistrito']	=trim($_POST['iddistrito']);
				$array['idtipovoto']	=2;				
				echo json_encode($daoParticipacion->listarPartidos($array));
				break;
			case 'listarPartidosRegional':
				$array=array();
				$array['iddistrito']	=trim($_POST['iddistrito']);
				$array['idtipovoto']	=3;				
				echo json_encode($daoParticipacion->listarPartidos($array));
				break;
			case 'listarPartidosPD':
				$array=array();
				$array['iddistrito']	=trim($_POST['iddistrito']);			
				echo json_encode($daoParticipacion->listarPartidosPD($array));
				break;
			case 'guardarRegistrosProvincial':
				$array=array();
				$array['idmesa']		=trim($_POST['idmesa']);
				$array['idtipovoto']	='1';
				$array['datos']			=trim($_POST['datos']);	
				$array['estado']		=trim($_POST['estado']);			
				echo json_encode($daoParticipacion->guardarRegistros($array));
				break;
			case 'guardarRegistrosDistrital':
				$array=array();
				$array['idmesa']		=trim($_POST['idmesa']);
				$array['idtipovoto']	='2';
				$array['datos']			=trim($_POST['datos']);	
				$array['estado']		=trim($_POST['estado']);			
				echo json_encode($daoParticipacion->guardarRegistros($array));
				break;
			case 'guardarRegistrosRegional':
				$array=array();
				$array['idmesa']		=trim($_POST['idmesa']);
				$array['idtipovoto']	='3';
				$array['datos']			=trim($_POST['datos']);	
				$array['estado']		=trim($_POST['estado']);			
				echo json_encode($daoParticipacion->guardarRegistros($array));
				break;
			case 'guardarRegistrosProvincialDistrital':
				$array=array();
				$array['idmesa']		=trim($_POST['idmesa']);
				$array['idtipovoto']	="1^^2";
				$array['datos']			=trim($_POST['datos']);	
				$array['estado']		=trim($_POST['estado']);			
				echo json_encode($daoParticipacion->guardarRegistros($array));
				break;
			case 'listarPartidosProvincialRanking':
				$array=array();
				$array['idtipovoto']	='1';	
				$array['iddistrito']	=trim($_POST['iddistrito']);
				$array['estado']		=trim($_POST['estado']);
				echo json_encode($daoParticipacion->listarPartidosRanking($array));
				break;
			case 'listarPartidosDistritalRanking':
				$array=array();
				$array['idtipovoto']	='2';			
				$array['iddistrito']	=trim($_POST['iddistrito']);
				$array['estado']		=trim($_POST['estado']);		
				echo json_encode($daoParticipacion->listarPartidosRanking($array));
				break;
			case 'listarPartidosRegionalRanking':
				$array=array();
				$array['idtipovoto']	='3';			
				$array['iddistrito']	=trim($_POST['iddistrito']);		
				echo json_encode($daoParticipacion->listarPartidosRanking($array));
				break;
			case 'listarDistritosComputados':		
				echo json_encode($daoParticipacion->listarDistritosComputados($array));
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
