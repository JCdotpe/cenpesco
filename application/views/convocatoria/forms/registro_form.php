<script src="<?php echo base_url('js/uploadify/jquery.tmpl.min.js'); ?>"></script>
<script src="<?php echo base_url('js/uploadify/jquery.uploadify.js'); ?>"></script>      
<?php 

$label_class =  array('class' => 'control-label');
$span_class =  'span10';
$span_class2 =  'span10';
// ****** VARIABLES ***

$ap_paterno =array(
	'name'	=> 'ap_paterno',
	'id'	=> 'ap_paterno',
	'value'	=> set_value('ap_paterno'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$ap_materno =array(
	'name'	=> 'ap_materno',
	'id'	=> 'ap_materno',
	'value'	=> set_value('ap_materno'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$nombre1 =array(
	'name'	=> 'nombre1',
	'id'	=> 'nombre1',
	'value'	=> set_value('nombre1'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$nombre2 =array(
	'name'	=> 'nombre2',
	'id'	=> 'nombre2',
	'value'	=> set_value('nombre2'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$fecha_nac =array(
	'name'	=> 'fecha_nac',
	'id'	=> 'fecha_nac',
	'value'	=> set_value('fecha_nac'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$dni =array(
	'name'	=> 'dni',
	'id'	=> 'dni',
	'value'	=> set_value('dni'),
	'maxlength'	=> 8,
	'class' => $span_class,
);
$dni2 =array(
	'name'	=> 'dni2',
	'id'	=> 'dni2',
	'value'	=> set_value('dni2'),
	'maxlength'	=> 8,
	'class' => $span_class,
);
$ruc =array(
	'name'	=> 'ruc',
	'id'	=> 'ruc',
	'value'	=> set_value('ruc'),
	'maxlength'	=> 11,
	'class' => $span_class,
);
$ruc2 =array(
	'name'	=> 'ruc2',
	'id'	=> 'ruc2',
	'value'	=> set_value('ruc2'),
	'maxlength'	=> 11,
	'class' => $span_class,
);

$nro_tel =array(
	'name'	=> 'nro_tel',
	'id'	=> 'nro_tel',
	'value'	=> set_value('nro_tel'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$nro_cel =array(
	'name'	=> 'nro_cel',
	'id'	=> 'nro_cel',
	'value'	=> set_value('nro_cel'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$email =array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$nombre_via =array(
	'name'	=> 'nombre_via',
	'id'	=> 'nombre_via',
	'value'	=> set_value('nombre_via'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$nro =array(
	'name'	=> 'nro',
	'id'	=> 'nro',
	'value'	=> set_value('nro'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$km =array(
	'name'	=> 'km',
	'id'	=> 'km',
	'value'	=> set_value('km'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$mz =array(
	'name'	=> 'mz',
	'id'	=> 'mz',
	'value'	=> set_value('mz'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$interior =array(
	'name'	=> 'interior',
	'id'	=> 'interior',
	'value'	=> set_value('interior'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$dpto =array(
	'name'	=> 'dpto',
	'id'	=> 'dpto',
	'value'	=> set_value('dpto'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$lote =array(
	'name'	=> 'lote',
	'id'	=> 'lote',
	'value'	=> set_value('lote'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$piso =array(
	'name'	=> 'piso',
	'id'	=> 'piso',
	'value'	=> set_value('piso'),
	'maxlength'	=> 2,
	'class' => $span_class,
);

$nombre_zona =array(
	'name'	=> 'nombre_zona',
	'id'	=> 'nombre_zona',
	'value'	=> set_value('nombre_zona'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$periodo_alcanzado =array(
	'name'	=> 'periodo_alcanzado',
	'id'	=> 'periodo_alcanzado',
	'value'	=> set_value('periodo_alcanzado'),
	'maxlength'	=> 2,
	'class' => $span_class,
);

$centro_estudios =array(
	'name'	=> 'centro_estudios',
	'id'	=> 'centro_estudios',
	'value'	=> set_value('centro_estudios'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$expe_gen_a =array(
	'name'	=> 'expe_gen_a',
	'id'	=> 'expe_gen_a',
	'value'	=> set_value('expe_gen_a'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$expe_gen_m =array(
	'name'	=> 'expe_gen_m',
	'id'	=> 'expe_gen_m',
	'value'	=> set_value('expe_gen_m'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$expe_trab_a =array(
	'name'	=> 'expe_trab_a',
	'id'	=> 'expe_trab_a',
	'value'	=> set_value('expe_trab_a'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$expe_trab_m =array(
	'name'	=> 'expe_trab_m',
	'id'	=> 'expe_trab_m',
	'value'	=> set_value('expe_trab_m'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$expe_manejo_a =array(
	'name'	=> 'expe_manejo_a',
	'id'	=> 'expe_manejo_a',
	'value'	=> set_value('expe_manejo_a'),
	'maxlength'	=> 80,
	'class' => $span_class,
);
$expe_manejo_m =array(
	'name'	=> 'expe_manejo_m',
	'id'	=> 'expe_manejo_m',
	'value'	=> set_value('expe_manejo_m'),
	'maxlength'	=> 80,
	'class' => $span_class,
);

$ultimo_ano =array(
	'name'	=> 'ultimo_ano',
	'id'	=> 'ultimo_ano',
	'value'	=> set_value('ultimo_ano'),
	'maxlength'	=> 4,
	'class' => $span_class,
);



		$cargosArray = array(-1 => '-'); 
		foreach ($cargos->result() as $filas) 
			 	{
			 		$cargosArray[$filas->COD] = $filas->CARGO;
			 	}

		$uniArray = array(-1 => '-'); 
		$selected_universidades = (set_value('universidad')) ? set_value('universidad') : '' ;
		foreach ($universidades->result() as $filas) 
		{
			$uniArray[$filas->id] = $filas->detalle;
		}

		$ocupaArray = array(-1 => '-'); 
		$selected_ocupaciones = (set_value('ocupacion')) ? set_value('ocupacion') : '' ;
		foreach ($ocupaciones->result() as $filas)
		{
			$ocupaArray[$filas->codigo] = $filas->detalle;
		}

		// $paisesArray= array(-1 => '-'); 
		// $selected_pais = (set_value('paises')) ? set_value('paises') : '' ;
		// foreach ($paises->result() as $filas)
		// {
		// 	$paisesArray[$filas->COD_PAIS] = $filas->PAIS;
		// }

		$odeiArray = array(-1 => '-'); 
		$selected_odei = (set_value('cod_odei')) ?  set_value('cod_odei') : '';
		$projecArray = array(-1 => '-'); 
		$selected_proyectos_inei = (set_value('proyectos_inei')) ? set_value('proyectos_inei') : '' ;
		foreach ($proyectos->result() as $filas)
		{
			$projecArray[$filas->SECU_FUNC_SFU]=$filas->DESC_META_SFU;
		}

		$depaArray = array(-1 => '-'); 
		$selected_departamento = (set_value('departamento')) ?  set_value('departamento') : '';
		$selected_departamento2 = (set_value('departamento2')) ?  set_value('departamento2') : '';
		$selected_departamento3 = (set_value('departamento3')) ?  set_value('departamento3') : '';
		foreach($departamento->result() as $filas)
		{
			if($filas->COD_DEPARTAMENTO != '07')
			$depaArray[$filas->COD_DEPARTAMENTO]=strtoupper($filas->DES_DISTRITO);
		}

		$provArray = array(-1 => '-'); 
		$selected_provincia = (set_value('provincia')) ?  set_value('provincia') : '';
		$selected_provincia2 = (set_value('provincia2')) ?  set_value('provincia2') : '';
		$selected_provincia3 = (set_value('provincia3')) ?  set_value('provincia3') : '';

		$distArray = array(-1 => '-'); 
		$selected_distrito = (set_value('distrito')) ?  set_value('distrito') : '';
		$selected_distrito2 = (set_value('distrito2')) ?  set_value('distrito2') : '';
		$selected_distrito3 = (set_value('distrito3')) ?  set_value('distrito3') : '';

		$selected_sexo = (set_value('sexo')) ? set_value('sexo') : '' ;
		$selected_cargo = (set_value('cargo')) ? set_value('cargo') : '' ;
		$selected_estado_c = (set_value('estado_civil')) ? set_value('estado_civil') : '' ;
		$selected_t_via = (set_value('t_via')) ? set_value('t_via') : '' ;
		$selected_t_zona = (set_value('t_zona')) ? set_value('t_zona') : '' ;
		$selected_nivel_instruccion = (set_value('nivel_instruccion')) ? set_value('nivel_instruccion') : '' ;
		$selected_tipo_periodo = (set_value('tipo_periodo')) ? set_value('tipo_periodo') : '' ;
		$selected_declaracion = (set_value('declaracion')) ? set_value('declaracion') : '' ;
		$selected_disposicion = (set_value('disposicion')) ? set_value('disposicion') : '' ;
		$selected_grado_alcanzado = (set_value('grado_alcanzado')) ? set_value('grado_alcanzado') : '' ;
		$selected_participo = (set_value('participo')) ? set_value('participo') : '' ;
		$selected_cargos_inei = (set_value('cargos_inei')) ? set_value('cargos_inei') : '' ;
		$selected_ofimatica = (set_value('ofimatica')) ? set_value('ofimatica') : '' ;	
		$selected_velocidadpc = (set_value('velocidadpc')) ? set_value('velocidadpc') : '' ;	
		$selected_impedimento = (set_value('impedimento')) ? set_value('impedimento') : '' ;	

$attr = array('class' => 'form-val','id' => 'conv_registro', 'style' => 'overflow: auto;');

echo form_open($this->uri->uri_string(),$attr); 
	//Grupo 1
	echo '<div class="well modulo">';
		//Fila 1

	echo '<h5>1. Departamento al que postula</h5>';

		echo '<div class="row-fluid">';
			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Departamento', 'departamento', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('departamento', $depaArray, $selected_departamento,'class="' . $span_class . '" id="departamento" autocomplete="off"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error"></div>';
					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 


			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('ODEI', 'cod_odei', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('cod_odei', $odeiArray, $selected_odei,'class="' . $span_class . '" id="cod_odei" autocomplete="off"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error"></div>';
					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 


			// echo '<div class="span4">';
			// 	echo '<div class="control-group">';
			// 		echo form_label('Provincia', 'provincia', $label_class);
			// 		echo '<div class="controls">';
			// 			echo form_dropdown('provincia', $provArray, $selected_provincia,'class="' . $span_class . '" id="provincia"'); 
			// 			echo '<span class="help-inline">*</span>';
			// 			echo '<div class="help-block error">' . form_error('provincia') . '</div>';
			// 		echo '</div>';	
			// 	echo '</div>'; 
			// echo '</div>'; 

			// echo '<div class="span4">';
			// 	echo '<div class="control-group">';
			// 		echo form_label('Distrito', 'distrito', $label_class);
			// 		echo '<div class="controls">';
			// 			echo form_dropdown('distrito', $distArray, $selected_distrito,'class="' . $span_class . '" id="distrito"'); 
			// 			echo '<span class="help-inline">*</span>';
			// 			echo '<div class="help-block error">' . form_error('distrito') . '</div>';
			// 		echo '</div>';	
			// 	echo '</div>'; 	
			// echo '</div>'; 

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Cargo al que postula', 'cargo', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('cargo', $cargos_c, $selected_cargo,'class="' . $span_class . '" id="cargo"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('cargo') . '</div>';
					echo '</div>';	
				echo '</div>'; 	
			echo '</div>'; 

		echo '</div>'; 
	echo '</div>'; 	

	//Grupo 2
	echo '<div class="well modulo">';
		echo '<h5>2. Datos del Postulante</h5><p><b>(Escriba sus datos tal como figuran en su DNI)</b></p>';
		//Fila 1
		echo '<div class="row-fluid">';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Ap. Paterno', $ap_paterno['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($ap_paterno); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($ap_paterno['name']) . '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Ap. Materno', $ap_materno['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($ap_materno); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($ap_materno['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span2">';
				echo '<div class="control-group">';
					 echo form_label('Primer Nombre', $nombre1['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($nombre1); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($nombre1['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span2">';
				echo '<div class="control-group">';
					 echo form_label('Segundo Nombre', $nombre2['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($nombre2); 

					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span2">';
				echo '<div class="control-group">';
					echo form_label('Sexo', 'sexo', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('sexo', $sexo_c, $selected_sexo,'class="' . $span_class . '" id="sexo"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('sexo') . '</div>';
						
					echo '</div>';	
				echo '</div>'; 	
			echo '</div>';


		echo '</div>'; 

		//Fila 2
		echo '<div class="row-fluid">';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Fecha de Nacimiento', $fecha_nac['id'], $label_class);
					 echo '<div class="controls">'; 
						echo '<input class="span10 sincursor" id="fecha_nac" name="fecha_nac" type="text" value="" readonly="readonly" >';
						//echo form_input($fecha_nac); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($fecha_nac['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>'; 


			// echo '<div class="span3">';
			// 	echo '<div class="control-group">';
			// 		echo form_label('Pais', 'country', $label_class);
			// 		echo '<div class="controls">';
			// 			echo form_dropdown('paises', $paisesArray, $selected_pais,'class="' . $span_class . '"  id="paises"');
			// 			echo '<span class="help-inline">*</span>';
			// 			echo '<div class="help-block error">' . form_error('paises') . '</div>';
			// 		echo '</div>';	
			// 	echo '</div>'; 
			// echo '</div>'; 


			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Dpto Nacimiento', 'departamento2', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('departamento2', $depaArray, $selected_departamento2,'class="' . $span_class . '" id="departamento2"  autocomplete="off"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('departamento2') . '</div>';
					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Provincia Nacimiento', 'provincia2', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('provincia2', $provArray, $selected_provincia2,'class="' . $span_class . '" id="provincia2"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('provincia2') . '</div>';
					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Distrito Nacimiento', 'distrito2', $label_class);
					echo '<div class="controls">';
						
						echo form_dropdown('distrito2', $distArray, $selected_distrito2,'class="' . $span_class . '" id="distrito2"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('distrito2') . '</div>';


					echo '</div>';	
				echo '</div>'; 	
			echo '</div>'; 


		echo '</div>'; 	

		//Fila 3
		echo '<div class="row-fluid">';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('DNI', $dni['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($dni); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($dni['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Confirme DNI', $dni2['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($dni2); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($dni2['name']) . '</div>';						
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 


			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('RUC', $ruc['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($ruc); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($ruc['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Confirme RUC', $ruc2['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($ruc2); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($ruc2['name']) . '</div>';


					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

		echo '</div>'; 	

		//Fila 4
		echo '<div class="row-fluid">';


			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Estado Civil', 'estado_civil', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('estado_civil', $ecivil, $selected_estado_c,'class="' . $span_class . '" id="estado_civil"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('estado_civil') . '</div>';
					echo '</div>';	
				echo '</div>'; 	
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Teléfono', $nro_tel['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($nro_tel); 
						//echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error" >' . form_error($nro_tel['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>'; 


			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Celular', $nro_cel['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($nro_cel); 
						//echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($nro_cel['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>'; 


			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Correo Electrónico', $email['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($email); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($email['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

		echo '</div>'; 	

	echo '</div>'; 	




	//Grupo 3
	echo '<div class="well modulo">';
	echo '<h5>3. Domicilio del Postulante</h5>';
		//Fila 1
		echo '<div class="row-fluid">';


			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Tipo de Vía', 't_via', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('t_via',$tvia, $selected_t_via,'class="' . $span_class . '" id="t_via"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('t_via') . '</div>';
					echo '</div>';	
				echo '</div>'; 	
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Nombre de Vía', $nombre_via['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($nombre_via); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($nombre_via['name']) . '</div>';
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 


			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('Nro', $nro['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($nro); 
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('KM', $km['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($km); 
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('MZ', $mz['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($mz); 
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('interior', $interior['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($interior); 
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('dpto.', $dpto['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($dpto); 
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 		

		echo '</div>'; 	
	

		//Fila 7
		echo '<div class="row-fluid">';

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('Lote', $lote['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($lote); 
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span1">';
				echo '<div class="control-group">';
					 echo form_label('Piso', $piso['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($piso); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('piso') . '</div>';						
					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Tipo de Zona', 't_zona', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('t_zona', $tzona, $selected_t_zona,'class="' . $span_class . '" id="t_zona"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('t_zona') . '</div>';

					echo '</div>';	
				echo '</div>'; 	
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					 echo form_label('Nombre de Zona', $nombre_zona['id'], $label_class);
					 echo '<div class="controls">'; 
						echo form_input($nombre_zona); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($nombre_zona['name']) . '</div>';

					 echo '</div>';
				echo '</div>';
			echo '</div>'; 

		echo '</div>'; 		

		//Fila 8
		echo '<div class="row-fluid">';

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Departamento Domicilio', 'departamento3', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('departamento3', $depaArray, $selected_departamento3,'class="' . $span_class . '" id="departamento3" autocomplete="off"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('departamento3') . '</div>';

					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Provincia Domicilio', 'provincia3', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('provincia3', $provArray, $selected_provincia3,'class="' . $span_class . '" id="provincia3"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('provincia3') . '</div>';

					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Distrito Domicilio', 'distrito3', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('distrito3', $distArray, $selected_distrito3,'class="' . $span_class . '" id="distrito3"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('distrito3') . '</div>';

					echo '</div>';	
				echo '</div>'; 	
			echo '</div>'; 

		echo '</div>';
	echo '</div>'; 


	//Grupo 4
	echo '<div class="well modulo">';
	echo '<h5>4. Perfil del Postulante</h5> <p><b>(Si Ud. es seleccionado, se le solicitará que los datos que consigne a continuación sean respaldados con algún documento. Si no presenta los documentos será descalificado automáticamente.)</b></p>';
		//Fila 1
		echo '<div class="row-fluid">';

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Nivel de Instrucción', 'nivel_instruccion', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('nivel_instruccion', $nivel, $selected_nivel_instruccion,'class="' . $span_class . '" id="nivel_instruccion"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('nivel_instruccion') . '</div>';

					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 

			// echo '<div class="span2">';
			// 	echo '<div class="control-group">';
			// 		echo form_label('Tipo de Estudios', 'country', $label_class);
			// 		echo '<div class="controls">';
			// 			echo form_dropdown('ts', $test, FALSE,'class="' . $span_class . '"  id="ts"'); 
			// 		echo '</div>';	
			// 	echo '</div>'; 
			// echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Grado Alcanzado', 'grado_alcanzado', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('grado_alcanzado', $grado, $selected_grado_alcanzado,'class="' . $span_class . '" id="grado_alcanzado"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('grado_alcanzado') . '</div>';			
					echo '</div>';	
				echo '</div>'; 	
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Periodo Alcanzado', $periodo_alcanzado['id'], $label_class);
					echo '<div class="controls">';
						echo form_input($periodo_alcanzado); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('periodo_alcanzado') . '</div>';						
					echo '</div>';	
				echo '</div>'; 	
			echo '</div>'; 

			echo '<div class="span3">';
				echo '<div class="control-group">';
					echo form_label('Tipo de Periodo', 'tipo_periodo', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('tipo_periodo', $periodo, $selected_tipo_periodo,'class="' . $span_class . '" id="tipo_periodo"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('tipo_periodo') . '</div>';
					echo '</div>';	
				echo '</div>'; 	
			echo '</div>'; 

		echo '</div>';
		//Fila 2
		echo '<div class="row-fluid">';

			echo '<div class="span5">';
				echo '<div class="control-group">';
					echo form_label('Profesión', 'ocupacion', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('ocupacion', $ocupaArray, $selected_ocupaciones,'class="' . $span_class . '" id="ocupacion"'); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('ocupacion') . '</div>';
					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 

			echo '<div class="span4">';
				echo '<div class="control-group">';
					echo form_label('Universidad', 'universidad', $label_class);
					echo '<div class="controls">';
						echo form_dropdown('universidad', $uniArray, $selected_universidades,'class="' . $span_class . '" id="universidad" disabled="disabled"'); 
						//echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error('universidad') . '</div>';

					echo '</div>';	
				echo '</div>'; 
			echo '</div>'; 

			echo '<div class="span3">';

				echo '<div class="control-group">';
					echo form_label('Nombre de Centro de Estudios', $centro_estudios['id'], $label_class);
					echo '<div class="controls">';
						echo form_input($centro_estudios); 
						echo '<span class="help-inline">*</span>';
						echo '<div class="help-block error">' . form_error($centro_estudios['name']) . '</div>';
					echo '</div>';	
				echo '</div>'; 	
				
			echo '</div>'; 

		echo '</div>';		
	echo '</div>';
	

	//grupo 5
	echo '<div class="well modulo">';
		//fila 1
		echo '<div class="row-fluid">';
			echo '<div class="span12" >';

				echo '<div class="row-fluid">';

					echo '<div class="span6">';
						echo '<div class="span8">';
							echo '<h5> EXPERIENCIA </h5>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<h5> AÑOS </h5>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<h5> MESES </h5>';
						echo '</div>';
					echo '</div>';

					echo '<div class="span6">';
						echo '<div class="span8">';
							echo '<h5> PROYECTOS EN EL INEI </h5>';
							
						echo '</div>';
						// echo '<div class="span4">';
						// 	echo form_label('', '', $label_class);
						// echo '</div>';
					echo '</div>';

				echo '</div>';


				echo '<div class="row-fluid">';

					echo '<div class="span6">';
						echo '<div class="span8">';
						echo '<p> Años o meses de experiencia en actividades generales  </p>';
						
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_gen_a); 
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';		
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_gen_m); 
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>¿Ha laborado en el INEI?</p>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="controls">';
								echo form_dropdown('participo', $condicional, $selected_participo,'class="' . $span_class . '" id="participo"'); 
										echo '<span class="help-inline">*</span>';
										echo '<div class="help-block error"></div>';			
							echo '</div>';
						echo '</div>';
					echo '</div>';

				echo '</div>';



				echo '<div class="row-fluid">';

					echo '<div class="span6">';
						echo '<div class="span8">';
							echo '<p>Años o meses de experiencia en trabajos de campo (censos/encuestas)</p> ';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_trab_a); 
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_trab_m);
									echo '<span class="help-inline"></span>'; 
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>Último proyecto que participó en el INEI</p>';
						echo '</div>';
						echo '<div class="span6">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_dropdown('proyectos_inei', $projecArray, $selected_proyectos_inei,'class="' . $span_class . '" id="proyectos_inei" disabled="disabled"'); 
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';



				echo '<div class="row-fluid">';

					echo '<div class="span6">';
						echo '<div class="span8">';
							echo '<p>Años o meses de experiencia en manejo de grupos </p>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_manejo_a); 
									echo '<span class="help-inline"></span>'; 
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($expe_manejo_m); 
									echo '<span class="help-inline"></span>'; 
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>Último año que participó en el INEI</p>';
						echo '</div>';
						echo '<div class="span2">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_input($ultimo_ano,'','disabled="disabled"'); 
									echo '<span class="help-inline"></span>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

				echo '</div>';

				echo '<div class="row-fluid">';

					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>Conocimiento de Ofimática</p>';
						echo '</div>';
						echo '<div class="span4 offset2">';
							echo '<div class="controls">';
								echo form_dropdown('ofimatica', $condicional, $selected_ofimatica,'class="' . $span_class . '" id="ofimatica"'); 
								echo '<span class="help-inline">*</span>';
								echo '<div class="help-block error">' . form_error('ofimatica') . '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>Último cargo en el INEI</p>';
						echo '</div>';
						echo '<div class="span6">';
							echo '<div class="control-group">';
								echo '<div class="controls">';
									echo form_dropdown('cargos_inei', $cargosArray, $selected_cargos_inei,'class="' . $span_class . ' "id="cargos_inei" disabled="disabled"'); 
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';


				echo '</div>';

				echo '<div class="row-fluid">';
					echo '<div class="span6">';
						echo '<div class="span6">';
							echo '<p>Velocidad al digitar en una PC</p>';
						echo '</div>';
						echo '<div class="span4 offset2">';
							echo '<div class="controls">';
								echo form_dropdown('velocidadpc', $condicional, $selected_velocidadpc,'class="' . $span_class . '" id="velocidadpc"'); 
								echo '<span class="help-inline">*</span>';
								echo '<div class="help-block error">' . form_error('velocidadpc') . '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';				
				echo '</div>';

			echo '</div>';
		echo '</div>';
	echo '</div>';




// grupo 6
	echo '<div class="well modulo">';	
		//fila 1
		echo '<div class="row-fluid">';
			echo '<div class="span5">';
					echo '<h5>OTROS ASPECTOS</h5>';
			echo '</div>';
		echo '</div>';

		echo '<div class="row-fluid">';

			echo '<div class="span5">';
					echo '<p>Tiene algún impedimento para trabajar en el INEI</p>';
			echo '</div>';

			echo '<div class="span5">';
				echo '<div class="control-group">';
					echo form_dropdown('impedimento', $condicional, $selected_impedimento,'class="' . $span_class . '" id="impedimento"'); 
					echo '<span class="help-inline">*</span>';
					echo '<div class="help-block error">' . form_error('impedimento') . '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';

		echo '<div class="row-fluid">';

			echo '<div class="span5">';
					echo '<p>Disposición para trabajar tiempo completo</p>';
			echo '</div>';

			echo '<div class="span5">';
				echo '<div class="control-group">';
					echo form_dropdown('disposicion', $condicional, $selected_disposicion,'class="' . $span_class . '" id="disposicion"'); 
					echo '<span class="help-inline">*</span>';
					echo '<div class="help-block error">' . form_error('disposicion') . '</div>';
				echo '</div>';
			echo '</div>';

		echo '</div>';



		echo '<div class="row-fluid">';
			echo '<div class="span5">';
					echo '<p>Curriculum No Documentado <b>(doc | rtf)</b> - límite:  <b>512KB</b></p>';
					echo '<p><b><i>El archivo iniciará la subida cuando presione el botón Inscripción.</i></b></p>';
			echo '</div>';		
			echo '<div class="span5">';
			// <a class="btn btn-success pull-right" href="javascript:$(\'#upload\').uploadify(\'upload\',\'*\')">Upload</a>	
			echo '		<input id="upload" name="upload" type="file">
					<div id="queue"></div>';
			$cook = $_COOKIE[$this->config->item('sess_cookie_name')];
			if(!isset($cook)){
				redirect(current_url());
			}		
			$browser_cookie = trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->config->item('encryption_key'), $_COOKIE[$this->config->item('sess_cookie_name')], MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
			$timestamp = time();
			$token = md5('retrocedernuncarendirsejamasjaa' .  $timestamp);
			echo '</div>';		
		echo '</div>';	






	echo '</div>';

// grupo 7
	echo '<div class="well modulo">';	
		//fila 1
		echo '<div class="row-fluid">';
			echo '<div class="span5">';
					echo '<h5>DECLARACIÓN DE VERACIDAD DE DATOS</h5>';
			echo '</div>';
		echo '</div>';

		echo '<div class="row-fluid">';
			echo '<div class="span10">';
					echo '<p>Declaro bajo juramento que los datos consignados en la presente ficha de inscripción, corresponden a la verdad; los mismos que podrán ser verificados con los documentos sustentatorios de mi Curriculum Vitae, conforme presente a la institución.</p>';
			echo '</div>';

			echo '<div class="span2">';
				echo '<div class="control-group">';
					echo form_dropdown('declaracion', $declaracion, $selected_declaracion,'class="' . $span_class . '" id="declaracion"'); 
					echo '<span class="help-inline">*</span>';
					echo '<div class="help-block error">' . form_error('declaracion') . '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';





	echo '</div>';


 echo form_submit('send', 'Inscripción','class="btn btn-primary pull-right"');  

echo form_fieldset_close();
echo form_close(); 

 ?>

 <script type="text/javascript">

var cv_file;
$(function(){

$("#departamento").change(function(event) {
        var sel = $("#cod_odei");
        var form_data = {
            csrf_token_c: CI.cct,
            code: $(this).val(),
            ajax:1
        };
        if($(this).val() == -1){
        	sel.empty();
        	sel.append('<option value="-1">-</option>');
        }else{
        	sel.append('<option value="-1">-</option>');
	        $.ajax({
	            url: CI.base_url + "ajax/ubigeo_ajax/get_ajax_odei/" + $(this).val(),
	            type:'POST',
	            data:form_data,
	            dataType:'json',
	            success:function(json_data){
	                sel.empty();
	                $.each(json_data, function(i, data){
	                    sel.append('<option value="' + data.id_odei + '">' + data.odei + '</option>');
	                });
	                sel.change();
	            }
	        });    
	    }       
});


$("#departamentooo, #departamento2, #departamento3").change(function(event) {
        var sel = null;
        switch(event.target.id){
            case 'departamento':
                sel = $("#provincia");
                break;
            case 'departamento2':
                sel = $("#provincia2");
                break;
            case 'departamento3':
                sel = $("#provincia3");
                break;                
        }

        var form_data = {
            csrf_token_c: CI.cct,
            code: $(this).val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/ubigeo_ajax/get_ajax_prov/" + $(this).val(),
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.COD_PROVINCIA + '">' + data.DES_DISTRITO + '</option>');
                });
                sel.change();
            }
        });           
});


$("#provincia, #provincia2, #provincia3").change(function(event) {
        var sel = null;
        var dep = null;
        switch(event.target.id){
            case 'provincia':
                sel = $("#distrito");
                dep = $("#departamento");
                break;
            case 'provincia2':
                sel = $("#distrito2");
                dep = $("#departamento2");
                break;
            case 'provincia3':
                sel = $("#distrito3");
                dep = $("#departamento3");
                break;                
        }     
           
        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            dep: dep.val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/ubigeo_ajax/get_ajax_dist/" + $(this).val() + "/" + dep.val(),
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.COD_DISTRITO + '">' + data.DES_DISTRITO + '</option>');
                });
            }
        });           
});

$.extend(jQuery.validator.messages, {
     required: "Campo obligatorio",
    // remote: "Please fix this field.",
    // email: "Please enter a valid email address.",
    // url: "Please enter a valid URL.",
     date: "Ingrese una fecha válida",
    // dateISO: "Please enter a valid date (ISO).",
    //number: "Solo se permiten números",
     digits: "Solo se permiten números",
    // creditcard: "Please enter a valid credit card number.",
    // equalTo: "Please enter the same value again.",
    // accept: "Please enter a value with a valid extension.",
    // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    // minlength: jQuery.validator.format("Please enter at least {0} characters."),
    // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
     range: jQuery.validator.format("Por favor ingrese un valor  entre {0} y {1}."),
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


//Validaciones
$('#nivel_instruccion').change(function() {
    var univ = $('#universidad');
    if($(this).val() == 4){
        univ.removeAttr('disabled');
        $('#centro_estudios').attr("disabled", "disabled");
        $("#grado_alcanzado").append('<option value="5">MAGISTER</option>');
		$("#grado_alcanzado").append('<option value="6">DOCTORADO</option>');
		$("#grado_alcanzado").append('<option value="7">ESTUDIOS DE MAESTRIA</option>');
		$("#grado_alcanzado").append('<option value="8">ESTUDIOS DE DOCTORADO</option>');
    }else{
        univ.attr("disabled", "disabled");
        $('#centro_estudios').removeAttr('disabled');
        $("#grado_alcanzado option[value='5']").remove();
        $("#grado_alcanzado option[value='6']").remove();
        $("#grado_alcanzado option[value='7']").remove();
        $("#grado_alcanzado option[value='8']").remove();       
    }
});

$('#participo').change(function() {
    var ug = $('#proyectos_inei, #ultimo_ano, #cargos_inei');
    if($(this).val() == 1){
        ug.removeAttr('disabled');
    }else{
        ug.attr("disabled", "disabled");
    }
});



$("#conv_registro").validate({
    rules: {
        declaracion:{
            required: true,
            valueEquals: 1,
         }, 
        ap_paterno: {
            required: true,
            validName: true,
         }, 
        ap_materno: {
            required: true,
            validName: true,
         }, 
        nombre1: {
            required: true,
            validName: true,
         }, 
        nombre2:{
            validName: true,
         }, 
        fecha_nac:{
            required: true,
            peruDate: true,
         }, 
        nombre_via: "required",
        nombre_zona: "required",
        centro_estudios:"required",
        nro_tel:{
            required: false,
            digits: true,
         },       
        nro_cel:{
            required: false,
            digits: true,
         },
        email:{
            required:true,
            email: true,
         },                           
        dni:{
            required: true,
            digits: true,
            exactlength: 8,
         },     
       dni2:{
            required: true,
            digits: true,
            exactlength: 8,
            equalTo: "#dni",
         },   
       periodo_alcanzado:{
            required: true,
            digits: true,
            range: [0, 50],
         },           

        ruc:{
            required: true,
            digits: true,
            exactlength: 11,
         },     
       ruc2:{
            required: true,
            digits: true,
            exactlength: 11,
            equalTo: "#ruc",
         },        
        universidad: {
            valueNotEquals: -1,
         },                   
        ocupacion: {
            valueNotEquals: -1,
         },   
        nivel_instruccion: {
            valueNotEquals: -1,
         },      
        tipo_periodo: {
            valueNotEquals: -1,
         },           
        t_via: {
            valueNotEquals: -1,
         },
        t_zona: {
            valueNotEquals: -1,
         },   
        disposicion:{
          valueNotEquals: -1,
        },     

        grado_alcanzado:{
          valueNotEquals: -1,
        },

        ofimatica:{
          valueNotEquals: -1,
        },  

        velocidadpc:{
          valueNotEquals: -1,
        },  

        impedimento:{
          valueNotEquals: -1,
        },  
        cargo:{
          valueNotEquals: -1,
        }, 
        piso:{
        	required: true,
        },
        participo:{
        	valueNotEquals: -1,
        },
        sexo: {
                 valueNotEquals: -1,
            }, 
        estado_civil: {
                 valueNotEquals: -1,
            },                      
        departamento: {
                 valueNotEquals: -1,
            },
        cod_odei: {
                 valueNotEquals: -1,
            },            
        // provincia: {
        //          valueNotEquals: -1,
        //     },      
        // distrito: {
        //          valueNotEquals: -1,
        //     },        
        departamento2: {
                 valueNotEquals: -1,
            },
        provincia2: {
                 valueNotEquals: -1,
            },      
        distrito2: {
                 valueNotEquals: -1,
            },    
        departamento3: {
                 valueNotEquals: -1,
            },
        provincia3: {
                 valueNotEquals: -1,
            },      
        distrito3: {
                 valueNotEquals: -1,
            },  
        expe_gen_a: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },    
        expe_gen_m: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },        
        expe_trab_a: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },    
        expe_trab_m: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },      
        expe_manejo_a: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },    
        expe_manejo_m: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },     
        ultimo_ano: {
                required:false,
                year:true,
                digits: true,
                exactlength: 4,
            },                                                                  
//FIN RULES
    },

    messages: {

       cargo: {
            valueNotEquals: "Seleccione cargo",
         },            
        piso:{
        	required: "El Piso es requerido",
        },
         participo:{
        	valueNotEquals: "Trabajo en el INEI?",
        },       
        declaracion:{
            valueEquals: "Acepta los términos?",
         }, 
        ap_paterno: {
            required: "Ingresa Ap. paterno",
         },
        ap_materno:{
            required: "Ingresa Ap. materno",
         }, 
        nombre1:{
            required: "Ingresa nombre",  
         }, 
        fecha_nac:{
            required: "Seleccione fecha",   
         },  
        nombre_zona:{
            required: "Ingrese Nombre de zona",     
         },  
        nombre_via:{
            required: "Ingrese Nombre de vía",  
         },      
        centro_estudios:{
            required:  "Ingrese Centro de Estudios",
         },    
        ocupacion: {
            valueNotEquals: "Seleccione Profesión",
         },   
        nivel_instruccion: {
            valueNotEquals: "Seleccione Nivel de Instrucción",
         },      
        periodo_alcanzado: {
            required: "Seleccione Periodo alcanzado",
            range: "Número entre 1 y 50",
         },          
        tipo_periodo: {
            valueNotEquals: "Seleccione Tipo de periodo",
         },    
        t_via: {
            valueNotEquals: "Seleccione Tipo de vía",
         },       
       t_zona: {
            valueNotEquals: "Seleccione Tipo de zona",
         },            

        nro_tel:{
            required: "Ingrese teléfono",
         },       
        nro_cel:{
            required: "Ingrese celular",
         },       
        universidad: {
            valueNotEquals: "Seleccione Universidad",
         },           
        dni:{
            required: "Ingrese dni",
            exactlength: "dni: 8 digitos",
         },     
        dni2:{
            required: "Confime dni",
            exactlength: "dni: 8 digitos",
            equalTo: "No coinciden dnis",
         },  
        ruc:{
            required: "Ingrese ruc",
            number:"Solo números",
            exactlength: "ruc: 11 digitos",
         },     
        ruc2:{
            required: "Confime ruc",
            exactlength: "ruc: 11 digitos",
            equalTo: "No coinciden rucs",
         },          
        disposicion: {
            valueNotEquals: "Seleccione disposición",
         },  

        sexo: {
            valueNotEquals: "Seleccione sexo",
         },   
        estado_civil: {
            valueNotEquals: "Seleccione estado civil",
         },                  
        departamento: {
            valueNotEquals: "Seleccione departamento",
         },
        cod_odei: {
            valueNotEquals: "Seleccione ODEI",
         },         
           grado_alcanzado: {
            valueNotEquals: "Seleccione grado alcanzado",
         },      
        // provincia: {
        //     valueNotEquals: "Seleccione provincia",
        //  },
        // distrito: {
        //     valueNotEquals: "Seleccione distrito",
        //  }, 
        departamento2: {
            valueNotEquals: "Seleccione dpto. nacimiento",
         },
        provincia2: {
            valueNotEquals: "Seleccione prov. nacimiento",
         },
        distrito2: {
            valueNotEquals: "Seleccione dist. nacimiento",
         },  
        departamento3: {
            valueNotEquals: "Seleccione dpto. domicilio",
         },
        provincia3: {
            valueNotEquals: "Seleccione prov. domicilio",
         },
        distrito3: {
            valueNotEquals: "Seleccione dist. domicilio",
         },    
        email: "Ingrese un email válido",   
        expe_gen_a: {
                 minlength: 'Ingrese un año válido',
                 maxlength: 'Ingrese un año válido',
            }, 
        expe_gen_m: {
                 minlength: 'Ingrese un mes válido',
                 maxlength: 'Ingrese un mes válido',
            },     
        expe_trab_a: {
                 minlength: 'Ingrese un año válido',
                 maxlength: 'Ingrese un año válido',
            }, 
        expe_trab_m: {
                 minlength: 'Ingrese un mes válido',
                 maxlength: 'Ingrese un mes válido',
            },    
        expe_manejo_a: {
                 minlength: 'Ingrese un año válido',
                 maxlength: 'Ingrese un año válido',
            }, 
        expe_manejo_m: {
                 minlength: 'Ingrese un mes válido',
                 maxlength: 'Ingrese un mes válido',
            },           
        ultimo_ano: {
                 exactlength: 'Ingrese un año2 válido',
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

    	if(parseInt($("#fecha_nac").val().substr($("#fecha_nac").val().length - 4)) <= 1995){
    		if($("#nro").val()!="" || $("#km").val()!="" || $("#mz").val()!="" || $("#interior").val()!="" || $("#dpto").val()!="" || $("#lote").val()!=""){
			 		
    			if( ($('#participo').val() == 1 && $('#proyectos_inei').val() != -1 && $('#cargos_inei').val() != -1) || $('#participo').val() == 2  ){
			 		 if ($("#queue > div").size() == 0) {
			    		// the queue is empty
			    		alert("Por favor Adjunte su Curriculum.")
					 }else{

						var bsub = $( ":submit" );
				    	bsub.attr("disabled", "disabled"); 	
				        var form_data = {
				            csrf_token_c: CI.cct,
				            code: $('#dni').val(),
				            ajax:1
				        };

				        $.ajax({
				            url: CI.base_url + "convocatoria/registro/check_dni",
				            type:'POST',
				            data:form_data,
				            dataType:'json',
				            success:function(json){
				            	//upload
				            	if(json.flag == 1){
									$('#upload').uploadify('upload','*');
								}else{
									$('#dni').focus();	
									alert('El DNI ingresado ya fue registrado para esta convocatoria.');
									bsub.removeAttr('disabled');  				
								}
				            }
				        });  
					}
				}else{
					alert("Seleccione el Proyecto en el que participo");
					$('#proyectos_inei').focus();
				}
			}else{
				alert("Debe ingresar al menos 1 campo para su dirección (Nro, KM, MZ, Interior, Dpto, Lote)")
			}
		}else{
			alert("Debes ser mayor de edad para registrarse a la convocatoria.")
			$('#fecha_nac').focus();	
		}
    }       
});


// $('#conv_registro').submit(function(e){
function reg_form(msg){         
		$("#mcontent").html(msg);	
		// alert(cv_file);
	    // e.preventDefault();
	    // var bsub = $( ":submit" );
	    // bsub.attr("disabled", "disabled");  		
} 
// });


			$("#upload").uploadify({
			          swf: CI.site_url + 'js/uploadify/uploadify.swf',
			          uploader: CI.base_url + 'convocatoria/upload',
			  		  formData: {'browser_cookie': '<?php echo $browser_cookie; ?>','token': '<?php echo $token; ?>','timestamp': <?php echo $timestamp; ?>},
			          cancelImg: CI.site_url + 'js/uploadify/uploadify-cancel.png',
					  checkExisting: false,
					  multi: false,
					  fileTypeExts: '*.doc;*.rtf',
					  fileTypeDesc: 'Doc Files',					  
					  auto: false,    
					  uploadLimit : 1,                                                  
			          queueID: 'queue',
			          buttonText: 'Seleccionar Archivo',       
					  onUploadSuccess : function(file, data, response) {
							$("#upload").uploadify('settings', 'ResetUploadsSuccessful', '0');
							 // console.log(file);
			                 var datax = $.parseJSON(data);			
							// var datax = eval('(' + response + ')');              		
							if (datax.flag == 1) {
								// alert('Successfuly uploaded!');
								cv_file = datax.file_name;
							    $('#mymodal').modal({
							        backdrop : 'static',
							        keyboard: false
							     });    				
							     // reg_form();	
							    var rform_data = $('#conv_registro').serializeArray();
							    $("#conv_registro :input").attr("disabled", true);
							    rform_data.push(
							        {name: 'ajax',value:1},
							        {name: 'nom_dep',value:$('#departamento option:selected').text()},
							        {name: 'nom_odei',value:$('#cod_odei option:selected').text()},
							        {name: 'nom_prov',value:$('#provincia option:selected').text()},
							        {name: 'nom_dist',value:$('#distrito option:selected').text()},
							        {name: 'nom_dep_nac',value:$('#departamento2 option:selected').text()},
							        {name: 'nom_prov_nac',value:$('#provincia2 option:selected').text()},
							        {name: 'nom_dist_nac',value:$('#distrito2 option:selected').text()},
							        {name: 'nom_dep_dom',value:$('#departamento3 option:selected').text()},
							        {name: 'nom_prov_dom',value:$('#provincia3 option:selected').text()},
							        {name: 'nom_dist_dom',value:$('#distrito3 option:selected').text()},   
							        {name: 'cv',value:cv_file}         
							    );
							      rform_data = $.param(rform_data);

							    $.ajax({
							        url: CI.base_url + "convocatoria/registro/inscripcion",   
							        type: 'POST',
							        data: rform_data,
									// contentType: "application/json",
									dataType: "json",
									cache:false,
							        success: function(json){
							        	// console.log(json);
							            if(json.flag==1){
							            	// $('#mymodal').modal('hide');
							            	reg_form(json.msg); 
							            
							            }else{
							            	$('#mymodal').modal('hide'); 
							                $("#conv_registro :input").removeAttr('disabled');
							                $('.control-group').removeClass('error');
							                $(".help-block error").empty();
							                $.each(json.datos, function(i, data){
							                    $('#' + i).closest("div.control-group").addClass("error");
							                    $('#' + i).siblings("div.help-block.error").html(data);
							                });
							                $("html, body").animate({ scrollTop: 0 }, "slow");
							                $('#nivel_instruccion').trigger('change');
							                $('#participo').trigger('change');
							            }       

							            var bsub = $( ":submit" );  
							            bsub.removeAttr('disabled');  
							            //console.log(response);
							            // try {
							            //     var is_json = $.parseJSON(response);
							            // } catch (e) {
							            //     var is_html = response;
							            // }            
							            // if(typeof is_json == 'object'){
							        },
							 		error: function(httpRequest, textStatus, errorThrown) { 
									     alert('Error Message: '+textStatus);
									     alert('HTTP Error: '+errorThrown);
									}
							        //,error: function(){alert('error');}
							    });  				     
							}else{
								alert(datax.fail);
								var bsub = $( ":submit" );
			 					bsub.removeAttr('disabled');  		
							}
							
			          }
			});


});
 </script>