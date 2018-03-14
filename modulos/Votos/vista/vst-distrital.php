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

    <script src="<?php echo _INCLUDE_JS_; ?>templates.js"></script>
    <script src="<?php echo _INCLUDE_JS_; ?>sistema.js"></script>
    
    <script src="../javascript/jqgrid/jqgrid-distrito.js"></script>
    <script src="../javascript/jqgrid/jqgrid-centro_votacion.js"></script>
    <script src="../javascript/jqgrid/jqgrid-mesa.js"></script>    
    <script src="../javascript/dao/dao-participacion.js"></script>
    <script src="../javascript/js/js-distrital.js"></script>
    
</head>
<body>	
	  <?php require_once(_INCLUDE_PHP_.'ifrm-cabecera.php'); ?>
    <?php require_once(_INCLUDE_PHP_.'ifrm-menu.php'); ?>
    
    <div class="bar_5 txt_temaM txt_11 sombratext1 brillohv">
      <span id="#ocultasubmenu" class="button_icon ui-corner-all anima1" onClick="_ocultaSubMenu()">
        <i class="icon-chevron-down"></i>
      </span>
      REGISTROS DE VOTOS&nbsp;<span class="icon_content icon_derblanc"></span>&nbsp; ACTA CAND. DIST.</div>
	<div class="container-fluid">
      <div class="row-fluid">
      	<!-- //////////////////////////////////SUB MENU////////////////////////////////////////////// -->        
        <div id="submenu" class="span2" style="display:none">
          <div class="tabbable tabs-left">
            <ul class="nav nav-tabs" style="width:100%">
              <li class="active">
                <a data-toggle="tab" href="#1A">
                <i class="icon-ok-sign"></i>ACTA CAND. DIST.</a>
              </li>
            </ul>
            <!-- El content fue movido a span10-->
          </div>
        </div>
        <!-- //////////////////////////////////CONTENEDOR////////////////////////////////////////////// -->
        <div id="contenido" class="span12">          
          <div class="tab-content">            
            <div id="1A" class="tab-pane active"><!-- /////////////SEGUNDA OPCION//////////////////// -->
           	  <div class="cont_titulo label-warning">
                <b><font size="+1">REGISTRO DE ACTAS DE CANDIDATO DISTRITAL</font></b>
              </div>
              <br>              
              <div class="span12">
                <label><b>DISTRITO:</b></label>
                <input type="text" class="input-xxlarge input-sm" disabled placeholder="BUSCA DISTRITO" id="txt_distrito">
                <input type="hidden" id="txt_iddistrito">
                <span class="button_icon ui-corner-all" onClick="Mostrar_Ocultar('listado_distrito');">
                  <i class='input-lg'>BUSCA DIST.</i>
                  <i class="icon-search"></i>                
                </span>
              </div>
              <br>
              <div id="listado_distrito" style="display:none">
                <section>
                  <article style="margin-right:3px">
                    <table id="table_distrito"></table>
                    <div id="pager_table_distrito"></div>
                  </article>
                </section>
              </div>
              <br>
              <div class="span12">
                <label><b>CENTRO DE VOTACIÓN:</b></label>
                <input type="text" class="input-xxlarge input-sm" disabled placeholder="BUSCA C. VOTACIÓN" id="txt_centro_votacion">
                <input type="hidden" id="txt_idcentrovotacion">
                <span style="display:none" id="btnCentroVotacion" class="button_icon ui-corner-all" onClick="Mostrar_Ocultar('listado_centro_votacion');">
                  <i class='input-lg'>BUSCA C. VOT.</i>
                  <i class="icon-search"></i>
                </span>
              </div>
              <br>
              <div id="listado_centro_votacion" style="display:none">
                <section>
                  <article style="margin-right:3px">
                    <table id="table_centro_votacion"></table>
                    <div id="pager_table_centro_votacion"></div>
                  </article>
                </section>
              </div>              
              <br>
              <div class="span12">
                <label><b>NRO MESA:</b></label>
                <input type="text" class="input-xxlarge input-sm" disabled placeholder="BUSCA MESA" id="txt_mesa">
                <input type="hidden" id="txt_idmesa">
                <span style="display:none" id="btnMesa" class="button_icon ui-corner-all" onClick="Mostrar_Ocultar('listado_mesa');">
                  <i class='input-lg'>BUSCA MESA</i>
                  <i class="icon-search"></i>
                </span>
              </div>
              <br>
              <div id="listado_mesa" style="display:none">
                <section>
                  <article style="margin-right:3px">
                    <table id="table_mesa"></table>
                    <div id="pager_table_mesa"></div>
                  </article>
                </section>
              </div>  
              <br>
              <div class="span12">
                <label><b>N° VOTANTES:</b></label>
                <input type="text" class="input-mediun input-sm" id="nrovot">              
                <label><b>N° VOTOS EMITIDOS:</b></label>
                <input type="text" class="input-mediun input-sm" id="nrovotemitidos" disabled>
              </div>
              <div class="span12 escondefinal" style="display:none">
                <textarea class="label label-warning span6">ACTA ANULADA POR NO COINCIDIR EL NUMERO DE VOTOS EMITIDOS AL NUMERO DE VOTANTES
                DESEA GUARDAR APESAR QUE LA ACTA ESTA ANULADA?                 
                </textarea>                
              </div>  
              <span class="button_icon ui-corner-all escondefinal" onclick="GuardarFinal()" style="display:none">
                  <i class="input-lg">GUARDAR ACTA ANULADA</i>
                  <i class="icon-envelope"></i>
              </span>
              <span class="button_icon ui-corner-all escondefinal" onclick="CancelarFinal()" style="display:none">
                <i class="input-lg">CANCELAR</i>
                <i class="icon-trash"></i>
              </span>           
              <br><br>
              <fieldset>
              <legend class="ui-widget-content_jqgrid ui-corner-all">REGISTRO&nbsp;<i class="icon-list"></i></legend>
              <section>
              	<article id="listado_partidos" style="display:none">
                	<table class="table table-hover" id="listaPartidos">
                    <th class="input-mini" style="text-align:center">
                      LOGO
                    </th>
                    <th class="span4" style="text-align:center">
                      PARTIDOS POLÍTICOS
                    </th>
                    <th class="span2" style="text-align:center">
                      VOTOS
                    </th>
                    <tr>
                    	<td colspan="3" style="text-align:center">
                        <div class="bar_contenido button_icon ui-corner-all" onclick="GuardarVotos();">
            						  <i class='input-lg'>Guardar</i>
            						  <i class="icon-envelope"></i>
            						</div>
                        </td>
                    </tr>
                    </table>
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