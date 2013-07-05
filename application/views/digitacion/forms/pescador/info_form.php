<?php 
$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';


//Observaciones
$OBS = array(
	'name'	=> 'OBS',
	'id'	=> 'OBS',
	'maxlength'	=> 1000,
	'class' => $span_class,
);

//FECHA DE EMPADRONAMIENTO DIA
$F_D = array(
	'name'	=> 'F_D',
	'id'	=> 'F_D',
	'maxlength'	=> 2,
	'class' => $span_class,
);

//FECHA DE EMPADRONAMIENTO MES
$F_M = array(
	'name'	=> 'F_M',
	'id'	=> 'F_M',
	'maxlength'	=> 2,
	'class' => $span_class,
);

//FECHA DE EMPADRONAMIENTO AÑO
$F_A = array(
	'name'	=> 'F_A',
	'id'	=> 'F_A',
	'value' => 2013,
	'readonly'=>'readonly',
	'maxlength'	=> 4,
	'class' => $span_class,
);

//RESULTADO
$RES = array(
	'name'	=> 'RES',
	'id'	=> 'RES',
	'maxlength'	=> 1,
	'class' => $span_class,
);
//Empadronador
$EMP = array(
	'name'	=> 'EMP',
	'id'	=> 'EMP',
	'maxlength'	=> 100,
	'class' => $span_class,
);
//Empadronador_DNI
$EMP_DNI = array(
	'name'	=> 'EMP_DNI',
	'id'	=> 'EMP_DNI',
	'maxlength'	=> 8,
	'class' => $span_class,
);

/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////

$attr = array('class' => 'form-vertical form-auth','id' => 'pesc_info');

echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 



//S E C C I O N    OBSERVACIONES
echo '<div class="well modulo">';

	echo '<div class="row-fluid">';

		echo '<div class="span12">';
			echo '<div class="control-group">';
			echo '<h4> OBSERVACIONES</h4>';
				echo '<div class="controls">'; 
					echo form_textarea($OBS); 
					echo '<span class="help-inline"></span>';
					echo '<div class="help-block error">' . form_error($OBS['name']) . '</div>';
				echo '</div>'; 	
			echo '</div>';
		echo '</div>';

	echo '</div>';

echo '</div>'; //S OBS


//S E C C I O N    1. INFORMACION
echo '<div class="well modulo ">';
		
	//cabecera-titulo
	echo '<div class="row-fluid seccion">';
		echo '<h4> INFORMACION PARA CONTROL DEL INEI</h4>';
	echo '</div>';
	
	echo '<div class="row-fluid ">';
		
		echo '<div class="span6 preguntas">';

		
				echo '<div class="span4 preguntas_n2">';
					echo '<h5>FECHA DE EMPADRONAMIENTO</h5>';
				echo '</div>';


				echo '<div class="offset2 span6 ">';

					echo '<div class="row-fluid">';

						echo '<div class="span3 preguntas_n">';
							echo '<h5>Día </h5>';
						echo '</div>'; 

						echo '<div class="span3 preguntas_n">';
							echo '<h5>Mes</h5>';
						echo '</div>'; 

						echo '<div class="span4 preguntas_n">';
						 	echo '<h5>Año</h5>';
						echo '</div>'; 	

					echo '</div>'; 

					echo '<div class="row-fluid">';

						echo '<div class="span3">';
							echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_D); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_D['name']) . '</div>';
									echo '</div>';	
							echo '</div>'; 
						echo '</div>'; 

						echo '<div class="span3">';
							echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_M); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_M['name']) . '</div>';
									echo '</div>';	
							echo '</div>'; 
						echo '</div>'; 

						echo '<div class="span4">';
							echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_A); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_A['name']) . '</div>';
									echo '</div>';	
							echo '</div>'; 
						echo '</div>'; 	

					echo '</div>'; 

				echo '</div>'; 

		echo '</div>';


		echo '<div class="span6 preguntas">';

			echo '<div class="row-fluid">';

				echo '<div class="span12 preguntas_n">';
					echo '<h5>RESULTADO DEL EMPADRONAMIENTO</h5>';
				echo '</div>'; 

			echo '</div>'; 

			echo '<div class="row-fluid">';

				echo '<div class="offset5 span2">';
					echo '<div class="control-group">';
							echo '<div class="controls">';
								echo form_input($RES); 
								echo '<span class="help-inline"></span>';
								echo '<div class="help-block error">' . form_error($RES['name']) . '</div>';
							echo '</div>';	
					echo '</div>'; 
				echo '</div>'; 

			echo '</div>'; 

		echo '</div>';
	echo '</div>';




echo '</div>';

//S E C C I O N    2. INFORMACION
echo '<div class="well modulo">';


	//Fila 1
	echo '<div class="row-fluid">';

		echo '<div class="row-fluid">';

			echo '<div class="span12">';

				echo '<div class="span3 preguntas_n">';
				echo '</div>';

				echo '<div class="span6 preguntas_n">';
					echo '<h5>NOMBRES Y APELLIDOS</h5>';
				echo '</div>';

				echo '<div class="span2 preguntas_sub">';
					echo '<h5>N° DE DNI</h5>';
				echo '</div>';

			echo '</div>';

		echo '</div>';	


		echo '<div class="row-fluid">';

			echo '<div class="span12">';

				echo '<div class="span3 preguntas_sub2">';
						echo '<p>Empadronador</p>';
				echo '</div>';

				echo '<div class="span6">';
					echo '<div class="control-group">';
						echo '<div class="controls">'; 
							echo form_input($EMP); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($EMP['name']) . '</div>';
						echo '</div>'; 	
					echo '</div>';
				echo '</div>';

				echo '<div class="span2">';
					echo '<div class="control-group">';
						echo '<div class="controls">'; 
							echo form_input($EMP_DNI); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($EMP_DNI['name']) . '</div>';
						echo '</div>'; 	
					echo '</div>';
				echo '</div>';

			echo '</div>';

		echo '</div>';


	echo '</div>'; // 1

echo '</div>'; //S info

echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
echo form_close(); 
		echo '</div>'; 			
	echo '</div>'; 	
 ?>



<script type="text/javascript">

//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------

$(function(){
	// $("#pesc_info").on("submit", function(event) {
	// 	$('#pesc_info').trigger('validate');
 // 	}); 
		//validacion
		$("#pesc_info").validate({
		    rules: {           
		    	F_D: {
		            required: true,
		            digits: true,
		         },     
		                                                                             
			//FIN RULES
		    },

		    messages: {   
		        F_D: {
		            required: "Dia",
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
		    	var seccion_info_data = $("#pesc_info").serializeArray();
			    seccion_info_data.push(
			        {name: 'ajax',value:1},
			        {name: 'pescador_id',value:$("input[name='pescador_id']").val()}      
			    );
				
		        var bsubinfo = $( "#pesc_info :submit" );
		        bsubinfo.attr("disabled", "disabled");
		        $.ajax({
		            url: CI.base_url + "digitacion/pesc_info",
		            type:'POST',
		            data:seccion_info_data,
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