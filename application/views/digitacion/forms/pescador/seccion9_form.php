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



  echo '</div>';







////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//EMBARCACIONES
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

echo '<div class="row-fluid">';
	echo '<div class="span12">';	
		echo '<div class="question">';
			echo '<p style="text-align:center"></p>';	

			echo '<table class="table table-condensed" id="emb_table">';
              echo '<thead>';
                echo '<tr>';
                  echo '<th class="span1">3. Embarcación N°</th>';
                  echo '<th class="span1">4. ¿La embarcación que utiliza es:</th>';
                  echo '<th class="span1">5. ¿El tipo de embarcación que tiene es:</th>';
                  echo '<th class="span1">6. ¿El material de construcción de la embarcación es:</th>';
                  echo '<th class="span1">7. ¿Su embarcación se encuentra:</th>';
                  echo '<th class="span1">8. ¿Cuál es el año de construcción de su embarcación?</th>';
                  echo '<th class="span1" colspan="2">9. ¿Cada que tiempo le brinda mantenimiento a su embarcación?</th>';
                  echo '<th class="span1" colspan="4">10. ¿Cuáles son las dimensiones de su embarcación?</th>';
                  echo '<th class="span1">11. ¿Su embarcación cuenta con permiso de pesca?</th>';
                  echo '<th class="span1">12. ¿Su embarcación cuenta con protocolo técnico sanitario?</th>';
                  echo '<th class="span1">13. ¿Su embarcación cuenta con número de matrícula?</th>';

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
                  echo '<td>Años</td>';
                  echo '<td>Meses</td>';     

                  echo '<td>Cod</td>';
                  echo '<td>10.1 Eslora (Largo)</td>';
                  echo '<td>10.2 Manga (Ancho)</td>';       
                  echo '<td>10.3 Puntal (Altura)</td>';

                  echo '<td></td>';
                  echo '<td></td>';
                  echo '<td></td>';
               echo '</tr>';

              echo '</tbody>';
            echo '</table>';		



		echo '</div>';
	echo '</div>';
echo '</div>'; 



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<div class="row-fluid">';
  echo '<div class="span12">';  
    echo '<div class="question">';
      echo '<p style="text-align:center"></p>'; 

      echo '<table class="table table-condensed" id="emb_table2">';
              echo '<thead>';
                echo '<tr>';
                  echo '<th class="span1">3. Embarcación N°</th>';
                  echo '<th class="span1">14. ¿Cuál es el número de matrícula?</th>';
                  echo '<th class="span1">15. ¿Su embarcación se desplaza a:</th>';
                  echo '<th class="span1">16. ¿Cuál es el tipo de motor?</th>';
                  echo '<th class="span1">17. ¿Su embarcación se encuentra:</th>';
                  echo '<th class="span1">18. ¿Cuál es la ubicación del motor?</th>';
                  echo '<th class="span1">19. ¿Cuál es la potencia del motor (HP)?</th>';
                  echo '<th class="span1" colspan="2">20. ¿El tipo de bodega es:</th>';
                  echo '<th class="span1">21. Su bodega es insulada?</th>';
                  echo '<th class="span1" colspan="4">22. ¿Cuáles son las dimensiones de la bodega ?</th>';
                  echo '<th class="span1">23. ¿El tipo de hielo que utiliza es :</th>';

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

                  echo '<td>Tipo</td>';     
                  echo '<td>¿Cuál es su capacidad (Kg)?</td>';

                  echo '<td></td>';

                  echo '<td>Cód.</td>';       
                  echo '<td>22.1 (Largo)</td>';
                  echo '<td>22.2 (Ancho)</td>';
                  echo '<td>22.3 (Altura)</td>';

                  echo '<td></td>';
               echo '</tr>';

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
  $('#emb_table2 tr').remove('.embx2');
  for(var i=1; i<=$(this).val();i++){
    var asd = '<tr class="embx">';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_3' + '_' + i + '" id="S9_3' + '_' + i + '" readonly value="' + i + '" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_4' + '_' + i + '" id="S9_4' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_5' + '_' + i + '" id="S9_5' + '_' + i + '" value="" ><input type="text" class="span12" maxlength="100" name="S9_5' + '_' + i + '_O" id="S9_5' + '_' + i + '_O" value="" >Especifique</td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_6' + '_' + i + '" id="S9_6' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_7' + '_' + i + '" id="S9_7' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="4" name="S9_8' + '_' + i + '" id="S9_8' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="2" name="S9_9' + '_' + i + '_A" id="S9_9' + '_' + i + '_A" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="2" name="S9_9' + '_' + i + '_M" id="S9_9' + '_' + i + '_M" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="2" name="S9_10' + '_' + i + '_MED" id="S9_10' + '_' + i + '_MED" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_10' + '_' + i + '_1" id="S9_10' + '_' + i + '_1" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_10' + '_' + i + '_2" id="S9_10' + '_' + i + '_2" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_10' + '_' + i + '_3" id="S9_10' + '_' + i + '_3" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_11' + '_' + i + '" id="S9_11' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_12' + '_' + i + '" id="S9_12' + '_' + i + '" value="" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_13' + '_' + i + '" id="S9_13' + '_' + i + '" value="" ></td>';
    asd += '</tr>';
    $('#emb_table > tbody').append(asd);
    // $('#emb_table > tbody:last').append('<tr class="embx"><td><input type="text" class="span12" maxlength="80" name="S9_3_1' + '_' + i + '" id="S9_3_1' + '_' + i + '" value="' + i + '" ></td></tr>');
    var asd2 = '<tr class="embx2">';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_33' + '_' + i + '" id="S9_33' + '_' + i + '" readonly value="' + i + '" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="50" name="S9_14' + '_' + i + '" id="S9_14' + '_' + i + '" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_15' + '_' + i + '" id="S9_15' + '_' + i + '" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_16' + '_' + i + '" id="S9_16' + '_' + i + '" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_17' + '_' + i + '" id="S9_17' + '_' + i + '" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_18' + '_' + i + '" id="S9_18' + '_' + i + '" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="2" name="S9_19' + '_' + i + '" id="S9_19' + '_' + i + '" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_20_T' + '_' + i + '" id="S9_20_T' + '_' + i + '" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="5" name="S9_20_C' + '_' + i + '" id="S9_20_C' + '_' + i + '" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_21' + '_' + i + '" id="S9_21' + '_' + i + '" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_22' + '_' + i + '_MED" id="S9_22' + '_' + i + '_MED" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="5" name="S9_22' + '_' + i + '_1" id="S9_22' + '_' + i + '_1" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="5" name="S9_22' + '_' + i + '_2" id="S9_22' + '_' + i + '_2" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="5" name="S9_22' + '_' + i + '_3" id="S9_22' + '_' + i + '_3" value="" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_23' + '_' + i + '" id="S9_23' + '_' + i + '" value="" ></td>';
    asd2 += '</tr>'; 
    $('#emb_table2 > tbody').append(asd2);
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
