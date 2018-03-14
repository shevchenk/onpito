<?php     
	require_once('../dao/daoMesa.php');
    	$daoMesa=new daoMesa();
    if($_POST['dao']!=''){
    	switch($_POST['dao']):
	        default:
	            echo json_encode(array('rst'=>3,'msj'=>'dao no encontrado'));
	    endswitch; 
    }
    elseif($_GET['dao']!=''){
    	switch($_GET['dao']):
		case 'jqgridMesa':
			$array=array();
			$array['idcentrovotacion']		=trim($_GET['idcentrovotacion']);
			$array['mesa']					=trim($_GET['mesa']);

			$page 	=$_GET["page"];
			$limit	=$_GET["rows"];
			$sidx	=$_GET["sidx"];
			$sord	=$_GET["sord"];

			$where	="";
			$param	=array();

				if( $array['idcentrovotacion']!='' ) {
					$where.=" AND m.idcentrovotacion='".$array['idcentrovotacion']."' ";
				}

				if( $array['mesa']!='' ) {
					$where.=" AND m.nombre LIKE '%".$array['mesa']."%' ";
				}

				if(!$sidx)$sidx=1 ; 
		
			$row 	=$daoMesa->jqgridMesaCount( $where );
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
			$data 		=$daoMesa->jqgridMesaRows($sidx, $sord, $start, $limit, $where);
			$dataRow 	=array();
				for($i=0;$i<count($data);$i++){
					array_push($dataRow, array("id"=>$data[$i]['idmesa'],"cell"=>array(
							$data[$i]['mesa']								
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
