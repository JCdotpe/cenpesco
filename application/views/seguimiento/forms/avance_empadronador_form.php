
<?php  
$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_combo=  array('class' => 'preguntas_sub2 ', 'style' => 'font-size:8');
$label_class =  array('class' => 'control-label pesc_f');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';

	// A. UBICACION GEOGRAFICA ----------------------------------
		$CCSE = array(
			'name'	=> 'CCSE',
			'id'	=> 'CCSE',
			'maxlength'	=> 2,
			'class' => $span_class,
			'readonly' => 'readonly',
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
		$NOM_PP = array(
			'name'	=> 'NOM_PP',
			'id'	=> 'NOM_PP',
			'maxlength'	=> 80,
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
		$NOM_DI = array(
			'name'	=> 'NOM_DI',
			'id'	=> 'NOM_DI',
			'maxlength'	=> 80,
			'class' => $span_class,
			'readonly' => 'readonly',
		);		

		$EMP_IN = array(
			'name'	=> 'EMP_IN',
			'id'	=> 'EMP_IN',
			'maxlength'	=> 80,
			'class' => $span_class,
			'readonly' => 'readonly',
		);
		$EMP_FIN = array(
			'name'	=> 'EMP_FIN',
			'id'	=> 'EMP_FIN',
			'maxlength'	=> 80,
			'class' => $span_class,
			'onkeypress' => 'return solo_letras(event);',
		);		

		$TOTAL_CCPP = array(
			'name'	=> 'TOTAL_CCPP',
			'id'	=> 'TOTAL_CCPP',
			'maxlength'	=> 4,
			'class' => $span_class,
			'readonly' => 'readonly',
		);		
		$TOTAL_REG = array(
			'name'	=> 'TOTAL_REG',
			'id'	=> 'TOTAL_REG',
			'maxlength'	=> 4,
			'class' => $span_class,
			'readonly' => 'readonly',
		);		
		$TOTAL_P = array(
			'name'	=> 'TOTAL_P',
			'id'	=> 'TOTAL_P',
			'maxlength'	=> 5,
			'class' => $span_class,
			'readonly' => 'readonly',
		);		
		$TOTAL_A = array(
			'name'	=> 'TOTAL_A',
			'id'	=> 'TOTAL_A',
			'maxlength'	=> 5,
			'class' => $span_class,
			'readonly' => 'readonly',
		);		
		$TOTAL_C = array(
			'name'	=> 'TOTAL_C',
			'id'	=> 'TOTAL_C',
			'maxlength'	=> 4,
			'class' => $span_class,
			'readonly' => 'readonly',
		);		

	//pescador
		$P1_P = array(
			'name'	=> 'P1_P',
			'id'	=> 'P1_P',
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
			'onchange'=> "return complete_zero(this,2)",
		);		
		$P2_P = array(
			'name'	=> 'P2_P',
			'id'	=> 'P2_P',
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_8_to_9(event)",
			'onchange'=> "return complete_zero(this,2)",
		);		
		$P3_P = array(
			'name'	=> 'P3_P',
			'id'	=> 'P3_P',
			'maxlength'	=> 4,
			'class' => $span_class,
			//'readonly' => 'readonly',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P4_P = array(
			'name'	=> 'P4_P',
			'id'	=> 'P4_P',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P5_P = array(
			'name'	=> 'P5_P',
			'id'	=> 'P5_P',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P6_P = array(
			'name'	=> 'P6_P',
			'id'	=> 'P6_P',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P7_P = array(
			'name'	=> 'P7_P',
			'id'	=> 'P7_P',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P8_P = array(
			'name'	=> 'P8_P',
			'id'	=> 'P8_P',
			'maxlength'	=> 6,
			'class' => $span_class,
			'readonly' => 'readonly',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P9_P = array(
			'name'	=> 'P9_P',
			'id'	=> 'P9_P',
			'maxlength'	=> 6,
			'class' => $span_class,
			'readonly' => 'readonly',
		);		
		$P10_P = array(
			'name'	=> 'P10_P',
			'id'	=> 'P10_P',
			'maxlength'	=> 1000,
			'class' => $span_class,
			'rows' => 3,
			'onkeypress'=>"return alfa_numericos(event)",
		);		
	//acuicultor
		$P1_A = array(
			'name'	=> 'P1_A',
			'id'	=> 'P1_A',
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
			'onchange'=> "return complete_zero(this,2)",
		);		
		$P2_A = array(
			'name'	=> 'P2_A',
			'id'	=> 'P2_A',
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_8_to_9(event)",
			'onchange'=> "return complete_zero(this,2)",
		);		
		$P3_A = array(
			'name'	=> 'P3_A',
			'id'	=> 'P3_A',
			'maxlength'	=> 4,
			'class' => $span_class,
			//'readonly' => 'readonly',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P4_A = array(
			'name'	=> 'P4_A',
			'id'	=> 'P4_A',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P5_A = array(
			'name'	=> 'P5_A',
			'id'	=> 'P5_A',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P6_A = array(
			'name'	=> 'P6_A',
			'id'	=> 'P6_A',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P7_A = array(
			'name'	=> 'P7_A',
			'id'	=> 'P7_A',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P8_A = array(
			'name'	=> 'P8_A',
			'id'	=> 'P8_A',
			'maxlength'	=> 6,
			'class' => $span_class,
			'readonly' => 'readonly',
		);		
		$P9_A = array(
			'name'	=> 'P9_A',
			'id'	=> 'P9_A',
			'maxlength'	=> 6,
			'class' => $span_class,
			'readonly' => 'readonly',
		);		
		$P10_A = array(
			'name'	=> 'P10_A',
			'id'	=> 'P10_A',
			'maxlength'	=> 1000,
			'class' => $span_class,
			'rows' => 3,
			'onkeypress'=>"return alfa_numericos(event)",
		);		
	//comunidad
		$P1_C = array(
			'name'	=> 'P1_C',
			'id'	=> 'P1_C',
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
			'onchange'=> "return complete_zero(this,2)",
		);		
		$P2_C = array(
			'name'	=> 'P2_C',
			'id'	=> 'P2_C',
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_8_to_9(event)",
			'onchange'=> "return complete_zero(this,2)",
		);		
		$P3_C = array(
			'name'	=> 'P3_C',
			'id'	=> 'P3_C',
			'maxlength'	=> 4,
			'class' => $span_class,
			//'readonly' => 'readonly',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P4_C = array(
			'name'	=> 'P4_C',
			'id'	=> 'P4_C',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P5_C = array(
			'name'	=> 'P5_C',
			'id'	=> 'P5_C',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P6_C = array(
			'name'	=> 'P6_C',
			'id'	=> 'P6_C',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P7_C = array(
			'name'	=> 'P7_C',
			'id'	=> 'P7_C',
			'maxlength'	=> 3,
			'class' => $span_class,
			'onchange' => 'actualizar_input(this);',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P8_C = array(
			'name'	=> 'P8_C',
			'id'	=> 'P8_C',
			'maxlength'	=> 6,
			'class' => $span_class,
			'readonly' => 'readonly',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P9_C = array(
			'name'	=> 'P9_C',
			'id'	=> 'P9_C',
			'maxlength'	=> 6,
			'class' => $span_class,
			'readonly' => 'readonly',
			'onkeypress'=>"return solo_numeros(event)",
		);		
		$P10_C = array(
			'name'	=> 'P10_C',
			'id'	=> 'P10_C',
			'maxlength'	=> 1000,
			'class' => $span_class,
			'rows' => 3,
			'onkeypress'=>"return alfa_numericos(event)",
		);		



		$sedeArray = NULL;
		foreach($sede->result() as $filas)
		{
			$sedeArray[$filas->SEDE_COD]=strtoupper($filas->NOM_SEDE);
		}

	$ubidepaArray = array(-1 => '-'); 
	$provArray = array(-1 => '-'); 
	$distArray = array(-1 => '-'); 
	$ccppArray = array(-1 => '-'); 


$attr = array('class' => 'form-vertical form-auth','id' => 'frm_avance_campo');
echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 
/////////////////////////////////////////////////////////////
//Empadronador_DNI


 

////////////////////////////////C_RECHCION I
	echo '<div class="well modulo"  style="overflow:auto;" id="ubi_geo" name="ubi_geo">';
		echo '<div class="row-fluid" style="padding-bottom:0px !important;">';

			echo '<h4>AVANCE DE CAMPO DEL EMPADRONADOR</h4>';
			echo '<input type="hidden" id="cant_reg" name="cant_reg">';
			echo '<input type="hidden" id="COD_ODEI" name="COD_ODEI">';
			echo '<h5>A. UBICACION GEOGRAFICA</h5>';

			echo '<div class="row-fluid"  >';	

				echo '<div class="control-group span12" >';
					echo '<div class="control-group span3" style="padding-left:0px;">';

							echo form_label('SEDE OPERATIVA','NOM_SEDE',$label1);
							echo '<div class="controls span3">';
								echo form_input($CCSE); 
							echo '</div>';	
							echo '<div class="controls span8">';
								echo form_dropdown('NOM_SEDE', $sedeArray, FALSE,'class="span12" style=" font-size: 11px !important;" id="NOM_SEDE"'); 
							echo '</div>';
					echo '</div>';  

					echo '<div class="control-group span3" >';

							echo form_label('DEPARTAMENTO','NOM_DD',$label1);
							echo '<div class="controls span3">';
								echo form_input($CCDD); 
							echo '</div>';	
							echo '<div class="controls span8">';
								echo form_dropdown('NOM_DD', $ubidepaArray, FALSE,'class="span12"  style=" font-size: 11px !important;" id="NOM_DD"'); 
							echo '</div>';
					echo '</div>';  


					echo '<div class="control-group grupos span1">';

						echo form_label('EQP','EQP',$label1);

						echo '<div class="controls">';
							//echo form_input($EQP); 
							echo form_dropdown('EQP', $ubidepaArray, FALSE,'class="span12"  style=" font-size: 11px !important;" id="EQP"'); 
							//echo '<div class="help-block error">' . form_error($EQP['name']) . '</div>';
							echo '<div class="help-block error">' . form_error('EQP') . '</div>';
						echo '</div>';	

					echo '</div>'; 

					echo '<div class="control-group  grupos span1">';

						echo form_label('RUTA','RUTA',$label1);

						echo '<div class="controls">';
							//echo form_input($RUTA); 
							echo form_dropdown('RUTA', $ubidepaArray, FALSE,'class="span12"  style=" font-size: 11px !important;" id="RUTA"'); 
							//echo '<div class="help-block error">' . form_error($RUTA['name']) . '</div>';
							echo '<div class="help-block error">' . form_error("RUTA") . '</div>';
						echo '</div>';	
					echo '</div>'; 

					echo '<div class="control-group  grupos span2">';

						echo form_label('SUB RUTA','SUB_R',$label1);

						echo '<div class="controls">';
							//echo form_input($RUTA); 
							echo form_dropdown('SUB_R', $ubidepaArray, FALSE,'class="span6"  style=" font-size: 11px !important;" id="SUB_R"'); 
							//echo '<div class="help-block error">' . form_error($SUB_R['name']) . '</div>';
							echo '<div class="help-block error">' . form_error("SUB_R") . '</div>';
						echo '</div>';	
					echo '</div>'; 
					echo '<div class="control-group   span2" style="padding-top:35px;">';
						echo '<input type="button" id="buscar" name="buscar" value="Buscar" class="btn btn-primary ">';

					echo '</div>'; 

				echo '</div>'; 	
	
			echo '</div>'; 

		echo '</div>';




		echo '<div class="row-fluid hide" id="provincia" name="provincia">';	

			echo '<div class="control-group span3">';
				echo form_label('PROVINCIA','NOM_PP',$label1);
				echo '<div class="controls span3">';
					echo form_input($CCPP); 
				echo '</div>';	

				echo '<div class="controls span8">';
					//echo form_dropdown('NOM_PP', $provArray, FALSE,'class="span12"  style=" font-size: 11px !important;" id="NOM_PP"'); 
					echo form_input($NOM_PP); 
				echo '</div>';	

			echo '</div>'; 

			echo '<div class="control-group span3">';
					echo form_label('DISTRITO','NOM_DI',$label1);
					echo '<div class="controls span3">';
						echo form_input($CCDI); 
					echo '</div>';	

					echo '<div class="controls span8">';
						echo form_input($NOM_DI); 
					echo '</div>';	
			echo '</div>'; 	

			echo '<div class="control-group grupos span3">';

				echo form_label('EMPADRONADOR INICIAL','EMP_IN',$label1);

				echo '<div class="controls">';
					echo form_input($EMP_IN); 
					echo '<span class="help-inline"></span>';
					echo '<div class="help-block error">' . form_error($EMP_IN['name']) . '</div>';
				echo '</div>';	

			echo '</div>'; 

			echo '<div class="control-group grupos span3">';

				echo form_label('EMPADRONADOR FINAL','EMP_FIN',$label1);

				echo '<div class="controls">';
					echo form_input($EMP_FIN); 
					echo '<span class="help-inline"></span>';
					echo '<div class="help-block error">' . form_error($EMP_FIN['name']) . '</div>';
				echo '</div>';	

			echo '</div>'; 

		echo '</div>'; 

	echo '</div>'; 

	echo '<div class="row-fluid hide"  id="agregar_boton" style="padding-bottom:10px;">';
			echo '<input type="button" id="agregar" name="agregar" value="Agregar CCPP" class="btn btn-primary " />';
			echo anchor(site_url('seguimiento/avance_empadronador'), 'Otra consulta','class="btn btn-success pull-right" id="otra_consulta"');	
	echo '</div>'; 

	echo '<div class="well modulo hide"  style="overflow:auto;" id="detalle">';
		echo '<div class="row-fluid " id="contenedor">';	

			echo '<div class="row-fluid hide" style="width:140%" id="ccpp_cab">';

					echo '<div class="controls span2" >';
						echo  '<p><strong>CENTRO POBLADO</p></strong>';
					echo '</div>';	

					echo '<div class="controls span1">';
						echo '<div class="controls span6">';
							echo  '<p><strong>TIPO I.</p></strong>';
						echo '</div>';	
						echo '<div class="controls span6">';
							echo  '<p><strong>TIPO F.</p></strong>';
						echo '</div>';
					echo '</div>';

					echo '<div class=" span2">';
						echo '<div class=" span4">';
							echo  '<p><strong>REGISTRÓ</p></strong>';
						echo '</div>';					
						echo '<div class=" span4">';
							echo  '<p><strong>DÍA</p></strong>';
						echo '</div>';	

						echo '<div class=" span4">';
							echo  '<p><strong>MES</p></strong>';
						echo '</div>';							
					echo '</div>';	

					echo '<div class=" span2">';
						echo '<div class=" span4">';
							echo  '<p><strong>N° PESC.</p></strong>';
						echo '</div>';	
						echo '<div class=" span4">';
							echo  '<p><strong>N° ACUI.</p></strong>';
						echo '</div>';	
						echo '<div class=" span4">';
							echo  '<p><strong>COMUN.</p></strong>';
						echo '</div>';	
					echo '</div>';	

					echo '<div class=" span5">';
						echo '<div class="controls span2">';
							echo  '<p><strong>CCPP NUEVO</p></strong>';
						echo '</div>';

						echo '<div class="controls span10">';
							echo  '<p><strong>OBSERVACIONES</p></strong>';
						echo '</div>';		
					echo '</div>';

			echo '</div>'; 


					

		echo '</div>'; 



		echo '<div class="row-fluid hide" style="width:140%" id="ccpp_total" >';


					echo '<div class="controls offset1 span1" >';
						echo form_label('TOTAL','TOTAL_CCPP',$label1);
						echo '<div class="controls span11">';
							echo form_input($TOTAL_CCPP);  
							echo '<div class="help-block error">' . form_error($TOTAL_CCPP['name']) . '</div>';
						echo '</div>';
							
					echo '</div>';	


					echo '<div class="offset1 span2">';
						echo '<div class=" span4">';
							echo form_label('TOTAL','TOTAL_REG',$label1);
							echo '<div class="controls span9">';
								echo form_input($TOTAL_REG);  
								echo '<div class="help-block error">' . form_error($TOTAL_REG['name']) . '</div>';
							echo '</div>';
						echo '</div>';					
						
					echo '</div>';	

					echo '<div class=" span2">';
						echo '<div class=" span4">';
							echo form_label('TOTAL','TOTAL_P',$label1);
							echo '<div class="controls span12">';
								echo form_input($TOTAL_P);  
								echo '<div class="help-block error">' . form_error($TOTAL_P['name']) . '</div>';
							echo '</div>';
						echo '</div>';	
						echo '<div class=" span4">';
							echo form_label('TOTAL','TOTAL_A',$label1);
							echo '<div class="controls span12">';
								echo form_input($TOTAL_A);  
								echo '<div class="help-block error">' . form_error($TOTAL_A['name']) . '</div>';
							echo '</div>';
						echo '</div>';	
						echo '<div class=" span4">';
							echo form_label('TOTAL','TOTAL_C',$label1);
							echo '<div class="controls span12">';
								echo form_input($TOTAL_C);  
								echo '<div class="help-block error">' . form_error($TOTAL_C['name']) . '</div>';
							echo '</div>';
						echo '</div>';	
					echo '</div>';	

					echo '<div class=" span5">';
	
					echo '</div>';

		echo '</div>'; 

	echo '</div>'; 




	echo '<div class="well modulo hide"   id="totales">';

		echo '<h5>PESCADOR</h5>';
		echo '<div class="row-fluid">';

			echo '<div class="span1" style="height:150px;">';

				echo '<div class="row-fluid" style="height:40px;">';
			 		echo '<p><strong> FECHA DE EMP.</strong></p>';
			 	echo '</div>';	

			 	echo '<div class="row-fluid" >';

					echo '<div class="span6">';
						echo form_label('Día','P1_P',$label1);
						echo '<div class="controls span12">';
							echo form_input($P1_P);  
							echo '<div class="help-block error">' . form_error($P1_P['name']) . '</div>';
						echo '</div>';
	 	   		echo '</div>';	

					echo '<div class=" span6">';
						echo form_label('Mes','P2_P',$label1);
						echo '<div class="controls span12">';
							echo form_input($P2_P);  
							echo '<div class="help-block error">' . form_error($P2_P['name']) . '</div>';
						echo '</div>';
					echo '</div>';

			 	echo '</div>';

			echo '</div>';	

			//echo '</div>';	

			echo '<div class=" span1" style="height:150px;">';
					//echo form_label('TOTAL FORM','TOTAL_P',$label1);
				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>TOTAL FORM</strong></p>';
				echo '</div>';	

				echo '<div class="controls span12" style="padding-top:37px;">';
					echo form_input($P3_P);  
					echo '<div class="help-block error">' . form_error($P3_P['name']) . '</div>';
				echo '</div>';

			echo '</div>';	

			echo '<div class=" span3" style="height:150px;">';
				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>RESULTADO</strong></p>';
				echo '</div>';	

				echo '<div class="row-fluid" >';

					echo '<div class=" control-group span3">';
						echo form_label('Completas','P4_P',$label1);
						echo '<div class="controls span12">';
							echo form_input($P4_P);  
							echo '<div class="help-block error">' . form_error($P4_P['name']) . '</div>';
						echo '</div>';
					echo '</div>';	
					echo '<div class="control-group span3">';
						echo form_label('Incomp.','P5_P',$label1);
						echo '<div class="controls span12">';
							echo form_input($P5_P);  
							echo '<div class="help-block error">' . form_error($P5_P['name']) . '</div>';
						echo '</div>';
					echo '</div>';	
					echo '<div class="control-group span3">';
						echo form_label('Rechazo','P6_P',$label1);
						echo '<div class="controls span12">';
							echo form_input($P6_P);  
							echo '<div class="help-block error">' . form_error($P6_P['name']) . '</div>';
						echo '</div>';
					echo '</div>';	
					echo '<div class="control-group span3">';
						echo form_label('Otro','P7_P',$label1);
						echo '<div class="controls span12">';
							echo form_input($P7_P);  
							echo '<div class="help-block error">' . form_error($P7_P['name']) . '</div>';
						echo '</div>';
					echo '</div>';	

				echo '</div>';	

			echo '</div>';	

			echo '<div class="span1" style="height:150px;">';

				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>TASA NO RESPUESTA</strong></p>';
				echo '</div>';	

				//echo form_label('Tasa No Resp.','TOTAL_P',$label1);
				echo '<div class="controls span12" style="padding-top:37px;">';
					echo form_input($P8_P);  
					echo '<div class="help-block error">' . form_error($P8_P['name']) . '</div>';
				echo '</div>';

			echo '</div>';	

			echo '<div class=" span1" style="height:150px;">';

				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>COBERTURA</strong></p>';
				echo '</div>';				
				//echo form_label('Cobertura','TOTAL_P',$label1);
				echo '<div class="controls span12" style="padding-top:37px;">';
					echo form_input($P9_P);  
					echo '<div class="help-block error">' . form_error($P9_P['name']) . '</div>';
				echo '</div>';

			echo '</div>';	

			echo '<div class=" span5" style="height:150px;">';
				echo '<div class="row-fluid" style="height:30px;" >';
					echo '<p><strong>OBSERVACIONES</strong></p>';
				echo '</div>';				
				//echo form_label('Observaciones','TOTAL_P',$label1);
				echo '<div class="controls span12">';
					echo form_textarea($P10_P);  
					echo '<div class="help-block error">' . form_error($P10_P['name']) . '</div>';
				echo '</div>';

			echo '</div>';	
		echo '</div>';	

		echo '<h5>ACUICULTOR</h5>';
		echo '<div class="row-fluid">';

			echo '<div class="span1" style="height:150px;">';

				echo '<div class="row-fluid" style="height:40px;">';
			 		echo '<p><strong> FECHA DE EMP.</strong></p>';
			 	echo '</div>';	

			 	echo '<div class="row-fluid" >';

					echo '<div class="span6">';
						echo form_label('Día','P1_A',$label1);
						echo '<div class="controls span12">';
							echo form_input($P1_A);  
							echo '<div class="help-block error">' . form_error($P1_A['name']) . '</div>';
						echo '</div>';
	 	   		echo '</div>';	

					echo '<div class=" span6">';
						echo form_label('Mes','P2_A',$label1);
						echo '<div class="controls span12">';
							echo form_input($P2_A);  
							echo '<div class="help-block error">' . form_error($P2_A['name']) . '</div>';
						echo '</div>';
					echo '</div>';

			 	echo '</div>';

			echo '</div>';	

			//echo '</div>';	

			echo '<div class=" span1" style="height:150px;">';
					//echo form_label('TOTAL FORM','TOTAL_P',$label1);
				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>TOTAL FORM</strong></p>';
				echo '</div>';	

				echo '<div class="controls span12" style="padding-top:37px;">';
					echo form_input($P3_A);  
					echo '<div class="help-block error">' . form_error($P3_A['name']) . '</div>';
				echo '</div>';

			echo '</div>';	

			echo '<div class=" span3" style="height:150px;">';
				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>RESULTADO</strong></p>';
				echo '</div>';	

				echo '<div class="row-fluid" >';

					echo '<div class=" control-group span3">';
						echo form_label('Completas','P4_A',$label1);
						echo '<div class="controls span12">';
							echo form_input($P4_A);  
							echo '<div class="help-block error">' . form_error($P4_A['name']) . '</div>';
						echo '</div>';
					echo '</div>';	
					echo '<div class="control-group span3">';
						echo form_label('Incomp.','P5_A',$label1);
						echo '<div class="controls span12">';
							echo form_input($P5_A);  
							echo '<div class="help-block error">' . form_error($P5_A['name']) . '</div>';
						echo '</div>';
					echo '</div>';	
					echo '<div class="control-group span3">';
						echo form_label('Rechazo','P6_A',$label1);
						echo '<div class="controls span12">';
							echo form_input($P6_A);  
							echo '<div class="help-block error">' . form_error($P6_A['name']) . '</div>';
						echo '</div>';
					echo '</div>';	
					echo '<div class="control-group span3">';
						echo form_label('Otro','P7_A',$label1);
						echo '<div class="controls span12">';
							echo form_input($P7_A);  
							echo '<div class="help-block error">' . form_error($P7_A['name']) . '</div>';
						echo '</div>';
					echo '</div>';	

				echo '</div>';	

			echo '</div>';	

			echo '<div class="span1" style="height:150px;">';

				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>TASA NO RESPUESTA</strong></p>';
				echo '</div>';	

				//echo form_label('Tasa No Resp.','TOTAL_P',$label1);
				echo '<div class="controls span12" style="padding-top:37px;">';
					echo form_input($P8_A);  
					echo '<div class="help-block error">' . form_error($P8_A['name']) . '</div>';
				echo '</div>';

			echo '</div>';	

			echo '<div class=" span1" style="height:150px;">';

				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>COBERTURA</strong></p>';
				echo '</div>';				
				//echo form_label('Cobertura','TOTAL_P',$label1);
				echo '<div class="controls span12" style="padding-top:37px;">';
					echo form_input($P9_A);
					echo '<div class="help-block error">' . form_error($P9_A['name']) . '</div>';  
				echo '</div>';

			echo '</div>';	

			echo '<div class=" span5" style="height:150px;">';
				echo '<div class="row-fluid" style="height:30px;" >';
					echo '<p><strong>OBSERVACIONES</strong></p>';
				echo '</div>';				
				//echo form_label('Observaciones','TOTAL_P',$label1);
				echo '<div class="controls span12">';
					echo form_textarea($P10_A);  
					echo '<div class="help-block error">' . form_error($P10_A['name']) . '</div>';
				echo '</div>';

			echo '</div>';	
		echo '</div>';	
		echo '<h5>COMUNIDADES</h5>';
		echo '<div class="row-fluid">';

			echo '<div class="span1" style="height:150px;">';

				echo '<div class="row-fluid" style="height:40px;">';
			 		echo '<p><strong> FECHA DE EMP.</strong></p>';
			 	echo '</div>';	

			 	echo '<div class="row-fluid" >';

					echo '<div class="span6">';
						echo form_label('Día','P1_C',$label1);
						echo '<div class="controls span12">';
							echo form_input($P1_C);  
							echo '<div class="help-block error">' . form_error($P1_C['name']) . '</div>';
						echo '</div>';
	 	   		echo '</div>';	

					echo '<div class=" span6">';
						echo form_label('Mes','P2_C',$label1);
						echo '<div class="controls span12">';
							echo form_input($P2_C); 
							echo '<div class="help-block error">' . form_error($P2_C['name']) . '</div>'; 
						echo '</div>';
					echo '</div>';

			 	echo '</div>';

			echo '</div>';	

			//echo '</div>';	

			echo '<div class=" span1" style="height:150px;">';
					//echo form_label('TOTAL FORM','TOTAL_P',$label1);
				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>TOTAL FORM</strong></p>';
				echo '</div>';	

				echo '<div class="controls span12" style="padding-top:37px;">';
					echo form_input($P3_C);  
					echo '<div class="help-block error">' . form_error($P3_C['name']) . '</div>';
				echo '</div>';

			echo '</div>';	

			echo '<div class=" span3" style="height:150px;">';
				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>RESULTADO</strong></p>';
				echo '</div>';	

				echo '<div class="row-fluid" >';

					echo '<div class=" control-group span3">';
						echo form_label('Completas','P4_C',$label1);
						echo '<div class="controls span12">';
							echo form_input($P4_C);  
							echo '<div class="help-block error">' . form_error($P4_C['name']) . '</div>';
						echo '</div>';
					echo '</div>';	
					echo '<div class="control-group span3">';
						echo form_label('Incomp.','P5_C',$label1);
						echo '<div class="controls span12">';
							echo form_input($P5_C);  
							echo '<div class="help-block error">' . form_error($P5_C['name']) . '</div>';
						echo '</div>';
					echo '</div>';	
					echo '<div class="control-group span3">';
						echo form_label('Rechazo','P6_C',$label1);
						echo '<div class="controls span12">';
							echo form_input($P6_C);  
							echo '<div class="help-block error">' . form_error($P6_C['name']) . '</div>';
						echo '</div>';
					echo '</div>';	
					echo '<div class="control-group span3">';
						echo form_label('Otro','P7_C',$label1);
						echo '<div class="controls span12">';
							echo form_input($P7_C);  
							echo '<div class="help-block error">' . form_error($P7_C['name']) . '</div>';
						echo '</div>';
					echo '</div>';	

				echo '</div>';	

			echo '</div>';	

			echo '<div class="span1" style="height:150px;">';

				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>TASA NO RESPUESTA</strong></p>';
				echo '</div>';	

				//echo form_label('Tasa No Resp.','TOTAL_P',$label1);
				echo '<div class="controls span12" style="padding-top:37px;">';
					echo form_input($P8_C); 
					echo '<div class="help-block error">' . form_error($P8_C['name']) . '</div>'; 
				echo '</div>';

			echo '</div>';	

			echo '<div class=" span1" style="height:150px;">';

				echo '<div class="row-fluid" style="height:40px;" >';
					echo '<p><strong>COBERTURA</strong></p>';
				echo '</div>';				
				//echo form_label('Cobertura','TOTAL_P',$label1);
				echo '<div class="controls span12" style="padding-top:37px;">';
					echo form_input($P9_C);  
					echo '<div class="help-block error">' . form_error($P9_C['name']) . '</div>';
				echo '</div>';

			echo '</div>';	

			echo '<div class=" span5" style="height:150px;">';
				echo '<div class="row-fluid" style="height:30px;" >';
					echo '<p><strong>OBSERVACIONES</strong></p>';
				echo '</div>';				
				//echo form_label('Observaciones','TOTAL_P',$label1);
				echo '<div class="controls span12">';
					echo form_textarea($P10_C);  
					echo '<div class="help-block error">' . form_error($P10_C['name']) . '</div>';
				echo '</div>';

			echo '</div>';	
		echo '</div>';	



	echo '</div>'; 

	echo '<div class="row-fluid">';

		echo '<div class="span6">';
		// 	//echo anchor(base_url('digitacion/revision'), 'Visualizar','class="btn btn-success pull-left"');
		// 	echo '<a href="'. site_url('seguimiento/avance/get_todo') . '" class="btn btn-success pull-left" target="_blank">Visualizar</a>';
				echo anchor(site_url('seguimiento/avance_empadronador/export'), 'Exportar Excel','class="btn btn-success pull-left " id="export_excel"');		
				//echo '<input type="button" id="export_excel" name="export_excel" value="Exportar Excel" class="btn btn-success pull-left hide " />';
	 	echo '</div>';

		echo '<div class="extra span5">';
	    echo '</div>';

		echo '<div >';
					echo form_submit('Enviar', 'Enviar','class="btn btn-primary pull-right hide"');
	   echo '</div>';

    echo '</div>';

	echo form_close(); 
	echo '</div>'; 			
echo '</div>'; 	



?>







<!-- 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   /////////////            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   ////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   ////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   ////////////   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   ////////////              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////   ///////////////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////  ///////   ///////////////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////  ///////   ///////////////////////   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////           /////////////             ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 -->

<script type="text/javascript">

	var opcion = 0;

$("#agregar").click(function () {
		var add = 0;
		add = parseInt($("#cant_reg").val()) + 1;
		//CREA LOS INPTUS
        for (var i = add; i <= add; i++) {
    		centro = $('<div class="row-fluid" style="width:140%" id="ccpp_div_'+i+'" name="ccpp_div_'+i+'" />' )
    		inputs1 = $('<div class="controls span2" >').html('<div class="controls span3"><input type="text" id="CC_CCPP" name="CC_CCPP" class="span12"  onkeypress="return solo_numeros(event)" maxlength=4 onblur="return pase_cod(this);" /> <input type="hidden" id="CC_CCPP_NUM" name="CC_CCPP_NUM"> </div><div class="controls span9"><input type="text" id="NOM_CCPP" name="NOM_CCPP" class="span12"  onkeypress="return solo_letras(event)" onblur="return mayusculas(this);" /></div>');
    		inputs2 = $('<div class="controls span1" >').html('<div class="controls span6"><input type="text" id="TIPO_IN" name="TIPO_IN" class="span12"  onkeypress="return solo_a_b(event)" maxlength=1 onblur="return mayusculas(this);"/></div><div class="controls span6"><input type="text" id="TIPO_FIN" name="TIPO_FIN" class="span12" onkeypress="return solo_a_b(event)" maxlength=1 onblur="return mayusculas(this);" /></div>');
    		inputs3 = $('<div class="controls span2" >').html('<div class="controls span3"><input type="text" id="REG" name="REG" class="span12 REG" onchange="actualizar_input(this);" onkeypress="return solo_0_to_1(event)" maxlength=1 ></div>	<div class="controls offset1 span3"><input type="text" id="REG_DIA" name="REG_DIA" class="span12 REG_DIA" onkeypress="return solo_numeros(event)" maxlength=2 onchange="return complete_zero(this,2)" ></div>   <div class="help-block error"></div> 	  <div class="controls offset1 span3"><input type="text" id="REG_MES" name="REG_MES" class="span12" onkeypress="return solo_8_to_9(event)" onchange="return complete_zero(this,2)" ></div>'	);
    		inputs4 = $('<div class="controls span2" >').html('<div class="controls span4">	<input type="text" id="NUM_P" name="NUM_P" class="span12" onchange="actualizar_input(this);" onkeypress="return solo_numeros(event)" maxlength=3 >	</div><div class="controls span4">	<input type="text" id="NUM_A" name="NUM_A"  class="span12" onchange="actualizar_input(this);" onkeypress="return solo_numeros(event)" maxlength=3 >	</div>      <div class="controls span4">	<input type="text" id="NUM_C" name="NUM_C" class="span12" onchange="actualizar_input(this);" onkeypress="return solo_0_to_1(event)" maxlength=1 >	</div>'		);
    		inputs5 = $('<div class="controls span5" >').html('<div class="controls span2"><input type="text" id="NUEV_CCPP" name="NUEV_CCPP" class="span12" onkeypress="return solo_0_to_1(event)" maxlength=1 ></div><div class="controls span10"><input type="text" id="OBS" name="OBS" class="span12" onkeypress="return alfa_numericos(event)" maxlength=1000 onblur="return mayusculas(this);" ></div>');

    		centro.append(inputs1);
    		centro.append(inputs2);
    		centro.append(inputs3);
    		centro.append(inputs4);
    		centro.append(inputs5);
			$("#contenedor").append(centro);			        	
        };
        $("#cant_reg").val(add);
        $("#TOTAL_CCPP").val( $("#cant_reg").val() );
        $("#agregar").attr('disabled','disabled');

});

$("#export_excel").click(function(){ 
	//alert('SISTEMAS: Reporte en mantenimiento');
});

$("#buscar").click(function(){
	//var centro = ('<p>probanbdio</p>');

		$("#buscar").attr('disabled','disabled');//dehabilita boton 
		$("#provincia").addClass('hide');//muestra provincia 
		//$("#buscar").remove(":div");
		$("#detalle").addClass('hide');
		$("#ccpp_cab").addClass('hide');
		$("#ccpp_total").addClass('hide');
		$("#totales").addClass('hide');

		for (var i = 1; i <= 30; i++) {
			$("#ccpp_div_"+i).remove();
		};	
		var tipo_emp = null;
		var datas = {
			csrf_token_c: CI.cct,
			sede: $("#NOM_SEDE").val(),
			dep: $("#NOM_DD").val(),
			equipo: $("#EQP").val(),
			ruta: $("#RUTA").val(),
			sub_ruta: $("#SUB_R").val(),
			ajax: 1,
			opcion : 0,
		};

        $.ajax({
            url: CI.base_url + "seguimiento/avance_empadronador/consulta/" + $("#CCSE").val() + "/" + $("#CCDD").val() + "/" + $("#EQP").val() + "/" + $("#RUTA").val() + "/" + $("#SUB_R").val(),
            type:'POST',
            data:datas,
            dataType:'json',
            success:function(json){
            	if (json === 0) {// si no existe registros en tabla
						//llenar provincia, distrito, empadronador
						datas['opcion']= 111;
				        $.ajax({
				            url: CI.base_url + "seguimiento/avance_empadronador/get_ajax_all/" + datas['opcion'] + "/" + $("#CCSE").val() + "/" + $("#CCDD").val() + "/" + $("#EQP").val() + "/" + $("#RUTA").val() + "/" + $("#SUB_R").val(), //consulta de la tabla seguimiento ESPECIAL
				            type:'POST',
				            data:datas,
				            dataType:'json',
				            cache: false,
				            success:function(json){
									$("select").attr('disabled','disabled');// solo lectura ubigeo				            	
				            		$("#EMP_IN").val('');
				        			$("#CCPP").val('');
				        			$("#NOM_PP").val('');
				        			$("#CCDI").val('');
				        			$("#NOM_DI").val('');
				        			$("#EMP_IN").val('');
				        			$("#EMP_FIN").val('');
				        			$("#detalle :input").val('');
				        			$("#ccpp_total :input").val('');
				        			$("#totales :input").val('');

				            		$.each(json , function(i, data) {
				            			$("#COD_ODEI").val(data.COD_ODEI);
				            			$("#CCPP").val(data.CCPP);
				            			$("#NOM_PP").val(data.PROVINCIA);
				            			$("#CCDI").val(data.CCDI);
				            			$("#NOM_DI").val(data.DISTRITO);
				            			$("#EMP_IN").val(data.EMPADRONADOR_INICIAL);
				            			if(data.TIPO_INI == 'Convocatoria'){
				            				tipo_emp = 'A';
				            			}else if( data.TIPO_INI == 'Centro Poblado'){
				            				tipo_emp = 'B';
				            			}
				            		})

									alert('Ingrese en la subruta de acontinuación');
							        //llena inputs detalle
							        $.ajax({
							            url: CI.base_url + "seguimiento/avance_empadronador/get_ajax_ccpp_by_sub_ruta/" + datas['opcion'] + "/" + $("#CCSE").val() + "/" + $("#CCDD").val() + "/" + $("#EQP").val() + "/" + $("#RUTA").val() + "/" + $("#SUB_R").val(),
							            type:'POST',
							            data:datas,
							            dataType:'json',
							            cache: false,
							            success:function(json2){
							   
							    	     		var cant =  json2.length;
							    	     		$("#cant_reg").val(cant);
							    	     		$("#TOTAL_CCPP").val($("#cant_reg").val());// dar valor al TOTAL CCPP
												$("#provincia").removeClass('hide');
												$("#detalle").removeClass('hide');
												$("#ccpp_cab").removeClass('hide');
												$("#ccpp_total").removeClass('hide');
												$("#totales").removeClass('hide');

												
										        for (var i = 1; i <= cant; i++) {
									        		centro = $('<div class="row-fluid" style="width:140%" id="ccpp_div_'+i+'" name="ccpp_div_'+i+'" />' )
									        		inputs1 = $('<div class="controls span2" >').html('<div class="controls span3"><input type="text" id="CC_CCPP" name="CC_CCPP" class="span12" readonly="readonly" onkeypress="return solo_numeros(event)" maxlength=4/><input type="hidden" id="CC_CCPP_NUM" name="CC_CCPP_NUM"></div><div class="controls span9"><input type="text" id="NOM_CCPP" name="NOM_CCPP" class="span12" readonly="readonly" onblur="return mayusculas(this);" /></div>');
									        		inputs2 = $('<div class="controls span1" >').html('<div class="controls span6"><input type="text" id="TIPO_IN" name="TIPO_IN" class="span12" readonly="readonly" onkeypress="return solo_a_b(event)" maxlength=1 /></div><div class="controls span6"><input type="text" id="TIPO_FIN" name="TIPO_FIN" class="span12" onkeypress="return solo_a_b(event)" maxlength=1 onblur="return mayusculas(this);" /></div>');
									        		inputs3 = $('<div class="controls span2" >').html('<div class="controls span3"><input type="text" id="REG" name="REG" class="span12 REG" onchange="actualizar_input(this);" onkeypress="return solo_0_to_1(event)" maxlength=1></div>	<div class="controls offset1 span3"><input type="text" id="REG_DIA" name="REG_DIA" class="span12 REG_DIA" onkeypress="return solo_numeros(event)" maxlength=2 onchange="return complete_zero(this,2)" ></div>	  <div class="controls offset1 span3"><input type="text" id="REG_MES" name="REG_MES" class="span12" onkeypress="return solo_8_to_9(event)" maxlength=2 onchange="return complete_zero(this,2)" ></div>'	);
									        		inputs4 = $('<div class="controls span2" >').html('<div class="controls span4">	<input type="text" id="NUM_P" name="NUM_P" class="span12" onchange="actualizar_input(this);" onkeypress="return solo_numeros(event)" maxlength=3 >	</div><div class="controls span4">	<input type="text" id="NUM_A" name="NUM_A" class="span12" onchange="actualizar_input(this);" onkeypress="return solo_numeros(event)" maxlength=3 >	</div>      <div class="controls span4">	<input type="text" id="NUM_C" name="NUM_C" class="span12" onchange="actualizar_input(this);" onkeypress="return solo_0_to_1(event)"  maxlength=1 >	</div>'		);
									        		inputs5 = $('<div class="controls span5" >').html('<div class="controls span2"><input type="text" id="NUEV_CCPP" name="NUEV_CCPP" class="span12" onkeypress="return solo_0_to_1(event)" maxlength=1 ></div><div class="controls span10"><input type="text" id="OBS" name="OBS" class="span12" maxlength=1000 onblur="return mayusculas(this);" ></div>');

									        		centro.append(inputs1);
									        		centro.append(inputs2);
									        		centro.append(inputs3);
									        		centro.append(inputs4);
									        		centro.append(inputs5);
													$("#contenedor").append(centro);			        	
										        };

								        		$.each(json2 , function(i, data) {
								        			var k = i+1;
								        			$("#ccpp_div_"+k+" :input[name='CC_CCPP']").val(data.COD_CCPP);
								        			$("#ccpp_div_"+k+" :input[name='CC_CCPP_NUM']").val(data.NUM_CENTRO_POBLADO);
								        			$("#ccpp_div_"+k+" :input[name='NOM_CCPP']").val(data.NOM_CCPP);
								        			$("#ccpp_div_"+k+" :input[name='TIPO_IN']").val(tipo_emp);
								        			// $("#NOM_CCPP").val(data.NOM_CCPP);
								        			// $("#TIPO_IN").val(tipo_emp);
								        		})		
								        		$("#agregar_boton").removeClass('hide');// habilita boton agregar ccpp;
								        		$("input[name='Enviar']").removeClass('hide');//muestra boton enviar
								        		//$("#export_excel").removeClass('hide');//muestra boton enviar
												//$("#buscar").removeAttr('disabled');//activar boton despues de json exitoso
												
												actualizar_input('REG'); //actualiza los totales
												actualizar_input('NUM_P');
												actualizar_input('NUM_A');
												actualizar_input('NUM_C');
							            }
							        }); 		            	
				            }
				        }); 


            	}else{////////////////////////////////////////////// editar la consulta
            			datas['opcion'] = 222;
            			alert('Subruta en Base de Datos, actualizalo  ');
				        $.ajax({
				            url: CI.base_url + "seguimiento/avance_empadronador/get_ajax_all/" + datas['opcion'] + "/" + $("#CCSE").val() + "/" + $("#CCDD").val() + "/" + $("#EQP").val() + "/" + $("#RUTA").val() + "/" + $("#SUB_R").val(), //consulta de la tabla AVANCE CAMPO SUBRUTAS
				            type:'POST',
				            data:datas,
				            dataType:'json',
				            cache: false,
				            success:function(json){

				            		$("#EMP_IN").val('');
				        			$("#CCPP").val('');
				        			$("#NOM_PP").val('');
				        			$("#CCDI").val('');
				        			$("#NOM_DI").val('');
				        			$("#EMP_IN").val('');
				        			$("#EMP_FIN").val('');
				        			$("#detalle :input").val('');
				        			$("#ccpp_total :input").val('');
				        			$("#totales :input").val('');
				        			$("select").attr('disabled','disabled');// solo lectura ubigeo		



				    	     		var cant =  json.length;
				    	     		$("#cant_reg").val(cant);
				    	     		//$("#TOTAL_CCPP").val($("#cant_reg").val());// dar valor al TOTAL CCPP
				    	     		$("#provincia").removeClass('hide');
									$("#detalle").removeClass('hide');
									$("#ccpp_cab").removeClass('hide');
									$("#ccpp_total").removeClass('hide');
									$("#totales").removeClass('hide');
									
									//CREA LOS INPTUS
							        for (var i = 1; i <= cant; i++) {
						        		centro = $('<div class="row-fluid" style="width:140%" id="ccpp_div_'+i+'" name="ccpp_div_'+i+'" />' )
						        		inputs1 = $('<div class="controls span2" >').html('<div class="controls span3"><input type="text" id="CC_CCPP" name="CC_CCPP" class="span12" readonly="readonly" onkeypress="return solo_numeros(event)" /><input type="hidden" id="CC_CCPP_NUM" name="CC_CCPP_NUM"></div><div class="controls span9"><input type="text" id="NOM_CCPP" name="NOM_CCPP" class="span12" readonly="readonly" /></div>');
						        		inputs2 = $('<div class="controls span1" >').html('<div class="controls span6"><input type="text" id="TIPO_IN" name="TIPO_IN" class="span12" readonly="readonly" /></div><div class="controls span6"><input type="text" id="TIPO_FIN" name="TIPO_FIN" class="span12" onkeypress="return solo_a_b(event)"  maxlength=1 onblur="return mayusculas(this);" /></div>');
						        		inputs3 = $('<div class="controls span2" >').html('<div class="controls span3"><input type="text" id="REG" name="REG" class="span12 REG" onchange="actualizar_input(this);" onkeypress="return solo_0_to_1(event)" ></div>	<div class="controls offset1 span3"><input type="text" id="REG_DIA" name="REG_DIA" class="span12 REG_DIA_'+i+'" onkeypress="return solo_numeros(event)" maxlength=2 onchange="return complete_zero(this,2)" ></div>	  <div class="controls offset1 span3"><input type="text" id="REG_MES" name="REG_MES" class="span12"  onkeypress="return solo_8_to_9(event)" maxlength=2 onchange="return complete_zero(this,2)" ></div>'	);
						        		inputs4 = $('<div class="controls span2" >').html('<div class="controls span4">	<input type="text" id="NUM_P" name="NUM_P" class="span12" onchange="actualizar_input(this);" onkeypress="return solo_numeros(event)" maxlength=3>	</div><div class="controls span4">	<input type="text" id="NUM_A" name="NUM_A" class="span12" onchange="actualizar_input(this);" onkeypress="return solo_numeros(event)" maxlength=3>	</div>      <div class="controls span4">	<input type="text" id="NUM_C" name="NUM_C" class="span12" onchange="actualizar_input(this);" onkeypress="return solo_0_to_1(event)" maxlength=1 >	</div>'		);
						        		inputs5 = $('<div class="controls span5" >').html('<div class="controls span2"><input type="text" id="NUEV_CCPP" name="NUEV_CCPP" class="span12" onkeypress="return solo_0_to_1(event)" maxlength=1 ></div><div class="controls span10"><input type="text" id="OBS" name="OBS" class="span12" onblur="return mayusculas(this);" ></div>');

						        		centro.append(inputs1);
						        		centro.append(inputs2);
						        		centro.append(inputs3);
						        		centro.append(inputs4);
						        		centro.append(inputs5);
										$("#contenedor").append(centro);			        	
							        };


				            		$.each(json , function(i, data) {
				            			//CABECERAS
				            			$("#CCPP").val(data.CCPP);
				            			$("#NOM_PP").val(data.NOM_PP);
				            			$("#CCDI").val(data.CCDI);
				            			$("#NOM_DI").val(data.NOM_DI);
				            			$("#EMP_IN").val(data.EMP_IN);
				            			$("#EMP_FIN").val(data.EMP_FIN);
				            			$("#COD_ODEI").val(data.COD_ODEI);

				            			// DETALLE
					        			var k = i+1;
					        			$("#ccpp_div_"+k+" :input[name='CC_CCPP']").val(data.CC_CCPP);
					        			$("#ccpp_div_"+k+" :input[name='CC_CCPP_NUM']").val(data.CC_CCPP_NUM);
					        			$("#ccpp_div_"+k+" :input[name='NOM_CCPP']").val(data.NOM_CCPP);
					        			$("#ccpp_div_"+k+" :input[name='TIPO_IN']").val(data.TIPO_IN);
					        			$("#ccpp_div_"+k+" :input[name='TIPO_FIN']").val(data.TIPO_FIN);
					        			$("#ccpp_div_"+k+" :input[name='REG']").val(data.REG);
					        			$("#ccpp_div_"+k+" :input[name='REG_DIA']").val(data.REG_DIA);
					        			$("#ccpp_div_"+k+" :input[name='REG_MES']").val(data.REG_MES);
					        			$("#ccpp_div_"+k+" :input[name='NUM_P']").val(data.NUM_P);
					        			$("#ccpp_div_"+k+" :input[name='NUM_A']").val(data.NUM_A);
					        			$("#ccpp_div_"+k+" :input[name='NUM_C']").val(data.NUM_C);
					        			$("#ccpp_div_"+k+" :input[name='NUEV_CCPP']").val(data.NUEV_CCPP);
					        			$("#ccpp_div_"+k+" :input[name='OBS']").val(data.OBS);
					        			$("#TOTAL_CCPP").val(data.TOTAL_CCPP);
					        			$("#TOTAL_REG").val(data.TOTAL_REG);
					        			$("#TOTAL_P").val(data.TOTAL_P);
					        			$("#TOTAL_A").val(data.TOTAL_A);
					        			$("#TOTAL_C").val(data.TOTAL_C);

					        			// TOTALES
					        			$("#P1_P").val(data.P1_P);
					        			$("#P2_P").val(data.P2_P);
					        			$("#P3_P").val(data.P3_P);
					        			$("#P4_P").val(data.P4_P);
					        			$("#P5_P").val(data.P5_P);
					        			$("#P6_P").val(data.P6_P);
					        			$("#P7_P").val(data.P7_P);
					        			$("#P8_P").val(data.P8_P);
					        			$("#P9_P").val(data.P9_P);
					        			$("#P10_P").val(data.P10_P);
					        			$("#P1_A").val(data.P1_A);
					        			$("#P2_A").val(data.P2_A);
					        			$("#P3_A").val(data.P3_A);
					        			$("#P4_A").val(data.P4_A);
					        			$("#P5_A").val(data.P5_A);
					        			$("#P6_A").val(data.P6_A);
					        			$("#P7_A").val(data.P7_A);
					        			$("#P8_A").val(data.P8_A);
					        			$("#P9_A").val(data.P9_A);
					        			$("#P10_A").val(data.P10_A);
					        			$("#P1_C").val(data.P1_C);
					        			$("#P2_C").val(data.P2_C);
					        			$("#P3_C").val(data.P3_C);
					        			$("#P4_C").val(data.P4_C);
					        			$("#P5_C").val(data.P5_C);
					        			$("#P6_C").val(data.P6_C);
					        			$("#P7_C").val(data.P7_C);
					        			$("#P8_C").val(data.P8_C);
					        			$("#P9_C").val(data.P9_C);
					        			$("#P10_C").val(data.P10_C);

				            		})

									$("#agregar_boton").removeClass('hide');// habilita boton agregar ccpp;
									$("input[name='Enviar']").removeClass('hide');//muestra boton enviar
									$("#export_excel").removeClass('hide');//muestra boton EXPORTAR
									//$("#buscar").removeAttr('disabled');//activar boton despues de json exitoso
									actualizar_input('REG'); //actualiza los totales
									actualizar_input('NUM_P');
									actualizar_input('NUM_A');
									actualizar_input('NUM_C');


				            }
				        });            			
            	}
            	

				            	
            }
        }); 




});

	function mayusculas(obj) {
		var cambiar = ($(obj).val().toUpperCase());
		$(obj).val(cambiar);
	}

	function actualizar_input(obj){
		if($(obj).attr('id') == "REG"){
			var sum = 0;
			for (var i = 1; i <= parseInt($("#cant_reg").val()) ; i++) {
				if ( $.isNumeric( $("#ccpp_div_"+i+" :input[name='REG']").val()) ) {
					sum = sum + parseInt($("#ccpp_div_"+i+" :input[name='REG']").val()) ;				
				};
			}
			$("#TOTAL_REG").val(sum);	

		}else if($(obj).attr('id') == "NUM_P"){
			var sum = 0;
			for (var i = 1; i <= parseInt($("#cant_reg").val()) ; i++) {
				if ( $.isNumeric( $("#ccpp_div_"+i+" :input[name='NUM_P']").val()) ) {
					sum = sum + parseInt($("#ccpp_div_"+i+" :input[name='NUM_P']").val()) ;				
				};
			}
			$("#TOTAL_P").val(sum);		
			if( $.isNumeric($('#P3_P').val()) ){	
				$("#P3_P").trigger('change');
			}

		}else if($(obj).attr('id') == "NUM_A"){
			var sum = 0;
			for (var i = 1; i <= parseInt($("#cant_reg").val()) ; i++) {
				if ( $.isNumeric( $("#ccpp_div_"+i+" :input[name='NUM_A']").val()) ) {
					sum = sum + parseInt($("#ccpp_div_"+i+" :input[name='NUM_A']").val()) ;				
				};
			}
			$("#TOTAL_A").val(sum);		
			if( $.isNumeric($('#P3_A').val()) ){
				$("#P3_A").trigger('change');
			}

		}else if($(obj).attr('id') == "NUM_C"){
			var sum = 0;
			for (var i = 1; i <= parseInt($("#cant_reg").val()) ; i++) {
				if ( $.isNumeric( $("#ccpp_div_"+i+" :input[name='NUM_C']").val()) ) {
					sum = sum + parseInt($("#ccpp_div_"+i+" :input[name='NUM_C']").val()) ;				
				};
			}
			$("#TOTAL_C").val(sum);
			if( $.isNumeric($('#P3_C').val()) ){	
				$("#P3_C").trigger('change');
			}

		}else if( ($(obj).attr('id') == 'P4_P' ) || ($(obj).attr('id') == 'P5_P' ) || ($(obj).attr('id') == 'P6_P' ) || ($(obj).attr('id') == 'P7_P' ) ){
			// if( $.isNumeric($('#P4_P').val())  &&  $.isNumeric($('#P5_P').val()) &&  $.isNumeric($('#P6_P').val()) &&  $.isNumeric($('#P7_P').val()) ){
			// 	$('#P3_P').val(  parseInt($("#P4_P").val() ) +  parseInt($("#P5_P").val() ) +  parseInt($("#P6_P").val() ) +  parseInt($("#P7_P").val() ) );		
			// }
			if( $.isNumeric($('#P3_P').val()) ){
				if ( parseInt($('#P3_P').val()) > 0 ) {
					$('#P8_P').val( ( ( ( parseInt($("#P6_P").val() ) +  parseInt($("#P7_P").val() ) ) * 100  ) / parseInt($('#P3_P').val()) ).toFixed(2) );
				} else{
					$('#P8_P').val(0);
				};
				// if ( parseInt($('#TOTAL_P').val()) > 0 ) {
				// 	$('#P9_P').val( ( ( parseInt($("#P3_P").val() ) *  100   ) / parseInt($('#TOTAL_P').val()) ).toFixed(2) );	
				// } else{
				// 	$('#P9_P').val(0);
				// };
				$("#P3_P").trigger('change');
			}


		}else if( ($(obj).attr('id') == 'P4_A' ) || ($(obj).attr('id') == 'P5_A' ) || ($(obj).attr('id') == 'P6_A' ) || ($(obj).attr('id') == 'P7_A' ) ){
	
			if( $.isNumeric( $('#P3_A').val()) ){
				if ( parseInt($('#P3_A').val()) > 0 ) {
					$('#P8_A').val( ( (  ( parseInt($("#P6_A").val() ) +  parseInt($("#P7_A").val() ) ) * 100  ) / parseInt($('#P3_A').val()) ).toFixed(2) );
				} else{
					$('#P8_A').val(0);
				};
				// if ( parseInt($('#TOTAL_A').val()) >0 ) {
				// 	$('#P9_A').val( ( ( parseInt($("#P3_A").val() ) *  100   ) / parseInt($('#TOTAL_A').val()) ).toFixed(2) );				
				// } else{
				// 	$('#P9_A').val(0);
				// };
				$("#P3_A").trigger('change');
			}

		}else if( ($(obj).attr('id') == 'P4_C' ) || ($(obj).attr('id') == 'P5_C' ) || ($(obj).attr('id') == 'P6_C' ) || ($(obj).attr('id') == 'P7_C' ) ){
	
			if( $.isNumeric($('#P3_C').val()) ){
				if ( $('#P3_C').val() > 0) {
					$('#P8_C').val( ( (  ( parseInt($("#P6_C").val() ) +  parseInt($("#P7_C").val() ) ) * 100  ) / parseInt($('#P3_C').val()) ).toFixed(2) );
				} else{
					$('#P8_C').val(0);
				};
				// if ( $('#TOTAL_C').val() > 0){
				// 	$('#P9_C').val( ( ( parseInt($("#P3_C").val() ) *  100   ) / parseInt($('#TOTAL_C').val()) ).toFixed(2) );	
				// }else{
				// 	$('#P9_C').val(0);
				// }
				$("#P3_C").trigger('change');
			}
		}			

	}
	$("#P3_P").change(function(){
		//$('#P9_P').val( ( ( parseInt($("#P3_P").val() ) *  100   ) / parseInt($('#TOTAL_P').val()) ).toFixed(2) );
		if ( parseInt($('#TOTAL_P').val()) > 0 ) {
			$('#P9_P').val( ( ( parseInt($("#P3_P").val() ) *  100   ) / parseInt($('#TOTAL_P').val()) ).toFixed(2) );	
		} else{
			$('#P9_P').val(0);
		};	
		$("#P3_C").trigger('change');				
	});
	$("#P3_A").change(function(){
		//$('#P9_A').val( ( ( parseInt($("#P3_A").val() ) *  100   ) / parseInt($('#TOTAL_A').val()) ).toFixed(2) );		
		if ( parseInt($('#TOTAL_A').val()) >0 ) {
			$('#P9_A').val( ( ( parseInt($("#P3_A").val() ) *  100   ) / parseInt($('#TOTAL_A').val()) ).toFixed(2) );				
		} else{
			$('#P9_A').val(0);
		};

	});	
	$("#P3_C").change(function(){
		//$('#P9_C').val( ( ( parseInt($("#P3_C").val() ) *  100   ) / parseInt($('#TOTAL_C').val()) ).toFixed(2) );
		if ( $('#TOTAL_C').val() > 0){
			$('#P9_C').val( ( ( parseInt($("#P3_C").val() ) *  100   ) / parseInt($('#TOTAL_C').val()) ).toFixed(2) );	
		}else{
			$('#P9_C').val(0);
		}

	});		

	//completar con cerros
	function complete_zero(obj, num){
	   n = $(obj).val().toString();
	   while(n.length < num) n = "0" + n;
	   return $(obj).val(n);

	}

	//pasar codigo del CC_CCPP al hidden CC_CCPP_cod
	function pase_cod(obj) {
		//$('#thisid').parents('li').eq(0);
		var k = $(obj).parents('div [name^="ccpp_div_"]').eq(0);
		var i = null;
		if ( $.isNumeric( (k.attr('id')).substring(10,11) ) ){
			i = (k.attr('id')).substring(9,11)
		}else{
			i = (k.attr('id')).substring(9,10)
		}
		//alert( (k.attr('id')).substring(9,11) );
		$("#ccpp_div_"+i+" :input[name='CC_CCPP_NUM']").val( $(obj).val() );

	}


///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////  D I V     S E L E C C I O N A D O   \\\\\\\\\\\\\\\\\\\\\
    $(document).ready(function(){
        for ( s = 2; s < 14; s++) {
            for (p = 1; p < 25; p++) {
              $("#C_RECH"+s+"_"+p).focusin(function(){
                //$(this).css("background-color","#A9D0F5");
                $(this).css("border","3px solid #ff9900");
              });
              $("#C_RECH"+s+"_"+p).focusout(function(){
                $(this).css("border","1px solid #989898");
              });
            };
        };
    });
//\\\\\\\\\\\\\\\\\\  D I V     S E L E C C I O N A D O   /////////////////////
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////
// <<=================== E N T E R   L I K E  T A B  ======================>>//
    // $('input').keydown( function(e) {
    //         var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;

    //         var array_especiales = ['OBS','A_RECH','C_RECH'];

    //         if(key == 13) {
    //             e.preventDefault();
    //             var inputs = $(this).closest('form').find(':input[text]');
    //             $(this).blur();  

    //             if ($(this).val()==""){// NO VACIOS
    //                 alert("Campo requerido");
    //                 inputs.eq( inputs.index(this)).focus(); 
    //             }else{
    //                 if ( inArray($(this).attr('id'), array_especiales )) {//  VALIDAR TOTALES

    //                 		 obj = ($(this).attr('id')).substring(0,1);
				// 			if ( parseInt($("#"+obj+"_TOTAL").val()) !== ( parseInt($("#"+obj+"_COMP").val()) + parseInt($("#"+obj+"_INC").val()) + parseInt($("#"+obj+"_RECH").val()) ) ) {
				// 				alert("El total no debe ser diferente a la suma");
				// 				inputs.eq( inputs.index(this) - 3).focus();  
				// 				inputs.eq( inputs.index(this) - 3).select();  
				// 			} else{
				// 				inputs.eq( inputs.index(this) + 1).focus();
				// 			}								
    //                 }else{
    //                     inputs.eq( inputs.index(this)+ 1 ).focus(); 
    //                }                         
    //             }
    //         }else if (key == 37) {
    //             var inputs = $(this).closest('form').find(':input:enabled');
    //             if ($(this).val()==""){// NO VACIOS
    //                 alert("Campo requerido");
    //                 inputs.eq( inputs.index(this)).focus(); 
    //                 inputs.eq( inputs.index(this)).select();
    //             }else{
    //                 inputs.eq( inputs.index(this)- 1).focus();  
    //                 inputs.eq( inputs.index(this)- 1).select();                  	
    //             }

    //         }
    //         else if(key == 9){
    //             return false;
    //         }
    //     });
// <<=================== E N T E R   L I K E  T A B  ======================>>//
///////////////////////////////////////////////////////////////////////////////






///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////////// S O L O     L  E T R A S  \\\\\\\\\\\\\\\\\\\\\\\\\\
    function solo_letras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 9,37, 39];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
//\\\\\\\\\\\\\\\\\\\\\\\\ S O L O     L  E T R A S  //////////////////////////  
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////


///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////////// S O L O     L  E T R A S  \\\\\\\\\\\\\\\\\\\\\\\\\\
    function solo_a_b(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "ab";
        especiales = [8, 9,37, 39];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
//\\\\\\\\\\\\\\\\\\\\\\\\ S O L O     L  E T R A S  //////////////////////////  
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////


///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
///////////////////// S O L O     A L F A N U M E R I C O  \\\\\\\\\\\\\\\\\\\\
	function alfa_numericos(e) {
	    key = e.keyCode || e.which;
	    tecla = String.fromCharCode(key).toLowerCase();
	    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz123456789.;,";
	    especiales = [8, 37, 39];

	    tecla_especial = false
	    for(var i in especiales) {
	        if(key == especiales[i]) {
	            tecla_especial = true;
	            break;
	        }
	    }

	    if(letras.indexOf(tecla) == -1 && !tecla_especial)
	        return false;
	}
//\\\\\\\\\\\\\\\\\\\ S O L O     A L F A N U M E R I C O  ////////////////////  
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////


// <<================== L I M P I A  ==================>>//
    function limpia() {
        var val = document.getElementById("miInput").value;
        var tam = val.length;
        for(i = 0; i < tam; i++) {
            if(!isNaN(val[i]))
                document.getElementById("miInput").value = '';
        }
    }
// ==================>> L I M P I A  <<==================//


// <<========= S O L O   N U M E R O S  ===============>>//
    function solo_numeros(e) {

        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "0123456789";
        especiales = [8, 9, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =========>> S O L O   N U M E R O S  <<===============//

// <<======= S O L O   N U M E R O S  0 - 1 ===========>>//
    function solo_0_to_1(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "01";
        especiales = [8, 9, 37, 39];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  0 - 1 <<===========//


// <<======= S O L O   N U M E R O S  1 - 2 ===========>>//
    function solo_1_to_2(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "129";
        especiales = [8,9, 37, 39];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  1 - 2 <<===========//


// <<======= S O L O   N U M E R O S  1 - 3 ===========>>//
    function solo_1_to_3(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "123";
        especiales = [8,9, 37, 39];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  1 - 3 <<===========//


// <<======= S O L O   N U M E R O S  1 - 4 ===========>>//
    function solo_1_to_4(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "012349";
        especiales = [8, 9, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  1 - 4 <<===========//

// <<======= S O L O   N U M E R O S  1 - 5 ===========>>//   
    function solo_1_to_5(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "0123459";
        especiales = [8, 9, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  1 - 5 <<===========//   

// <<======= S O L O   N U M E R O S  8 - 9 ===========>>//   
    function solo_8_to_9(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "89";
        especiales = [8, 9, 37, 39, 46];

        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
// =======>> S O L O   N U M E R O S  1 - 5 <<===========//   

// <<=============  =================>>//   
    function formulario_total(ob) {
    	if (ob ==1){
    		obj = "C";
    	}
		if ( parseInt($("#"+obj+"_TOTAL").val()) !== ( parseInt($("#"+obj+"_COMP").val()) + parseInt($("#"+obj+"_INC").val()) + parseInt($("#"+obj+"_RECH").val()) ) ) {
			alert("El total no debe ser diferente a la suma");
			$("#"+obj+"_TOTAL").focus();
			return false;
		} 

    }
// =======>> S O L O   N U M E R O S  1 - 5 <<===========//   







//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------

$(function(){

	//INICIA los inputs para usar TAB como ENTER


      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });


	$("input, textarea").blur(function(){
		mayusculas(this);
	})




// CARGA COMBOS UBIGEO ---------------------------------------------------------------------->

$("#NOM_SEDE, #NOM_DD, #EQP, #RUTA").change(function(event) {
        var sel = null;
        var sede = $('#NOM_SEDE');
        var dep = $('#NOM_DD');
        var equipo = $('#EQP');
        var ruta = $('#RUTA');
        var url = null;
        var cod = null;
        var op =null;

        var mivalue = ($(this).val() == -1) ? '-' : $(this).val();
        switch(event.target.id){
        	case 'NOM_SEDE':
        		//LIMPIA los campos
        		$("#EMP").val('');
    			$("#CCPP").val('');
    			$("#NOM_PP").val('');
    			$("#CCDI").val('');
    			$("#NOM_DI").val('');
    			$("#EMP").val(''); //

        		sel = $("#NOM_DD");
        		sel.attr('disabled','disabled');
        		$("#CCSE").val(mivalue);
        		url 	= CI.base_url + "ajax/marco_ajax/get_ajax_dep/" + $(this).val();
        		op 		= 0;
        		break;

            case 'NOM_DD':
                sel     = $("#EQP");
                sel.attr('disabled','disabled');
                $('#CCDD').val(mivalue); 
                url     = CI.base_url + "seguimiento/avance_empadronador/get_ajax_equipo/" + sede.val() +  "/"+ $(this).val();
                op      = 1;
                break;

            case 'EQP':
                sel     = $("#RUTA");
                sel.attr('disabled','disabled');
                //$('#CCPP').val(mivalue);                 
                url     = CI.base_url + "seguimiento/avance_empadronador/get_ajax_ruta/" + sede.val() +  "/" + dep.val() + "/" +  $(this).val();
                op      = 2;
                break;

            case 'RUTA':
                sel     = $("#SUB_R");
                sel.attr('disabled','disabled');
                //$("#CCDI").val(mivalue);          
                url     = CI.base_url + "seguimiento/avance_empadronador/get_ajax_sub_ruta/" + sede.val() +  "/" + dep.val() + "/" + equipo.val() + "/" + $(this).val();
                op      = 3;
                break;  

        }     
        
        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            sede: sede.val(),
            dep: dep.val(),
            equipo:equipo.val(),
            ruta:ruta.val(),
            ajax:1
        };

        if(event.target.id != 'SUB_R')
        {

        $.ajax({
            url: url,
            type:'POST',
            data:form_data,
            dataType:'json',
            cache: false,
            success:function(json_data){
                sel.empty();
                sel.removeAttr('disabled');
                // if (op==3){
                //     sel.append('<option value="-1"> - </option>');
                // }                
                $.each(json_data, function(i, data){
                	$("#buscar").attr('disabled','disabled');//dehabilita boton 
                	if (op==0){
                        sel.append('<option value="' + data.CCDD + '">' + data.DEPARTAMENTO + '</option>');
                    }
                    if (op==1){
                        sel.append('<option value="' + data.equipo + '">' + data.equipo + '</option>');
                    }
                    if (op==2){
                        sel.append('<option value="' + data.ruta + '">' + data.ruta + '</option>');
                   }
                    if (op==3){
                    	$("#buscar").removeAttr('disabled');//activar boton despues de json exitoso
                        sel.append('<option value="' + data.SUB_RUTA + '">' + data.SUB_RUTA + '</option>');}
                });

                if (op==0){
                    $("#NOM_DD").trigger('change');
                    }                 
                if (op==1){
                    $("#EQP").trigger('change');
                    }  
                if (op==2){
                    $("#RUTA").trigger('change');
                }
                if (op==3){
                    $("#SUB_R").trigger('change');
                }


            }
        });   
     }
  
}); 

//departamento

 $("#NOM_SEDE").trigger('change');


$.extend(jQuery.validator.messages, {
     required: "Campo obligatorio",
    // remote: "Please fix this field.",
    // email: "Please enter a valid email address.",
    // url: "Please enter a valid URL.",
     date: "Ingrese una fecha válida",
    // dateISO: "Please enter a valid date (ISO).",
    number: "Solo se permiten números",
     digits: "Solo se permiten números",
    // creditcard: "Please enter a valid credit card number.",
    // equalTo: "Please enter the same value again.",
    // accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Máximo de carácteres: {0} "),
    // minlength: jQuery.validator.format("Please enter at least {0} characters."),
    // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Solo numeros entre {0} y {1}."),
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

//validacion



//$("#frm_avance_campo").validate({});



// $(".REG_DIA").rules("add", { 
// 		           required: true,
// 		           number: true,
// 		           range: [1,31],
// 		           maxlength: 2,
// 		           exactlength:2,
// });


				//$("#frm_avance_campo").validate({});
				//$.each($('div[name^="ccpp_div_"]'), function(){

								

									//});


						// $(".REG_DIA").rules("add", { 
						// 		           required: true,
						// 		           number: true,
						// 		           range: [1,31],
						// 		           maxlength: 2,
						// 		           exactlength:2,
						// });

				// for (var k = 1; k <= 30; k++) {

				// 	$.validator.addClassRules("REG_DIA_"+k, {
				// 			           required: true,
				// 			           number: true,
				// 			           range: [1,31],
				// 			           maxlength: 2,
				// 			           exactlength:2,
				// 	        // messages: {
				// 			      //      range: 'Día inválido',
				// 			      //      maxlength: 'Día inválido',
				// 			      //      exactlength:'Día inválido', 
				// 	        // }		           

				// 	});	
				
		  //   	}


		$("#frm_avance_campo").validate({


		    rules: {

		        CCSE: {
		            required: true,
		            valueNotEquals: -1,
		         }, 
		       NOM_DD: {
		           required: true,
		           valueNotEquals: -1,
		         }, 
		       EQP: {
		           required: true,
		           valueNotEquals: -1,
		         }, 
		       RUTA: {
		           required: true,
		           valueNotEquals: -1,
		         }, 
		       SUB_R: {
		           required: true,
		           valueNotEquals: -1,
		         }, 
		       EMP_IN: {
		           required: true,
		         }, 
		       EMP_FIN: {
		           //required: true,
		           validName: true,
		         }, 
		       NOM_PP: {
		           required: true,
		         }, 
		       NOM_DI: {
		           required: true,
		         },   
		       NOM_CCPP: {
		           required: true,
		           //validName: true,
		         }, 
		       REG_DIA: {
		           required: true,
		           number: true,
		           range: [1,31],
		           maxlength: 2,
		           exactlength:2,           
		         }, 
		       REG_MES: {
		           required: true,
		           number: true,
		           range: [8,9],
		           maxlength: 2,
		           exactlength:2,           
		         },	
		       NUM_P: {
		           required: true,
		           number: true,
		           range: [0,500],
		           maxlength: 3,
		         },
		       NUM_A: {
		           required: true,
		           number: true,
		           range: [0,500],
		           maxlength: 3,
		         },		
		       NUM_C: {
		           required: true,
		           number: true,
		           range: [0,1],
		           maxlength: 1,
		         },	
		       NUEV_CCPP: {
		           required: true,
		           number: true,
		           range: [0,1],
		           maxlength: 1,
		         },	
		       OBS: {
		           maxlength: 1000,
		         },			         		         		         	         				         	                   
		       TOTAL_CCPP: {
		           required: true,
		           number: true,
		           range: [0,5000],
		           maxlength: 4,
		         }, 
		       TOTAL_REG: {
		           required: true,
		           number: true,
		           range: [0,5000],
		           maxlength: 4,
		         }, 
		       TOTAL_P: {
		           required: true,
		           number: true,
		           range: [0,99998],
		           maxlength: 5,
		         }, 
		       TOTAL_A: {
		           required: true,
		           number: true,
		           range: [0,99998],
		           maxlength: 5,
		         },    
		       TOTAL_C: {
		           required: true,
		           number: true,
		           range: [0,5000],
		           maxlength: 4,
		         },                                                  
		       P1_P: {
		           required: true,
		           number: true,
		           range: [1,31],
		           maxlength: 2,
		           exactlength:2,           
		         },  
		       P2_P: {
		           required: true,
		           number: true,
		           range: [8,9],
		           maxlength: 2,
		           exactlength:2,
		         },   
		       P3_P: {
		           required: true,
		           number: true,
		           range: [0,9998],
		           maxlength: 4,
		         },     
		       P4_P: {
		           required: true,
		           number: true,
		           range: [0,500],
		           maxlength: 3,
		         },     
		       P5_P: {
		           required: true,
		           number: true,
		           range: [0,500],
		           maxlength: 3,
		         },      
		       P6_P: {
		           required: true,
		           number: true,
		           range: [0,500],
		           maxlength: 3,
		         },        
		       P7_P: {
		           required: true,
		           number: true,
		           range: [0,500],
		           maxlength: 3,
		         },       
		       P8_P: {
		           required: true,
		           number: true,
		           range: [0,300],
		           maxlength: 6,
		         },   
		       P9_P: {
		           required: true,
		           number: true,
		           range: [0,300],
		           maxlength: 6,
		         }, 
		       P10_P: {
		           maxlength: 1000,
		         }, 
		       P1_A: {
		           required: true,
		           number: true,
		           range: [1,31],
		           maxlength: 2,
		           exactlength:2,           
		         },  
		       P2_A: {
		           required: true,
		           number: true,
		           range: [8,9],
		           maxlength: 2,
		           exactlength:2,
		         },   
		       P3_A: {
		           required: true,
		           number: true,
		           range: [0,9998],
		           maxlength: 4,
		         },     
		       P4_A: {
		           required: true,
		           number: true,
		           range: [0,500],
		           maxlength: 3,
		         },     
		       P5_A: {
		           required: true,
		           number: true,
		           range: [0,500],
		           maxlength: 3,
		         },      
		       P6_A: {
		           required: true,
		           number: true,
		           range: [0,500],
		           maxlength: 3,
		         },        
		       P7_A: {
		           required: true,
		           number: true,
		           range: [0,500],
		           maxlength: 3,
		         },       
		       P8_A: {
		           required: true,
		           number: true,
		           range: [0,300],
		           maxlength: 6,
		         },   
		       P9_A: {
		           required: true,
		           number: true,
		           range: [0,300],
		           maxlength: 6,
		         }, 
		       P10_A: {
		           maxlength: 1000,
		         }, 
		       P1_C: {
		           required: true,
		           number: true,
		           range: [1,31],
		           maxlength: 2,
		           exactlength:2,           
		         },  
		       P2_C: {
		           required: true,
		           number: true,
		           range: [8,9],
		           maxlength: 2,
		           exactlength:2,
		         },   
		       P3_C: {
		           required: true,
		           number: true,
		           range: [0,9998],
		           maxlength: 4,
		         },     
		       P4_C: {
		           required: true,
		           number: true,
		           range: [0,100],
		           maxlength: 3,
		         },     
		       P5_C: {
		           required: true,
		           number: true,
		           range: [0,100],
		           maxlength: 3,
		         },      
		       P6_C: {
		           required: true,
		           number: true,
		           range: [0,100],
		           maxlength: 3,
		         },        
		       P7_C: {
		           required: true,
		           number: true,
		           range: [0,100],
		           maxlength: 3,
		         },       
		       P8_C: {
		           required: true,
		           number: true,
		           range: [0,100],
		           maxlength: 6,
		         },   
		       P9_C: {
		           required: true,
		           number: true,
		           range: [0,300],
		           maxlength: 6,
		         }, 
		       P10_C: {
		           maxlength: 1000,
		         }, 

			//FIN RULES
		    },

		    messages: {
		 
		       EMP_FIN: {
		           validName: 'Ingrese nombre válido',
		         },  
		       REG_DIA: {
		           range: 'Día inválido',
		           maxlength: 'Día inválido',
		           exactlength:'Día inválido',           
		         },     
		       REG_MES: {
		           range: 'Mes inválido',
		           maxlength: 'Mes inválido',
		           exactlength:'Mes inválido',           
		         },  
		       NUM_P: {
		       	   number: 'N° PESCADORES: sólo números ',
		           required: 'N° PESCADORES: requerido ',
		           range: 'N° PESCADORES: valores entre 0 y 500',
		           maxlength: 'N° PESCADORES: longitud Máxima [3]',
		         },
		       NUM_A: {
		       	   number: 'N° ACUICULTORES: sólo números ',
		           required: 'N° ACUICULTORES: requerido ',
		           range: 'N° ACUICULTORES: valores entre 0 y 500',
		           maxlength: 'N° ACUICULTORES: longitud Máxima [3]',
		         },		
		       NUM_C: {
		       	   number: 'N° COMUNIDADES: sólo números ',
		           required: 'N° COMUNIDADES: requerido ',
		           range: 'N° COMUNIDADES: valores entre 0 y 1',
		           maxlength: 'N° COMUNIDADES: longitud Máxima [1]',
		         },	
		       NUEV_CCPP: {
		       	   number: 'NUEVO CCPP: sólo números ',
		           required: 'NUEVO CCPP: requerido ',
		           range: 'NUEVO CCPP: valores entre 0 y 1',
		           maxlength: 'NUEVO CCPP: longitud Máxima [1]',
		         },			         
		       P1_P: {
		           range: 'Día inválido',
		           maxlength: 'Día inválido',
		           exactlength:'Día inválido',           
		         },  
		       P2_P: {
		           range: 'Mes inválido',
		           maxlength: 'Mes inválido',
		           exactlength:'Mes inválido',   
		         },   
		       P1_A: {
		           range: 'Día inválido',
		           maxlength: 'Día inválido',
		           exactlength:'Día inválido',             
		         },  
		       P2_A: {
		           range: 'Mes inválido',
		           maxlength: 'Mes inválido',
		           exactlength:'Mes inválido',
		         },   
		       P1_C: {
		           range: 'Día inválido',
		           maxlength: 'Día inválido',
		           exactlength:'Día inválido',             
		         },  
		       P2_C: {
		           range: 'Mes inválido',
		           maxlength: 'Mes inválido',
		           exactlength:'Mes inválido', 
		         },   
		                                             
			//FIN MESSAGES
		    },
		    errorPlacement: function(error, element) {
		        $(element).next().after(error);
		    },
		    /*invalidHandler: function(form, validator) {
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
		    },*/



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

				if ( !( parseInt($("#P3_P").val()) ==  parseInt($("#P4_P").val() ) +  parseInt($("#P5_P").val() ) +  parseInt($("#P6_P").val() ) +  parseInt($("#P7_P").val() ) ) ){
					alert('TOTAL FORM debe ser igual a la suma de RESULTADO');
					$("#P3_P").focus();
					$("#P3_P").select();
					return;
				};
				if ( !( parseInt($("#P3_A").val()) ==  parseInt($("#P4_A").val() ) +  parseInt($("#P5_A").val() ) +  parseInt($("#P6_A").val() ) +  parseInt($("#P7_A").val() ) ) ){
					alert('TOTAL FORM debe ser igual a la suma de RESULTADO');
					$("#P3_A").focus();
					$("#P3_A").select();
					return;
				};
				if ( !( parseInt($("#P3_C").val()) ==  parseInt($("#P4_C").val() ) +  parseInt($("#P5_C").val() ) +  parseInt($("#P6_C").val() ) +  parseInt($("#P7_C").val() ) ) ){
					alert('TOTAL FORM debe ser igual a la suma de RESULTADO');
					$("#P3_C").focus();
					$("#P3_C").select();
					return;
				};
		        var bsub = $( "#frm_avance_campo :submit" );
		        bsub.attr("disabled", "disabled");

		    	var guar = 0;
		    	var modi = 0; 
		    	var contador = 0;       	
		        for ( c = 1 ; c <= $("#cant_reg").val() ; c++){

			        var form_data_2 = $("#ubi_geo").find("input").serializeArray();
			        form_data_2.push(
			        	{name: 'csrf_token_c', 	value: CI.cct},
			        	{name: 'EQP', 	value: $("#EQP").val()},
			        	{name: 'RUTA', 	value: $("#RUTA").val()},
			        	{name: 'SUB_R', 	value: $("#SUB_R").val()},
			        	{name: 'NOM_SEDE', 	value: $("#NOM_SEDE :selected").text()},
			        	{name: 'NOM_DD', 	value: $("#NOM_DD :selected").text()},
			        	{name: 'ajax', 	value: true });
			        var form_ccpp_total = $("#ccpp_total").find("input").serializeArray();
			        	$.merge(form_data_2,form_ccpp_total);
			        var form_totales = $("#totales").find("input, textarea").serializeArray();
			        	$.merge(form_data_2, form_totales);
				        var form_div = $("#ccpp_div_"+c+" :input").serializeArray();
				        $.merge(form_data_2,form_div);


				        $.ajax({
				            url: CI.base_url + "seguimiento/avance_empadronador/grabar/" + $("#CCSE").val() + "/" + $("#CCDD").val() + "/" +  $("#EQP").val() + "/" + $("#RUTA").val() + "/" +$("#SUB_R").val(),
				            type:'POST',
				            data:form_data_2,
				            dataType:'json',
				            cache: false,
				            success:function(json){
				            	contador++;
				            	if (json == 'guardado') {
				            		guar = guar + 1;
				            	}else if(json == 'modificado'){
				            		modi = modi + 1;
				            	}             	
				        		if (contador == $("#cant_reg").val() ){
							    	if ( !(modi + guar == parseInt($("#cant_reg").val() ) ) ){
							    			alert('Error INESPERADO, no se guardó o modificó todos los registros')
							    	} else{
							    			alert('EXITOSO: [' + guar + '] guardada(s), [' + modi + '] modificada(s)');
							    			//bsub.removeAttr("disabled");// vuelve habilitar guardar
							    	}		        			
				        		}


				            }
				        }); 

		        }
				//alert(modi +'-'+guar+'-'+ $("#cant_reg").val() );

		        //alert(datos);
		    
		          	
		    }       
		});


	//});
	//END 

 }); 


// CARGA COMBOS UBIGEO <-----------------------------
//-------------------------------------------------------------------------------------------------------------------------------

</script>