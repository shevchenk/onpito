<?php     
	require_once('../dao/daoCentroVotacion.php');
    	$daoCentroVotacion=new daoCentroVotacion();
    if($_POST['dao']!=''){
    	switch($_POST['dao']):
	        default:
	            echo json_encode(array('rst'=>3,'msj'=>'dao no encontrado'));
	    endswitch; 
    }
    elseif($_GET['dao']!=''){
    	switch($_GET['dao']):
		case 'jqgridCentroVotacion':
			$array=array();
			$array['centro_votacion']		=trim($_GET['centro_votacion']);
			$array['iddistrito']			=trim($_GET['iddistrito']);

			$page 	=$_GET["page"];
			$limit	=$_GET["rows"];
			$sidx	=$_GET["sidx"];
			$sord	=$_GET["sord"];

			$where	="";
			$param	=array();

				if( $array['centro_votacion']!='' ) {
					$where.=" AND c.nombre LIKE '%".$array['centro_votacion']."%' ";
				}

				if( $array['iddistrito']!='' ) {
					$where.=" AND d.iddistrito='".$array['iddistrito']."' ";
				}

				if(!$sidx)$sidx=1 ; 
		
			$row 	=$daoCentroVotacion->jqgridCentroVotacionCount( $where );
			$count 	=$row[0]['count'];

				if($count>0) {
					$total_pages=ceil($count/$limit);
				}
				else{
					$limit=0;
					$total_pages=0;
				}
		
				if($page>$total_pages) $page=$total_pages;
		
			$start 	=$page*$limit-$limit;
					
			$response 	=array("page"=>$page,"total"=>$total_pages,"records"=>$count);
			$data 		=$daoCentroVotacion->jqgridCentroVotacionRows($sidx, $sord, $start, $limit, $where);
			$dataRow 	=array();
				for($i=0;$i<count($data);$i++){
					array_push($dataRow, array("id"=>$data[$i]['idcentrovotacion'],"cell"=>array(								
							$data[$i]['centro_votacion']							
							)
						)
					);
				}
			
			$response["rows"]=$dataRow;
			echo json_encode($response);
		break;

		default:
            echo json_encode(array('rst'=>3,'msj'=>'dao no encontrado'));
   		endswitch;	
    }

            
?>
