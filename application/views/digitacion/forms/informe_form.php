
<?php  
$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';

// A.  UBICACION GEOGRAFICA ----------------------------------
//FECHA DE EMPADRONAMIENTO DIA
$F_DIA = array(
	'name'	=> 'F_DIA',
	'id'	=> 'F_DIA',
	'maxlength'	=> 2,
	'class' => $span_class,
);

//FECHA DE EMPADRONAMIENTO MES
$F_MES = array(
	'name'	=> 'F_MES',
	'id'	=> 'F_MES',
	'maxlength'	=> 2,
	'class' => $span_class,
);


$CCDD = array(
	'name'	=> 'CCDD',
	'id'	=> 'CCDD',
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);


$CCPP = array(
	'name'	=> 'CCPP',
	'id'	=> 'CCPP',
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$CCDI = array(
	'name'	=> 'CCDI',
	'id'	=> 'CCDI',
	'maxlength'	=> 2,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$COD_CCPP = array(
	'name'	=> 'COD_CCPP',
	'id'	=> 'COD_CCPP',
	'maxlength'	=> 4,
	'class' => $span_class,
	'readonly' => 'readonly',
);

//Observaciones
$OBS = array(
	'name'	=> 'OBS',
	'id'	=> 'OBS',
	'rows' => 2,
	'maxlength'	=> 1000,
	'class' => $span_class,
);

//Observaciones
$OBSX = array(
	'name'	=> 'OBSX',
	'id'	=> 'OBSX',
	'rows' => 1,
	'maxlength'	=> 1000,
	'class' => $span_class,
);

		$cmba = array(-1 => '-'); 
		$cmbb = array(-1 => '-'); 
		$cmbc = array(-1 => '-'); 
		foreach($formus->result() as $e)
		{
			$cmba[$e->val]=strtoupper($e->nombre);
		}





		$empad = array(-1 => '-'); 
		foreach($sups->result() as $e)
		{
			$empad[$e->dni]=strtoupper($e->nombre);
		}

	$paisesArray= array(-1 => '-'); 
	foreach ($pais->result() as $filas)
		{
			$paisesArray[$filas->id] = $filas->detalle;
		}
	// CARGAR COMBOS

	//$depaArray = array(-1 =>' -'); 
		$depaArray = NULL;
		foreach($departamentos->result() as $filas)
		{
			$depaArray[$filas->COD_DEPARTAMENTO]=strtoupper($filas->DES_DISTRITO);
		}

		$ubidepaArray = NULL;
		foreach($departamento->result() as $filas)
		{
			$ubidepaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
		}

	$provArray = array(-1 => '-'); 
	$distArray = array(-1 => '-'); 
	$ccppArray = array(-1 => '-'); 


$attr = array('class' => 'form-vertical form-auth','id' => 'pesca_dor');
echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 
/////////////////////////////////////////////////////////////
//Empadronador_DNI
$INF_N = array(
	'name'	=> 'INF_N',
	'id'	=> 'INF_N',
	'maxlength'	=> 2,
	'class' => 'offset5 span2',
);



    echo form_hidden('pescador_id', '');
	echo '<div class="well modulo">';
			echo '<div class="control-group">';
      			echo '<h4 style="text-align:center">Informe de Supervisión Nacional<h4>';
						echo form_label('INFORME NRO','INF_N',$labelnroform);
						echo '<div class="controls">';	
							echo form_input($INF_N); 
						echo '</div>';
			echo '</div>';


			echo '<div class="row-fluid">';

			echo '<div class="span12">';

				echo '<div class="offset1 span2 preguntas_sub2">';
						echo '<p>Supervisor Nacional</p>';
				echo '</div>';

				echo '<div class="span6">';
					echo '<div class="control-group">';
						echo '<div class="controls">'; 
							// echo form_input($EMP); 
						    echo form_dropdown('EMPX', $empad, FALSE,'class="span12" id="EMPX"');
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error('EMPX') . '</div>';
						echo '</div>'; 	
					echo '</div>';
				echo '</div>';

			echo '</div>';

echo '<div class="row-fluid center">';
		
		echo '<div class="offset3 span6 ">';

		
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


					echo '</div>'; 

					echo '<div class="row-fluid">';

						echo '<div class="span3">';
							echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_DIA); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_DIA['name']) . '</div>';
									echo '</div>';	
							echo '</div>'; 
						echo '</div>'; 

						echo '<div class="span3">';
							echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_MES); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error($F_MES['name']) . '</div>';
									echo '</div>';	
							echo '</div>'; 
						echo '</div>'; 

					echo '</div>'; 

				echo '</div>'; 

		echo '</div>';



echo '</div>';






		echo '<div class="row-fluid">';

			echo '<div class="span4">';	
					echo '<div class="control-group">';
							echo '<div class="controls span4">';
								echo form_label('ODEI','NOM_DD',$label1);
							echo '</div>';								
							echo '<div class="controls span8">';
								echo form_dropdown('NOM_DD', $ubidepaArray, FALSE,'class="span12" id="NOM_DD"'); 
							echo '</div>';
					echo '</div>';  
				
			echo '</div>'; 
	

			echo '<div class="span4">';	
					echo '<div class="control-group">';
								echo '<div class="controls span4">';
									echo form_label('DEPARTAMENTO','NOM_PP',$label1);
								echo '</div>';		
								echo '<div class="controls span8">';
									echo form_dropdown('NOM_PP', $provArray, FALSE,'class="span12" id="NOM_PP"'); 
								echo '</div>';	

					echo '</div>'; 
			echo '</div>'; 

			echo '<div class="span4">';
					echo '<div class="control-group">';
									echo '<div class="controls span4">';
										echo form_label('PROVINCIA','NOM_DI',$label1);
									echo '</div>';	
									echo '<div class="controls span8">';
										echo form_dropdown('NOM_DI', $distArray, FALSE,'class="span12" id="NOM_DI"'); 
									echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	


		echo '</div>'; 	









		echo '<div class="row-fluid" style="margin-top:15px">';

			echo '<div class="offset1 span5">';
					echo '<div class="control-group">';
								echo '<div class="controls span4">';
									echo form_label('DISTRITO','NOM_CCPP',$label1);
								echo '</div>';	
								echo '<div class="controls span8">';
									echo form_dropdown('NOM_CCPP', $ccppArray, FALSE,'class="span12" id="NOM_CCPP"'); 
								echo '</div>';	

					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span5">';
					echo '<div class="control-group">';
								echo '<div class="controls span4">';
									echo form_label('CENTRO POBLADO CONCENTRACION','NOM_CCPP',$label1);
								echo '</div>';	
								echo '<div class="controls span8">';
									echo form_dropdown('NOM_CCPP', $ccppArray, FALSE,'class="span12" id="NOM_CCPP"'); 
								echo '</div>';	

					echo '</div>'; 	
			echo '</div>'; 	

			// echo '<div class="span4">';
			// 		echo '<div class="control-group">';
			// 					echo '<div class="controls span4">';
			// 						echo form_label('CENTRO POBLADO','NOM_CCPP',$label1);
			// 					echo '</div>';	
			// 					echo '<div class="controls span8">';
			// 						echo form_dropdown('NOM_CCPP', $ccppArray, FALSE,'class="span12" id="NOM_CCPP"'); 
			// 					echo '</div>';	

			// 		echo '</div>'; 	
			// echo '</div>'; 	

		echo '</div>'; 



echo form_submit('consulta', 'Consulta','class="btn btn-primary pull-right"');
echo anchor(site_url('digitacion/pescador'), 'Nuevo Formato','class="btn btn-success pull-left"');
echo form_close(); 
		echo '</div>'; 			
	echo '</div>'; 	






echo '<div class="well modulo" style="margin-top:15px; margin-bottom:20px">';
		echo '<div class="row-fluid">';
			echo '<div class="offset1 span5">';
					echo '<h5>1. COORDINACIÓN CON AUTORIDADES</h5>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo form_label('A .CONTACTO CON AUTORIDADES','NOM_CCPP',$label1);
								echo '<div class="controls span8">';
									echo form_dropdown('NOM_CCPP', $combo2, FALSE,'class="span12" id="NOM_CCPP"'); 
								echo '</div>';	
							echo '</div>';	
						echo '</div>'; 		

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo form_label('B. INFORMACIÓN DE FORMULARIO DE COMUNIDAD','NOM_CCPP',$label1);
								echo '<div class="controls span8">';
									echo form_dropdown('NOM_CCPP', $combo3, FALSE,'class="span12" id="NOM_CCPP"'); 
								echo '</div>';	
							echo '</div>';	
						echo '</div>'; 	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo form_label('C. COORDINACIÓN  DE LA CONVOCATORIA','NOM_CCPP',$label1);
								echo '<div class="controls span8">';
									echo form_dropdown('NOM_CCPP', $combo3, FALSE,'class="span12" id="NOM_CCPP"'); 
								echo '</div>';	
							echo '</div>';	
						echo '</div>'; 									
			echo '</div>'; 	

			echo '<div class="offset1 span5">';
					echo '<h5>2. EMPADRONAMIENTO</h5>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo form_label('A. CONSECUCIÓN DE LOCAL','NOM_CCPP',$label1);
								echo '<div class="controls span8">';
									echo form_dropdown('NOM_CCPP', $combo2, FALSE,'class="span12" id="NOM_CCPP"'); 
								echo '</div>';	
							echo '</div>';	
						echo '</div>'; 		

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo form_label('B. CONVOCATORIA','NOM_CCPP',$label1);
								echo '<div class="controls span8">';
									echo form_dropdown('NOM_CCPP', $combo2, FALSE,'class="span12" id="NOM_CCPP"'); 
								echo '</div>';	
							echo '</div>';	
						echo '</div>'; 	
									
			echo '</div>'; 				
		echo '</div>'; 			

		


		echo '<h5 style="text-align:center;">3. COBERTURA</h5>';		

		echo '<div class="row-fluid" style="margin-top:15px">';

			echo '<div class="span4">';		
					echo '<p style="text-align:center; margin-top:15px">A. PEA COBERTURADA</p>';		

						echo '<div class="row-fluid">';

							echo '<div class="offset2 span8">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_DIA); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('name') . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 							
			echo '</div>'; 


			echo '<div class="span4">';
					echo '<p style="text-align:center; margin-top:15px">B. PEA MARCO</p>';		

						echo '<div class="row-fluid">';

							echo '<div class="offset2 span8">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_DIA); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('name') . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 							
			echo '</div>'; 

			echo '<div class="span4">';		
					echo '<p style="text-align:center; margin-top:15px">C. PORCENTAJE DE AVANCE</p>';		

						echo '<div class="row-fluid">';

							echo '<div class="offset2 span8">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_DIA); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('name') . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 							
			echo '</div>'; 
				
		echo '</div>'; 



//ruta
		echo '<p style="text-align:center; margin-top:15px">D. RUTA</p>';		

		echo '<div class="row-fluid" style="margin-top:15px">';

			echo '<div class="span2">';		
					echo '<p style="text-align:center; margin-top:15px">NÚMERO DE EQUIPO</p>';		

						echo '<div class="row-fluid">';

							echo '<div class="offset2 span8">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_DIA); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('name') . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 							
			echo '</div>'; 

			echo '<div class="span2">';		
					echo '<p style="text-align:center; margin-top:15px">NÚMERO DE RUTA</p>';		

						echo '<div class="row-fluid">';

							echo '<div class="offset2 span8">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_DIA); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('name') . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 							
			echo '</div>'; 

			echo '<div class="span3">';
					echo '<p style="text-align:center; margin-top:15px">CENTRO POBLADO DE CONCENTRACIÓN</p>';		

						echo '<div class="row-fluid">';

							echo '<div class="offset2 span8">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_DIA); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('name') . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 							
			echo '</div>'; 

			echo '<div class="span2">';		
					echo '<p style="text-align:center; margin-top:15px">ERROR DE SUB RUTA</p>';		

						echo '<div class="row-fluid">';

							echo '<div class="offset2 span8">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_dropdown('NOM_CCPP', $combo3, FALSE,'class="span12" id="NOM_CCPP"'); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('name') . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 							
			echo '</div>'; 


			echo '<div class="span3">';
					echo '<p style="text-align:center; margin-top:15px">NUEVO PUNTO DE CONCENTRACIÓN</p>';		

						echo '<div class="row-fluid">';

							echo '<div class="offset2 span8">';

								echo '<div class="control-group">';
									echo '<div class="controls">';
										echo form_input($F_DIA); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('name') . '</div>';
									echo '</div>';	
								echo '</div>'; 

							echo '</div>';							

						echo '</div>'; 							
			echo '</div>'; 
				
		echo '</div>'; 		


//obs
		echo '<div class="row-fluid">';
			echo '<div class="span12">';		
				echo '<div class="control-group">';
					echo '<h5 style="text-align:center; margin-top:15px"> 4. OBSERVACIONES</h5>';
						echo '<div class="controls">'; 
							echo form_textarea($OBS); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($OBS['name']) . '</div>';
						echo '</div>'; 	
				echo '</div>';
			echo '</div>'; 
				
		echo '</div>'; 		




//bucle
		echo '<h5 style="text-align:center; margin-top:15px">5. DILIGENCIAMIENTO EN CAMPO</h5>';	
		echo '<div class="row-fluid" style="text-align:center;">';
			echo '<div class="span12" style="text-align:center; margin-top:20px">';		

				echo '<div class="span2">';		
						echo '<p style="text-align:center; margin-top:30px">TIPO DE FORMULARIO</p>';		

									echo '<div class="control-group">';
										echo '<div class="controls">';
											echo form_dropdown('P14', $cmba, FALSE,'class="span12" id="P14"'); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error('P14') . '</div>';
										echo '</div>';	
									echo '</div>'; 		
				echo '</div>'; 

				echo '<div class="span1">';		
						echo '<p style="text-align:center; margin-top:30px">NRO FORM</p>';		

									echo '<div class="control-group">';
										echo '<div class="controls">';
											echo form_input($F_DIA); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error('name') . '</div>';
										echo '</div>';	
									echo '</div>'; 		
				echo '</div>'; 

				echo '<div class="span2">';		
						echo '<p style="text-align:center; margin-top:30px">SECCIÓN</p>';		

									echo '<div class="control-group">';
										echo '<div class="controls">';
											echo form_dropdown('NOM_CCPP', $cmbb, FALSE,'class="span12" id="NOM_CCPP"'); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error('name') . '</div>';
										echo '</div>';	
									echo '</div>'; 		
				echo '</div>'; 

				echo '<div class="span2">';		
						echo '<p style="text-align:center; margin-top:30px">PREGUNTA</p>';		

									echo '<div class="control-group">';
										echo '<div class="controls">';
											echo form_dropdown('NOM_CCPP', $cmbb, FALSE,'class="span12" id="NOM_CCPP"'); 
											echo '<span class="help-inline"></span>';
											echo '<div class="help-block error">' . form_error('name') . '</div>';
										echo '</div>';	
									echo '</div>'; 		
				echo '</div>'; 

				echo '<p style="text-align:center; margin-top:15px;">TIPO DE ERROR</p>';		

				echo '<div class="span5">';		
								echo '<div class="row-fluid">';

									echo '<div class="span2">';		
										echo '<div class="control-group">';
											echo 'CONCEPTO';
											echo '<div class="controls">';
												echo form_input($F_DIA); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error('name') . '</div>';
											echo '</div>';	
										echo '</div>'; 		
									echo '</div>'; 	

									echo '<div class="span3">';		
										echo '<div class="control-group">';
											echo 'DILIGENCIAMIENTO';
											echo '<div class="controls">';
												echo form_input($F_DIA); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error('name') . '</div>';
											echo '</div>';	
										echo '</div>'; 		
									echo '</div>'; 	

									echo '<div class="span3">';		
										echo '<div class="control-group">';
											echo 'FORMULACIÓN';
											echo '<div class="controls">';
												echo form_input($F_DIA); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error('name') . '</div>';
											echo '</div>';	
										echo '</div>'; 		
									echo '</div>'; 

									echo '<div class="span2">';		
										echo '<div class="control-group">';
											echo 'SONDEO';										
											echo '<div class="controls">';
												echo form_input($F_DIA); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error('name') . '</div>';
											echo '</div>';	
										echo '</div>'; 		
									echo '</div>'; 

									echo '<div class="span2">';		
										echo '<div class="control-group">';
											echo 'OMISIÓN';										
											echo '<div class="controls">';
												echo form_input($F_DIA); 
												echo '<span class="help-inline"></span>';
												echo '<div class="help-block error">' . form_error('name') . '</div>';
											echo '</div>';	
										echo '</div>'; 		
									echo '</div>'; 	

								echo '</div>'; 		
				echo '</div>'; 


			echo '</div>'; 
				
		echo '</div>'; 	

		echo '<div class="row-fluid">';
			echo '<div class="span12">';		
				echo '<div class="control-group">';
					echo '<p style="text-align:center">OBSERVACIONES</p>';
						echo '<div class="controls">'; 
							echo form_textarea($OBSX); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($OBSX['name']) . '</div>';
						echo '</div>'; 	
				echo '</div>';
			echo '</div>'; 
				
		echo '</div>'; 


//modulo fin
echo '</div>'; 	

?>

<script type="text/javascript">

//FORM INFORME -------------------------------------------------------------------------------------------------------------------------------

$(function(){

  $('#NFORM').blur(function (){
     n = $(this).val().toString();
     while(n.length < 5) n = "0" + n;
     return $(this).val(n);
  });

  $(window).keydown(function(event){
      if(event.keyCode == 13) {
          event.preventDefault();
          return false;
      }
  });




  $('input,select,textarea').keydown( function(e) {
      var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
      if(key == 13)
      $(this).trigger('change');
   }); 

  $('input,select,textarea').keyup( function(e) {
    var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
    var inputs = $(this).closest('form').find(':input:enabled');
    if(key == 13) {
      inputs.eq( inputs.index(this)+1).focus(); 
      
    }
    else if (key == 27) {
      inputs.eq( inputs.index(this)-1).focus(); 
    }
  });    
// window.clonetabs = $("#insidetabs").clone(true); 


// CARGA COMBOS UBIGEO ---------------------------------------------------------------------->

$("#NOM_DD, #NOM_PP, #NOM_DI, #NOM_CCPP").change(function(event) {
        var sel = null;
        var dep = $('#NOM_DD');
        var prov = $('#NOM_PP');
        var dist = $('#NOM_DI');
        var url = null;
        var cod = null;
        var op =null;

        var mivalue = ($(this).val() == -1) ? '-' : $(this).val();
        switch(event.target.id){
            case 'NOM_DD':
                sel     = $("#NOM_PP");
                $('#CCDD').val(mivalue); 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_prov/" + $(this).val();
                op      = 1;
                break;

            case 'NOM_PP':
                sel     = $("#NOM_DI");
                $('#CCPP').val(mivalue);                 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_dist/" + $(this).val()+ "/" + dep.val();
                op      = 2;
                break;

            case 'NOM_DI':
                sel     = $("#NOM_CCPP");
                $("#CCDI").val(mivalue);          
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_ccpp/"  + dep.val() + "/" + prov.val() + "/" + $(this).val();
                op      = 3;
                break;  

            case 'NOM_CCPP':
                $("#COD_CCPP").val(mivalue);           
                break;  
        }     
        
        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            dep: dep.val(),
            prov:prov.val(),
            dist:dist.val(),
            ajax:1
        };

        if(event.target.id != 'NOM_CCPP')
        {

        $.ajax({
            url: url,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                if (op==3){
                    sel.append('<option value="-1"> - </option>');
                }                
                $.each(json_data, function(i, data){
                    if (op==1){
                        sel.append('<option value="' + data.CCPP + '">' + data.PROVINCIA + '</option>');
                    }
                    if (op==2){
                        sel.append('<option value="' + data.CCDI + '">' + data.DISTRITO + '</option>');
                   }
                    if (op==3){
                        sel.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');}
                });
               
                if (op==1){
                    $("#NOM_PP").trigger('change');
                    }  
                if (op==2){
                    $("#NOM_DI").trigger('change');
                }
                if (op==3){
                    $("#NOM_CCPP").trigger('change');
                }


            }
        });   
     }
  
}); 

//departamento

 $("#NOM_DD").trigger('change');



$.extend(jQuery.validator.messages, {
     required: "Campo obligatorio",
    // remote: "Please fix this field.",
     email: "Ingrese un email válido",
    // url: "Please enter a valid URL.",
     date: "Ingrese una fecha válida",
    // dateISO: "Please enter a valid date (ISO).",
     number: "Solo se permiten números",
     digits: "Solo se permiten números",
    range: jQuery.validator.format("Por favor ingrese un valor  entre {0} y {1}."),
    // creditcard: "Please enter a valid credit card number.",
    // equalTo: "Please enter the same value again.",
    // accept: "Please enter a value with a valid extension.",
    // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    // minlength: jQuery.validator.format("Please enter at least {0} characters."),
    // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    // range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    // max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    // min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});
$.validator.addMethod("year", function(value, element, param) {
    return this.optional(element) || ( value > 1950 && value <= CI.year ) ;
}, "Ingrese un año válido");
$.validator.addMethod("valueEquals", function (value, element, param) {
    return param == value;
}, "Acepta la declaración de veracidad?");

$.validator.addMethod("peruDate",function(value, element) {
    return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
}, "Ingrese fecha: dd-mm-yyyy");

 $.validator.addMethod("validName", function(value, element) {
    return this.optional(element) || /^[a-zA-ZàáâäãåąćęèéêëìíîïłńòóôöõøùúûüÿýżźñçčšžÀÁÂÄÃÅĄĆĘÈÉÊËÌÍÎÏŁŃÒÓÔÖÕØÙÚÛÜŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/.test(value);
}, "Caracteres no permitidos"); 

 $.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Solo se permiten letras"); 

 $.validator.addMethod("exactlength", function(value, element, param) {
    return this.optional(element) || value.length == param;
}, jQuery.format("Ingrese {0} caracteres."));

 $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg != value;
}, "Seleccione un valor");

 $.validator.addMethod("val3", function(value, element,arg){
    var length = arg.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(arg[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un valor entre {0}, {1} y {2}");

 $.validator.addMethod("valdia", function(value, element){
    var dias = new Array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','99')
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un día válido");


 $.validator.addMethod("valmes", function(value, element){
    var dias = new Array('01','02','03','04','05','06','07','08','09','10','11','12','99');
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un mes válido");


 $.validator.addMethod("valmescen", function(value, element){
    var dias = new Array('08','09');
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un mes válido(08,09)");

$.validator.addMethod("valnone", function(value, element, arg){
    var flag = true;
    if(value == 1){
        for(var i = 0; i<=arg.length; i++){
            if($('#' + arg[i]).val() == 1)
              flag = false;
        }
    }
    return flag;
 }, "Si ya selecciono una alternativa no debe seleccionar este item");  


$.validator.addMethod("valzero", function(value, element, arg){
    flag = false;
    if(value == 0){
        for(var i = 0; i<=arg.length; i++){
               if($('#' + arg[i]).val() == 1)
               flag = true;
        }
    }else{
      flag = true;
    }
    return flag;
 }, "Debe ingresar al menos una opción, no pueden ser 0 todas las opciones.");  


 $.validator.addMethod("valrango", function(value, element,arg){
    var flag = false;
        if(((value >= arg[0] && value<=arg[1]) || value == arg[2]) && value!='')
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}");


 $.validator.addMethod("valjango", function(value, element,arg){
    var flag = false;
        if((value >= arg[0] && value<=arg[1]) || value == arg[2])
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}");


 $.validator.addMethod("valrucc", function(value, element,arg){
    var flag = false;
        if((value >= arg[0] && value<=arg[1]) || value == arg[2] || value == arg[3] || value == arg[4] && value!='')
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}, {3}, {4}");

//validacion
$("#pesca_dor").validate({
    rules: {
        NFORM:{
            required: true,
            minlength: 1,
            maxlength: 6,
			digits: true,
			valueNotEquals: 0,
         }, 
        NOM_DD: {
            required: true,
            valueNotEquals: -1,
         }, 
       NOM_PP: {
            required: true,
           valueNotEquals: -1,
         }, 
       NOM_DI: {
           required: true,
           valueNotEquals: -1,
         },   
       NOM_CCPP: {
           required: true,
           valueNotEquals: -1,
         },  
        TAC: {
           required: true,
           valueNotEquals: -1,
         },                                                                                         
//FIN RULES
    },

    messages: {
    	NFORM:{
    		required: 'Ingrese Nro Formulario',
    		valueNotEquals: 'Ingrese un número válido',
    	},
        NOM_DD: {
            valueNotEquals: 'Seleccione Departamento',
         }, 
       NOM_PP: {
           valueNotEquals:'Seleccione Provincia',
         }, 
       NOM_DI: {
           valueNotEquals: 'Seleccione Distrito',
         },   
       NOM_CCPP: {
           valueNotEquals: 'Seleccione Centro Poblado',
         },  
         TAC: {
           valueNotEquals: 'Seleccione Tipo de Actividad',
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
    	//Consulta de form pescador
        var form_data = {
            csrf_token_c: CI.cct,
            NFORM: $('#NFORM').val(),
            CCDD: $('#NOM_DD').val(),
            NOM_DD: $('#NOM_DD :selected').text(),
            CCPP: $('#NOM_PP').val(),
            NOM_PP : $('#NOM_PP :selected').text(),
            CCDI: $('#NOM_DI').val(),
            NOM_DI : $('#NOM_DI :selected').text(),
            COD_CCPP : $('#NOM_CCPP').val(),
            NOM_CCPP : $('#NOM_CCPP :selected').text(),
            TAC: $('#TAC').val(),
            ajax:1
        };
        var bsub = $( "#pesca_dor :submit" );
        // bsub.attr("disabled", "disabled");
        $.ajax({
            url: CI.base_url + "digitacion/pescador/consulta",
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json){
            	//no hay registro form
            	if(json.flag == 0){
				        $.ajax({
				            url: CI.base_url + "digitacion/pescador/insertar",
				            type:'POST',
				            data:form_data,
				            dataType:'json',
				            success:function(json){
				            	alert(json.msg);
				            	$("#pesca_dor :input").attr("disabled", true);
				            	//insercion correcta
				            	if(json.flag == 1){
				            		$('#pesca_dor').trigger('submit');
				            	}else{
				            	//error en la insercion	
				            	}
				            }
				        });    
				//form encontrado, ver secciones que faltan               		
            	}else if(json.flag == 1){ 
                    		$("#pesca_dor :input").attr("disabled", true);              
                    		$('#pesc_tabs').removeClass('hide');
                        $("input[name='pescador_id']").val(json.idx);    
        				        var i = 0;
                        var flagi = false;
                        //activar secciones
        					     $.each( json.secciones, function( key, value ) {
                						if(value != 0){
                  								if(key == 10){
                  									// $('#cinfo').remove();
                  									// $('#info').remove();		
                                     $('#cinfo').removeClass('active'); 
                                     $('#info').removeClass('active');                     				
                  								}else{	
                  									// $('#tab'+ key).remove();
                  									// $('#ctab'+ key).remove();
                                     $('#tab'+ key).removeClass('active'); 
                                     $('#ctab'+ key).removeClass('active');                         
                  								}
                								
                						}else{
                                    //activar tab     
                                    if(!flagi){                                  
                                        if(key == 10){
                                              $('#cinfo').addClass('active');
                                              $('#info').addClass('active');                                               
                                        }else{                                 
                                              $('#ctab'+ key).addClass('active');
                                              $('#tab'+ key).addClass('active');
                                        }       
                                    }
                                    flagi = true;                 
                              }
                            i++;

                            var ahuakey = key; 
                            //rellenar secciones
                            // $.each( json.fsecciones[key], function( key, value ) {
                            $.each( json.infosecciones[key], function( fila, valor ) {
                                if(fila != 'pescador_id' && fila != 'user_id' && fila != 'last_ip' && fila != 'user_agent' && fila != 'created' && fila != 'modified'){
                                              if(fila == 'S9_1'|| fila == 'S9_2' ||  fila == 'S9_4_1' || fila == 'S9_4_2' || fila == 'S9_4_3' || fila == 'S9_4_4' || fila == 'S9_4_5' || fila == 'S9_4_6' || fila == 'S9_5_1' || fila == 'S9_5_2' || fila == 'S9_5_3' || fila == 'S9_5_4' || fila == 'S9_5_5' || fila == 'S9_5_6' || fila == 'S9_13_1' || fila == 'S9_13_2' || fila == 'S9_13_3' || fila == 'S9_13_4' || fila == 'S9_13_5' || fila == 'S9_13_6' || fila == 'S9_15_1' || fila == 'S9_15_2' || fila == 'S9_15_3' || fila == 'S9_15_4' || fila == 'S9_15_5' || fila == 'S9_15_6' || fila == 'S9_20_1_T' || fila == 'S9_20_2_T' || fila == 'S9_20_3_T' || fila == 'S9_20_4_T' || fila == 'S9_20_5_T' || fila == 'S9_20_6_T'){
                                                    $('#' + fila).val(valor);
                                                    $('#' + fila).trigger('change');
                                              }else{
                                                  $('#' + fila).val(valor);
                                              }                                	
                                }
                            });


        					     });



                

        					     if(!flagi){
        						        alert('Formulario completado');
        					     }else{
                            alert('Por favor complete la informacion en las secciones a continuacion');   
                       }




            }else if(json.flag == 2){
                alert('El Nro de formulario no coincide con la UDRA');
                bsub.removeAttr('disabled');    
            }else if(json.flag == 3){
                alert('Debe ingresar la UDRA primero, no puede ingresar el formulario.');
                bsub.removeAttr('disabled');    
            }
            // bsub.removeAttr('disabled');  	
            }
        });     
          	
    }       
});

 }); 


// CARGA COMBOS UBIGEO <-----------------------------
//-------------------------------------------------------------------------------------------------------------------------------

</script>