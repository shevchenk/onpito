<?php
/*conexion*/
require_once('../../../../conexion/creadorConexion.php');
require_once('../../../../conexion/MySqlConexion.php');
require_once('../../../../conexion/config.php');

require_once '../../../Librerias/PHP/Excel/PHPExcel.php';
require_once '../../../Librerias/PHP/Excel/PHPExcel/IOFactory.php';

$az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
$azcount=array(5,17,17,17,12,12,17,22,16,15,17,18,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15);

$db=creadorConexion::crear('MySql');

        $sql="  SELECT d.nombre distrito,count(m.idmesa) cantm,IFNULL(mvp.cantmvp,'0') cantmvp,IFNULL(mvd.cantmvd,'0') cantmvd
                ,ROUND((IFNULL(mvp.cantmvp,'0')/count(m.idmesa))*100,2) pp,ROUND((IFNULL(mvd.cantmvd,'0')/count(m.idmesa))*100,2) pd
                FROM distritos d
                INNER JOIN centro_votaciones c ON (d.iddistrito=c.iddistrito)
                INNER JOIN mesas m ON (m.idcentrovotacion=c.idcentrovotacion) 
                LEFT JOIN (
                    SELECT p.iddistrito,count(DISTINCT(v.idmesa)) cantmvp
                    FROM votaciones v
                    INNER JOIN participaciones p ON (v.idparticipacion=p.idparticipacion)
                    WHERE v.idtipovoto='1'
                    GROUP BY p.iddistrito
                ) mvp ON (mvp.iddistrito=d.iddistrito)
                LEFT JOIN (
                    SELECT p.iddistrito,count(DISTINCT(v.idmesa)) cantmvd
                    FROM votaciones v
                    INNER JOIN participaciones p ON (v.idparticipacion=p.idparticipacion)
                    WHERE v.idtipovoto='2'
                    GROUP BY p.iddistrito
                ) mvd ON (mvd.iddistrito=d.iddistrito)
                WHERE idprovincia=127
                GROUP BY d.iddistrito";
        //echo $sql;echo "<br>";
        $db->setQuery($sql);
        $datos=$db->loadObjectList();
        
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

$objPHPExcel->getActiveSheet()->setCellValue("B2","REPORTE DISTRITOS % DE MESAS COMPUTADAS");
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(16);
$objPHPExcel->getActiveSheet()->mergeCells('B2:G2');
$objPHPExcel->getActiveSheet()->getStyle('B2:G2')->applyFromArray($styleAlignmentBold);

$cabecera=array('','DISTRITO','TOTAL MESAS','M. COMP. PROV.','M. COMP. DIST.','% AVANCE PROV.','% AVANCE DIST.');
 	 	 	 	 	 
	for($i=0;$i<count($cabecera);$i++){
	$objPHPExcel->getActiveSheet()->setCellValue($az[$i]."5",$cabecera[$i]);
	$objPHPExcel->getActiveSheet()->getStyle($az[$i]."5")->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension($az[$i])->setWidth($azcount[$i]);
	}
$objPHPExcel->getActiveSheet()->getStyle('B5:'.$az[($i-1)].'5')->applyFromArray($styleAlignmentBold);


$objPHPExcel->getActiveSheet()->getStyle("B5:".$az[($i-1)]."5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');



//$objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[($i-1)].'2')->applyFromArray($styleColor);

$valorinicial=5;
$cont=0;

foreach($datos as $r){	
$cont++;
$valorinicial++;
$objPHPExcel->getActiveSheet()->setCellValue("B".$valorinicial,$r['distrito']);
$objPHPExcel->getActiveSheet()->setCellValue("C".$valorinicial,$r['cantm']);
$objPHPExcel->getActiveSheet()->setCellValue("D".$valorinicial,$r['cantmvp']);
$objPHPExcel->getActiveSheet()->setCellValue("E".$valorinicial,$r['cantmvd']);
$objPHPExcel->getActiveSheet()->setCellValue("F".$valorinicial,($r['pp'])/100);
$objPHPExcel->getActiveSheet()->setCellValue("G".$valorinicial,($r['pd'])/100);
}
$objPHPExcel->getActiveSheet()->getStyle('F6:G'.$valorinicial)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00);
$objPHPExcel->getActiveSheet()->getStyle('B5:G'.$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);
$objPHPExcel->getActiveSheet()->getStyle('F6:G'.$valorinicial)->applyFromArray($styleAlignment);


$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

////////////////////////////////////////////////////////////////////////////////////////////////

$objPHPExcel->getActiveSheet()->setTitle('Distrito_Computadas');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Distrito_Computadas_'.date("Y-m-d_H-i-s").'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>