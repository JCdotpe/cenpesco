<!-- <div class="masthead">
    <img src="http://placehold.it/940x50"/>
</div> -->

       <div class="navtopper navbar navbar-inverse navbar-fixed-top ">
            <div class=" navbar-inner navtopper-inner" id="navbarflex">
                <div class="container">  
                 <!--  <img class="span12" src="http://placehold.it/1200x25"/> -->
                  <div class="row">
                    <div class="span6">
                      <a href="<?php echo base_url(); ?>"><img style="margin-top: 2.5px;" src="<?php echo base_url('img/brand.png'); ?>"/></a>  
                    </div>                
                  </div>
                  
                </div>
          </div>
      </div>
       <!--  <div class="navbar navbar-inverse navbar-fixed-top " > -->
       <div class="navbar navbar-inverse navbar-fixed-top navbottom">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                     <!-- <a class="brand" href="<?php //echo base_url(); ?>">ICENPESCO</a>  -->
                    <div class="nav-collapse collapse">

                            <!-- <li class="active"><a href="#">Home</a></li> -->
                            




      <?php 
          if($this->tank_auth->is_logged_in()){
            $roles = $this->tank_auth->get_roles();
            if(!empty($roles)){
      ?>
        <ul class="nav">
                    <?php
                      $i = 1;
                      foreach ($roles as $role) {
                        $c = "";
                        if($this->uri->segment(1) == $role->url){
                          $c = ' class="active"';
                        }
                    ?>
                    <li <?php echo $c; ?>><?php echo anchor(site_url('/')  . strtolower($role->url), $i++ . '. ' . $role->rolename); ?></li>
                     <!-- <li class="divider-vertical cen-nav-divider"></li> -->
                    <?php 
                      } 
                    ?>

          </ul>            
              <?php } }elseif($this->uri->segment(1) == 'convocatoria' || isset($convocatoria)){?>
<!--                <ul class="nav"> 
                   <li><a href="<?php echo site_url('convocatoria/registro'); ?>">Inscripción</a></li> 
                   <li><a href="<?php echo site_url('convocatoria/consulta'); ?>">Consulta de Inscripción</a></li>  
                   <li><a href="<?php echo site_url('convocatoria/contacto'); ?>">Contacto</a></li>   
                </ul>       -->
         
            <?php }?>
       

                                      
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>



        <?php if(isset($fluid)){ ?>
        <div class="container-fluid front">  
        <?php }else{ ?>  
        <div class="container front">  
        <?php } ?>
         <?php 

                $this->load->view('backend/includes/breadcrumb'); 

        ?>