<div class="row-fluid" style="margin-left: 8px;">

    <?php if($opcion<100) { ?>

        <div class="scroll-menu btn-group">
             <!--  <li class="nav-header nav-header-hide" >MENU</li> -->
              <button class="btn btn-success">Tabulados de Pescador</button>
              <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" >
                <span class="caret"></span>
                <span class="sr-only"></span>
              </button>    
            <ul class="dropdown-menu"  role="menu" >
              <?php foreach ($nom_tabulados->result() as $key => $value) {
                    if(  $value->n < 100 ) { echo '<li '. ( ($opcion == $value->n) ? 'class="active"' : '').'><a href="'.  site_url('tabulados/pescador/reporte'. $value->n ) .'">' . $value->reporte . '</a></li>'; }
              }?>
              


            </ul>
        </div><!--/.well -->

    <?php }else if ($opcion<198) { ?>


        <div class="scroll-menu btn-group">
             <!--  <li class="nav-header nav-header-hide" >MENU</li> -->
              <button class="btn btn-success">Tabulados de Acuicultor</button>
              <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" >
                <span class="caret"></span>
                <span class="sr-only"></span>
              </button>    
            <ul class="dropdown-menu"  role="menu" >
              
              <?php foreach ($nom_tabulados->result() as $key => $value) {
                    if ( $value->n > 99 && $value->n < 198 ) {echo '<li '. ( ($opcion == $value->n) ? 'class="active"' : '').'><a href="'.  site_url('tabulados/acuicultor/reporte_'. $value->n ) .'">' . $value->reporte . '</a></li>'; }
              }?>              

        </div>

    <?php }else if ($opcion<253) { ?>
    
      <div class="scroll-menu btn-group">
       <!--  <li class="nav-header nav-header-hide" >MENU</li> -->
        <button  class="btn btn-success ">Tabulados de Comunidad</button>
        <button  class="btn btn-success dropdown-toggle" data-toggle="dropdown" >
          <span class="caret"></span>
          <!-- <span class="sr-only"></span> -->
        </button>    
            <ul class="dropdown-menu"  role="menu" >

              <?php foreach ($nom_tabulados->result() as $key => $value) {
                    if ( $value->n > 197 && $value->n < 253 ) {echo '<li '. ( ($opcion == $value->n) ? 'class="active"' : '').'><a href="'.  site_url('tabulados/comunidad/reporte_'. $value->n ) .'">' . $value->reporte . '</a></li>'; }
              }?>   

            </ul>
      </div><!--/.well -->
    <?php } ?>
</div>
