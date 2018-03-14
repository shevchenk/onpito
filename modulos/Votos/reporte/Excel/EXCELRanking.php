<?php
/*conexion*/
require_once('../../../../conexion/creadorConexion.php');
require_once('../../../../conexion/MySqlConexion.php');
require_once('../../../../conexion/config.php');

require_once '../../../Librerias/PHP/Excel/PHPExcel.php';
require_once '../../../Librerias/PHP/Excel/PHPExcel/IOFactory.php';

$az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
$azcount=array(5,17,17,17,12,12,17,22,16,15,17,18,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15);

$array=array();
$array['idtipovoto']=trim($_GET['idtipovoto']);
$array['iddistrito']=trim($_GET['iddistrito']);
$array['estado']=trim($_GET['estado']);
$array['reporte']=trim($_GET['reporte']);
$db=creadorConexion::crear('MySql');

        $and="";
        $group=" pa.idpartido ";
        if($array['iddistrito']!='' OR $array['idtipovoto']=='2'){
            $and = "AND d.iddistrito='$array[iddistrito]'";
            $group=" v.idparticipacion ";
        }

        $sql="  SELECT count(m.idmesa) cant
                FROM mesas m
                INNER JOIN centro_votaciones c ON c.idcentrovotacion=m.idcentrovotacion
                INNER JOIN distritos d ON d.iddistrito=c.iddistrito
                WHERE d.idprovincia='127'
                $and 
            ";

        $estado="";
        if($array['estado']!=''){
            $estado=" AND v.estado='$array[estado]' ";
        }
            
        $db->setQuery($sql);
        $datos1=$db->loadObjectList();
        $tmesas=$datos1[0]['cant'];

        $sql="  SELECT IFNULL(sum(v.nrovoto),'0') Total,count(DISTINCT(v.idmesa)) cantm
                FROM votaciones v
                INNER JOIN participaciones p ON v.idparticipacion=p.idparticipacion 
                INNER JOIN distritos d ON d.iddistrito=p.iddistrito 
                WHERE v.idtipovoto='$array[idtipovoto]'                
                AND d.idprovincia='127' 
                 $estado 
                 $and 
            ";
        $db->setQuery($sql);
        $datos1=$db->loadObjectList();
        $totaldatos=$datos1[0]['Total'];
        $totalmesas=$datos1[0]['cantm'];
        $porcentajemesas=round(($totalmesas/$tmesas),4)*100;
        //echo $sql;echo "<br>";

        $sql="  SELECT v.idparticipacion,pa.imagen,pa.nombre partido,sum(v.nrovoto) votos,$totaldatos,
                round((sum(v.nrovoto)/$totaldatos)*100) porcentaje
                FROM votaciones v
                INNER JOIN participaciones p ON v.idparticipacion=p.idparticipacion
                INNER JOIN distritos d ON d.iddistrito=p.iddistrito 
                INNER JOIN partidos pa ON pa.idpartido=p.idpartido
                WHERE v.idtipovoto='$array[idtipovoto]' -- Para Alcalde                 
                AND d.idprovincia='127' 
                 $estado 
                 $and 
                GROUP BY $group 
                ORDER BY votos DESC,p.nroorden";
        //echo $sql;echo "<br>";
        $db->setQuery($sql);
        $datos=$db->loadObjectList();
        
        $texto='VOTOS AL '.$porcentajemesas.'% => '.$totalmesas.' MESAS COMPUTADAS DE '.$tmesas;
        
/*
echo count($control)."-";
echo $sql;
*/
date_default_timezone_set('America/Lima');

$styleThinBlackBorderOutline = array(
	'borders' => array(
		'outline' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => 'FF000000'),
		),
	),
);
$styleThinBlackBorderAllborders = array(
	'borders' => array(
		'allborders' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => 'FF000000'),
		),
	),
);
$styleAlignmentBold= array(
	'font'    => array(
		'bold'      => true
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	),
);
$styleAlignment= array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	),
);
$styleAlignmentRight= array(
	'font'    => array(
		'bold'      => true
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	),
);
$styleColor = array(
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,		
		'startcolor' => array(
			'argb' => 'FFA0A0A0',
			),
		'endcolor' => array(
			'argb' => 'FFFFFFFF',
			)
	),
);

function color(){
	$color=array(0,1,2,3,4,5,6,7,8,9,"A","B","C","D","E","F");
	$dcolor="";
	for($i=0;$i<6;$i++){
	$dcolor.=$color[rand(0,15)];
	}
	$num='FA'.$dcolor;
	
	$styleColorFunction = array(
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,		
		'startcolor' => array(
			'argb' => $num,
			),
		'endcolor' => array(
			'argb' => 'FFFFFFFF',
			)
		),
	);
return $styleColorFunction;
}

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Jorge Salcedo")
							 ->setLastModifiedBy("Jorge Salcedo")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

$objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

$objPHPExcel->getActiveSheet()->setCellValue("B2","REPORTE RANKING EN % DE VOTOS ".$array['reporte']);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(16);
$objPHPExcel->getActiveSheet()->mergeCells('B2:F2');
$objPHPExcel->getActiveSheet()->getStyle('B2:F2')->applyFromArray($styleAlignmentBold);
$objPHPExcel->getActiveSheet()->setCellValue("B4",$texto);
$objPHPExcel->getActiveSheet()->getStyle('B4')->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->mergeCells('B4:F4');
$objPHPExcel->getActiveSheet()->getStyle('B4:F4')->applyFromArray($styleAlignmentBold);

$cabecera=array('','RANKING','LOGO','PARTIDOS','VOTOS','%');

	for($i=0;$i<count($cabecera);$i++){
	$objPHPExcel->getActiveSheet()->setCellValue($az[$i]."5",$cabecera[$i]);
	$objPHPExcel->getActiveSheet()->getStyle($az[$i]."5")->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension($az[$i])->setWidth($azcount[$i]);
	}
$objPHPExcel->getActiveSheet()->getStyle('B4:'.$az[($i-1)].'5')->applyFromArray($styleAlignmentBold);


$objPHPExcel->getActiveSheet()->getStyle("B4:".$az[($i-1)]."5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');



//$objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[($i-1)].'2')->applyFromArray($styleColor);

$valorinicial=5;
$cont=0;
//$objPHPExcel->getActiveSheet()->getStyle("A".$valorinicial.":O".$valorinicial)->getFont()->getColor()->setARGB("FFF0F0F0");  es para texto
foreach($datos as $r){	
$cont++;
$valorinicial++;
$objPHPExcel->getActiveSheet()->getRowDimension($valorinicial)->setRowHeight(27.5);
//$objPHPExcel->getActiveSheet()->setCellValue("B".$valorinicial,$r['imagen']);
$objPHPExcel->getActiveSheet()->setCellValue("B".$valorinicial,$cont." °");
$objPHPExcel->getActiveSheet()->setCellValue("D".$valorinicial,$r['partido']);
$objPHPExcel->getActiveSheet()->setCellValue("E".$valorinicial,$r['votos']);

$objPHPExcel->getActiveSheet()->setCellValue("F".$valorinicial,($r['porcentaje']/100));

$imagen="";
	if(file_exists('../../../../images/Votos/'.$r['imagen'])){
		$objDrawing = new PHPExcel_Worksheet_Drawing();
		$objDrawing->setName('PHPExcel');
		$objDrawing->setDescription('PHPExcel');
		$objDrawing->setPath('../../../../images/Votos/'.$r['imagen']);		
		//$objDrawing->setHeight(30);
		$objDrawing->setWidth(35);
		$objDrawing->setCoordinates("C".$valorinicial);
		$objDrawing->setOffsetX(10);
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	}

}
$objPHPExcel->getActiveSheet()->getStyle('F6:F'.$valorinicial)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE);
$objPHPExcel->getActiveSheet()->getStyle('B4:F'.$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);
$objPHPExcel->getActiveSheet()->getStyle('E2:F'.$valorinicial)->applyFromArray($styleAlignment);
$objPHPExcel->getActiveSheet()->getStyle('B2:B'.$valorinicial)->applyFromArray($styleAlignment);


$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
////////////////////////////////////////////////////////////////////////////////////////////////

$objPHPExcel->getActiveSheet()->setTitle('Ranking');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Ranking_'.date("Y-m-d_H-i-s").'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>