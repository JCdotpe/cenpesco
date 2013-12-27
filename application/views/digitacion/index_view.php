
<div class="row-fluid">



   <div class="offset4 span4">
          <div class="well sidebar-nav cen-sidebar">
            <ul class="nav nav-list">
              <li class="nav-header">FORMULARIOS</li>
              <!-- <li ><a href="<?php echo site_url('digitacion/registro_pescadores_idx'); ?>">Registro de Pescadores y Acuicultores</a></li> -->
              <li ><a href="<?php echo site_url('digitacion/registro_pescadores'); ?>">Registro de Pescadores y Acuicultores</a></li>
              <li ><a href="<?php echo site_url('digitacion/pescador'); ?>">Pescador y Embarcaciones</a></li>
<!--               <li ><a href="<?php echo site_url('digitacion/tiempos_acuicultor'); ?>">Tiempos</a></li>           
 -->              
              <li ><a href="<?php echo site_url('digitacion/acuicultor'); ?>">Acuicultor</a></li> 
              <li ><a href="<?php echo site_url('digitacion/comunidad'); ?>">Comunidad</a></li>
              <!-- <li ><a href="<?php //echo site_url('digitacion/informe'); ?>">Informe</a></li> -->
              <li ><a href="<?php echo site_url('digitacion/general_avance_by_seguimiento'); ?>">Avance  digitación | General</a></li> 
              <li ><a href="<?php echo site_url('digitacion/registro_avance'); ?>">Avance digitación |  Registro de Pescadores y Acuicultores</a></li>
              <li ><a href="<?php echo site_url('digitacion/pescador_avance'); ?>">Avance digitación | Pescador y Embarcaciones</a></li>
              <li ><a href="<?php echo site_url('digitacion/acuicultor_avance'); ?>">Avance digitación | Acuicultor</a></li>
              <li ><a href="<?php echo site_url('digitacion/comunidad_avance'); ?>">Avance digitación | Comunidad</a></li>              
            </ul>
          </div>
          <?php if(!$restriccion) { echo '<a href="#form_reg_pes_mod" role="button" class="btn btn-info pull-centre" data-toggle="modal">Cambio de SEDE OPERATIVA del digitador</a>'; } ?>
    </div>
</div>



  <?php 
  // FORM POPUP MODIFICAR ---------------------------------------------------------------------------------->
     
      $label1=  array('class' => 'preguntas_sub2');
      //$span_class =  'span10';
      $span_class2 =  'span6'; 
      $span_class =  'span11';
      $OBS = array(
        'id'  => 'OBS',
        'name'=> 'OBS',
        'class' => $span_class,
        'cols'=> 20,
        'rows'=> 1);

      $usuariosArray = array(-1 => ' - ');

      foreach ($usuarios->result() as $key ) {
          $usuariosArray[$key->user_id . "-" . $key->dni] = $key->nombres . " \ " . $key->username; 
      }

      $sedesArray = array(-1 => ' - ');

      if($tipo_global){ // habilitar opcion de sede GLOBAL (99) para SUPERVISORES
            $sedesArray['99'] = 'Global';
      }  
      foreach ($sedes->result() as $key ) {
          $sedesArray[$key->SEDE_COD]  = $key->NOM_SEDE; 
      }


  echo '<div id="form_reg_pes_mod" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
    echo '<div class="modal-header">';
      echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">CERRAR</button>';
      echo '<h4 id="myModalLabel">CAMBIO DE SEDE OPERATIVA</h4>';
    echo '</div>';

    echo '<div class="modal-body">';

      $attr = array('class' => 'form-val','id' => 'frm_change_sede', 'style' => 'overflow: auto;');
      echo form_open($this->uri->uri_string(),$attr); 

      echo '<div class="well modulo">';

        echo '<div class="row-fluid">';

            echo '<div class="span12 preguntas">';

              echo '<div class="row-fluid">';

                echo '<div class="span12 titulos">';
                  echo '<h5>NUEVA SEDE OPERATIVA DEL DIGITADOR</h5>';
                echo '</div>';

              echo '</div>';

              echo '<div class="row-fluid">';

                  echo '<div class="control-group span6">';
                    echo form_label('USUARIO','USUARIO',$label1);
                    echo '<div class="controls">';
                      echo form_dropdown('USUARIO', $usuariosArray, FALSE, 'class="' . $span_class . '" id="USUARIO"');
                      echo '<span class="help-inline"></span>';
                      echo '<div class="help-block error">' . form_error('USUARIO'). '</div>';
                    echo '</div>';  
                  echo '</div>'; 

                  echo '<div class="control-group span6">';
                    echo form_label('SEDE OPERATIVA','SEDE',$label1);
                    echo '<div class="controls">';
                      echo form_dropdown('SEDE', $sedesArray, FALSE, 'class="' . $span_class . '" id="SEDE"');
                      echo '<span class="help-inline"></span>';
                      echo '<div class="help-block error">' . form_error('SEDE'). '</div>';
                    echo '</div>';  
                  echo '</div>'; 

              echo '</div>';

              echo '<div class="row-fluid">';

                  echo '<div class="control-group ">';
                      echo form_label('OBSERVACIONES',$OBS['name'],$label1);
                      echo '<div class="controls">';
                        echo form_textarea($OBS);
                        echo '<span class="help-inline"></span>';
                        echo '<div class="help-block error">' . form_error($OBS['name']). '</div>';
                      echo '</div>';  
                  echo '</div>'; 

              echo '</div>';   

            echo '</div>'; 

    

        echo '</div>'; 

      echo '</div>'; 

      echo form_submit('send', 'Modificar','class="btn btn-info pull-right" id="send"');  

      echo form_close();

    echo '</div>';

    echo '<div class="modal-footer">';

    echo '</div>';

  echo '</div>';   
  ?>    

  <script type="text/javascript">



    $(function (){

       $.validator.addMethod("valueNotEquals", function(value, element, arg){
          return arg != value;
      }, "Seleccione un valor");



      $("#frm_change_sede").validate({
            rules:{
              USUARIO:{
                  valueNotEquals: -1,
              },
              SEDE :{
                  valueNotEquals: -1,
              }

            },

            messages:{
              USUARIO: "Seleccione USUARIO",
              SEDE: "Seleccione SEDE",
            },

            errorPlacement: function(error, element) {
                $(element).next().after(error);
            },
            invalidHandler: function(form, validator) {
              var errors = validator.numberOfInvalids();
              var errores = new Array();
              var errores_cant = new Array();
              
              if (errors) {
                var message = errors == 1
                  ? 'Por favor corrige estos errores:\n'
                  : 'Por favor corrige los ' + errors + ' errores.\n';
                var errors = "";
                if (validator.errorList.length > 0) {

                    for (x=0;x<validator.errorList.length;x++) {

                if (errores.length == 0) {
                  errores[0] = validator.errorList[x].message ;
                  errores_cant[0] = 1;
                }else{
                  var encontrado = 0;
                        for (z=0;z<errores.length;z++){
                          if (errores[z] == validator.errorList[x].message){
                            encontrado = encontrado + 1;
                            errores_cant[z] = errores_cant[z]+1;
                          }
                        }
                        if (encontrado == 0) {
                          errores.push(validator.errorList[x].message);
                          errores_cant.push(1);
                        } 
                }               
                    }
              //alert("solo hay : "+errores.length);
              for (y=0;y<(errores.length);y++){
                    //if (errores[y]){
                      errors += "\n\u25CF " + errores[y] + " ("+errores_cant[y]+")";
                    //}
                  }
                  }                       
                alert(message + errors);
             }
              validator.focusInvalid();
            },  


             submitHandler: function(form) {

                $(this).attr('disabled','disabled');
                
                $.ajax({
                    url: CI.base_url + "digitacion/digitacion/actualizar_sede_user" ,
                    type: 'POST',
                    data: { usuario :  $('#USUARIO').val(), nombre :  $('#USUARIO :selected').text(), sede : $("#SEDE").val(), nom_sede : $("#SEDE :selected").text(), OBS : $("#OBS").val(), csrf_token_c: CI.cct, ajax:1 },
                    dataType: 'json',
                    success: function (json_data) {
                        if (json_data.afectados == 1) {
                            $("#send").removeAttr('disabled');
                            alert("EXITOSO: Se cambió satisfactoriamente la SEDE. Vuelva a iniciar sesion para usar la SEDE");  if (json_data.insertados == 0) { alert("ERROR 000: No se guardó en el historial")};               
                        } else if (json_data.afectados == 0){
                            alert("ERROR 000: No se cambio la sede al usuario"); 
                        }else if (json_data.afectados > 1){
                            alert("ERROR 999: Se modificó mas de un registro"); 
                        }else {
                            alert("ERROR 911: Inesperado, intentelo en minutos"); 
                        };
                    }
                })

             }      

      })


    })


  </script>