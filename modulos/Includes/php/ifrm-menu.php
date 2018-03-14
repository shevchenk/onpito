<div class="navbar" style="">  
    <div class="container-fluid">          
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>          
      <a class="brand" href="#">
      <span id="oculta_cabecera" class="button_icon ui-corner-all anima1" href="#">
        <i class="icon-chevron-up"></i>
      </span>&nbsp;<b><?php echo _TITLE_; ?></b>
      </a>
      <div class="nav-collapse collapse navbar-inverse-collapse">
        <ul class="nav">
          <li id='minicio' class="ui-corner-all">
            <a class="ui-corner-all hover1" href="../../Index/vista/vst-inicio.php">INICIO</a>
          </li>
          <?php echo $_SESSION['SISTEMA']['menu']; ?>                            
          <li class="divider-vertical"></li>         
          <li><a class="ui-corner-all hover1" href="../../../close.php">SALIR</a></li>
        </ul>                                     
      </div><!-- /.nav-collapse -->
    </div>
</div><!-- /navbar -->