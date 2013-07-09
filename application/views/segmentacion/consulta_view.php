<?php 

$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');

$span_class =  'span12';

  // CARGAR COMBOS

  //$sedeArray = array(-1 =>' -'); 
    $sedeArray = NULL;
    foreach($sede->result() as $filas)
    {
      $sedeArray[$filas->SEDE_COD]=strtoupper($filas->NOM_SEDE);
    }
  $depaArray =  array(-1 => '-' );
  $equipoArray = array(-1 => '-'); 



  echo '<div class="row-fluid">';

    echo '<div class="preguntas_sub2 span2">';

          echo '<div class="row-fluid control-group span12">';
                echo form_label('SEDE OPERATIVA','NOM_SEDE',$label1);
              echo '<div class="controls span">';
                echo form_dropdown('NOM_SEDE', $sedeArray, FALSE,'class="span12" id="NOM_SEDE"'); 
              echo '</div>';
          echo '</div>';  

          echo '<div class="row-fluid control-group span12">';
                  echo form_label('DEPARTAMENTO','NOM_DD',$label1);
                  echo '<div class="controls">';
                    echo form_dropdown('NOM_DD', $depaArray, FALSE,'class="span12" id="NOM_DD"'); 
                  echo '</div>';  
          echo '</div>';   

          echo '<div class="row-fluid control-group span12">';
                echo form_label('EQUIPO','EQUIPO',$label1);
                echo '<div class="controls span">';
                  echo form_dropdown('EQUIPO', $equipoArray, FALSE,'class="span12" id="EQUIPO"'); 
                echo '</div>';  
          echo '</div>'; 

    echo '</div>';
  echo '</div>';
?>

<script type="text/javascript">

$(function(){

// CARGA COMBOS UBIGEO ---------------------------------------------------------------------->

  $("#NOM_SEDE, #NOM_DD, #EQUIPO").change(function(event) {
          var sel = null;
          var sede = $('#NOM_SEDE');
          var dep = $('#NOM_DD');
          var url = null;
          var cod = null;
          var op =null;

          switch(event.target.id){
              case 'NOM_SEDE':
                  sel     = $("#NOM_DD");
                  url     = CI.base_url + "ajax/marco_ajax/get_ajax_dep/" + $(this).val();
                  op      = 1;
                  break;
              case 'NOM_DD':
                  sel     = $("#EQUIPO");
                  url     = CI.base_url + "ajax/marco_ajax/get_ajax_equipo/"  + sede.val()  + "/" + $(this).val();
                  op      = 2;
                  break;   
          }     
          
          var form_data = {
              code: $(this).val(),
              csrf_token_c: CI.cct,
              dep: dep.val(),
              ajax:1
          };

          if(event.target.id != 'EQUIPO')
          {

          $.ajax({
              url: url,
              type:'POST',
              data:form_data,
              dataType:'json',
              success:function(json_data){
                  sel.empty();
                    
                  $.each(json_data, function(i, data){
                      if (op==1){
                          sel.append('<option value="' + data.CCDD + '">' + data.DEPARTAMENTO + '</option>');
                      }
                      if (op==2){
                          sel.append('<option value="' + data.CCDD + '">' + data.DEPARTAMENTO + '</option>');
                     }

                  });
                 
                  if (op==1){
                      $("#NOM_DD").trigger('change');
                      }  
              }
          });   
       }
    
  }); 

  //departamento

   $("#NOM_SEDE").trigger('change');




 }); 


  







</script>