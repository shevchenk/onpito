<div id="cabecera" class="cabecera2 txt_temaF txt_11">
    <div id="menu_cabecera" class="menu_cabecera" style="diplay:block">
        <div id="mc_left" class="mc_left menuh_d">
            <ul>
                <li><font size="2">Hola: </font> <b><font size="2"><?php echo strtoupper($_SESSION['SISTEMA']['usuario']); ?></font></b>
                </li>
                <li>&nbsp;</li>                             
            </ul>
        </div>        
    </div>
    <input type="hidden" value="<?php echo $_SESSION['SISTEMA']['idusuario']?>" id="hd_idusuario"/>
    <input type="hidden" value="<?php echo $_SESSION['SISTEMA']['usuario']?>" id="hd_usuario"/>
    <input type="hidden" value="<?php echo _IMAGES_; ?>" id="_IMAGES_"/>
</div>        

