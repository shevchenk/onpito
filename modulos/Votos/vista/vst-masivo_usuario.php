<?
include_once("../../Includes/config.php"); 
require_once(_INCLUDE_PHP_.'ifrm-inicia_session.php');
?>  
<!DOCTYPE html>
<html><head>
    
	  <meta charset="<?php echo _CHARSET_; ?>">
    <title><?php echo _TITLE_; ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="Registro de los votos por mesa">
    <meta name="author" CONTENT="<?php echo _AUTOR_; ?>">

    <link type="text/css" rel="stylesheet" href="<?php echo _CSS_; ?>themes/<?php echo _COLOR_; ?>/css-sistema.php" id="estilo" />
    <link type="text/css" rel="stylesheet" href="<?php echo _CSS_; ?>jqgrid/ui.jqgrid.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo _CSS_; ?>fileupload/jquery.fileupload-ui.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo _CSS_; ?>bootstrap/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo _CSS_; ?>bootstrap/bootstrap-responsive.css">
    
    <script src="<?php echo _LIBRERIA_JS_; ?>jquery-1.7.0.min.js"></script>
    <script src="<?php echo _LIBRERIA_JS_; ?>jqueryui-1.8.min.js"></script>
    <script src="<?php echo _LIBRERIA_JS_; ?>bootstrap/bootstrap.js"></script>
    <script src="<?php echo _LIBRERIA_JS_; ?>jqgrid/js/i18n/grid.locale-es.js" ></script>
    <script src="<?php echo _LIBRERIA_JS_; ?>jqgrid/js/jquery.jqGrid.min.js" ></script>  
    <script src="<?php echo _LIBRERIA_JS_; ?>upload/jquery.fileupload-ui.js" ></script>
    <script src="<?php echo _LIBRERIA_JS_; ?>upload/jquery.fileupload.js" ></script>

    <script src="<?php echo _INCLUDE_JS_; ?>templates.js"></script>
    <script src="<?php echo _INCLUDE_JS_; ?>sistema.js"></script>
    
    <script src="../javascript/dao/dao-usuario_masivo.js"></script>
    <script src="../javascript/js/js-masivo_usuario.js"></script>
    
</head>
<body>	
	  <?php require_once(_INCLUDE_PHP_.'ifrm-cabecera.php'); ?>
    <?php require_once(_INCLUDE_PHP_.'ifrm-menu.php'); ?>
    
    <div class="bar_5 txt_temaM txt_11 sombratext1 brillohv">
      <span id="#ocultasubmenu" class="button_icon ui-corner-all anima1" onClick="_ocultaSubMenu()">
        <i class="icon-chevron-down"></i>
      </span>
      CARGAR USUARIOS&nbsp;<span class="icon_content icon_derblanc"></span>&nbsp;C. USUARIO MASIVO</div>
	<div class="container-fluid">
      <div class="row-fluid">
      	<!-- //////////////////////////////////SUB MENU////////////////////////////////////////////// -->        
        <div id="submenu" class="span2" style="display:none">
          <div class="tabbable tabs-left">
            <ul class="nav nav-tabs" style="width:100%">
              <li class="active">
                <a data-toggle="tab" href="#1A">
                <i class="icon-ok-sign"></i>CARGAR USUARIO</a>
              </li>
            </ul>
            <!-- El content fue movido a span10-->
          </div>
        </div>
        <!-- //////////////////////////////////CONTENEDOR////////////////////////////////////////////// -->
        <div id="contenido" class="span12">          
          <div class="tab-content">            
            <div id="1A" class="tab-pane active"><!-- /////////////SEGUNDA OPCION//////////////////// -->
           	  <div class="cont_titulo">
                CARGAR USUARIO MASIVO
              </div>
              <br>              
              <section>
              	<article>
                    <table align="center"><tr><td>
                    <fieldset style="border:double">
                    <legend class="ui-widget-content_jqgrid ui-corner-all"><b>CARGAR USUARIO MASIVO</b></legend>
                    <table id="table1">
                    <tr>
                        <td align="center" colspan="2">
                            <div style="margin:10px;">
                                <div id="file_uploadImportar" class="file_upload button_icon ui-corner-all" style="display:inline-block; height:20px;">
                                    <form action="" method="POST" enctype="multipart/form-data" class="file_upload" style="text-align:left">
                                        <input type="hidden" name="error" value="0" id="loadHeaderError" />
                                        <input type="hidden" name="error" value="" id="loadHeaderErrorMsg" />
                                        <input type="file" name="file[]" id="dirImportar" style="display:block">
                                            <button type="submit">Upload</button>
                                            <i class="input-lg">Seleccionar archivo TXT a Importar</i> 
                                            <i class="icon-search"></i>
                                    </form>
                                </div>
                            </div>
                            <div style="display:inline-block;margin:10px;">
                                <table id="filesImportar">
                                    <tbody>
                                        <tr class="file_upload_template" style="display:none;">
                                            <td class="file_upload_preview"></td>
                                            <td class="file_name"></td>
                                            <td class="file_size"></td>
                                            <td class="file_upload_progress"><div></div></td>

                                            <td class="file_upload_start"><button>Start</button></td>
                                            <td class="file_upload_cancel"><button>Cancel</button></td>
                                        </tr>
                                        <tr class="file_download_template" style="display:none;">
                                            <td class="file_download_preview"></td>
                                            <td class="file_name"><a></a></td>
                                            <td class="file_size"></td>
                                            <td class="file_download_delete" colspan="3"><button>Delete</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="file_upload_overall_progress"><div style="display: none; " class="ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="display: none; width: 0%; "></div></div></div>
                                <div class="file_upload_buttons"></div>
                            </div>
                            <div class="t-center">
                                <div id="msg_resultado_importar" style="display:none;vertical-align: middle;">
                                    <b>Archivo cargado:</b>
                                    <span id="spanImportar" style="border: 1px solid #888;padding: 2px 10px;"></span>
                                    <input type="hidden" id="hddFileImportar" value=""/>
                                    <a id="ProcImportar" class="btn btn-gris sombra-i" href="javascript:void(0)">PROCESAR</a>
                                    <a id="cancelaProcImportar" class="btn btn-gris sombra-i" href="javascript:void(0)">CANCELAR</a>
                                </div>
                            </div>
                        </td>
                    </tr>                     
                    </table>
                    </fieldset>
                </article>
              </section>
            </fieldset>
            </div><!--1A-->
          </div><!--Tab Content-->
        </div><!--Span-->
        
        <!--Bloqueo para Ajax-->
        <div id="layerOverlay_panel" class="layerOverlay" style="display:none;">
          <table width="100%" height="100%">
            <tr><td align="center" valign="middle">
              <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
              codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" 
              name="loading" width="60" height="60" align="middle" id="loading">
              <param name="allowScriptAccess" value="sameDomain" />
              <param name="allowFullScreen" value="false" />
              <param name="movie" value="loading.swf" />
              <param name="quality" value="high" />
              <param name="bgcolor" value="#000000" />
              <param name="wmode" value="transparent">
              <embed src="<?php echo _IMAGES_; ?>load/loading<?php echo rand(1,7);?>.swf" width="60" height="60" 
              align="middle" quality="high" bgcolor="#000000" name="loading" allowScriptAccess="sameDomain" 
              allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_es" 
              wmode="transparent" /></object>
            </td></tr>
          </table>
        </div>  
      </div><!--row-fluid-->
    </div><!--Container-fluid-->
    
    <footer style="text-align:center" class="bar_4 navbar-fixed-bottom txt_temaM txt_11 sombratext1 brillohv">
        <?php require_once(_INCLUDE_PHP_."ifrm-pie.php"); ?>
    </footer>
    
    <div id="layerMessage" class="layerMessage" style="display:none;" align="center"></div>
    <div id="layerOverlay" class="layerOverlay" style="display:none;"></div>
    <div id="layerLoading" class="layerLoading" style="display:none;"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" name="loading" width="60" height="60" align="middle" id="loading"><param name="allowScriptAccess" value="sameDomain" /><param name="allowFullScreen" value="false" /><param name="movie" value="loading.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" /><param name="wmode" value="transparent"><embed src="../images/load/loading<?=rand(1,7);?>.swf" width="60" height="60" align="middle" quality="high" bgcolor="#000000" name="loading" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_es" wmode="transparent" /></object></div>
</body>
</html>