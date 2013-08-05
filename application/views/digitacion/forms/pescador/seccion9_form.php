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
	echo '<h4>SECCIÓN IX. EMBARCACIONES</h4>';

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
  // echo '</div>';







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

			echo '<table class="table table-condensed" id="embarcacionex">';
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

      echo '<table class="table table-condensed" id="embarcacionex2">';
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

  $('#embarcacionex tr').remove('.embarc');
  $('#embarcacionex2 tr').remove('.embarc2');
  for(var i=1; i<=$(this).val();i++){
    var asd = '<tr class="embarc">';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_3' + '_' + i + '" id="S9_3' + '_' + i + '" readonly value="' + i + '" ></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_4' + '_' + i + '" id="S9_4' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_5' + '_' + i + '" id="S9_5' + '_' + i + '" value="" ><div class="help-block error"></div><input type="text" class="span12" maxlength="100" name="S9_5' + '_' + i + '_O" id="S9_5' + '_' + i + '_O" value="" >Especifique</td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_6' + '_' + i + '" id="S9_6' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_7' + '_' + i + '" id="S9_7' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="4" name="S9_8' + '_' + i + '" id="S9_8' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="2" name="S9_9' + '_' + i + '_A" id="S9_9' + '_' + i + '_A" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="2" name="S9_9' + '_' + i + '_M" id="S9_9' + '_' + i + '_M" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="2" name="S9_10' + '_' + i + '_MED" id="S9_10' + '_' + i + '_MED" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_10' + '_' + i + '_1" id="S9_10' + '_' + i + '_1" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_10' + '_' + i + '_2" id="S9_10' + '_' + i + '_2" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_10' + '_' + i + '_3" id="S9_10' + '_' + i + '_3" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_11' + '_' + i + '" id="S9_11' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="1" name="S9_12' + '_' + i + '" id="S9_12' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd +='<td><input type="text" class="span12" maxlength="5" name="S9_13' + '_' + i + '" id="S9_13' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd += '</tr>';
    $('#embarcacionex > tbody').append(asd);
    // $('#emb_table > tbody:last').append('<tr class="embx"><td><input type="text" class="span12" maxlength="80" name="S9_3_1' + '_' + i + '" id="S9_3_1' + '_' + i + '" value="' + i + '" ></td></tr>');
    var asd2 = '<tr class="embarc2">';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_33' + '_' + i + '" id="S9_33' + '_' + i + '" readonly value="' + i + '" ></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="50" name="S9_14' + '_' + i + '" id="S9_14' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_15' + '_' + i + '" id="S9_15' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_16' + '_' + i + '" id="S9_16' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_17' + '_' + i + '" id="S9_17' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_18' + '_' + i + '" id="S9_18' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="2" name="S9_19' + '_' + i + '" id="S9_19' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_20' + '_' + i + '_T" id="S9_20' + '_' + i + '_T" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="5" name="S9_20' + '_' + i + '_C" id="S9_20' + '_' + i + '_C" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_21' + '_' + i + '" id="S9_21' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_22' + '_' + i + '_MED" id="S9_22' + '_' + i + '_MED" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="5" name="S9_22' + '_' + i + '_1" id="S9_22' + '_' + i + '_1" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="5" name="S9_22' + '_' + i + '_2" id="S9_22' + '_' + i + '_2" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="5" name="S9_22' + '_' + i + '_3" id="S9_22' + '_' + i + '_3" value="" ><div class="help-block error"></div></td>';
    asd2 +='<td><input type="text" class="span12" maxlength="1" name="S9_23' + '_' + i + '" id="S9_23' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
    asd2 += '</tr>'; 
    $('#embarcacionex2 > tbody').append(asd2);
  }
});

  // $("#seccion9").on("submit", function(event) {
  //   $('#seccion9').trigger('validate');
  // }); 
      //validacion
      $("#seccion9").validate({
          rules: {        
            S9_1: {
                digits: true,
                range:[1,2],
               },  
            S9_2: {
                digits: true,
                range:[1,6],
               },                 
//embarcacion 1
            S9_3_1: {
                digits: true,
                range:[1,6],
               },     
            S9_4_1: {
                digits: true,
                range:[1,5],
               },   
            S9_5_1: {
                digits: true,
                range:[1,7],
               }, 
            S9_5_1_O: {
                maxlength: 100,
               },                    
            S9_6_1: {
                digits: true,
                range:[1,7],
               },   
            S9_7_1: {
                digits: true,
                range:[1,4],
               },   
            S9_8_1: {
                digits: true,
                range:[1950,2013],
               },  
            S9_9_1_A: {
                digits: true,
                range:[0,20],
               },  
            S9_9_1_M: {
                digits: true,
                range:[0,11],
               },  
            S9_10_1_MED: {
                digits: true,
                range:[1,2],
               },  
            S9_10_1_1: {
                number: true,
                range:[0.1,40],
               },  
            S9_10_1_2: {
                number: true,
                range:[0.1,15],
               },  
            S9_10_1_3: {
                number: true,
                range:[0.1,10],
               },  
            S9_11_1: {
                digits: true,
                range:[1,2],
               }, 
            S9_12_1: {
                digits: true,
                range:[1,2],
               }, 
            S9_13_1: {
                digits: true,
                range:[1,2],
               }, 
            S9_14_1: {
                maxlength: 100,
               }, 
            S9_15_1: {
                digits: true,
                range:[1,3],
               }, 
            S9_16_1: {
                digits: true,
                range:[1,2],
               }, 
            S9_17_1: {
                digits: true,
                range:[1,4],
               }, 
            S9_18_1: {
                digits: true,
                range:[1,2],
               }, 
            S9_19_1: {
                digits: true,
                range:[10,98],
               }, 
            S9_20_1_T: {
                digits: true,
                range:[1,4],
               }, 
            S9_20_1_C: {
                digits: true,
                range:[1,20000],
               }, 
            S9_21_1: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_1_MED: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_1_1: {
                number: true,
                range:[0.1,40],
               },   
            S9_22_1_2: {
                number: true,
                range:[0.1,15],
               },        
            S9_22_1_3: {
                number: true,
                range:[0.1,10],
               },    
            S9_23_1: {
                digits: true,
                range:[1,3],
               },    
//embarcacion 1  
//embarcacion 2
            S9_3_2: {
                digits: true,
                range:[1,6],
               },     
            S9_4_2: {
                digits: true,
                range:[1,5],
               },   
            S9_5_2: {
                digits: true,
                range:[1,7],
               }, 
            S9_5_2_O: {
                maxlength: 100,
               },                    
            S9_6_2: {
                digits: true,
                range:[1,7],
               },   
            S9_7_2: {
                digits: true,
                range:[1,4],
               },   
            S9_8_2: {
                digits: true,
                range:[1950,2013],
               },  
            S9_9_2_A: {
                digits: true,
                range:[0,20],
               },  
            S9_9_2_M: {
                digits: true,
                range:[0,11],
               },  
            S9_10_2_MED: {
                digits: true,
                range:[1,2],
               },  
            S9_10_2_1: {
                number: true,
                range:[0.1,40],
               },  
            S9_10_2_2: {
                number: true,
                range:[0.1,15],
               },  
            S9_10_2_3: {
                number: true,
                range:[0.1,10],
               },  
            S9_11_2: {
                digits: true,
                range:[1,2],
               }, 
            S9_12_2: {
                digits: true,
                range:[1,2],
               }, 
            S9_13_2: {
                digits: true,
                range:[1,2],
               }, 
            S9_14_2: {
                maxlength: 100,
               }, 
            S9_15_2: {
                digits: true,
                range:[1,3],
               }, 
            S9_16_2: {
                digits: true,
                range:[1,2],
               }, 
            S9_17_2: {
                digits: true,
                range:[1,4],
               }, 
            S9_18_2: {
                digits: true,
                range:[1,2],
               }, 
            S9_19_2: {
                digits: true,
                range:[10,98],
               }, 
            S9_20_2_T: {
                digits: true,
                range:[1,4],
               }, 
            S9_20_2_C: {
                digits: true,
                range:[1,20000],
               }, 
            S9_21_2: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_2_MED: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_2_1: {
                number: true,
                range:[0.1,40],
               },   
            S9_22_2_2: {
                number: true,
                range:[0.1,15],
               },        
            S9_22_2_3: {
                number: true,
                range:[0.1,10],
               },    
            S9_23_2: {
                digits: true,
                range:[1,3],
               },    
//embarcacion 2                   
//embarcacion 3
            S9_3_3: {
                digits: true,
                range:[1,6],
               },     
            S9_4_3: {
                digits: true,
                range:[1,5],
               },   
            S9_5_3: {
                digits: true,
                range:[1,7],
               }, 
            S9_5_3_O: {
                maxlength: 100,
               },                    
            S9_6_3: {
                digits: true,
                range:[1,7],
               },   
            S9_7_3: {
                digits: true,
                range:[1,4],
               },   
            S9_8_3: {
                digits: true,
                range:[1950,2013],
               },  
            S9_9_3_A: {
                digits: true,
                range:[0,20],
               },  
            S9_9_3_M: {
                digits: true,
                range:[0,11],
               },  
            S9_10_3_MED: {
                digits: true,
                range:[1,2],
               },  
            S9_10_3_1: {
                number: true,
                range:[0.1,40],
               },  
            S9_10_3_2: {
                number: true,
                range:[0.1,15],
               },  
            S9_10_3_3: {
                number: true,
                range:[0.1,10],
               },  
            S9_11_3: {
                digits: true,
                range:[1,2],
               }, 
            S9_12_3: {
                digits: true,
                range:[1,2],
               }, 
            S9_13_3: {
                digits: true,
                range:[1,2],
               }, 
            S9_14_3: {
                maxlength: 100,
               }, 
            S9_15_3: {
                digits: true,
                range:[1,3],
               }, 
            S9_16_3: {
                digits: true,
                range:[1,2],
               }, 
            S9_17_3: {
                digits: true,
                range:[1,4],
               }, 
            S9_18_3: {
                digits: true,
                range:[1,2],
               }, 
            S9_19_3: {
                digits: true,
                range:[10,98],
               }, 
            S9_20_3_T: {
                digits: true,
                range:[1,4],
               }, 
            S9_20_3_C: {
                digits: true,
                range:[1,20000],
               }, 
            S9_21_3: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_3_MED: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_3_1: {
                number: true,
                range:[0.1,40],
               },   
            S9_22_3_2: {
                number: true,
                range:[0.1,15],
               },        
            S9_22_3_3: {
                number: true,
                range:[0.1,10],
               },    
            S9_23_3: {
                digits: true,
                range:[1,3],
               },    
//embarcacion 3    
//embarcacion 4
            S9_3_4: {
                digits: true,
                range:[1,6],
               },     
            S9_4_4: {
                digits: true,
                range:[1,5],
               },   
            S9_5_4: {
                digits: true,
                range:[1,7],
               }, 
            S9_5_4_O: {
                maxlength: 100,
               },                    
            S9_6_4: {
                digits: true,
                range:[1,7],
               },   
            S9_7_4: {
                digits: true,
                range:[1,4],
               },   
            S9_8_4: {
                digits: true,
                range:[1950,2013],
               },  
            S9_9_4_A: {
                digits: true,
                range:[0,20],
               },  
            S9_9_4_M: {
                digits: true,
                range:[0,11],
               },  
            S9_10_4_MED: {
                digits: true,
                range:[1,2],
               },  
            S9_10_4_1: {
                number: true,
                range:[0.1,40],
               },  
            S9_10_4_2: {
                number: true,
                range:[0.1,15],
               },  
            S9_10_4_3: {
                number: true,
                range:[0.1,10],
               },  
            S9_11_4: {
                digits: true,
                range:[1,2],
               }, 
            S9_12_4: {
                digits: true,
                range:[1,2],
               }, 
            S9_13_4: {
                digits: true,
                range:[1,2],
               }, 
            S9_14_4: {
                maxlength: 100,
               }, 
            S9_15_4: {
                digits: true,
                range:[1,3],
               }, 
            S9_16_4: {
                digits: true,
                range:[1,2],
               }, 
            S9_17_4: {
                digits: true,
                range:[1,4],
               }, 
            S9_18_4: {
                digits: true,
                range:[1,2],
               }, 
            S9_19_4: {
                digits: true,
                range:[10,98],
               }, 
            S9_20_4_T: {
                digits: true,
                range:[1,4],
               }, 
            S9_20_4_C: {
                digits: true,
                range:[1,20000],
               }, 
            S9_21_4: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_4_MED: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_4_1: {
                number: true,
                range:[0.1,40],
               },   
            S9_22_4_2: {
                number: true,
                range:[0.1,15],
               },        
            S9_22_4_3: {
                number: true,
                range:[0.1,10],
               },    
            S9_23_4: {
                digits: true,
                range:[1,3],
               },    
//embarcacion 4      
//embarcacion 5
            S9_3_5: {
                digits: true,
                range:[1,6],
               },     
            S9_4_5: {
                digits: true,
                range:[1,5],
               },   
            S9_5_5: {
                digits: true,
                range:[1,7],
               }, 
            S9_5_5_O: {
                maxlength: 100,
               },                    
            S9_6_5: {
                digits: true,
                range:[1,7],
               },   
            S9_7_5: {
                digits: true,
                range:[1,4],
               },   
            S9_8_5: {
                digits: true,
                range:[1950,2013],
               },  
            S9_9_5_A: {
                digits: true,
                range:[0,20],
               },  
            S9_9_5_M: {
                digits: true,
                range:[0,11],
               },  
            S9_10_5_MED: {
                digits: true,
                range:[1,2],
               },  
            S9_10_5_1: {
                number: true,
                range:[0.1,40],
               },  
            S9_10_5_2: {
                number: true,
                range:[0.1,15],
               },  
            S9_10_5_3: {
                number: true,
                range:[0.1,10],
               },  
            S9_11_5: {
                digits: true,
                range:[1,2],
               }, 
            S9_12_5: {
                digits: true,
                range:[1,2],
               }, 
            S9_13_5: {
                digits: true,
                range:[1,2],
               }, 
            S9_14_5: {
                maxlength: 100,
               }, 
            S9_15_5: {
                digits: true,
                range:[1,3],
               }, 
            S9_16_5: {
                digits: true,
                range:[1,2],
               }, 
            S9_17_5: {
                digits: true,
                range:[1,4],
               }, 
            S9_18_5: {
                digits: true,
                range:[1,2],
               }, 
            S9_19_5: {
                digits: true,
                range:[10,98],
               }, 
            S9_20_5_T: {
                digits: true,
                range:[1,4],
               }, 
            S9_20_5_C: {
                digits: true,
                range:[1,20000],
               }, 
            S9_21_5: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_5_MED: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_5_1: {
                number: true,
                range:[0.1,40],
               },   
            S9_22_5_2: {
                number: true,
                range:[0.1,15],
               },        
            S9_22_5_3: {
                number: true,
                range:[0.1,10],
               },    
            S9_23_5: {
                digits: true,
                range:[1,3],
               },    
//embarcacion 5         
//embarcacion 6
            S9_3_6: {
                digits: true,
                range:[1,6],
               },     
            S9_4_6: {
                digits: true,
                range:[1,5],
               },   
            S9_5_6: {
                digits: true,
                range:[1,7],
               }, 
            S9_5_6_O: {
                maxlength: 100,
               },                    
            S9_6_6: {
                digits: true,
                range:[1,7],
               },   
            S9_7_6: {
                digits: true,
                range:[1,4],
               },   
            S9_8_6: {
                digits: true,
                range:[1950,2013],
               },  
            S9_9_6_A: {
                digits: true,
                range:[0,20],
               },  
            S9_9_6_M: {
                digits: true,
                range:[0,11],
               },  
            S9_10_6_MED: {
                digits: true,
                range:[1,2],
               },  
            S9_10_6_1: {
                number: true,
                range:[0.1,40],
               },  
            S9_10_6_2: {
                number: true,
                range:[0.1,15],
               },  
            S9_10_6_3: {
                number: true,
                range:[0.1,10],
               },  
            S9_11_6: {
                digits: true,
                range:[1,2],
               }, 
            S9_12_6: {
                digits: true,
                range:[1,2],
               }, 
            S9_13_6: {
                digits: true,
                range:[1,2],
               }, 
            S9_14_6: {
                maxlength: 100,
               }, 
            S9_15_6: {
                digits: true,
                range:[1,3],
               }, 
            S9_16_6: {
                digits: true,
                range:[1,2],
               }, 
            S9_17_6: {
                digits: true,
                range:[1,4],
               }, 
            S9_18_6: {
                digits: true,
                range:[1,2],
               }, 
            S9_19_6: {
                digits: true,
                range:[10,98],
               }, 
            S9_20_6_T: {
                digits: true,
                range:[1,4],
               }, 
            S9_20_6_C: {
                digits: true,
                range:[1,20000],
               }, 
            S9_21_6: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_6_MED: {
                digits: true,
                range:[1,2],
               }, 
            S9_22_6_1: {
                number: true,
                range:[0.1,40],
               },   
            S9_22_6_2: {
                number: true,
                range:[0.1,15],
               },        
            S9_22_6_3: {
                number: true,
                range:[0.1,10],
               },    
            S9_23_6: {
                digits: true,
                range:[1,3],
               },    
//embarcacion 6                                    
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
