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

//01
$S6_2_1 = array(
	'name'	=> 'S6_2_1',
	'id'	=> 'S6_2_1',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//02
$S6_2_2 = array(
	'name'	=> 'S6_2_2',
	'id'	=> 'S6_2_2',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//03
$S6_2_3 = array(
	'name'	=> 'S6_2_3',
	'id'	=> 'S6_2_3',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//organizaciones productivas
$S6_3 = array(
	'name'	=> 'S6_3',
	'id'	=> 'S6_3',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//MYPE
$S6_4 = array(
	'name'	=> 'S6_4',
	'id'	=> 'S6_4',
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
	echo '<h4>SECCION VI. ASOCIATIVIDAD Y FORMALIZACIÓN</h4>';
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
			echo '<p>2.	¿A cuál o cuáles pertenece?</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="offset3 span1">';	
								echo form_label('1.', $S6_2_1['id'], $label_class);
							echo '</div>'; 	
							echo '<div class="control-group span4">';
								echo '<div class="controls">';
										echo form_input($S6_2_1); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S6_2_1['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	

				echo '<div class="row-fluid">';
							echo '<div class="offset3 span1">';	
								echo form_label('2.', $S6_2_2['id'], $label_class);
							echo '</div>'; 					
							echo '<div class="control-group span4">';
								echo '<div class="controls">';
										echo form_input($S6_2_2); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S6_2_2['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	

				echo '<div class="row-fluid">';
							echo '<div class="offset3 span1">';	
								echo form_label('3.', $S6_2_3['id'], $label_class);
							echo '</div>'; 						
							echo '<div class="control-group span4">';
								echo '<div class="controls">';
										echo form_input($S6_2_3); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S6_2_3['name']) . '</div>';
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
/////////////////////////////////////////////PREGUNTA 3

		echo '<div class="question">';
			echo '<p>3. ¿Pertenece a una o más organizaciones productivas (MYPES, Talleres comunales, entre otras)?</p>';	
				echo '<div class="row-fluid">';
							echo '<div class="control-group offset4 span4">';
								echo '<div class="controls">';
										echo form_input($S6_3); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($S6_3['name']) . '</div>';
								echo '</div>';	
							echo '</div>'; 	
				echo '</div>';	
		echo '</div>';

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////FIN PREGUNTA 3

////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////PREGUNTA 4

		echo '<div class="question">';
			echo '<p>4. ¿Está interesado en constituirse como empresa?</p>';	
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

	// $("#seccion6").on("submit", false); 

	// $("#seccion6 :submit").on("click", function(event) {
	// 	$('#seccion6').validate();
 // 	}); 

	 $("#seccion6").validate({
		    rules: {           
		    	S6_1: {
		            required: true,
		            digits: true,
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

		    	//seccion 2 serial
		    	var seccion6_data = $("#seccion6").serializeArray();
			    seccion6_data.push(
			        {name: 'ajax',value:1},
			        {name: 'pescador_id',value:$("input[name='pescador_id']").val()}      
			    );
				
		        var bsub6 = $( "#seccion6 :submit" );
		        bsub6.attr("disabled", "disabled");
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
		          	
		    }       
		}); 		

		
 }); 
</script>