<?php 
include_once("../../Includes/config.php"); 
require_once(_INCLUDE_PHP_.'ifrm-inicia_session.php');
?>
<!DOCTYPE html>
<html><head>
	<meta charset="<?php echo _CHARSET_; ?>">
    <title><?php echo _TITLE_; ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="Inicio de la WEB">
    <meta name="author" CONTENT="<?php echo _AUTOR_; ?>">
    
    <link type="text/css" rel="stylesheet" href="<?php echo _CSS_; ?>themes/<?php echo _COLOR_; ?>/css-sistema.php" id="estilo" />
    <link type="text/css" rel="stylesheet" href="<?php echo _CSS_; ?>jqgrid/ui.jqgrid.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo _CSS_; ?>fileupload/jquery.fileupload-ui.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo _CSS_; ?>bootstrap/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo _CSS_; ?>bootstrap/bootstrap-responsive.css">
    
    <!--<script src="../js/includes/jquery.min.js"></script>-->
    <script src="<?php echo _LIBRERIA_JS_; ?>jquery-1.7.0.min.js"></script>
    <script src="<?php echo _LIBRERIA_JS_; ?>jqueryui-1.8.min.js"></script>
    <script src="<?php echo _LIBRERIA_JS_; ?>bootstrap/bootstrap.js"></script>
  
    <script src="<?php echo _INCLUDE_JS_; ?>templates.js"></script>
    <script src="<?php echo _INCLUDE_JS_; ?>sistema.js"></script>
    
    <script src="../javascript/js/js-inicio.js"></script>
    
</head>
<body>	
	<?php require_once(_INCLUDE_PHP_.'ifrm-cabecera.php'); ?>
    <?php require_once(_INCLUDE_PHP_.'ifrm-menu.php'); ?>
    
    <div class="bar_5 txt_temaM txt_11 sombratext1 brillohv">
      <!--<span id="#ocultasubmenu" class="button_icon ui-corner-all anima1" onClick="_ocultaSubMenu()">
        <i class="icon-chevron-down"></i>
      </span>-->
      INICIO&nbsp;<span class="icon_content icon_derblanc"></span>&nbsp;PÁGINA PRINCIPAL</div>    
	<div class="container-fluid">
    </div><!--Container-fluid-->
    
    <footer style="text-align:center" class="bar_4 navbar-fixed-bottom txt_temaM txt_11 sombratext1 brillohv">
        <?php require_once(_INCLUDE_PHP_."ifrm-pie.php"); ?>
    </footer>
    
    <div id="layerMessage" class="layerMessage" style="display:none;" align="center"></div>
    <div id="layerOverlay" class="layerOverlay" style="display:none;"></div>
    <div id="layerLoading" class="layerLoading" style="display:none;"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" name="loading" width="60" height="60" align="middle" id="loading"><param name="allowScriptAccess" value="sameDomain" /><param name="allowFullScreen" value="false" /><param name="movie" value="loading.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" /><param name="wmode" value="transparent"><embed src="../images/load/loading<?=rand(1,7);?>.swf" width="60" height="60" align="middle" quality="high" bgcolor="#000000" name="loading" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_es" wmode="transparent" /></object></div>
</body>
</html>