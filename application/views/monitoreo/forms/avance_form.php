
<?php  
$labelnroform=  array('class' => 'preguntas_sub2 nroformpesc');
$label1=  array('class' => 'preguntas_sub2');
$label_class =  array('class' => 'control-label pesc_f');
//$span_class =  'span10';
$span_class2 =  'span6'; 
$span_class10 =  'span10'; 
$span_class8 =  'span8'; 
$span_class =  'span12';

	// A. UBICACION GEOGRAFICA ----------------------------------
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
	// B. FECHA
		$F_D =array(
			'name'	=> 'F_D',
			'id'	=> 'F_D',
			//'value'	=> $F_D,
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",

		);
		$F_M =array(
			'name'	=> 'F_M',
			'id'	=> 'F_M',
			//'value'	=> $F_M,
			'maxlength'	=> 2,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
	// C. FUNCIONARIO
		$NOM_BRI =array(
			'name'	=> 'NOM_BRI',
			'id'	=> 'NOM_BRI',
			//'value'	=> $NOM_BRI,
			'maxlength'	=> 80,
			'class' => $span_class,
			'onkeypress'=>"return solo_letras(event)",

		);
		// $CARGO =array(
		// 	'name'	=> 'CARGO',
		// 	'id'	=> 'CARGO',
		// 	//'value'	=> $CARGO,
		// 	'maxlength'	=> 1,
		// 	'class' => $span_class,
		// 	'onkeypress'=>"return solo_1_to_3(event)",
		// );
	// COMUNIDADES
		$C_TOTAL =array(
			'name'	=> 'C_TOTAL',
			'id'	=> 'C_TOTAL',
			//'value'	=> $C_TOTAL,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$C_COMP =array(
			'name'	=> 'C_COMP',
			'id'	=> 'C_COMP',
			//'value'	=> $C_COMP,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$C_INC =array(
			'name'	=> 'C_INC',
			'id'	=> 'C_INC',
			//'value'	=> $C_INC,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$C_RECH =array(
			'name'	=> 'C_RECH',
			'id'	=> 'C_RECH',
			//'value'	=> $C_RECH,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
			//'onblur' => 'return formulario_total(1);',
		);
		// $PREG_N =array(
		// 	'name'	=> 'PREG_N',
		// 	'id'	=> 'PREG_N',
		// 	//'value'	=> $PREG_N,
		// 	'maxlength'	=> 2,
		// 	'class' => $span_class,
		// 	'onkeypress'=>"return solo_numeros(event)",
		// );
	// PESACADOR
		$P_TOTAL =array(
			'name'	=> 'P_TOTAL',
			'id'	=> 'P_TOTAL',
			//'value'	=> $P_TOTAL,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$P_COMP =array(
			'name'	=> 'P_COMP',
			'id'	=> 'P_COMP',
			//'value'	=> $P_COMP,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$P_INC =array(
			'name'	=> 'P_INC',
			'id'	=> 'P_INC',
			//'value'	=> $P_INC,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$P_RECH =array(
			'name'	=> 'P_RECH',
			'id'	=> 'P_RECH',
			//'value'	=> $P_RECH,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
	// EMBARCACIONES
		$E_TOTAL_P =array(
			'name'	=> 'E_TOTAL_P',
			'id'	=> 'E_TOTAL_P',
			//'value'	=> $E_TOTAL_P,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);

	// ACUICULTOR
		$A_TOTAL =array(
			'name'	=> 'A_TOTAL',
			'id'	=> 'A_TOTAL',
			//'value'	=> $A_TOTAL,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$A_COMP =array(
			'name'	=> 'A_COMP',
			'id'	=> 'A_COMP',
			//'value'	=> $A_COMP,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$A_INC =array(
			'name'	=> 'A_INC',
			'id'	=> 'A_INC',
			//'value'	=> $A_INC,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
		$A_RECH =array(
			'name'	=> 'A_RECH',
			'id'	=> 'A_RECH',
			//'value'	=> $A_RECH,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);
	// EMBARCACIONES
		$E_TOTAL_A =array(
			'name'	=> 'E_TOTAL_A',
			'id'	=> 'E_TOTAL_A',
			//'value'	=> $E_TOTAL_A,
			'maxlength'	=> 4,
			'class' => $span_class,
			'onkeypress'=>"return solo_numeros(event)",
		);



		// $depaArray = NULL;
		// foreach($departamento->result() as $filas)
		// {
		// 	$depaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
		// }

		$ubidepaArray = NULL;
		foreach($departamento->result() as $filas)
		{
			$ubidepaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
		}

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
	echo '<div class="well modulo">';
		echo '<div class="row-fluid">';

			echo '<h4>AVANCE DE CAMPO</h4>';

			echo '<h5>A. UBICACION GEOGRAFICA</h5>';

			echo '<div class="row-fluid">';	
					echo '<div class="control-group span3">';

							echo form_label('DEPARTAMENTO','NOM_DD',$label1);
							echo '<div class="controls span3">';
								echo form_input($CCDD); 
							echo '</div>';	
							echo '<div class="controls span8">';
								echo form_dropdown('NOM_DD', $ubidepaArray, FALSE,'class="span12" id="NOM_DD"'); 
							echo '</div>';
					echo '</div>';  

					echo '<div class="control-group span3">';
									echo form_label('PROVINCIA','NOM_PP',$label1);
								echo '<div class="controls span3">';
									echo form_input($CCPP); 
								echo '</div>';	

								echo '<div class="controls span8">';
									echo form_dropdown('NOM_PP', $provArray, FALSE,'class="span12" id="NOM_PP"'); 
								echo '</div>';	

					echo '</div>'; 

					echo '<div class="control-group span3">';
							echo form_label('DISTRITO','NOM_DI',$label1);
							echo '<div class="controls span3">';
								echo form_input($CCDI); 
							echo '</div>';	

							echo '<div class="controls span8">';
								echo form_dropdown('NOM_DI', $distArray, FALSE,'class="span12" id="NOM_DI"'); 
							echo '</div>';	
					echo '</div>'; 	

					echo '<div class="control-group span3">';
								echo form_label('CENTRO POBLADO','NOM_CCPP',$label1);
								echo '<div class="controls span4">';
									echo form_input($COD_CCPP); 
								echo '</div>';	
								echo '<div class="controls span7">';
									echo form_dropdown('NOM_CCPP', $ccppArray, FALSE,'class="span12" id="NOM_CCPP"'); 
									echo '<div class="help-block error">' . form_error('NOM_CCPP') . '</div>';	
								echo '</div>';	

					echo '</div>'; 		

			echo '</div>'; 

			echo '<div class="row-fluid">';	

				// FECHA
					echo '<div class="span2 titulos">';

						echo '<div class="span12 titulos">';
							echo '<h5> FECHA</h5>';
						echo '</div>';

						echo '<div class="row-fluid">';

							echo '<div class="control-group grupos span3">';

								echo form_label('DIA','F_D',$label1);

								echo '<div class="controls">';
									echo form_input($F_D); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($F_D['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos offset1 span3">';

								echo form_label('MES','F_M',$label1);

								echo '<div class="controls">';
									echo form_input($F_M); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($F_M['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 
						
						echo '</div>';

					echo '</div>';
				// FECHA

				// FUNCIONARIO	
					echo '<div class="span4 titulos">';

						echo '<div class="span12 titulos">';
							echo '<h5> DATOS DEL JEFE DE BRIGADA</h5>';
						echo '</div>';

						echo '<div class="row-fluid">';

							echo '<div class="control-group grupos span10">';

								echo form_label('Nombre  y apellidos','NOM_BRI',$label1);

								echo '<div class="controls">';
									echo form_input($NOM_BRI); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($NOM_BRI['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							// echo '<div class="control-group grupos  span2">';

							// 	echo form_label('Cargo','CARGO',$label1);

							// 	echo '<div class="controls">';
							// 		echo form_input($CARGO); 
							// 		echo '<span class="help-inline"></span>';
							// 		echo '<div class="help-block error">' . form_error($CARGO['name']) . '</div>';
							// 	echo '</div>';	

							// echo '</div>'; 
						
						echo '</div>';

					echo '</div>';
				// FUNCIONARIO

				// TIPO FORMULARIO	
					echo '<div class="span5 titulos">';

						echo '<div class=" span11 titulos">';
							echo '<h5>FORMULARIO DE COMUNIDADES</h5>';
						echo '</div>';

						echo '<div class="row-fluid">';

							echo '<div class="control-group  grupos span3">';

								echo form_label('TOTAL','C_TOTAL',$label1);
								echo '<div class="controls span8">';
									echo form_input($C_TOTAL); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($C_TOTAL['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span3">';

								echo form_label('COMPLETO','C_COMP',$label1);
								echo '<div class="controls span8">';
									echo form_input($C_COMP); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($C_COMP['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span3">';

								echo form_label('INCOMPLETO','C_INC',$label1);
								echo '<div class="controls span8">';
									echo form_input($C_INC); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($C_INC['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos span3">';

								echo form_label('RECHAZO','C_RECH',$label1);
								echo '<div class="controls span8">';
									echo form_input($C_RECH); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($C_RECH['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 
						
						echo '</div>';

					echo '</div>';
				// TIPO FORMULARIO	

			echo '</div>'; 

			echo '<div class="row-fluid">';	

				// PESCADOR	
					echo '<div class="span5 titulos">';

						echo '<div class="span12 titulos">';
							echo '<h5> FORMULARIO PESCADOR</h5>';
						echo '</div>';

						echo '<div class="row-fluid">';

							echo '<div class="control-group grupos span3">';

								echo form_label('TOTAL','P_TOTAL',$label1);

								echo '<div class="controls span8">';
									echo form_input($P_TOTAL); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($P_TOTAL['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span3">';

								echo form_label('COMPLETO','P_COMP',$label1);

								echo '<div class="controls span8">';
									echo form_input($P_COMP); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($P_COMP['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span3">';

								echo form_label('INCOMPLETO','P_INC',$label1);

								echo '<div class="controls span8">';
									echo form_input($P_INC); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($P_INC['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span3">';
									echo form_label('RECHAZO','P_RECH',$label1);
								echo '<div class="controls span8 ">';
									echo form_input($P_RECH); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($P_RECH['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 													
						echo '</div>';

					echo '</div>';
				// PESCADOR

				// EMBARCACIONES	
					echo '<div class="span1 titulos" style="padding-top: 41px !important">';

						echo '<div class="control-group grupos span12">';

							echo form_label('Embarcación','E_TOTAL_P',$label1);
							echo '<div class="controls span12">';
								echo form_input($E_TOTAL_P); 
								echo '<span class="help-inline"></span>';
								echo '<div class="help-block error">' . form_error($E_TOTAL_P['name']) . '</div>';
							echo '</div>';	

						echo '</div>'; 
																		
					echo '</div>';
				// EMBARCACIONES

				// ACUICULTOR	
					echo '<div class="span5 titulos">';

						echo '<div class="span12 titulos">';
							echo '<h5> FORMULARIO ACUICULTOR</h5>';
						echo '</div>';

						echo '<div class="row-fluid">';

							echo '<div class="control-group grupos span3">';
								echo form_label('TOTAL','A_TOTAL',$label1);
								echo '<div class="controls span8">';
									echo form_input($A_TOTAL); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($A_TOTAL['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span3">';

								echo form_label('COMPLETO','A_COMP',$label1);

								echo '<div class="controls span8">';
									echo form_input($A_COMP); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($A_COMP['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span3">';

								echo form_label('INCOMPLETO','A_INC',$label1);

								echo '<div class="controls span8">';
									echo form_input($A_INC); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($A_INC['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 

							echo '<div class="control-group grupos  span3">';
									echo form_label('RECHAZO','A_RECH',$label1);
								echo '<div class="controls span8 ">';
									echo form_input($A_RECH); 
									echo '<span class="help-inline"></span>';
									echo '<div class="help-block error">' . form_error($A_RECH['name']) . '</div>';
								echo '</div>';	

							echo '</div>'; 													
						echo '</div>';

					echo '</div>';
				// ACUICULTOR
								
				// EMBARCACIONES	
					echo '<div class="span1 titulos" style="padding-top: 41px !important">';

						echo '<div class="control-group grupos span12">';

							echo form_label('Embarcación','E_TOTAL_A',$label1);
							echo '<div class="controls span12">';
								echo form_input($E_TOTAL_A); 
								echo '<span class="help-inline"></span>';
								echo '<div class="help-block error">' . form_error($E_TOTAL_A['name']) . '</div>';
							echo '</div>';	

						echo '</div>'; 
																		
					echo '</div>';
				// EMBARCACIONES

			echo '</div>'; 
		echo '</div>'; 			
	echo '</div>'; 		

		echo '<div class="row-fluid">';

			echo '<div class="span6">';
				//echo anchor(base_url('digitacion/revision'), 'Visualizar','class="btn btn-success pull-left"');
				echo '<a href="'. site_url('monitoreo/avance/get_todo') . '" class="btn btn-success pull-left" target="_blank">Visualizar</a>';
		   	echo '</div>';

			echo '<div class="extra span5">';
		    echo '</div>';
			echo '<div >';
						echo form_submit('Enviar', 'Enviar','class="btn btn-primary pull-right"');
		   echo '</div>';
	    echo '</div>';

	echo form_close(); 
	echo '</div>'; 			
echo '</div>'; 	

		/*echo '<div class="row-fluid" style="width: 1800px !important">';

			echo '<div class="span12">';

				// echo '<table border="1" class="table table-hover table-condensed">';
				// 	echo '<thead>';
				// 		echo '<tr>';
				// 		echo '<th style="width: 10px !important">N°</th>';
				// 		echo '<th style="width: 160px !important">Departamento</th>';
				// 		echo '<th style="width: 160px !important">Provincia</th>';
				// 		echo '<th style="width: 160px !important">Distrito</th>';
				// 		echo '<th style="width: 180px !important">Centro Poblado</th>';
				// 		echo '<th style="width: 20px !important">Día</th>';
				// 		echo '<th style="width: 20px !important">Mes</th>';
				// 		echo '<th style="width: 190px !important">Funcionario</th>';
				// 		echo '<th style="width: 10px !important">Cargo </th>';
				// 		echo '<th style="width: 200px !important">Formulario Pescador</th>';
				// 		echo '<th style="width: 200px !important">Formulario Acuicultor</th>';
				// 		echo '<th style="width: 200px !important">Formulario Comunidades</th>';
				// 		echo '<th style="width: 10px !important">C_RECHcion</th>';
				// 		echo '<th style="width: 10px !important">Pregunta</th>';
				// 		echo '<th style="width: 250px !important">Error de concepto</th>';
				// 		echo '<th style="width: 250px !important">Error de diligenciamiento</th>';
				// 		echo '<th style="width: 250px !important">Error de omision</th>';
				// 		echo '<th style="width: 1000px !important">Descripccion del error</th>';
				// 		echo '</tr>';
				// 	echo '</thead>';
				// 	echo '<tbody>';
				// 	$num = 1;
				// 	foreach($tables as $row){
				// 		echo "<tr>";
				// 			echo "<td>". $num++ ."</td>";
				// 			echo "<td>". $row->NOM_DD ."</td>";
				// 			echo "<td>". $row->NOM_PP ."</td>";
				// 			echo "<td>". $row->NOM_DI ."</td>";
				// 			echo "<td>". $row->NOM_CCPP ."</td>";
				// 			echo "<td>". $row->F_D ."</td>";
				// 			echo "<td>". $row->F_M ."</td>";
				// 			echo "<td>". $row->NOM ."</td>";
				// 			echo "<td>". $row->CARGO ."</td>";
				// 			echo "<td>". $row->C_TOTAL."</td>";
				// 			echo "<td>". $row->C_COMP."</td>";
				// 			echo "<td>". $row->C_INC."</td>";
				// 			echo "<td>". $row->C_RECH."</td>";
				// 			echo "<td>". $row->PREG_N."</td>";
				// 			echo "<td>". $row->P_TOTAL."</td>";
				// 			echo "<td>". $row->P_COMP."</td>";
				// 			echo "<td>". $row->C_INC."</td>";
				// 			echo "<td>". $row->C_RECH."</td>";						
				// 		echo "</tr>";  }
				// 	echo '</tbody>';
				// echo '</table>';

			echo '</div>'; 	

		echo '</div>'; */


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
    $('input').keydown( function(e) {
            var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;

            var array_especiales = ['P_RECH','A_RECH','C_RECH'];

            if(key == 13) {
                e.preventDefault();
                var inputs = $(this).closest('form').find(':input:enabled:visible');
                $(this).blur();  

                if ($(this).val()==""){// NO VACIOS
                    alert("Campo requerido");
                    inputs.eq( inputs.index(this)).focus(); 
                }else{
                    if ( inArray($(this).attr('id'), array_especiales )) {//  VALIDAR TOTALES

                    		 obj = ($(this).attr('id')).substring(0,1);
							if ( parseInt($("#"+obj+"_TOTAL").val()) !== ( parseInt($("#"+obj+"_COMP").val()) + parseInt($("#"+obj+"_INC").val()) + parseInt($("#"+obj+"_RECH").val()) ) ) {
								alert("El total no debe ser diferente a la suma");
								inputs.eq( inputs.index(this) - 3).focus();  
								inputs.eq( inputs.index(this) - 3).select();  
							} else{
								inputs.eq( inputs.index(this) + 1).focus();
							}								
                    }else{
                        inputs.eq( inputs.index(this)+ 1 ).focus(); 
                   }                         
                }
            }else if (key == 37) {
                var inputs = $(this).closest('form').find(':input:enabled');
                if ($(this).val()==""){// NO VACIOS
                    alert("Campo requerido");
                    inputs.eq( inputs.index(this)).focus(); 
                    inputs.eq( inputs.index(this)).select();
                }else{
                    inputs.eq( inputs.index(this)- 1).focus();  
                    inputs.eq( inputs.index(this)- 1).select();                  	
                }

            }
            else if(key == 9){
                return false;
            }
        });
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

      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });


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
    // email: "Please enter a valid email address.",
    // url: "Please enter a valid URL.",
     date: "Ingrese una fecha válida",
    // dateISO: "Please enter a valid date (ISO).",
    number: "Solo se permiten números",
     digits: "Solo se permiten números",
    // creditcard: "Please enter a valid credit card number.",
    // equalTo: "Please enter the same value again.",
    // accept: "Please enter a value with a valid extension.",
    // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
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
$("#frm_avance_campo").validate({
    rules: {

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
       F_D: {
           required: true,
           number: true,
           range: [1,31],
           maxlength: 2,
           exactlength:2,           
         },  
       F_M: {
           required: true,
           number: true,
           range: [8,9],
           maxlength: 2,
           exactlength:2,
         },  
		NOM_BRI :{
           validName:true,
           required: true,
		},
		C_TOTAL :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		C_COMP :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		C_INC :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		C_RECH :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},

		P_TOTAL :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		P_COMP :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		P_INC :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		P_RECH :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},

		E_TOTAL_P :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		A_TOTAL :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		A_COMP :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		A_INC :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		A_RECH :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},
		E_TOTAL_A :{
		           required: true,
		           number: true,
		           range: [0,1000],     
				},



//FIN RULES
    },

    messages: {
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
       F_D: {
           range: 'Día no válido',
           maxlength: 'Día no válido',
           exactlength: 'Día no válido',           
         },  
       F_M: {
           range: 'Mes no válido',
           maxlength: 'Mes no válido',
           exactlength: 'Mes no válido',  
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
    	//Consulta de form pescador
        var form_data = {
            csrf_token_c: CI.cct,
            CCDD: $('#NOM_DD').val(),
            NOM_DD: $('#NOM_DD :selected').text(),
            CCPP: $('#NOM_PP').val(),
            NOM_PP : $('#NOM_PP :selected').text(),
            CCDI: $('#NOM_DI').val(),
            NOM_DI : $('#NOM_DI :selected').text(),
            COD_CCPP : $('#NOM_CCPP').val(),
            NOM_CCPP : $('#NOM_CCPP :selected').text(),
            F_D :$("#F_D").val(),
			F_M :$("#F_M").val(),
			NOM_BRI :$("#NOM_BRI").val(),
			C_TOTAL  :$("#C_TOTAL").val(),
			C_COMP :$("#C_COMP").val(),
			C_INC :$("#C_INC").val(),
			C_RECH :$("#C_RECH").val(),
			E_TOTAL_P :$("#E_TOTAL_P").val(),			
			P_TOTAL :$("#P_TOTAL").val(),
			P_COMP :$("#P_COMP").val(),
			P_INC :$("#P_INC").val(),
			P_RECH :$("#P_RECH").val(),
			A_TOTAL :$("#A_TOTAL").val(),
			A_COMP :$("#A_COMP").val(),
			A_INC :$("#A_INC").val(),
			A_RECH :$("#A_RECH").val(),
			E_TOTAL_A :$("#E_TOTAL_A").val(),
            ajax:1
        };
        var bsub = $( "#frm_avance_campo :submit" );
        //bsub.attr("disabled", "disabled");
         if (parseInt($("#C_TOTAL").val()) !== (parseInt($("#C_COMP").val()) + parseInt($("#C_INC").val()) + parseInt($("#C_RECH").val()) ) ){
        	alert('El total no debe ser diferente a la suma'); $("#C_TOTAL").focus(); $("#C_TOTAL").select(); return;
        }else if (parseInt($("#P_TOTAL").val()) !== (parseInt($("#P_COMP").val()) + parseInt($("#P_INC").val()) + parseInt($("#P_RECH").val()) ) ){
        	alert('El total no debe ser diferente a la suma'); $("#P_TOTAL").focus(); $("#P_TOTAL").select(); return;
        }else if (parseInt($("#A_TOTAL").val()) !== (parseInt($("#A_COMP").val()) + parseInt($("#A_INC").val()) + parseInt($("#A_RECH").val()) ) ){
        	alert('El total no debe ser diferente a la suma'); $("#A_TOTAL").focus(); $("#A_TOTAL").select(); return;
        }

        $.ajax({
            url: CI.base_url + "monitoreo/avance/grabar",
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json){
            	var mensaje;
            	if(json.operacion == 0){
		     			mensaje = $('<div />').html('<div class="alert alert-info"><button type="button"  class="close" data-dismiss="alert">×</button><strong>ADVERTENCIA! </strong>El centro poblado ya está registrado</div>')
            	}else if(json.operacion == 1){    
		    		mensaje = $('<div />').html('<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button">×</button><strong>EXITOSO! </strong>El registro fue guardado satisfactoriamente</div>')
			   			$('input:text').val("");
			   			$('textarea').val("");
			   			$('select').val(-1);
			   			$('#NOM_DD').trigger('change');            		
            	}else if(json.operacion == 7){
		     			mensaje = $('<div />').html('<div class="alert alert-info"><button type="button"  class="close" data-dismiss="alert">×</button><strong>ERROR! </strong>Inesperado, DOBLE o NINGUN ODEI AL MOMENTO DE GUARDAR</div>')         		
            	}else if(json.operacion == 8){
		     			mensaje = $('<div />').html('<div class="alert alert-info"><button type="button"  class="close" data-dismiss="alert">×</button><strong>ERROR! </strong>Inesperado, no se pudo registrar</div>')         		
            	}else if(json.operacion == 99){
		     			mensaje = $('<div />').html('<div class="alert alert-info"><button type="button"  class="close" data-dismiss="alert">×</button><strong>ADVERTENCIA! </strong>Usuario PILOTO no esta permitido guardar</div>')
            	}

        		$('.extra').empty();
        		$('.extra').hide().append(mensaje);              	
        		$('.extra').show('slow');              	


            }
        });     
          	
    }       
});

 }); 


// CARGA COMBOS UBIGEO <-----------------------------
//-------------------------------------------------------------------------------------------------------------------------------

</script>