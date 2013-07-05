<?php
	$dni = array(
		'name'	=> 'dni',
		'id'	=> 'dni',
		'value' => set_value('dni'),
		'maxlength'	=> 8,
		'class' => 'span3',
	);

	$captcha = array(
		'name'	=> 'captcha',
		'id'	=> 'captcha',
		'maxlength'	=> 8,
		'class' => 'span3',
	);
?>

<?php 
echo '<div class="well modulo">';
$attr = array('class' => 'form-vertical form-auth','id' => 'conv_consulta');
echo form_open($this->uri->uri_string(),$attr); 
?>
		<?php 
		echo '<h5>CONSULTA EL ESTADO DE INSCRIPCIÓN</h5>';
		echo '<div class="control-group">';
		echo form_label('Ingrese DNI', $dni['id']); 
		echo '<div class="controls">';
		echo form_input($dni); ?>
		<span class="help-block error"><?php echo form_error($dni['name']); ?><?php echo isset($errors[$dni['name']])?$errors[$dni['name']]:''; ?></span>
		<?php 
			echo '</div>'; 
			echo '</div>';
	  ?>

<!-- 			<div id="recaptcha_widget">
				<div id="recaptcha_image" style="text-align:center,margin:auto"></div>


				<a href="javascript:Recaptcha.reload()">Otro CAPTCHA</a>
				<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Obtener audio CAPTCHA</a></div>
				<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Obtener imagen CAPTCHA</a></div>


				<div class="recaptcha_only_if_image">Ingresar las palabras</div>
				<div class="recaptcha_only_if_audio">Ingresar los números que escuche</div>

				<div class="control-group">
					<div class="controls">
						<input type="text" class="span3" id="recaptcha_response_field" name="recaptcha_response_field" />
						<span class="help-block error"><?php echo form_error('recaptcha_response_field'); ?></span>
					</div>
				</div>
				<div class="hide"><?php //echo $recaptcha_html; ?></div>
		 	</div> -->
			<div class=""><?php echo $recaptcha_html; ?></div>
			<span class="help-block error"><?php echo form_error('recaptcha_response_field'); ?></span>

<?php 
echo '</div>'; 
echo form_submit('consulta', 'Consulta','class="btn btn-primary pull-right"'); ?>
<?php 
echo form_close(); 

?>