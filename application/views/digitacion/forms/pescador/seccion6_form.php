<?php 
$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';

/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//SECCION 6
//sociales de pescadores artesanales 
$S6_1 = array(
	'name'	=> 'S6_1',
	'id'	=> 'S6_1',
	'maxlength'	=> 1,
	'class' => $span_class,
);
$S6_2 = array(
	'name'	=> 'S6_2',
	'id'	=> 'S6_2',
	'maxlength'	=> 100,
	'class' => $span_class,
);

//01
$S6_3_1 = array(
	'name'	=> 'S6_3_1',
	'id'	=> 'S6_3_1',
	'maxlength'	=> 1,
	'class' => $span_class . ' s6preg3',
);
//02
$S6_3_2 = array(
	'name'	=> 'S6_3_2',
	'id'	=> 'S6_3_2',
	'maxlength'	=> 1,
	'class' => $span_class . ' s6preg3',
);
//03
$S6_3_3 = array(
	'name'	=> 'S6_3_3',
	'id'	=> 'S6_3_3',
	'maxlength'	=> 1,
	'class' => $span_class . ' s6preg3',
);
//4
$S6_3_4 = array(
	'name'	=> 'S6_3_4',
	'id'	=> 'S6_3_4',
	'maxlength'	=> 1,
	'class' => $span_class . ' s6preg3',
);
//5
$S6_3_5 = array(
	'name'	=> 'S6_3_5',
	'id'	=> 'S6_3_5',
	'maxlength'	=> 1,
	'class' => $span_class . ' s6preg3',
);
//6
$S6_3_6 = array(
	'name'	=> 'S6_3_6',
	'id'	=> 'S6_3_6',
	'maxlength'	=> 1,
	'class' => $span_class . ' s6preg3',
);
//5
$S6_3_5_O = array(
	'name'	=> 'S6_3_5_O',
	'id'	=> 'S6_3_5_O',
	'maxlength'	=> 100,
	'class' => $span_class,
);


//MYPE
$S6_4 = array(
	'name'	=> 'S6_4',
	'id'	=> 'S6_4',
	'maxlength'	=> 1,
	'class' => $span_class,
);
$S6_5 = array(
	'name'	=> 'S6_5',
	'id'	=> 'S6_5',
	'maxlength'	=> 1,
	'class' => $span_class,
);
$S6_6 = array(
	'name'	=> 'S6_6',
	'id'	=> 'S6_6',
	'maxlength'	=> 1,
	'class' => $span_class,
);
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
//FIN SECCION 6

$attr = array('class' => 'form-vertical form-auth','id' => 'seccion6');

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
//COLUMNAS SECCION VI
echo '<div class="well modulo">';
	echo '<h4>SECCIÓN VI. ASOCIATIVIDAD Y FORMALIZACIÓN</h4>';
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
			echo '<p>1. ¿Pertenece usted a una o más organizaciones de pescadores? </p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S6_1); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S6_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 1

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 2

		echo '<div class="question">';
			echo '<p>2. ¿Cuál es el nombre de la organización a la que pertenece?</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset2 span8">';
								echo '<div class="controls">';
										echo form_input($S6_2); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S6_2['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 2

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 3
				echo '<div class="question">';
			echo '<p>3. ¿Qué beneficios obtiene de su organización?</p>';	
				echo '<div class="row-fluid">';
						echo '<table class="table table-condensed" id="emb_table">';
					              echo '<thead>';
					                echo '<tr>';
					                  echo '<th class="span5"></th>';
					                  echo '<th class="span2"></th>';
					                   echo '<th class="span2"></th>';
					                   echo '<th class="span3"></th>';
					                echo '</tr>';
					              echo '</thead>';
					              echo '<tbody>';
					               echo '<tr>';
					                  echo '<td>Aumenta los ingresos</td>';
					                  echo '<td>' . form_input($S6_3_1) . '<div class="help-block error">' . form_error($S6_3_1['name']) . '</div></td>';
					               	  echo '<td></td>';
					               	  echo '<td></td>';
					               echo '</tr>';   
					               echo '<tr>';
					                  echo '<td>Disminuye los costos</td>';
					                  echo '<td>' . form_input($S6_3_2) . '<div class="help-block error">' . form_error($S6_3_2['name']) . '</div></td>';
					               	  echo '<td></td>';
					               	  echo '<td></td>';
					               echo '</tr>';  
					               echo '<tr>';
					                  echo '<td>Recibe asistencia técnica</td>';
					                  echo '<td>' . form_input($S6_3_3) . '<div class="help-block error">' . form_error($S6_3_3['name']) . '</div></td>';
					               	  echo '<td></td>';
					               	  echo '<td></td>';
					               echo '</tr>'; 				
					               echo '<tr>';
					                  echo '<td>Mejora posicionamiento en el mercado</td>';
					                  echo '<td>' . form_input($S6_3_4) . '<div class="help-block error">' . form_error($S6_3_4['name']) . '</div></td>';
					               	  echo '<td></td>';
					               	  echo '<td></td>';
					               echo '</tr>'; 
					               echo '<tr>';
					                  echo '<td>Otro</div></td>';
					                  echo '<td>' . form_input($S6_3_5) . '<div class="help-block error">' . form_error($S6_3_5['name']) . '</div></td>';
					               	  echo '<td>Especifique</td>';
					               	  echo '<td>' . form_input($S6_3_5_O) . '<div class="help-block error">' . form_error($S6_3_5_O['name']) . '</div></td>';
					               echo '</tr>';				                	
					               echo '<tr>';
					                  echo '<td>NINGUNO</td>';
					                  echo '<td>' . form_input($S6_3_6) . '<div class="help-block error">' . form_error($S6_3_6['name']) . '</div></td>';
					               echo '</tr>'; 			               					               					               	                					                						               				               					               					               
			              echo '</tbody>';
			            echo '</table>';	
				echo '</div>';	
		echo '</div>';		
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 3

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
/////////////////////////////////////////////PREGUNTA 4

		echo '<div class="question">';
			echo '<p>4. ¿Cuenta usted con permiso para desarrollar su actividad de pesca?</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S6_4); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S6_4['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 4

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 5

		echo '<div class="question">';
			echo '<p>5. ¿Su permiso se encuentra vigente?</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S6_5); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S6_5['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 5
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 6

		echo '<div class="question">';
			echo '<p>6. ¿Pertenece a una o más organizaciones productivas (MYPES, Talleres comunales, entre otras)?</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S6_6); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S6_6['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 6






////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN COLUMNA 2
	echo '</div>'; 	


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
//FIN COLUMNAS SECCION V
	echo '</div>'; 
echo '</div>'; 
////////////////////////////////////////////////////////////////////////////////////////////////////////

echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
echo form_close(); 
		echo '</div>'; 			
	echo '</div>'; 	
 ?>




<script type="text/javascript">
//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------

$(function(){




$('#S6_1').change(function() {
	var s6p1 = $('#S6_2, #S6_3_1, #S6_3_2, #S6_3_3, #S6_3_4, #S6_3_5, #S6_3_6, #S6_3_5_O');
	var th = $(this).val();
	if( th == 2 ){	
		s6p1.val('')
		s6p1.attr("disabled", "disabled"); 		
	}else{
		s6p1.removeAttr('disabled');
		$('#S6_3_5_O').val('');
		$('#S6_3_5_O').attr("disabled", "disabled"); 	

	}		
});


$('#S6_3_5').change(function() {
	var th = $(this).val();
	var des = $('#' + $(this).attr('id') + '_O');
	if(th == 1){
		des.removeAttr('disabled');
	}else{
		des.val('')
		des.attr("disabled", "disabled"); 
	}
});


$('#S6_4').change(function() {
	var s6p1 = $('#S6_5');
	var th = $(this).val();
	if( th == 2 ){	
		s6p1.val('')
		s6p1.attr("disabled", "disabled"); 		
	}else{
		s6p1.removeAttr('disabled');

	}		
});


//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//Campos deshabilitados
$('#S6_3_5_O').attr("disabled", "disabled");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

	// $("#seccion6").on("submit", false); 

	// $("#seccion6 :submit").on("click", function(event) {
	// 	$('#seccion6').validate();
 // 	}); 

	 $("#seccion6").validate({
		    rules: {           
		    	S6_1: {
		            digits: true,
		            valrango: [1,2,9],
		         },     
		    	S6_2: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         }, 
		    	S6_3_1: {
		            digits: true,
		            valrango: [0,1,9],
		         }, 	
		    	S6_3_2: {
		            digits: true,
		            valrango: [0,1,9],
		         }, 	
		    	S6_3_3: {
		            digits: true,
		            valrango: [0,1,9],
		         }, 
		    	S6_3_4: {
		            digits: true,
		            valrango: [0,1,9],
		         },	
		    	S6_3_5: {
		            digits: true,
		            valrango: [0,1,9],
		         },		
		    	S6_3_5_O: {
		    		required:true,
					maxlength: 100,
					validName:true,
		         },	
		    	S6_3_6: {
		            digits: true,
		            valrango: [0,1,9],
		            valzero:['S6_3_1', 'S6_3_2', 'S6_3_3', 'S6_3_4', 'S6_3_5'],
		            valnone:['S6_3_1', 'S6_3_2', 'S6_3_3', 'S6_3_4', 'S6_3_5'],
		         },	
		    	S6_4: {
		            digits: true,
		            valrango: [1,2,9],
		         },	
		    	S6_5: {
		            digits: true,
		            valrango: [1,2,9],
		         },	
		    	S6_6: {
		            digits: true,
		            valrango: [1,2,9],
		         },				         			         		         		         		                  	         		         	         	          		                                                                             
			//FIN RULES
		    },

		    messages: {   
		        S6_1: {
		            required: "Pertenece usted a una o más organizaciones de pescadores",
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
				// var s6p3_sum = 0;
				// $('.s6preg3').each(function(){
				//     s6p3_sum += parseInt(this.value);
				// });	

				// if(s6p3_sum != 0){	
				    	//seccion 2 serial
				    	var seccion6_data = $("#seccion6").serializeArray();
					    seccion6_data.push(
					        {name: 'ajax',value:1},
					        {name: 'pescador_id',value:$("input[name='pescador_id']").val()}      
					    );
						
				        var bsub6 = $( "#seccion6 :submit" );
				        // bsub6.attr("disabled", "disabled");
				        $.ajax({
				            url: CI.base_url + "digitacion/pesc_seccion6",
				            type:'POST',
				            data:seccion6_data,
				            dataType:'json',
				            success:function(json){
								alert(json.msg);
								// $('#pesc_tabs').empty();
								// $('#pesc_tabs').append(window.clonetabs);
								// $('#pesc_tabs').removeClass('hide');
								$('#pesca_dor').trigger('submit');
				            }
				        });     
			   	// }else{
			    // 	alert('Debe ingresar al menos una opción, no pueden ser 0 todas las opciones..');
			    // 	$('input.s6preg3:first').focus();
			    // } 			          	
		    }       
		}); 		

		
 }); 
</script>