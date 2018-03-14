<?php
$f=1;
echo <<<FINCSS
body{margin:0px;background-image:url('../../../images/fondo.jpg'); background-repeat: no-repeat; background-attachment: fixed}
/***FIELDSET***/
fieldset{border:1px dotted $borde2;color:$txt1;}
/*****LOGIN*****/
.layerMessage_index{position:absolute;width:200px;height:35px;margin-left:125px;margin-top:-25px;}
.bodyL{background-image:url('../../../images/fondos/f$f.jpg')}
.imgGradienteLogin{background:#000;opacity:0.7;height:50px;width:100%;position:fixed;}
.login{left:0px;top:30%;position:absolute;display:table;text-align:left;clear: both;padding: 20px 30px 25px 20px;vertical-align:50%;background-image:url("../../../images/pto_negro.png");width:250px}
.dataLogin{margin-left: 105px;}
.icon_login{background-image: url("../../../images/login.png");background-repeat:no-repeat;width:100px;height: 124px;position:fixed;}
.icon_login1{background-image: url("../../../images/login1.png");background-repeat:no-repeat;width:100px;height: 124px;position:fixed;}
/**NOTAS**/
.divNotas{background: url("../../img/focoBlanco50x60.png") no-repeat scroll 0px 0px #ffffec;border: 1px solid #EEEECA;padding: 15px 30px 0px 50px;}
.divNotas ul{margin: 10px 0 10px 20px;padding: 0 0 0 5px;}
.divNotas ul li{/*background: url("$diriconmap2") no-repeat scroll 0px -241px transparent;*/list-style-type: none outside none;padding: 0 0 3px 20px;}
.divNotas:hover{background: url("../../img/focoAmarillo50x60.png") no-repeat scroll 0px 0px #ffffdd;}
/****HOVER****/
.hover1{}
.hover1:hover{background: url("images/content-hover.png") repeat-x scroll 50% 50% #DBDBDD;font-weight: normal;}
.hv_icon{display: inline-block;vertical-align: middle;margin-top:-2px}
.hv_icon:hover{border:1px solid $borde2;background: #f5f5b5;}
.brillohv{}
.brillohv:hover{box-shadow: 0 0 6px $brillo3;}
/********/
tamMax{height: 100%;width: 100%;}
/*****CONTENIDO****/
.cont_prin{height:100%;left: 0;right: 0;top: 80px;position:relative;top:0px;margin-bottom:15px;}
.cont_secc{display: table; table-layout: fixed; width: 100%; height: 100%;margin: 5px 0px;}
.secc_izq{width:150px;background:#FFFFFF;display:table-cell;}
.secc_medio{width:5px;background:#FFFFFF;display:table-cell;vertical-align:middle;cursor:pointer;}
.secc_der{background: #FFFFFF;display: table-cell;}
.cont_titulo{padding:5px; font-weight:bold;background:$fondo3;margin-bottom:3px;}
.cont_tbl{padding:0px 5px 5px 20px;overflow:auto;}
.cont_tbl_marco{margin:10px;}
.cont_tbl_marco_Advertencia{border: 1px solid #ba0000; background: #f9f9d6 url(images/content-active.png) 50% 50% repeat-x; color: #060200; }
/*****SOMBRAS*****/
.sombratext1{text-shadow: 1px 1px 1px $textsombra1;}
/******DIVISIONES***********/
.division_span_menu{padding: 0px 5px;}
/********BARRAS***********/
.bar_1{background: $fondo1 url(images/titulo.png) 50% 50% repeat-x;height: 30px;}
.bar_2{background: $fondo1 url(images/titulo-hover.png) 50% 50% repeat-x; text-decoration: none; height: 30px;}
.bar_3{background: $fondo1 url(images/titulo-active.png) 50% 50% repeat-x !important; height: 25px;}
.bar_4{background: $fondo1 url(images/titulo.png) 50% 50% repeat-x;}
.bar_5{background: $borde2 50% 50% repeat-x; padding:3px;}
.bar_6{padding:5px; background: url(images/titulo.png);margin-bottom:5px}
.bar_contenido{display:inline-block;vertical-align:middle;}
/*********BORDER**********/
.border_3{border:1px solid $borde2;}
/*********FONDOS**********/
.fondo_1{background: $fondo1;}
.fondo_2{background: $fondo2;}
.fondo_3{background: #eeeeee url(images/marco_content.png) 50% bottom repeat-x; color: $txt1; }
.fondo_4{border: 1px solid $borde2; background: $fondo3 url(images/sub_marco_content.png) 50% 50% repeat-x; color: $txt1;}
/****CABECERAS mc=menucabecera****/
.cabecera{background: $fondo1 url(images/gradiente.jpg) 50% 50% repeat-x;background-repeat: no-repeat;top:0px;height: 80px;width:100%;text-align: left;}
.cabecera2{background: $fondo1 url(images/gradiente.jpg) 50% 50% repeat-x;background-repeat: no-repeat;top:0px;height:auto;width:100%;text-align: left;}
.menu_cabecera{clear: both;width: 100%;}
.logo_user{padding: 5px 0px 0px 20px;position: absolute;z-index:1;}
.mc_left{display:inline-block;vertical-align:top;text-align:left;text-align: left;width:60%;padding: 5px 5px 5px 10px;}
.mc_right{display:inline-block;vertical-align:top;text-align:right;width:36%;text-align: right;}
.avatar{border: 3px solid $borde1;display: inline-block;float: left;background-color: #ffffff;text-align: center;margin: 0px 10px 0px 0px;overflow: hidden;max-height: 60px;max-width: 40px;}
/****PIE****/
.pie{bottom:0px;width:100%;position:fixed;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;}
/*****MENU VERTICAL*****/
//.navbar .nav > .active > a{background: $fondo3;font-weight: bold;}/*agregado*/
.menuv{}
.menuv ul{margin:0px 0px;padding:0px;list-style-type: none;}
.menuv ul li{padding:2px 8px;float:none;}
.menuv ul li:hover{background: #E0E0E0;}
.menuv ul li.active{background: $fondo3;font-weight: bold;}
/************MENU-DESPLEGABLE SOLO LETRAS**************/
.menuh_d{}
.menuh_d ul{margin:0px 0px;}
.menuh_d ul li{float: left;position:relative;padding: 0px 0px 3px 5px;}
.menuh_d ul li ul{border: 1px solid #cccccc;padding:5px 0px;left:0px;display: none; text-align: left;position: absolute;white-space: nowrap;z-index: 100;box-shadow: 2px 2px 0px gray;background: #ffffff;color: #454545;-moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; ;}
.separator_menuh_d{border-bottom: 1px solid #cccccc;display: block;margin-bottom: 5px;padding-bottom: 5px;}
.menuh_d ul li ul li{padding:3px 20px;float:none;}
.menuh_d ul li ul li:hover{background: #E0E0E0;}
.menuh_d ul li ul li a{color: #454545;text-decoration:none;}
/*******MENU-NAV CON LISTAS******/
.navbar .nav li.dropdown.open > .dropdown-toggle,
.navbar .nav li.dropdown.active > .dropdown-toggle,
.navbar .nav li.dropdown.open.active > .dropdown-toggle,
.navbar .nav li.active{
  color: #555555;
  background: $borde2 50% 50% repeat-x;
}

.content_menuh{position:absolute;width:100%; height:30px;top:50px;background: url(images/titulo_bar.png) 50% 50% repeat-x;}
.oculta_cabecera{display:inline-block;vertical-align:top;width:10%;}
.menuh {display:inline-block;vertical-align:top;width:88%;}
.menuh ul, li {list-style-type: none; /*quita viñetas de ul li*/}
.menuh ul {margin: 0;padding: 0;}
.menuh_ul_li{background: $fondo1 url(images/titulo-nav.png) 50% 50% repeat-x;border: 1px solid $borde2;font-weight: bold;text-shadow: 1px 1px 1px $textsombra1;}
.menuh_ul_li:hover{background: $fondo1 url(images/titulo-hover.png) 50% 50% repeat-x; text-decoration: none;}
.menuh ul li {float: left; /*lo pone horizontalmente*/min-width: 30px;height: 28px;margin-left: -1px;max-width: 170px;position: relative;z-index: 99;}
.menuh ul li a {text-decoration: none;display: block;padding: 8px 13px 8px 13px;text-align: center;}
.menuh ul li a.active{background: $fondo1 url(images/titulo-active.png) 50% 50% repeat-x ;color:$txt1;padding: 11px 13px 9px 13px;margin: -5px -1px 0px -1px;text-shadow: 1px 1px 1px $textsombra2;-moz-border-radius-topleft: 4px; -webkit-border-top-left-radius: 4px; border-top-left-radius: 4px; -moz-border-radius-topright: 4px; -webkit-border-top-right-radius: 4px; border-top-right-radius: 4px;}
.menuh ul li ul{border: 1px solid #cccccc;padding:5px 0px;left:0px;display: none; text-align: left;position: absolute;white-space: nowrap;box-shadow: 2px 2px 0px gray;background: #ffffff;color: #454545;-moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; ;}
.menuh ul li ul li{padding:3px 20px;float:none;height: 15px;cursor:pointer}
.menuh ul li ul li:hover{background: #E0E0E0;}
.menuh ul li ul li a{color: #454545;text-decoration:none;}
/*****PUNTEROS****/
.punt_link{cursor:pointer;}
/******TEXTOS*****/
.txt_11{font-size: 11px;font-family: $tipoletra;text-decoration: none;}
.txt_10{font-size: 10px;font-family: $tipoletra;text-decoration: none;}
.txt_tema{color: $txt1 !important;}
.txt_temaF{color: $txtF;}
.txt_temaM{color: $txtM !important;}
.txt_negro{color: #000000;}
.txt_gris{color: #444444;}
.txt_rojo{color: #E00500;}
.txt_azul{color: #0000ee;}
.txt_verde{color: #68912b;}
.txt_blanco{color: #FFFFFF;}
/****ICONOS******/
.icon{background-image: url("$diriconmap");background-repeat:no-repeat;}
.icon_content{background-image: url("$diriconmap");background-repeat:no-repeat;display: inline-block;vertical-align: middle;/*margin:0px 3px*/} 
.icon_mas{background-position:0px -1px; height:15px; width:16px;}
.iconSemafRojo{background-position:0px -16px; height:16px; width:18px;}
.iconSemafAmarillo{background-position:0px -32px; height:16px; width:18px;}
.iconSemafVerde{background-position:0px -48px; height:16px; width:18px;}
.icon_foco{background-position:0px -64px; height:25px; width: 16px;}
.icon_foco2{background-position:0px -89px; height:25px; width:16px;}
.icon_cerrar1{background-position:0px -114px; height:17px; width:16px;}
.icon_cerrar2{background-position:0px -131px; height:13px; width:12px;}
.icon_cerrar3{background-position:0px -144px; height:16px; width:16px;}
.icon_cerrar3:hover{background-position:0px -160px; height:16px; width:16px;}
.icon_user1{background-position:0px -176px; height:15px; width:14px;}
.icon_escudo1{background-position:0px -191px; height:15px; width:13px;}
.icon_file1{background-position:0px -206px; height:15px; width:14px;}
.icon_izqnegro{background-position:0px -221px; height:7px; width:3px;}
.icon_dernegro{background-position:-3px -221px; height:7px; width:3px;}
.icon_arrnegro{background-position:-0px -221px; height:3px; width:6px;}
.icon_abanegro{background-position:-0px -224px; height:3px; width:6px;}
.icon_izqblanc{background-position:-6px -221px; height:6px; width:3px;}
.icon_derblanc{background-position:-9px -221px; height:6px; width:3px;}
.icon_arrblanc{background-position:-6px -221px; height:3px; width:6px;}
.icon_abablanc{background-position:-6px -224px; height:3px; width:6px;}
.icon_pizarra{background-position:0px -227px; height:14px; width:18px;}
.icon_lapiz{background-position:0px -241px; height:15px; width:18px;}
.icon_tacho{background-position:0px -256px; height:16px; width:14px;}
.icon_binoculares{background-position:0px -272px; height:12px; width:18px;}
.icon_maletin{background-position:0px -284px; height:13px; width:16px;}
.icon_lupa{background-position:0px -297px; height:18px; width:18px;}
.icon_lupa1{background-position:0px -315px; height:18px; width:18px;}
.icon_cuaderno{background-position:0px -333px; height:16px; width:11px;}
.icon_actualizar{background-position:0px -349px; height:17px; width:16px;}
.icon_ant{background-position:0px -382px; height:8px; width:7px;}
.icon_sig{background-position:-7px -382px; height:8px; width:7px;}
.icon_usb{background-position:0px -390px; height:18px; width:18px;}
.icon_upload{background-position:0px -408px; height:18px; width:18px;}
.icon_download{background-position:0px -426px; height:18px; width:18px;}
.icon_agenda{background-position:0px -444px; height:18px; width:18px;}
.icon_semaforo{background-position:0px -462px; height:18px; width:18px;}
.icon_telefono{background-position:0px -480px; height:17px; width:18px;}
.icon_agencia{background-position:0px -497px; height:16px; width:18px;}
.icon_fin{background-position:0px -513px; height:16px; width:16px;}
.icon_inicio{background-position:0px -529px; height:16px; width:16px;}
.icon_avanza{background-position:0px -545px; height:16px; width:16px;}
.icon_retrocede{background-position:0px -561px; height:16px; width:16px;}
.icon_arriba{background-position:0px -577px; height:16px; width:16px;}
.icon_abajo{background-position:0px -593px; height:16px; width:16px;}
.icon_mano{background-position:0px -609px; height:16px; width:16px;}
/*****borde esquina*************/
.corner_tl {border-top-left-radius: 5px;}
.corner_tr {border-top-right-radius: 5px;}
.corner_bl {border-bottom-left-radius: 5px;}
.corner_br {border-bottom-right-radius: 5px;}
.corner_top {border-top-right-radius: 5px;border-top-left-radius: 5px;}
.corner_bottom {border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;}
.corner_right {border-top-right-radius: 5px;border-bottom-right-radius: 5px;}
.corner_left {border-top-left-radius: 5px;border-bottom-left-radius: 5px;}
.corner_all {border-radius: 5px;}
/*********sombra*********/
.sombra{box-shadow: 5px 5px 5px gray;}
.brillo1{box-shadow: 0 0 6px $brillo1;} 
.brillo2{box-shadow: 0 0 12px $brillo2;}
.sombravertizq{background:url(../../img/somb_verticalizq.png) no-repeat left 50%;}
.sombravertder{background:url(../../img/somb_verticalder.png) no-repeat right 50%;}
/*******POPUP***********/
.errorPopup{background: $fondo1 url(../../img/error.png) 50% 50% repeat-x;border: 1px solid $borde1;padding: 5px 5px 3px 3px;overflow: auto;box-shadow: 0 0 5px $borde1}
.advertenciaPopup{background: $fondo1 url(../../img/advertencia.png) 50% 50% repeat-x;border: 1px solid $borde1;padding: 3px 5px 3px 3px;overflow: auto;box-shadow: 0 0 5px $borde1}
.okPopup{background: $fondo1 url(../../img/ok.png) 50% 50% repeat-x;border: 1px solid $borde1;padding: 5px 5px 3px 3px;overflow: auto;box-shadow: 0 0 5px $borde1}
/******LOADING******/
.layerOverlay{background-image:url("images/overlay.png");opacity: 0.5;top:0px;left:0px;position:fixed;width:100%;height:100%;z-index:100;}
.layerLoading{position:absolute;top:50%;left:50%;width:70px;height:70px;margin-left:-35px;margin-top:-35px;z-index:101;}
.layerMessage{width: 350px;height: 50px;top:35%;left: 50%;margin-left: -150px;position:fixed;overflow:auto;z-index:1100;}
/*ANIMACION*/
.anima1{opacity:0.3;transition: all 0.3s ease-in;-webkit-transition: all 0.3s ease-in;-moz-transition: all 0.3s ease-in;/*transition esta amarrado al hover*/}
.anima1:hover{opacity:1;}
/****BOTONES*****/
.button_icon{text-align:center;cursor:pointer;background:url("images/boton.png") repeat-x scroll 50% 50% #ECEDF1;border:1px solid #838383;display:inline-block;min-height:16px;min-width:16px;padding:1px;}
.button{border: 1px solid $borde3;background: $fondo1 url(images/boton.png) 50% 50% repeat-x;font-weight: bold;color: $txt1;padding: 4px 4px 4px 4px;}
.button_icon:hover, .button:hover{border: 1px solid $borde1;background: $fondo1 url(../../img/boton-hover.png) 50% 50% repeat-x;}
.button_icon:active, .button:active{border: 1px solid $borde1;background: $fondo1 url(../../img/boton-active.png) 50% 50% repeat-x;box-shadow: 0 0 5px $borde1;}
/**FORMULARIOS**/
input[type=text]{color: $txt1;padding:2px;border: 1px solid $borde1;border-radius: 4px;font-size:11px;font-family:$tipoletra;}
input[type=text]:focus{border: 1px solid $borde4;box-shadow:0 2px 1px #CCCCCC inset;}
input[type=password]{color: $txt1;padding:2px;border: 1px solid $borde1;border-radius: 4px;font-size:11px;font-family:$tipoletra;}
input[type=password]:focus{border: 1px solid $borde4;box-shadow:0 2px 1px #CCCCCC inset;}
select{color: $txt1;padding:2px;border: 1px solid $borde1;border-radius: 4px;font-size:11px;font-family:$tipoletra;}
select:focus{border: 1px solid $borde4;box-shadow:0 2px 1px #CCCCCC inset;}
textarea{color: $txt1;padding:2px;border: 1px solid $borde1;border-radius: 4px;font-size:11px;font-family:$tipoletra;}
textarea:focus{border: 1px solid $borde4;box-shadow:0 2px 1px #CCCCCC inset;}
email{color: $txt1;padding:2px;border: 1px solid $borde1;border-radius: 4px;font-size:11px;font-family:$tipoletra;}
email:focus{border: 1px solid $borde4;box-shadow:0 2px 1px #CCCCCC inset;}
.input_buscar{background:url("../../img/lupa.png") no-repeat scroll 2% 1px #fff !important;padding:3px 3px 3px 23px !important}
/***dialog pa jqgrid***/
.content-dialog{background:#ffffff !important;margin:3px !important}

/***JQUERY CSS***/
/*jquery conos
--------------*/
.ui-icon2 { display: block; text-indent: -99999px; overflow: hidden; background-repeat: no-repeat; }
.ui-icon2-coments{ background-image: url("../../img/comments.png"); height:16px; width:16px;}
.ui-icon2-excel{ background-image: url("../../img/excel.png"); height:25px; width:25px;}
.ui-icon { display: block; text-indent: -99999px; overflow: hidden; background-repeat: no-repeat; }
.ui-icon { background-image: url($diriconmap); }
.ui-icon-closethick{background-position:0px -144px; height:16px; width:16px;}
.ui-icon-closethick:hover{background-position:0px -160px; height:16px; width:16px;}
.ui-icon-gripsmall-diagonal-se { background-position: -64px -224px; }
.ui-icon-grip-diagonal-se { background-position: -80px -224px; }
.ui-icon-plus{background-position:0px -1px; height:15px; width:16px;}
.ui-icon-pencil{background-position:0px -241px; height:15px; width:18px;}
.ui-icon-document{background-position:0px -333px; height:16px; width:11px;}
.ui-icon-trash{background-position:0px -256px; height:16px; width:14px;}
.ui-icon-refresh{background-position:0px -349px; height:17px; width:17px;}
.ui-icon-seek-next{background-position:0px -545px; height:16px; width:16px;}
.ui-icon-seek-prev{background-position:0px -561px; height:16px; width:16px;}
.ui-icon-seek-first{background-position:0px -529px; height:16px; width:16px;}
.ui-icon-seek-end{background-position:0px -513px; height:16px; width:16px;}
.ui-icon-disk{background-position:0px -390px; height:18px; width:18px;}
.ui-icon-close{background-position:0px -131px; height:13px; width:12px;}
.ui-icon-triangle-1-w{background-position:-5px -533px; height:8px; width:8px;}
.ui-icon-triangle-1-e{background-position:-5px -549px; height:8px; width:8px;}
.ui-icon-triangle-1-n{background-position:-0px -364px; height:8px; width:16px;}
.ui-icon-triangle-1-s{background-position:-0px -376px; height:8px; width:16px;}
.ui-icon-scissors{background-position:0px -256px; height:16px; width:14px;}
.ui-icon-cancel{background-position:0px -131px; height:13px; width:12px;}
.ui-icon-circle-triangle-w{background-position:0px -561px; height:16px; width:16px;}
.ui-icon-circle-triangle-e{background-position:0px -545px; height:16px; width:16px;}
.ui-icon-circle-triangle-n{background-position:0px -577px; height:16px; width:16px;}
.ui-icon-circle-triangle-s{background-position:0px -593px; height:16px; width:16px;}
.ui-icon-search{background-position:0px -315px; height:18px; width:18px;}
.ui-icon-newwin{background-position:0px -227px; height:14px; width:18px;}
.ui-icon-minus{background-position:0px -131px; height:13px; width:12px;}
.ui-icon-arrowthick-2-n-s{background-position:0px -609px; height:16px; width:16px;left:2px;position:absolute}
/* dialog
--------*/
/*.ui-dialog { position: absolute; width: 300px; overflow: hidden; background:none repeat scroll 0 0 $fondo2;box-shadow: 0 0 12px $brillo2;}*/
.ui-dialog { position: absolute; width: 300px; overflow: hidden; box-shadow: 0 0 12px #000000;}
.ui-dialog .ui-dialog-titlebar { padding: .4em 1em; position: relative;font-size: 11px;font-family: $tipoletra;text-decoration: none;color: $txtM;}
.ui-dialog .ui-dialog-title { float: left; margin: .1em 16px .1em 0; } 
.ui-dialog .ui-dialog-titlebar-close { position: absolute; right: .3em; top: 50%; width: 19px; margin: -10px 0 0 0; padding: 1px; height: 18px;  }
.ui-dialog .ui-dialog-titlebar-close span { display: block; margin: 1px; }
.ui-dialog .ui-dialog-titlebar-close:hover, .ui-dialog .ui-dialog-titlebar-close:focus { padding: 0; }
.ui-dialog .ui-dialog-content { position: relative; padding: .5em; background: none; overflow: auto;  }
.ui-dialog .ui-dialog-buttonpane { text-align: left; border-width: 1px 0 0 0; background-image: none; margin: .5em 0 0 0; padding: 0px 5px;background:#fff;margin:0px 5px 5px 5px;}
.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset { float: right; }
.ui-dialog .ui-dialog-buttonpane button { margin: .5em .4em .5em 0; cursor: pointer; }
.ui-dialog .ui-resizable-se { width: 14px; height: 14px; right: 3px; bottom: 3px; }
.ui-draggable .ui-dialog-titlebar { cursor: move; }

/* Component containers
----------------------------------*/
.ui-widget { font-family: $tipoletra; font-size: 11px; }
.ui-widget .ui-widget { font-size: 11px }
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button { font-family: $tipoletra; font-size: 1em; }
.ui-widget-content_jqgrid /*JC*/{ border: 1px solid $borde2; background: $fondo3 url(images/widget-content_jqgrid.png) 50% bottom repeat-x; color: $txt1; }
.ui-widget-content { border: 1px solid color: $txt1; color: $txt1;}
.ui-widget-content a { color: $txt1; }
/*.ui-widget-header { background: $fondo1 url(images/titulo-hover.png) 50% 50% repeat-x; color: #ffffff; font-weight: bold; }*/
.ui-widget-header { background: url(images/titulo.png) 50% 50% repeat-x; color: #ffffff; font-weight: bold;height:20px }
.ui-widget-header a { color: #222222; }
/* Interaction states
----------------------------------*/
.ui-state-default, .ui-widget-content .ui-state-default { border: 1px solid $borde2; background: $fondo3 url(images/content.png) 50% 50% repeat-x; font-weight: normal; color: $txt1; }
.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited { color: $txt1; text-decoration: none; }
.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus { border: 1px solid $borde3; background: $fondo3 url(images/content-hover.png) 50% 50% repeat-x; font-weight: normal; color: $txt1; }
.ui-state-hover a, .ui-state-hover a:hover { color: $txt1; text-decoration: none; }
/*.ui-state-active, .ui-widget-content .ui-state-active { border: 1px solid #e0cfc2; background: #f4f0ec url(images/content-hover.png) 50% 50% repeat-x; font-weight: normal; color: #b85700; }*/
.ui-state-active, .ui-widget-content .ui-state-active {background: $fondo1 url(images/titulo-active.png) 50% 35% repeat-x ;color:$txt1;text-shadow: 1px 1px 1px $textsombra2;border:1px solid $borde3;}
.ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited { color: #b85700; text-decoration: none; }
.ui-widget :active { outline: none; }
/* Interaction Cues
----------------------------------*/
.ui-state-highlight, .ui-widget-content .ui-state-highlight {border: 1px solid $borde3; background: #f5f5b5 url(images/content-active.png) 50% 50% repeat-x; color: #060200; }
.ui-state-highlight a, .ui-widget-content .ui-state-highlight a { color: #060200; }
.ui-state-error, /*.ui-widget-content*/ .ui-state-error {border: 1px solid #f8893f; background: #fee4bd url(../../img/advertencia.png) 50% 50% repeat-x; color: $txt1; }
.ui-state-error a, .ui-widget-content .ui-state-error a { color: #592003; }
.ui-state-error-text, .ui-widget-content .ui-state-error-text { color: #592003; }
.ui-priority-primary, .ui-widget-content .ui-priority-primary { font-weight: bold; }
.ui-priority-secondary, .ui-widget-content .ui-priority-secondary { opacity: .7; filter:Alpha(Opacity=70); font-weight: normal; }
.ui-state-disabled, .ui-widget-content .ui-state-disabled { opacity: .35; filter:Alpha(Opacity=35); /*background-image: none;JC*/ }

/* Layout helpers
----------------------------------*/
.ui-helper-hidden { display: none; }
.ui-helper-hidden-accessible { position: absolute !important; clip: rect(1px 1px 1px 1px); clip: rect(1px,1px,1px,1px); }
.ui-helper-reset { margin: 0; padding: 0; border: 0; outline: 0; line-height: 1.3; text-decoration: none; font-size: 100%; list-style: none; }
.ui-helper-clearfix:after { content: "."; display: block; height: 0; clear: both; visibility: hidden; }
.ui-helper-clearfix { display: inline-block; }
/* required comment for clearfix to work in Opera \*/
* html .ui-helper-clearfix { height:1%; }
.ui-helper-clearfix { display:block; }
/* end clearfix */
.ui-helper-zfix { width: 100%; height: 100%; top: 0; left: 0; position: absolute; opacity: 0; filter:Alpha(Opacity=0); }
/* jQuery UI Resizable 1.8.16
-------------------------------*/
.ui-resizable { position: relative;}
.ui-resizable-handle { position: absolute;font-size: 0.1px;z-index: 99999; display: block; }
.ui-resizable-disabled .ui-resizable-handle, .ui-resizable-autohide .ui-resizable-handle { display: none; }
.ui-resizable-n { cursor: n-resize; height: 7px; width: 100%; top: -5px; left: 0; }
.ui-resizable-s { cursor: s-resize; height: 7px; width: 100%; bottom: -5px; left: 0; }
.ui-resizable-e { cursor: e-resize; width: 7px; right: -5px; top: 0; height: 100%; }
.ui-resizable-w { cursor: w-resize; width: 7px; left: -5px; top: 0; height: 100%; }
.ui-resizable-se { cursor: se-resize; width: 12px; height: 12px; right: 1px; bottom: 1px; }
.ui-resizable-sw { cursor: sw-resize; width: 9px; height: 9px; left: -5px; bottom: -5px; }
.ui-resizable-nw { cursor: nw-resize; width: 9px; height: 9px; left: -5px; top: -5px; }
.ui-resizable-ne { cursor: ne-resize; width: 9px; height: 9px; right: -5px; top: -5px;}
/* Corner radius 
----------------*/
.ui-corner-tl { -moz-border-radius-topleft: 6px; -webkit-border-top-left-radius: 6px; border-top-left-radius: 6px; }
.ui-corner-tr { -moz-border-radius-topright: 6px; -webkit-border-top-right-radius: 6px; border-top-right-radius: 6px; }
.ui-corner-bl { -moz-border-radius-bottomleft: 6px; -webkit-border-bottom-left-radius: 6px; border-bottom-left-radius: 6px; }
.ui-corner-br { -moz-border-radius-bottomright: 6px; -webkit-border-bottom-right-radius: 6px; border-bottom-right-radius: 6px; }
.ui-corner-top { -moz-border-radius-topleft: 6px; -webkit-border-top-left-radius: 6px; border-top-left-radius: 6px; -moz-border-radius-topright: 6px; -webkit-border-top-right-radius: 6px; border-top-right-radius: 6px; }
.ui-corner-bottom { -moz-border-radius-bottomleft: 6px; -webkit-border-bottom-left-radius: 6px; border-bottom-left-radius: 6px; -moz-border-radius-bottomright: 6px; -webkit-border-bottom-right-radius: 6px; border-bottom-right-radius: 6px; }
.ui-corner-right {  -moz-border-radius-topright: 6px; -webkit-border-top-right-radius: 6px; border-top-right-radius: 6px; -moz-border-radius-bottomright: 6px; -webkit-border-bottom-right-radius: 6px; border-bottom-right-radius: 6px; }
.ui-corner-left { -moz-border-radius-topleft: 6px; -webkit-border-top-left-radius: 6px; border-top-left-radius: 6px; -moz-border-radius-bottomleft: 6px; -webkit-border-bottom-left-radius: 6px; border-bottom-left-radius: 6px; }
.ui-corner-all { -moz-border-radius: 6px; -webkit-border-radius: 6px; border-radius: 6px; }
/* Overlays 
-----------*/
.ui-widget-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%;background: url("images/overlay.png") repeat scroll 50% 50% #666666; opacity: 0.5;}
/******JQGRID*****se añade pa evitar errores en los botones al momento de cambiar de tema*/
.fm-button { display: inline-block; margin:0 4px 0 0; padding: .4em .5em; text-decoration:none !important; cursor:pointer; position: relative; text-align: center; zoom: 1; }
.fm-button-icon-left { padding-left: 1.9em; }
.fm-button-icon-right { padding-right: 1.9em; }
.fm-button-icon-left .ui-icon { right: auto; left: .2em; margin-left: 0; position: absolute; top: 50%; margin-top: -8px; }
.fm-button-icon-right .ui-icon { left: auto; right: .2em; margin-left: 0; position: absolute; top: 50%; margin-top: -8px;}
.fm-button-icon-left { padding-left: 1.9em; }
.fm-button-icon-left .ui-icon { right: auto; left: .2em; margin-left: 0; position: absolute; top: 50%; margin-top: -8px; }
.jqmOverlay { background-image:url("images/overlay.png"); }
/************DATEPICKER****************/
.ui-datepicker { width: 17em; padding: .2em .2em 0; display:none}
.ui-datepicker .ui-datepicker-header { position:relative; padding:.2em 0; }
.ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next { position:absolute; top: 2px; width: 1.8em; height: 1.8em; }
.ui-datepicker .ui-datepicker-prev-hover, .ui-datepicker .ui-datepicker-next-hover { top: 1px; }
.ui-datepicker .ui-datepicker-prev span, .ui-datepicker .ui-datepicker-next span { display: block; position: absolute; left: 50%; margin-left: -8px; top: 50%; margin-top: -8px;  }
.ui-datepicker .ui-datepicker-prev { left:2px; }
.ui-datepicker .ui-datepicker-next { right:2px; }
.ui-datepicker .ui-datepicker-title { margin: 0 2.3em; line-height: 1.8em; text-align: center; }
.ui-datepicker select.ui-datepicker-month, 
.ui-datepicker select.ui-datepicker-year { width: 49%;}
.ui-datepicker table {width: 100%; font-size: .9em; border-collapse: collapse; margin:0 0 .4em; }
.ui-datepicker th { padding: .7em .3em; text-align: center; font-weight: bold; border: 0;  }
.ui-datepicker td { border: 0; padding: 1px; }
.ui-datepicker td span, .ui-datepicker td a { display: block; padding: .2em; text-align: right; text-decoration: none; }
.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current { float:left; }
FINCSS;
?>
