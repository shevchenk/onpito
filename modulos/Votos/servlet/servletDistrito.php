<?php     
	require_once('../dao/daoDistrito.php');
    	$daoDistrito=new daoDistrito();
    if($_POST['dao']!=''){
    	switch($_POST['dao']):
	        default:
	            echo json_encode(array('rst'=>3,'msj'=>'dao no encontrado'));
	    endswitch; 
    }
    elseif($_GET['dao']!=''){
    	switch($_GET['dao']):
		case 'jqgridDistrito':
			$array=array();
			$array['distrito']		=trim($_GET['distrito']);
			$array['provincia']		=trim($_GET['provincia']);
			$array['departamento']	=trim($_GET['departamento']);

			$page 	=$_GET["page"];
			$limit	=$_GET["rows"];
			$sidx	=$_GET["sidx"];
			$sord	=$_GET["sord"];

			$where	="";
			$param	=array();

				if( $array['distrito']!='' ) {
					$where.=" AND d.nombre LIKE '%".$array['distrito']."%' ";
				}

				if( $array['provincia']!='' ) {
					$where.=" AND p.nombre LIKE '%".$array['provincia']."%' ";
				}

				if( $array['departamento']!='' ) {
					$where.=" AND de.nombre LIKE '%".$array['departamento']."%' ";
				}

				if(!$sidx)$sidx=1 ; 
		
			$row 	=$daoDistrito->jqgridDistritoCount( $where );
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
			$data 		=$daoDistrito->jqgridDistritoRows($sidx, $sord, $start, $limit, $where);
			$dataRow 	=array();
				for($i=0;$i<count($data);$i++){
					array_push($dataRow, array("id"=>$data[$i]['iddistrito'],"cell"=>array(								
							$data[$i]['distrito'],
							$data[$i]['provincia'],
							$data[$i]['departamento']								
							)
						)
					);
				}
			
			$response["rows"]=$dataRow;
			echo json_encode($response);
		break;

		case 'jqgridDistritoR':
			$array=array();
			$array['distrito']		=trim($_GET['distrito']);
			$array['provincia']		=trim($_GET['provincia']);
			$array['departamento']	=trim($_GET['departamento']);

			$page 	=$_GET["page"];
			$limit	=$_GET["rows"];
			$sidx	=$_GET["sidx"];
			$sord	=$_GET["sord"];

			$where	="";
			$param	=array();

				if( $array['distrito']!='' ) {
					$where.=" AND d.nombre LIKE '%".$array['distrito']."%' ";
				}

				if( $array['provincia']!='' ) {
					$where.=" AND p.nombre LIKE '%".$array['provincia']."%' ";
				}

				if( $array['departamento']!='' ) {
					$where.=" AND de.nombre LIKE '%".$array['departamento']."%' ";
				}

				if(!$sidx)$sidx=1 ; 
		
			$row 	=$daoDistrito->jqgridDistritoCount( $where );
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
			$data 		=$daoDistrito->jqgridDistritoRows($sidx, $sord, $start, $limit, $where);
			$dataRow 	=array();
				for($i=0;$i<count($data);$i++){
					array_push($dataRow, 
						array("id"=>$data[$i]['iddistrito'],
							"cell"=>array(								
							$data[$i]['distrito'],
							$data[$i]['provincia'],
							$data[$i]['departamento']								
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
