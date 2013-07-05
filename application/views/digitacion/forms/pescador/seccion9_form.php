<?php 

$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';

$nombre1 =array(
	'name'	=> 'nombre1',
	'id'	=> 'nombre1',
	'value'	=> set_value('nombre1'),
	'maxlength'	=> 80,
	'class' => $span_class,
);


/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//SECCION 9
//¿Ud. Trabaja con embarcaciones pesqueras?
$S9_1 = array(
	'name'	=> 'S9_1',
	'id'	=> 'S9_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//Cuántas embarcaciones pesqueras tiene
$S9_2 = array(
	'name'	=> 'S9_2',
	'id'	=> 'S9_2',
	'maxlength'	=> 2,
	'class' => $span_class,
);

/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//FIN SECCION 9

$attr = array('class' => 'form-vertical form-auth','id' => 'seccion9');

echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 

////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//COLUMNAS SECCION IX
echo '<div class="well modulo">';
	echo '<h4>SECCION IX. EMBARCACIONES</h4>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
	echo '<div class="row-fluid">';
////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////COLUMNA 1
	echo '<div class="span6">';


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 1

		echo '<div class="question">';
			echo '<p>1. ¿Usted trabaja con embarcaciones pesqueras? </p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S9_1); 
									echo '<div class="help-block error">' . form_error($S9_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 1

////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN COLUMNA 1
	echo '</div>'; 	



////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////COLUMNA 2
	echo '<div class="span6">';


////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 2

		echo '<div class="question">';
			echo '<p>2. ¿Cuántas embarcaciones tiene? </p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S9_2); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S9_2['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 2

////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN COLUMNA 2
	echo '</div>'; 	


////////////////////////////////////////////////////////////////////////////////////////////////////////
	echo '</div>';
////////////////////////////////////////////////////////////////////////////////////////////////////////











////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//EMBARCACIONES
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

echo '<div class="row-fluid">';
	echo '<div class="span12">';	
		echo '<div class="question">';
			echo '<p style="text-align:center">4. ¿Cuál fue el volumen de:</p>';	

			echo '<table class="table table-condensed" id="emb_table">';
              echo '<thead>';
                echo '<tr>';
                  echo '<th class="span1">3. Embarcación N°</th>';
                  echo '<th class="span1">4. ¿Cuál es el nombre de su embarcación?</th>';
                  echo '<th class="span1">5. ¿La embarcación que utiliza es:</th>';
                  echo '<th class="span1">6. ¿Qué tipo de embarcación tiene?</th>';
                  echo '<th class="span1">7. ¿Su embarcación se encuentra:</th>';
                  echo '<th class="span1">8. ¿Cuál es el material del casco de la embarcación?</th>';
                  echo '<th class="span1">9. ¿El tiempo de vida de su embarcación?</th>';
                  echo '<th class="span1" colspan="2">10. ¿Cada que tiempo le brinda mantenimiento a su embarcación?</th>';
                  echo '<th class="span1" colspan="4">11. ¿Cuáles son las medidas de su embarcación?</th>';
                  echo '<th class="span1" colspan="4">12. ¿Cuáles son las medidas de la bodega de su embarcación?</th>';

                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
               echo '<tr>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';       
                  echo '<td></td>';
                  echo '<td>Años</td>';
                  echo '<td>Meses</td>';     
                  echo '<td>Medida Emb.</td>';
                  echo '<td>11.1 Largo (Eslora)</td>';
                  echo '<td>11.2 Ancho (Manga)</td>';       
                  echo '<td>11.3 Altura (Puntal)</td>';
                  echo '<td>Medida Bodega</td>';
                  echo '<td>12.1 Largo</td>';
                  echo '<td>12.2 Ancho</td>';   
                  echo '<td>12.3 Altura</td>';   
               echo '</tr>';
               // echo '<tr>';
                //   echo '<td>' . form_input($nombre1) . '</td>';
                //   echo '<td>' . form_input($nombre1) . '</td>';
                //   echo '<td>' . form_input($nombre1) . '</td>';
                //   echo '<td>' . form_input($nombre1) . '</td>';
                //   echo '<td>' . form_input($nombre1) . '</td>';
                //   echo '<td>' . form_input($nombre1) . '</td>';       
                //   echo '<td>' . form_input($nombre1) . '</td>';
                //   echo '<td>' . form_input($nombre1) . '</td>';
                //   echo '<td>' . form_input($nombre1) . '</td>';     
                //   echo '<td>' . form_input($nombre1) . '</td>';
                //   echo '<td>' . form_input($nombre1) . '</td>';       
                //   echo '<td>' . form_input($nombre1) . '</td>';
                //   echo '<td>' . form_input($nombre1) . '</td>';
                //   echo '<td>' . form_input($nombre1) . '</td>';     
                //   echo '<td>' . form_input($nombre1) . '</td>';                                                     
                // echo '</tr>';
              echo '</tbody>';
            echo '</table>';		



		echo '</div>';
	echo '</div>';
echo '</div>'; 
echo '</div>';

echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
echo form_close(); 
    echo '</div>';      
  echo '</div>';  
//FIN COLUMNAS SECCION IX

 ?>

 
<script type="text/javascript">
$(function(){
//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------
$('#S9_2').keyup(function(event) {
  $('#emb_table tr').remove('.embx');
  for(var i=1; i<=$(this).val();i++){
    var asd = '<tr class="embx">';
    asd +='<td><input type="text" class="span12" maxlength="2" name="S9_3_1' + '_' + i + '" id="S9_3_1' + '_' + i + '" readonly value="' + i + '" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="100" name="S9_4_1' + '_' + i + '" id="S9_4_1' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_5_1' + '_' + i + '" id="S9_5_1' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_6_1' + '_' + i + '" id="S9_6_1' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_7_1' + '_' + i + '" id="S9_7_1' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_8_1' + '_' + i + '" id="S9_8_1' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="2" name="S9_9_1' + '_' + i + '" id="S9_9_1' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="2" name="S9_10_1_A' + '_' + i + '" id="S9_10_1_A' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="2" name="S9_10_1_M' + '_' + i + '" id="S9_10_1_M' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_11_MED' + '_' + i + '" id="S9_11_MED' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_11_1' + '_' + i + '" id="S9_11_1' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_11_2' + '_' + i + '" id="S9_11_2' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_11_3' + '_' + i + '" id="S9_11_3' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_12_MED' + '_' + i + '" id="S9_12_MED' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_12_1' + '_' + i + '" id="S9_12_1' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_12_2' + '_' + i + '" id="S9_12_2' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_12_3' + '_' + i + '" id="S9_12_3' + '_' + i + '" value="" ></td>';
    asd += '</tr>';
    $('#emb_table > tbody:last').append(asd);
    // $('#emb_table > tbody:last').append('<tr class="embx"><td><input type="text" class="span12" maxlength="80" name="S9_3_1' + '_' + i + '" id="S9_3_1' + '_' + i + '" value="' + i + '" ></td></tr>');
  }
});

  // $("#seccion9").on("submit", function(event) {
  //   $('#seccion9').trigger('validate');
  // }); 
      //validacion
      $("#seccion9").validate({
          rules: {           
            S9_1: {
                  required: true,
                  digits: true,
               },     
                                                                                   
        //FIN RULES
          },

          messages: {   
              S9_1: {
                  required: "Trabaja con embarcaciones pesqueras",
               },                 
        //FIN MESSAGES
          },
          errorPlacement: function(error, element) {
              $(element).next().after(error);
          },
          invalidHandler: function(form, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
              var message = errors == 1
                ? 'Por favor corrige estos errores:\n'
                : 'Por favor corrige los ' + errors + ' errores.\n';
              var errors = "";
              if (validator.errorList.length > 0) {
                  for (x=0;x<validator.errorList.length;x++) {
                      errors += "\n\u25CF " + validator.errorList[x].message;
                  }
              }
              alert(message + errors);
            }
            validator.focusInvalid();
          },
          submitHandler: function(form) {

            //seccion 2 serial
            var seccion9_data = $("#seccion9").serializeArray();
            seccion9_data.push(
                {name: 'ajax',value:1},
                {name: 'pescador_id',value:$("input[name='pescador_id']").val()}      
            );
          
              var bsub9 = $( "#seccion9 :submit" );
              bsub9.attr("disabled", "disabled");
              $.ajax({
                  url: CI.base_url + "digitacion/pesc_seccion9",
                  type:'POST',
                  data:seccion9_data,
                  dataType:'json',
                  success:function(json){
              alert(json.msg);
              // $('#pesc_tabs').empty();
              // $('#pesc_tabs').append(window.clonetabs);
              // $('#pesc_tabs').removeClass('hide');
              $('#pesca_dor').trigger('submit');
                  }
              });     
                  
          }       
      });
 }); 
</script>
