
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



	// $paisesArray= array(-1 => '-'); 
	// foreach ($pais->result() as $filas)
	// 	{
	// 		$paisesArray[$filas->id] = $filas->detalle;
	// 	}
	// CARGAR COMBOS

	//$depaArray = array(-1 =>' -'); 
		$depaArray = NULL;
		foreach($departamento->result() as $filas)
		{
			$depaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
		}

		$ubidepaArray = NULL;
		foreach($departamento->result() as $filas)
		{
			$ubidepaArray[$filas->CCDD]=strtoupper($filas->DEPARTAMENTO);
		}

	$provArray = array(-1 => '-'); 
	$distArray = array(-1 => '-'); 
	$ccppArray = array(-1 => '-'); 


$attr = array('class' => 'form-vertical form-auth','id' => 'frm_comunidad');
echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 
/////////////////////////////////////////////////////////////
//Empadronador_DNI
$NROFORM = array(
	'name'	=> 'NFORM',
	'id'	=> 'NFORM',
	'maxlength'	=> 6,
	'class' => 'offset5 span2',
	'onkeypress'=>"return solo_numeros(event)",
);

    echo form_hidden('comunidad_id', '');
    echo '<input type="hidden" name="excep_1" id="excep_1" />';// helper para pases q se cruzan 
    echo '<input type="hidden" name="excep_2" id="excep_2" />';// helper para pases q se cruzan 
	echo '<div class="well modulo">';
            echo '<h3 style="text-align:center">Formulario Censal de la Comunidad</h3>';
			echo '<div class="control-group">';
			echo form_label('NRO FORMULARIO','NFORM',$labelnroform);
				echo '<div class="controls">';	
					echo form_input($NROFORM); 
				echo '</div>';
			echo '</div>';
	echo '</div>';  

////////////////////////////////SECCION I
	echo '<div class="well modulo">';
		echo '<div class="row-fluid">';
			echo '<h4>SECCIÓN I. LOCALIZACIÓN DEL PUNTO DE CONCENTRACIÓN</h4>';
			echo '<h5>A. UBICACIÓN GEOGRÁFICA</h5>';

			echo '<div class="span12">';	
					echo '<div class="control-group span6">';
							echo '<div class="controls span3">';
								echo form_label('DEPARTAMENTO','NOM_DD',$label1);
							echo '</div>';								
							echo '<div class="controls span1">';
								echo form_input($CCDD); 
							echo '</div>';	
							echo '<div class="controls span6">';
								echo form_dropdown('NOM_DD', $ubidepaArray, FALSE,'class="span12" id="NOM_DD"'); 
								echo '<input type="hidden" name="SEDE_COD" id="SEDE_COD" value="'. $sede_cod.'"/>';
							echo '</div>';
					echo '</div>';  


					echo '<div class="control-group span6">';
									echo '<div class="controls span3">';
										echo form_label('DISTRITO','NOM_DI',$label1);
									echo '</div>';	
									echo '<div class="controls span1">';
										echo form_input($CCDI); 
									echo '</div>';	

									echo '<div class="controls span6">';
										echo form_dropdown('NOM_DI', $distArray, FALSE,'class="span12" id="NOM_DI"'); 
									echo '</div>';	
					echo '</div>'; 					
			echo '</div>'; 
			

			echo '<div class="span12">';

					echo '<div class="control-group span6">';
								echo '<div class="controls span3">';
									echo form_label('PROVINCIA','NOM_PP',$label1);
								echo '</div>';		
								echo '<div class="controls span1">';
									echo form_input($CCPP); 
								echo '</div>';	

								echo '<div class="controls span6">';
									echo form_dropdown('NOM_PP', $provArray, FALSE,'class="span12" id="NOM_PP"'); 
								echo '</div>';	

					echo '</div>'; 

					echo '<div class="control-group span6">';
								echo '<div class="controls span3">';
									echo form_label('CENTRO POBLADO','NOM_CCPP',$label1);
								echo '</div>';	
								echo '<div class="controls span2">';
									echo form_input($COD_CCPP); 
								echo '</div>';	
								echo '<div class="controls span6">';
									echo form_dropdown('NOM_CCPP', $ccppArray, FALSE,'class="span12" id="NOM_CCPP"'); 
								echo '</div>';	

					echo '</div>'; 			

			echo '</div>'; 	

		echo '</div>'; 			
	echo '</div>'; 				

echo form_submit('consulta', 'Consulta','class="btn btn-primary pull-right"');
echo anchor(site_url('digitacion/comunidad'), 'Nuevo Formato','class="btn btn-success pull-left"');
echo form_close(); 
		echo '</div>'; 			
	echo '</div>'; 		
?>


<div class="row-fluid hide" id="comunidades_tabs" style="margin-top:10px">
	<div class="span12" id="insidetabs" style="text-align:center">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
		  <ul class="nav nav-tabs" style="text-align:center">
		    <li id="ctab2"><a href="#tab2" data-toggle="tab">Sección II</a></li>
		    <li id="ctab3"><a href="#tab3" data-toggle="tab">Sección III</a></li>
		    <li id="ctab4"><a href="#tab4" data-toggle="tab">Sección IV</a></li>
		    <li id="ctab5"><a href="#tab5" data-toggle="tab">Sección V</a></li>
		    <li id="ctab6"><a href="#tab6" data-toggle="tab">Sección VI</a></li>
		    <li id="ctab7"><a href="#tab7" data-toggle="tab">Sección VII</a></li>
		    <li id="ctab8"><a href="#tab8" data-toggle="tab">Sección VIII</a></li>
		    <!-- <li id="ctab9"><a href="#tab9" data-toggle="tab">Seccion IX</a></li> -->
		    <li id="cinfo"><a href="#info" data-toggle="tab">Info</a></li>
		  </ul>
		  <div class="tab-content">
		    <div class="tab-pane" id="tab2">
		      <p><?php $this->load->view('digitacion/forms/comunidad/seccion2_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab3">
		      <p><?php $this->load->view('digitacion/forms/comunidad/seccion3_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab4">
		      <p><?php $this->load->view('digitacion/forms/comunidad/seccion4_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab5">
		      <p><?php $this->load->view('digitacion/forms/comunidad/seccion5_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab6">
		      <p><?php $this->load->view('digitacion/forms/comunidad/seccion6_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab7">
		      <p><?php $this->load->view('digitacion/forms/comunidad/seccion7_form'); ?></p>
		    </div>
		    <div class="tab-pane" id="tab8">
		      <p><?php $this->load->view('digitacion/forms/comunidad/seccion8_form'); ?></p>
		    </div>         
		    <div class="tab-pane" id="info">
		      <p><?php $this->load->view('digitacion/forms/comunidad/info_form'); ?></p>
		    </div>                             
		  </div>
		</div>
	</div>
</div>


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

	$('#NFORM').blur(function (){
	   n = $(this).val().toString();
	   while(n.length < 5) n = "0" + n;
	   return $(this).val(n);
	});

///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////  D I V     S E L E C C I O N A D O   \\\\\\\\\\\\\\\\\\\\\
    $(document).ready(function(){
        for ( s = 2; s < 14; s++) {
            for (p = 1; p < 25; p++) {
              $("#SEC"+s+"_"+p).focusin(function(){
                //$(this).css("background-color","#A9D0F5");
                $(this).css("border","3px solid #ff9900");
              });
              $("#SEC"+s+"_"+p).focusout(function(){
                $(this).css("border","1px solid #989898");
              });
            };
        };
    });
//\\\\\\\\\\\\\\\\\\  D I V     S E L E C C I O N A D O   /////////////////////
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////



///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
///////////////////////////////  N I N G U N O  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
  	function ningunos(inp){
        var acu = 0;
        var sc = ($(inp).attr('id')).substring(1,2);
        var preg = ($(inp).attr('id')).substring(3,4);        
        if ( $.isNumeric(($(inp).attr('id')).substring(4,5) ) ) {
        	var preg = ($(inp).attr('id')).substring(3,5);
        };
        $("#SEC"+sc+"_"+preg).find(':input').each(function() {
            var elemento = this;
            if ($(elemento).val() == 1){
                acu++;
            }		
		});
        if (acu>=2 && $(inp).val() == 1 ){
        	return false;    	
        }else{
        	return true;
        }
            
  	}
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\  N I N G U N O  ///////////////////////////////
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////

///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/////////////////////////////  N O   V A C I O S  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	function vacios_otros(inp){
		var acu = 0;
    	var sc = ($(inp).attr('id')).substring(1,2); 
    	var pr = ($(inp).attr('id')).substring(3,4);
        if ( $.isNumeric( ($(inp).attr('id')).substring(4,5) ) ) {
        	var pr = ($(inp).attr('id')).substring(3,5)  };  	                        	
        	$("#SEC"+sc+"_"+pr+' :input').each(function(){
        		  if ($.isNumeric($(this).val())) { acu = acu + parseInt( $(this).val() ) };
        	})
	        if (acu === 0 ) {
				alert('Tiene que seleccionar en al menos una alternativa');	        	
				return true;     	
	        }else{
	        	return false;
	        }   
	}
//\\\\\\\\\\\\\\\\\\\\\\\\\\\  N O   V A C I O S //////////////////////////////
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////

/*
///////////////////////////////////////////////////////////////////////////////
// <<=================== E N T E R   L I K E  T A B  ======================>>//
    $('input,textarea').keydown( function(e) {
            var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;

            // CAMPOS SIN PASE
	            var array_otros_v = [ 'S3_4_4','S3_8_4','S3_10_5','S3_12_6','S3_16_5','S3_17_8','S3_17_9','S3_18_7','S3_18_8','S3_19_4', //SECCCION 3
	                                'S5_2_7','S5_3_17', // SECCION 5
	                                'S6_3_6','S6_4_15', // SECCION 6
	                                'S7_1_9','S7_5_41','S7_5_49','S7_6_3','S7_7_14','S7_7_15','S7_8_18','S7_9_13','S7_10_9','S7_13_12',// SECCION 7
	                                'S7_2_1','S7_2_2','S7_2_3','S7_2_4','S7_2_5','S7_2_6','S7_2_7','S7_12_1','S7_12_2','S7_12_3',
	                                'S8_3_10','S8_2_1','S8_2_2','S8_2_3','S8_2_4','S8_2_5','S8_2_6','S8_2_7','S8_2_8','S8_2_9','S8_2_10','S8_2_11']; // SECCION 8
	                               
	            var array_otros_u = [];
	            	array_otros_u['S3_1'] 	= 4;
	            	array_otros_u['S7_15'] 	= 6;	

	            var array_otros_esp = ['S7_2_8','S7_12_4','S8_2_12']; // OTROS especiales

	            var array_especiales_tras = ['S3_20_1','S3_20_2','S3_20_3','S3_20_4','S3_20_5'];// TIPO TRANSPORTE SECCION 3	  	 
	            var array_especiales_tras2 = ['S3_20_6','S3_20_7','S3_20_8','S3_20_9'];	// TIPO TRANSPORTE SECCION 3	 
	            var array_especiales_min = ['S3_21_2_1_M','S3_21_2_2_M','S3_21_2_3_M','S3_21_2_4_M','S3_21_2_5_M','S3_21_2_6_M','S3_21_2_7_M','S3_21_2_8_M','S3_21_2_9_M'];	// minutos SECCION 3	 

		  	 	var array_ninguno = ['S3_5_3','S3_11_6','S3_19_5','S6_3_7','S7_6_4','S7_7_16','S7_8_20','S7_16_5']; // NINGUNOS  

		  	 	var array_demas_no_vacios = ['S7_3_12','S7_4_12']; // otros campos no empty  

		  	 	                              
	            var array_libres = ['S6_2_2_A','S6_2_3_A','S2_7','S2_8','S2_9','OBS'];

            //  CAMPOS CON PASE
		  	 	var array_pases =  []; //[varios_codigo, preg_pase, opcion_inicial, opcion_final, especifica, especifica_valor, ninguno, termina]
		  	 		array_pases['S3_2'] = [0,5,2,2,0,0,0,0];
		  	 		array_pases['S3_3'] = [0,5,4,5,0,0,0,0];
		  	 		array_pases['S3_7'] = [0,9,4,5,0,0,0,0];
		  	 		array_pases['S3_6_5'] = [1,9,2,5,1,0,0,0];
		  	 		array_pases['S3_9_6'] = [1,11,2,6,0,0,1,0];
		  	 		array_pases['S3_15'] = [0,19,2,2,0,0,0,0];
		  	 		array_pases['S4_1'] = [0,4,2,2,1,1,0,1];
		  	 		array_pases['S5_1'] = [0,3,2,2,0,0,0,0];
		  	 		array_pases['S6_1'] = [0,3,2,2,0,0,0,0];
		  	 		array_pases['S7_1_9'] = [1,17,3,9,1,1,0,1];
		  	 		array_pases['S7_2_9'] = [1,7,9,9,0,0,1,0];
		  	 		array_pases['S7_8_19'] = [1,10,19,19,0,0,1,0];
		  	 		array_pases['S7_11'] = [0,17,2,2,0,0,0,1];
		  	 		array_pases['S7_14'] = [0,17,2,2,0,0,0,1];
		  	 		array_pases['S8_1'] = [0,4,2,2,0,0,0,0];
	  	 		

 	 

            if(key == 13) {
                e.preventDefault();
                var inputs = $(this).closest('form').find(':input:enabled');
                $(this).blur();  
                if ( inArray($(this).attr('id'), array_libres )) {// CAMPOS LIBRES: no requieren ingreso obligatorio
                    inputs.eq( inputs.index(this)+ 1 ).focus(); 
                    return;
                }
                if ($(this).val()==""){// NO VACIOS
                    alert("Campo requerido");
                    inputs.eq( inputs.index(this)).focus(); 
                }else{
                
                	for (key in array_pases){

                		if ($(this).attr('id') == key) {
                    			//alert(array_pases[key][0]);
							        var sc 			= key.substring(1,2);
							        var code		= array_pases[key][0];
							        var p_actual 	= parseInt(key.substring(3,4)); 
							        if ( $.isNumeric( key.substring(4,5) ) ) {
							        	var p_actual = parseInt(key.substring(3,5));   };
							        var p_pase 		= array_pases[key][1];
							        var sub_ini 	= array_pases[key][2];
							        var sub_fin 	= array_pases[key][3];
							        var esp 		= array_pases[key][4];
							        var esp_val		= array_pases[key][5];
							        var ning		= array_pases[key][6];
							        var termina_s 	= array_pases[key][7];
							        var cont 		= 0;
							        var cont_2 		= 0;
					               if (code == 1){ //valida si son de varios codigos
					                    for (y = sub_ini; y <= sub_fin; y++){
					                        //if ($("#S"+sc+"_"+p_actual+"_"+y).val() == 1){
					                        if ($("#S"+sc+"_"+p_actual+"_"+y).val() == 1){//1 si fue seleccionado
					                            cont++;
					                        }
					                    }
					                    for (z = 1; z < sub_ini; z++){
					                        //if ($("#S"+sc+"_"+p_actual+"_"+y).val() == 1){
					                        if ($("#S"+sc+"_"+p_actual+"_"+z).val() == 1){//1 si fue seleccionado
					                            cont_2++;
					                        }
					                    }					                    
					                    if(cont >= 1 && cont_2 == 0){// valida si se encontro al menos un codigo en el rango
					                        for (x = p_actual+1;x<p_pase;x++){
					                            $("#SEC"+sc+"_"+x+' :input').attr('disabled','disabled');
					                            inputs = $(this).closest('form').find(':input:enabled');
					                        }
					                        if (esp == 1){// es seguido de ESPECIFIQUE
					                            if($(this).val() == 1)  { // valor 1, debe especificar
					                            	inputs.eq( inputs.index(this) + 1 ).focus();
					                            	inputs.eq( inputs.index(this) + 1 ).select();
					                            }else{
					                            	if (termina_s == 1) {alert("Finalice esta sección");};
					                            	inputs.eq( inputs.index(this) + 1 ).val('');
													inputs.eq( inputs.index(this) + 2).focus();
													inputs.eq( inputs.index(this) + 2).select();
					                            }
					                        }else if (ning == 1) { // VALIDA CAMPOS NINGUNO
					                        	if (!ningunos(this)) {
						                        	alert("Ingresó en  NINGUNO, y en otro elemento, confírmelo");
						                        	inputs.eq( inputs.index(this) ).focus();  
						                        	inputs.eq( inputs.index(this) ).select();  
					                        	}else{
					                        		if (termina_s == 1) {alert("Finalice esta sección");};
					                        		inputs.eq( inputs.index(this) + 1 ).focus();					                        		
					                        		inputs.eq( inputs.index(this) + 1 ).select();					                        		
					                        	};
                       						}else{
					                        	inputs.eq( inputs.index(this) + 1 ).focus();
					                        	inputs.eq( inputs.index(this) + 1 ).select();
					                        }
					                    }else if(cont == 0 && cont_2 == 0){// valida si se encontro al menos un codigo en el rango
					                        	alert("Tiene que seleccionar en al menos una alternativa ");
					                        	inputs.eq( inputs.index(this) ).focus();
					                        	inputs.eq( inputs.index(this) ).select();
					                        
					                    }else {
					                        for (x = p_actual+1;x<p_pase;x++){
					                            $("#SEC"+sc+"_"+x+' :input').removeAttr('disabled');
					                            inputs = $(this).closest('form').find(':input:enabled');
					                        }
					                        if (esp == 1) { // es seguido de ESPECIFIQUE
					                            if($(this).val() == 1)  { // valor 1, debe especificar
					                            	inputs.eq( inputs.index(this) + 1 ).focus();
					                            	inputs.eq( inputs.index(this) + 1 ).select();
					                            }else{
					                            	inputs.eq( inputs.index(this) + 1 ).val('');
					                            	inputs.eq( inputs.index(this) + 2 ).focus();
					                            	inputs.eq( inputs.index(this) + 2 ).select();
					                            }
					                        }else if (ning == 1) { // VALIDA CAMPOS NINGUNO
					                        	if (!ningunos(this)) {
						                        	alert("Ingresó en  NINGUNO, y en otro elemento, confírmelo");
						                        	inputs.eq( inputs.index(this) ).focus();  
						                        	inputs.eq( inputs.index(this) ).select();  
					                        	} else{
					                        		inputs.eq( inputs.index(this) + 1 ).focus();					                        		
					                        		inputs.eq( inputs.index(this) + 1 ).select();					                        		
					                        	};
                       						}else{
					                        	inputs.eq( inputs.index(this) + 1 ).focus();
					                        	inputs.eq( inputs.index(this) + 1 ).select();
					                        }
					                    }
					                    return; // end ************************
					                }else{ // de sun solo codigo
					                    for (y = sub_ini; y <= sub_fin; y++){
					                        if ($("#S"+sc+"_"+p_actual).val() == y){ //si fue ingresado dentro del rango
					                            cont++;
					                        }
					                    }
					                    if(cont >= 1){// valida si se encontro al menos un codigo en el rango
					                        for (x = p_actual+1;x<p_pase;x++){
					                            $("#SEC"+sc+"_"+x+' :input').attr('disabled','disabled');
					                            inputs = $(this).closest('form').find(':input:enabled');
					                        }
					                        if(esp == 1){// es seguido de ESPECIFIQUE
					                            if($(this).val() == esp_val)  { // valor 1, debe especificar
					                            	inputs.eq( inputs.index(this) + 1 ).focus();
					                            	inputs.eq( inputs.index(this) + 1 ).select();
					                            }else{
					                            	if (termina_s == 1) {alert("Finalice esta sección");};
					                            	inputs.eq( inputs.index(this) + 1 ).val('');
													inputs.eq( inputs.index(this) + 2).focus();
													inputs.eq( inputs.index(this) + 2).select();
					                            }
					                        }else if (ning == 1) {// VALIDA CAMPOS NINGUNO
					                        	if (!ningunos(this)) {
						                        	alert("Ingresó en  NINGUNO, y en otro elemento, confírmelo");
						                        	inputs.eq( inputs.index(this) ).focus();  
						                        	inputs.eq( inputs.index(this) ).select();  
					                        	} else{
					                        		if (termina_s == 1) {alert("Finalice esta sección");};
					                        		inputs.eq( inputs.index(this) + 1 ).focus();					                        		
					                        		inputs.eq( inputs.index(this) + 1 ).select();					                        		
					                        	};
                       						}else{
                       							if (termina_s == 1) {alert("Finalice esta sección");};
					                        	inputs.eq( inputs.index(this) + 1 ).focus();
					                        	inputs.eq( inputs.index(this) + 1 ).select();
					                        }
					                    }else if(cont <= 0){
					                        for (x = p_actual+1;x<p_pase;x++){
					                            $("#SEC"+sc+"_"+x+' :input').removeAttr('disabled');
					                            inputs = $(this).closest('form').find(':input:enabled');
					                        }   
					                        //if (termina_s == 1) { inputs.eq( inputs.index(this) + 1).removeAttr('disabled'); alert('oa');}
					                        if (esp == 1){// es seguido de ESPECIFIQUE
					                            if($(this).val() == esp_val)  { // valor de la opcion, debe especificar
					                            	inputs.eq( inputs.index(this) + 1 ).focus();
					                            	inputs.eq( inputs.index(this) + 1 ).select();
					                            }else{
					                            	inputs.eq( inputs.index(this) + 1 ).val('');
													inputs.eq( inputs.index(this) + 2).focus();
													inputs.eq( inputs.index(this) + 2).select();
					                            }
					                        } else if (ning == 1) {// VALIDA CAMPOS NINGUNO
					                        	if (!ningunos(this)) {
						                        	alert("Ingresó en  NINGUNO, y en otro elemento, confírmelo");
						                        	inputs.eq( inputs.index(this) ).focus();  
						                        	inputs.eq( inputs.index(this) ).select();  
					                        	} else{
					                        		inputs.eq( inputs.index(this) + 1 ).focus();					                        		
					                        		inputs.eq( inputs.index(this) + 1 ).select();					                        		
					                        	};
                       						}else{

					                        	inputs.eq( inputs.index(this) + 1 ).focus();
					                        	inputs.eq( inputs.index(this) + 1 ).select();
					                        }
					                    }
					                    return; //end  ***************************
					                }
                		} 
                	}
                	// LOS CAMPOS DE PREGUNTAS SIN PASE/////////////////////////////////////////////////////////////////
                    if ( inArray($(this).attr('id'), array_otros_v )) {// CAMPOS OTROS de VARIOS ingresos
                        if ($(this).val() == 1 ) {
                            inputs.eq( inputs.index(this)+ 1 ).focus();  
                            inputs.eq( inputs.index(this)+ 1 ).select();  
                        } else{
                        	//inputs.eq( inputs.index(this)+ 1 ).val(''); // limpia el campo de especifique
                        	if( ($(this).attr('id') == 'S7_10_9') || ($(this).attr('id') == 'S3_4_4') ){// campos especiales, que no permiten validar campos vacios
                        		if (vacios_otros(this)) {
				                inputs.eq( inputs.index(this)).focus();                             
				                inputs.eq( inputs.index(this) ).select(); return;	
                        		}         
                        	// }else if ( ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_ninguno ) ) || ( inArray(inputs.eq( inputs.index(this)+ 4 ).attr('id'), array_ninguno ) ) 
                        	// 			|| ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_otros_v ))  
                        	// 			|| ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_otros_esp )) || ( array_pases[inputs.eq( inputs.index(this)+ 3 ).attr('id')] ) || ( array_pases[inputs.eq( inputs.index(this)+ 2 ).attr('id')] ) ){
	                        // 		//
                        	//}else if ($(this).attr('id') == 'S7_5_41') {
									//
                        	}else if ( vacios_otros(this) ) {// valida con funcion de campos vacios
				                inputs.eq( inputs.index(this)).focus();                             
				                inputs.eq( inputs.index(this) ).select(); return;	
                        	}                        		
                            // inputs.eq( inputs.index(this)+ 2 ).focus();                             
                            // inputs.eq( inputs.index(this)+ 2 ).select(); 
                            inputs.eq( inputs.index(this)+ 1 ).focus();                             
                            inputs.eq( inputs.index(this)+ 1 ).select();                             
                        }
                    }else if( array_otros_u[$(this).attr('id')] >= 1 ){//  CAMPOS OTRO, de UN solo ingreso
                        if ($(this).val() == array_otros_u[$(this).attr('id')] ) {
                            inputs.eq( inputs.index(this)+ 1 ).focus();                              
                            inputs.eq( inputs.index(this)+ 1 ).select();                              
                        } else{
                        	inputs.eq( inputs.index(this)+ 1 ).val('');
                            inputs.eq( inputs.index(this)+ 1 ).focus();                             
                            inputs.eq( inputs.index(this)+ 1 ).select();      
                            // inputs.eq( inputs.index(this)+ 2 ).focus();                             
                            // inputs.eq( inputs.index(this)+ 2 ).select();                                                    
                        }
                    }else  if ( inArray($(this).attr('id'), array_otros_esp )) {// CAMPOS OTROS de VARIOS ingresos especiales
                        if ($(this).val() == 1 ) {
                            inputs.eq( inputs.index(this)+ 1 ).focus();  
                            inputs.eq( inputs.index(this)+ 1 ).select();  
                        } else{
                        	if ( ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_ninguno ) ) || ( inArray(inputs.eq( inputs.index(this)+ 4 ).attr('id'), array_ninguno )) || ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_otros_v )) || ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_otros_esp )) ||  ( array_pases[inputs.eq( inputs.index(this)+ 3 ).attr('id')] ) ){
                        		//
                        	} else {                   	
                        		var acu = 0;
	                        	var sc = ($(this).attr('id')).substring(1,2); 
	                        	var pr = ($(this).attr('id')).substring(3,4);
						        if ( $.isNumeric( ($(this).attr('id')).substring(4,5) ) ) {
						        	var pr = ($(this).attr('id')).substring(3,5)  };  	                        	
		                        	$("#SEC"+sc+"_"+pr+' :input').each(function(){
		                        		  if ($.isNumeric($(this).val())) { acu = acu + parseInt( $(this).val() ) };
		                        	})
							        if (acu === 0 ) {
							        	alert('Tiene que seleccionar en al menos una alternativa ');
			                            inputs.eq( inputs.index(this)).focus();                             
			                            inputs.eq( inputs.index(this) ).select(); return;						        	
							        } 
							}
                        	//inputs.eq( inputs.index(this)+ 1 ).val('');
                        	//inputs.eq( inputs.index(this)+ 2 ).val('');
                            // inputs.eq( inputs.index(this)+ 3 ).focus();                             
                            // inputs.eq( inputs.index(this)+ 3 ).select();
                            inputs.eq( inputs.index(this)+ 1 ).focus();                             
                            inputs.eq( inputs.index(this)+ 1 ).select();                                                          
                        }
                    }else if ( inArray($(this).attr('id'), array_ninguno )) {// VALIDA CAMPOS NINGUNO
                        if (!ningunos(this)) {
                        	alert("Ingresó en  NINGUNO, y en otro elemento, confírmelo");
                        	inputs.eq( inputs.index(this) ).focus();  
                        	inputs.eq( inputs.index(this) ).select();  
                        } else{
                        	var sc = ($(this).attr('id')).substring(1,2);
                        	var pr = ($(this).attr('id')).substring(3,4);
						        if ( $.isNumeric( ($(this).attr('id')).substring(4,5) ) ) {
						        	var pr = ($(this).attr('id')).substring(3,5)  };                        	
                        	var acu =0;
	                        	$("#SEC"+sc+"_"+pr+' :input').each(function(){
	                        		  if ($.isNumeric($(this).val())) { acu = acu + parseInt( $(this).val() ) };
	                        	})
						        if (acu == 0 ) {
						        	alert('Tiene que seleccionar en al menos una alternativa ');
		                            inputs.eq( inputs.index(this)).focus();                             
		                            inputs.eq( inputs.index(this) ).select(); 						        	
						        } else{
		                        	inputs.eq( inputs.index(this) + 1 ).focus(); 
		                        	inputs.eq( inputs.index(this) + 1 ).select();
					            }
                        };
                    } else if ( inArray($(this).attr('id'), array_especiales_tras )) {// VALIDA CAMPOS traslado
                        if ($(this).val() == 1) {
                        	inputs.eq( inputs.index(this) + 1).focus();  
                        	inputs.eq( inputs.index(this) + 1).select();  
                        } else{
                        	//inputs.eq( inputs.index(this) + 1 ).val('')  ;  
                        	//inputs.eq( inputs.index(this) + 2 ).val('')  ;  
                        	//inputs.eq( inputs.index(this) + 3 ).val('')  ;  
                        	inputs.eq( inputs.index(this) + 4 ).focus(); 
                        	inputs.eq( inputs.index(this) + 4 ).select(); 
                        };
                    }else if ( inArray($(this).attr('id'), array_especiales_tras2 )) {// VALIDA CAMPOS traslado 2
                        if ($(this).val() == 1) {
                        	inputs.eq( inputs.index(this) + 1).focus();  
                        	inputs.eq( inputs.index(this) + 1).select();  
                        } else{
                        	if ($(this).attr('id') == 'S3_20_9') { // valida al deja el foco, si los inputs son todos ceros
                        		var acum = 0;
                        		for (var i = 1; i <= 9; i++) {
                        			acum = acum + parseInt($("#S3_20_"+i).val());
                        		};
                        		if (acum == 0) {alert('Tiene que seleccionar en al menos una alternativa '); inputs.eq( inputs.index(this)).focus();  inputs.eq( inputs.index(this) ).select(); return;};
                        	} 
                        	inputs.eq( inputs.index(this) + 1 ).val('')  ;  
                        	inputs.eq( inputs.index(this) + 2 ).val('')  ;  
                        	inputs.eq( inputs.index(this) + 3 ).focus(); 
                        	inputs.eq( inputs.index(this) + 3 ).select(); 
                        };
                    }else if ( inArray($(this).attr('id'),array_especiales_min ) ) {// VALIDA MINUTOS Y HORAS seccion III
                    	//alert(inputs.eq( inputs.index(this)-2).val()  + '-'+ inputs.eq( inputs.index(this)-1 ==0).val() + '-'+ inputs.eq( inputs.index(this) ==0).val()) ;
						        if ( inputs.eq( inputs.index(this)-2).val() == 1 && inputs.eq( inputs.index(this)-1 ).val()==0 && inputs.eq( inputs.index(this) ).val()==0 ) {
						        	alert('Error en horas o minutos debe de haber un dato diferente de cero');
		                            inputs.eq( inputs.index(this)).focus();                             
		                            inputs.eq( inputs.index(this) ).select(); 						        	
						        } else{
		                        	inputs.eq( inputs.index(this) + 1 ).focus(); 
		                        	inputs.eq( inputs.index(this) + 1 ).select();
					            }
                    }else if ( inArray($(this).attr('id'), array_demas_no_vacios )) {// VALIDA CAMPOS no vacios
                        	var sc = ($(this).attr('id')).substring(1,2);
                        	var pr = ($(this).attr('id')).substring(3,4);
						        if ( $.isNumeric( ($(this).attr('id')).substring(4,5) ) ) {
						        	var pr = ($(this).attr('id')).substring(3,5)  };                        	
                        	var acu =0;
	                        	$("#SEC"+sc+"_"+pr+' :input').each(function(){
	                        		  if ($.isNumeric($(this).val())) { acu = acu + parseInt( $(this).val() ) };
	                        	})
						        if (acu == 0 ) {
						        	alert('Tiene que seleccionar en al menos una alternativa ');
		                            inputs.eq( inputs.index(this)).focus();                             
		                            inputs.eq( inputs.index(this) ).select(); 						        	
						        } else{
		                        	inputs.eq( inputs.index(this) + 1 ).focus(); 
		                        	inputs.eq( inputs.index(this) + 1 ).select();
					            }
                    }else if ( $(this).attr('id') == 'S4_2_5') {// VALIDA CAMPOS de educacion NO TODO debe ser 2
                        	var sc = ($(this).attr('id')).substring(1,2);
                        	var pr = ($(this).attr('id')).substring(3,4);
						        if ( $.isNumeric( ($(this).attr('id')).substring(4,5) ) ) {
						        	var pr = ($(this).attr('id')).substring(3,5)  };                        	
                        	var acu =0;
	                        	$("#SEC"+sc+"_"+pr+' :input').each(function(){
	                        		  if ($.isNumeric($(this).val())) { acu = acu + parseInt( $(this).val() ) };
	                        	})
						        if (acu == 10 ) {
						        	alert('Tiene que seleccionar en al menos una afirmativa ');
		                            inputs.eq( inputs.index(this)).focus();                             
		                            inputs.eq( inputs.index(this) ).select(); 						        	
						        } else{
		                        	inputs.eq( inputs.index(this) + 1 ).focus(); 
		                        	inputs.eq( inputs.index(this) + 1 ).select();
					            }
                    }else{// permite el pase a los inputs ya con datos
                    	if(  ( $(this).attr('id') == 'S7_1_9_O')  ){// campo especial, que sigue a terminar seccion
		                			var cont =0,  cont_2 =0; 
					                    for (y = 3; y <= 9; y++){
					                        if ($("#S7_1_"+y).val() == 1){ cont++; }
					                    }
					                    for (z = 1; z < 3; z++){
					                        if ($("#S7_1_"+z).val() == 1){ cont_2++;}
					                    }	
					                    if(cont>=1 && cont_2 ==0){alert('Finalice esta sección'); };
		                }else if(  ( $(this).attr('id') != 'S4_1_C')  ){
		                	for (key in array_pases){ // si el INPUT fue seguido de 
		                		if (inputs.eq( inputs.index(this)-1).attr('id') == key){
		                			if(  (array_pases[key][7] == 1) &&   (inputs.eq( inputs.index(this) - 1 ).val() == array_pases[key][5] )  ){	alert('Finalice esta sección');}
		                		}
		                	}
		                }
                        inputs.eq( inputs.index(this) + 1 ).focus(); 
                        inputs.eq( inputs.index(this) + 1 ).select(); 
                   }                         
                }
            }else if (key == 27) {// RETROCESO (scape)
                var inputs = $(this).closest('form').find(':input:enabled');
                if ($(this).val()=="" ){// NO VACIOS
               		if ( inArray( inputs.eq( inputs.index(this)- 1).attr('id') ,  array_otros_v) && ( parseInt(inputs.eq( inputs.index(this)- 1).val()) == 0  || inputs.eq( inputs.index(this)- 1).val() == "" ) ){
	                    inputs.eq( inputs.index(this)- 1).focus();  
	                    inputs.eq( inputs.index(this)- 1).select(); return;  
               		}
	                    alert("Campo requerido");                  			
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
*/

// CAMPOS SIN PASE
    var array_otros_v = [ 'S3_4_4','S3_8_4','S3_10_5','S3_12_6','S3_16_5','S3_17_8','S3_17_9','S3_18_7','S3_18_8','S3_19_4', //SECCCION 3
                        'S5_2_7','S5_3_17', // SECCION 5
                        /*'S6_3_6',*/'S6_4_15', // SECCION 6
                        'S7_1_9','S7_5_41','S7_5_49','S7_6_3',/*'S7_7_14','S7_7_15','S7_8_18',*/'S7_9_13','S7_10_9','S7_13_12',// SECCION 7
                        /*'S7_2_1','S7_2_2','S7_2_3','S7_2_4','S7_2_5','S7_2_6','S7_2_7','S7_12_1','S7_12_2','S7_12_3',*/
                        'S8_3_10','S8_2_1','S8_2_2','S8_2_3','S8_2_4','S8_2_5','S8_2_6','S8_2_7','S8_2_8','S8_2_9','S8_2_10','S8_2_11']; // SECCION 8
                       
    var array_otros_u = [];
    	array_otros_u['S3_1'] 	= 4;
    	array_otros_u['S7_15'] 	= 6;	

    var array_otros_esp = [/*'S7_2_8',*/'S7_12_4','S8_2_12']; // OTROS especiales

    var array_especiales_tras = ['S3_20_1','S3_20_2','S3_20_3','S3_20_4','S3_20_5'];// TIPO TRANSPORTE SECCION 3	  	 
    var array_especiales_tras2 = ['S3_20_6','S3_20_7','S3_20_8','S3_20_9'];	// TIPO TRANSPORTE SECCION 3	 
    var array_especiales_min = ['S3_21_2_1_M','S3_21_2_2_M','S3_21_2_3_M','S3_21_2_4_M','S3_21_2_5_M','S3_21_2_6_M','S3_21_2_7_M','S3_21_2_8_M','S3_21_2_9_M'];	// minutos SECCION 3	 

 	var array_ninguno = ['S3_5_3','S3_11_6','S3_19_5','S6_3_7','S7_6_4','S7_7_16','S7_8_20','S7_16_5']; // NINGUNOS  

 	var array_demas_no_vacios = ['S7_3_12','S7_4_12']; // otros campos no empty  
	 	                              
    var array_libres = ['S6_2_2_A','S6_2_3_A','S2_7','S2_8','S2_9','OBS'];

 	var array_pases_1 = ['S3_6_1','S3_6_2','S3_6_3','S3_6_4','S3_6_5_O'];
 	var array_pases_2 = ['S3_9_1','S3_9_2','S3_9_3','S3_9_4','S3_9_5'];
 	var array_pases_3 = ['S7_1_1','S7_1_2','S7_1_3','S7_1_4','S7_1_5','S7_1_6','S7_1_7','S7_1_8','S7_1_9_O'];
 	var array_pases_4 = ['S7_2_1','S7_2_1_F','S7_2_2','S7_2_2_F','S7_2_3','S7_2_3_F','S7_2_4','S7_2_4_F','S7_2_5','S7_2_5_F','S7_2_6','S7_2_6_F','S7_2_7','S7_2_7_F','S7_2_8','S7_2_8_O','S7_2_8_F'];
 	var array_pases_5 = ['S7_8_1','S7_8_2','S7_8_3','S7_8_4','S7_8_5','S7_8_6','S7_8_7','S7_8_8','S7_8_9','S7_8_10','S7_8_11','S7_8_12','S7_8_13','S7_8_14','S7_8_15','S7_8_16','S7_8_17','S7_8_18','S7_8_18_O'];


//  CAMPOS CON PASE
 	var array_pases =  []; //[varios_codigo, preg_pase, opcion_inicial, opcion_final, especifica, especifica_valor, ninguno, termina]
 		array_pases['S3_2'] = [0,5,2,2,0,0,0,0];
 		array_pases['S3_3'] = [0,5,4,5,0,0,0,0];
 		array_pases['S3_7'] = [0,9,4,5,0,0,0,0];
 		array_pases['S3_6_5'] = [1,9,2,5,1,0,0,0];
 		array_pases['S3_9_6'] = [1,11,2,6,0,0,1,0];
 		array_pases['S3_15'] = [0,19,2,2,0,0,0,0];
 		array_pases['S4_1'] = [0,4,2,2,1,1,0,2];
 		array_pases['S5_1'] = [0,3,2,2,0,0,0,0];
 		array_pases['S6_1'] = [0,3,2,2,0,0,0,0];
 		array_pases['S7_1_9'] = [1,17,3,9,1,1,0,1];
 		array_pases['S7_2_9'] = [1,7,9,9,0,0,1,0];
 		array_pases['S7_8_19'] = [1,10,19,19,0,0,1,0];
 		array_pases['S7_11'] = [0,17,2,2,0,0,0,2];
 		array_pases['S7_14'] = [0,17,2,2,0,0,0,2];
 		array_pases['S8_1'] = [0,4,2,2,0,0,0,0];

 	//excep_1 = null;//, para la pregunta del pases S3_7

		$('input').blur( function() {
			if (inArray($(this).attr('id'), array_pases_1)){	    $('#S3_6_5').trigger('blur'); return false; }
			else if (inArray($(this).attr('id'), array_pases_2)){	$('#S3_9_6').trigger('blur'); return false; }
			else if (inArray($(this).attr('id'), array_pases_3)){	$('#S7_1_9').trigger('blur'); return false; }
			else if (inArray($(this).attr('id'), array_pases_4)){	$('#S7_2_9').trigger('blur'); return false; }
			else if (inArray($(this).attr('id'), array_pases_5)){	$('#S7_8_19').trigger('blur'); return false; }
			else if ( array_pases[$(this).attr('id')] ){

				for (key in array_pases){
					if ($(this).attr('id') == key) {

				        var sc 			= key.substring(1,2);
				        var code		= array_pases[key][0];
				        var p_actual 	= parseInt(key.substring(3,4)); 
				        if ( $.isNumeric( key.substring(4,5) ) ) {
				        	var p_actual = parseInt(key.substring(3,5));   };
				        var p_pase 		= array_pases[key][1];
				        var sub_ini 	= array_pases[key][2];
				        var sub_fin 	= array_pases[key][3];
				        var cont = 0	;
						var cont_2 = 0	;
				    	// evitar cruce de pases preguntas 6-7 seccion 3
				
					        if (code == 1){
						        for (y = sub_ini; y <= sub_fin; y++){
						            if ($("#S"+sc+"_"+p_actual+"_"+y).val() == 1){//1 si fue seleccionado
						                cont++;
						            }
						        }
						        for (z = 1; z < sub_ini; z++){
						            if ($("#S"+sc+"_"+p_actual+"_"+z).val() == 1){//1 si fue seleccionado
						                cont_2++;
						            }
						        }	

						        if (cont >= 1 && cont_2 == 0){
							        for (x = p_actual+1;x<p_pase;x++){
							            $("#SEC"+sc+"_"+x+' :input').attr('disabled','disabled'); 
							            $("#SEC"+sc+"_"+x+' :input').val(''); 
							        } 
							        if ($(this).attr('id') == 'S3_6_5') { $('#excep_1').val(0);}; //
						        }else{
						        	if (  ($(this).attr('id') == 'S3_6_5')  &&  ( $('#excep_1').val() == 1)  ) { return; } // no desahibilta el pase siguiente a el	
						            for (x = p_actual+1;x<p_pase;x++){
						                $("#SEC"+sc+"_"+x+' :input').removeAttr('disabled'); 
						            } 
						           //$('input').trigger('blur');
						            $('input').trigger('change');						               	
						        }
							}else{
					            for (y = sub_ini; y <= sub_fin; y++){
					                if ($("#S"+sc+"_"+p_actual).val() == y){ //si fue ingresado dentro del rango
					                    cont++;
					                }
					            }

								if (cont >=1) {					                
									for (x = p_actual+1;x<p_pase;x++){
						                $("#SEC"+sc+"_"+x+' :input').attr('disabled','disabled'); 
						                $("#SEC"+sc+"_"+x+' :input').val(''); 
						            } ;
						            if ($(this).attr('id') == 'S3_7') { $('#excep_1').val(1); };// true
						            if ($(this).attr('id') == 'S7_14') { $('#excep_2').val(1); }; // true
						            if ($(this).attr('id') == 'S7_11') { $('#excep_2').val(0); }; // pase a false
								}else{
						            if (  ($(this).attr('id') == 'S7_11')  &&  ( $('#excep_2').val() == 1)  ) { return; } // no desahibilta el pase siguiente a el							
									for (x = p_actual+1;x<p_pase;x++){
						                $("#SEC"+sc+"_"+x+' :input').removeAttr('disabled'); 
						            } ;
						            if ($(this).attr('id') == 'S3_7') { $('#excep_1').val(0); }; // pase false
						            if ($(this).attr('id') == 'S7_14') { $('#excep_2').val(0); }; // pase false
						            //$('input').trigger('blur');
						            $('input').trigger('change');

								}

							}
						
					}
				}
			//return false;
			}
		});



///////////////////////////////////////////////////////////////////////////////
// <<=================== E N T E R   L I K E  T A B  ======================>>//
    $('input,textarea,select').keydown( function(e) {
            var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;


	  	 		
            if(key == 13) {
                e.preventDefault();
                var inputs = $(this).closest('form').find(':input:enabled');
                $(this).blur();  
                if ( inArray($(this).attr('id'), array_libres )) {// CAMPOS LIBRES: no requieren ingreso obligatorio
                    inputs.eq( inputs.index(this)+ 1 ).focus(); 
                    return;
                }
                if ($(this).val()==""){// NO VACIOS
                    alert("Campo requerido");
                    inputs.eq( inputs.index(this)).focus(); 
                }else{
                
                	for (key in array_pases){

                		if ($(this).attr('id') == key) {
							        var sc 			= key.substring(1,2);
							        var code		= array_pases[key][0];
							        if ( $.isNumeric( key.substring(4,5) ) ) {
							        	var p_actual = parseInt(key.substring(3,5));   };
							        var esp 		= array_pases[key][4];
							        var esp_val		= array_pases[key][5];
							        var ning		= array_pases[key][6];
							        var termina_s 	= array_pases[key][7];
							        inputs = $(this).closest('form').find(':input:enabled');
					               if (code == 1){ //valida si son de varios codigos
					               		var acu =0;
			                        	var pr = ($(this).attr('id')).substring(3,4);  if ( $.isNumeric( ($(this).attr('id')).substring(4,5) ) ) {	var pr = ($(this).attr('id')).substring(3,5)  };  					               	
			                        	
				                        	$("#SEC"+sc+"_"+pr+' :input').each(function(){
				                        		  if ($.isNumeric($(this).val())) { acu = acu + parseInt( $(this).val() ) };
				                        	})
									        if (acu == 0 ) {
									        	alert('Tiene que seleccionar en al menos una alternativa ');
					                            inputs.eq( inputs.index(this)).focus();                             
					                            inputs.eq( inputs.index(this) ).select(); 						        	
									        }else if (esp == 1){// es seguido de ESPECIFIQUE
					        //                     if($(this).val() == 1)  { // valor 1, debe especificar
					        //                     	inputs.eq( inputs.index(this) + 1 ).focus();
					        //                     	inputs.eq( inputs.index(this) + 1 ).select();
					        //                     }else{
					        //                     	if (termina_s == 1) {alert("Finalice esta sección");};
					        //                     	inputs.eq( inputs.index(this) + 1 ).val('');
													// inputs.eq( inputs.index(this) + 2).focus();
													// inputs.eq( inputs.index(this) + 2).select();
					        //                     }
										        inputs.eq( inputs.index(this) + 1 ).focus();
										        inputs.eq( inputs.index(this) + 1 ).select();					        
					                        }else if (ning == 1) { // VALIDA CAMPOS NINGUNO
					                        	if (!ningunos(this)) {
						                        	alert("Ingresó en  NINGUNO, y en otro elemento, confírmelo");
						                        	inputs.eq( inputs.index(this) ).focus();  
						                        	inputs.eq( inputs.index(this) ).select();  
					                        	}else{
					                        		if ($(this).val() == termina_s ) {alert("Finalice esta sección");};
					                        		inputs.eq( inputs.index(this) + 1 ).focus();					                        		
					                        		inputs.eq( inputs.index(this) + 1 ).select();					                        		
					                        	};
                       						}else{
					                        	inputs.eq( inputs.index(this) + 1 ).focus();
					                        	inputs.eq( inputs.index(this) + 1 ).select();
					                        }
					                  
					                    return; // end ************************
					                }else{ // de sun solo codigo
					                        if(esp == 1){// es seguido de ESPECIFIQUE
					        //                     if($(this).val() == esp_val)  { // valor 1, debe especificar
					        //                     	inputs.eq( inputs.index(this) + 1 ).focus();
					        //                     	inputs.eq( inputs.index(this) + 1 ).select();
					        //                     }else{
					        //                     	if (termina_s == 1) {alert("Finalice esta sección");};
					        //                     	inputs.eq( inputs.index(this) + 1 ).val('');
													// inputs.eq( inputs.index(this) + 2).focus();
													// inputs.eq( inputs.index(this) + 2).select();
					        //                     }
											        inputs.eq( inputs.index(this) + 1 ).focus();
											        inputs.eq( inputs.index(this) + 1 ).select();					        
					                        }else if (ning == 1) {// VALIDA CAMPOS NINGUNO
					                        	if (!ningunos(this)) {
						                        	alert("Ingresó en  NINGUNO, y en otro elemento, confírmelo");
						                        	inputs.eq( inputs.index(this) ).focus();  
						                        	inputs.eq( inputs.index(this) ).select();  
					                        	} else{
					                        		if ( $(this).val() == termina_s ) {alert("Finalice esta sección");};
					                        		inputs.eq( inputs.index(this) + 1 ).focus();					                        		
					                        		inputs.eq( inputs.index(this) + 1 ).select();					                        		
					                        	};
                       						}else{
                       							if ( $(this).val() == termina_s ) {alert("Finalice esta sección");};
					                        	inputs.eq( inputs.index(this) + 1 ).focus();
					                        	inputs.eq( inputs.index(this) + 1 ).select();
					                        }

					                    return; //end  ***************************
					                }
                		} 
                	}
                	// LOS CAMPOS DE PREGUNTAS SIN PASE/////////////////////////////////////////////////////////////////
                    if ( inArray($(this).attr('id'), array_otros_v )) {// CAMPOS OTROS de VARIOS ingresos
                        if ($(this).val() == 1 ) {
                        	inputs = $(this).closest('form').find(':input:enabled');
                            inputs.eq( inputs.index(this)+ 1 ).focus();  
                            inputs.eq( inputs.index(this)+ 1 ).select();  
                        } else{
                        	//inputs.eq( inputs.index(this)+ 1 ).val(''); // limpia el campo de especifique
                        	if( ($(this).attr('id') == 'S7_10_9') || ($(this).attr('id') == 'S3_4_4') ){// campos especiales, que no permiten validar campos vacios
                        		if (vacios_otros(this)) {
                        		inputs = $(this).closest('form').find(':input:enabled');
				                inputs.eq( inputs.index(this)).focus();                             
				                inputs.eq( inputs.index(this) ).select(); return;	
                        		}         
                        	// }else if ( ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_ninguno ) ) || ( inArray(inputs.eq( inputs.index(this)+ 4 ).attr('id'), array_ninguno ) ) 
                        	// 			|| ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_otros_v ))  
                        	// 			|| ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_otros_esp )) || ( array_pases[inputs.eq( inputs.index(this)+ 3 ).attr('id')] ) || ( array_pases[inputs.eq( inputs.index(this)+ 2 ).attr('id')] ) ){
	                        // 		//
                        	}else if ($(this).attr('id') == 'S7_5_41') {
									//
                        	}else if ( vacios_otros(this) ) {// valida con funcion de campos vacios
                        		inputs = $(this).closest('form').find(':input:enabled');
				                inputs.eq( inputs.index(this)).focus();                             
				                inputs.eq( inputs.index(this) ).select(); return;	
                        	}                        		
                            // inputs.eq( inputs.index(this)+ 2 ).focus();                             
                            // inputs.eq( inputs.index(this)+ 2 ).select(); 
                            inputs = $(this).closest('form').find(':input:enabled');
                            inputs.eq( inputs.index(this)+ 1 ).focus();                             
                            inputs.eq( inputs.index(this)+ 1 ).select();                             
                        }
                    }else if( array_otros_u[$(this).attr('id')] >= 1 ){//  CAMPOS OTRO, de UN solo ingreso
                    	inputs = $(this).closest('form').find(':input:enabled');
                        if ($(this).val() == array_otros_u[$(this).attr('id')] ) {
                            inputs.eq( inputs.index(this)+ 1 ).focus();                              
                            inputs.eq( inputs.index(this)+ 1 ).select();                              
                        } else{
                        	// inputs.eq( inputs.index(this)+ 1 ).val('');
                         //    inputs.eq( inputs.index(this)+ 2 ).focus();                             
                         //    inputs.eq( inputs.index(this)+ 2 ).select();      
                            inputs.eq( inputs.index(this)+ 1 ).focus();                             
                            inputs.eq( inputs.index(this)+ 1 ).select();                                                     
                        }
                    }else  if ( inArray($(this).attr('id'), array_otros_esp )) {// CAMPOS OTROS de VARIOS ingresos especiales
                        if ($(this).val() == 1 ) {
                            inputs.eq( inputs.index(this)+ 1 ).focus();  
                            inputs.eq( inputs.index(this)+ 1 ).select();  
                        } else{
                        	if ( ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_ninguno ) ) || ( inArray(inputs.eq( inputs.index(this)+ 4 ).attr('id'), array_ninguno )) || ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_otros_v )) || ( inArray(inputs.eq( inputs.index(this)+ 2 ).attr('id'), array_otros_esp )) ||  ( array_pases[inputs.eq( inputs.index(this)+ 3 ).attr('id')] ) ){
                        		//
                        	} else {                        	
                        		var acu = 0;
	                        	var sc = ($(this).attr('id')).substring(1,2); 
	                        	var pr = ($(this).attr('id')).substring(3,4);
						        if ( $.isNumeric( ($(this).attr('id')).substring(4,5) ) ) {
						        	var pr = ($(this).attr('id')).substring(3,5)  };  	                        	
		                        	$("#SEC"+sc+"_"+pr+' :input').each(function(){
		                        		  if ($.isNumeric($(this).val())) { acu = acu + parseInt( $(this).val() ) };
		                        	})
							        if (acu === 0 ) {
							        	alert('Tiene que seleccionar en al menos una alternativa ');
			                            inputs.eq( inputs.index(this)).focus();                             
			                            inputs.eq( inputs.index(this) ).select(); return;						        	
							        } 
							}
                        	// inputs.eq( inputs.index(this)+ 1 ).val('');
                        	// inputs.eq( inputs.index(this)+ 2 ).val('');
                         //    inputs.eq( inputs.index(this)+ 3 ).focus();                             
                         //    inputs.eq( inputs.index(this)+ 3 ).select();    
                            inputs.eq( inputs.index(this)+ 1 ).focus();                             
                            inputs.eq( inputs.index(this)+ 1 ).select();                                                      
                        }
                    }else if ( inArray($(this).attr('id'), array_ninguno )) {// VALIDA CAMPOS NINGUNO
                        if (!ningunos(this)) {
                        	alert("Ingresó en  NINGUNO, y en otro elemento, confírmelo");
                        	inputs.eq( inputs.index(this) ).focus();  
                        	inputs.eq( inputs.index(this) ).select();  
                        } else{
                        	var sc = ($(this).attr('id')).substring(1,2);
                        	var pr = ($(this).attr('id')).substring(3,4);
						        if ( $.isNumeric( ($(this).attr('id')).substring(4,5) ) ) {
						        	var pr = ($(this).attr('id')).substring(3,5)  };                        	
                        	var acu =0;
	                        	$("#SEC"+sc+"_"+pr+' :input').each(function(){
	                        		  if ($.isNumeric($(this).val())) { acu = acu + parseInt( $(this).val() ) };
	                        	})
						        if (acu == 0 ) {
						        	alert('Tiene que seleccionar en al menos una alternativa ');
		                            inputs.eq( inputs.index(this)).focus();                             
		                            inputs.eq( inputs.index(this) ).select(); 						        	
						        } else{
		                        	inputs.eq( inputs.index(this) + 1 ).focus(); 
		                        	inputs.eq( inputs.index(this) + 1 ).select();
					            }
                        };
                    } else if ( inArray($(this).attr('id'), array_especiales_tras )) {// VALIDA CAMPOS traslado**********************************************
                        if ($(this).val() == 1) {
                        	inputs.eq( inputs.index(this) + 1).focus();  
                        	inputs.eq( inputs.index(this) + 1).select();  
                        } else{
                        	inputs.eq( inputs.index(this) + 1 ).val('')  ;  
                        	inputs.eq( inputs.index(this) + 2 ).val('')  ;  
                        	inputs.eq( inputs.index(this) + 3 ).val('')  ;  
                        	inputs.eq( inputs.index(this) + 4 ).focus(); 
                        	inputs.eq( inputs.index(this) + 4 ).select(); 
                        };
                    }else if ( inArray($(this).attr('id'), array_especiales_tras2 )) {// VALIDA CAMPOS traslado 2
                        if ($(this).val() == 1) {
                        	inputs.eq( inputs.index(this) + 1).focus();  
                        	inputs.eq( inputs.index(this) + 1).select();  
                        } else{
                        	if ($(this).attr('id') == 'S3_20_9') { // valida al deja el foco, si los inputs son todos ceros
                        		var acum = 0;
                        		for (var i = 1; i <= 9; i++) {
                        			acum = acum + parseInt($("#S3_20_"+i).val());
                        		};
                        		if (acum == 0) {alert('Tiene que seleccionar en al menos una alternativa '); inputs.eq( inputs.index(this)).focus();  inputs.eq( inputs.index(this) ).select(); return;};
                        	} 
                        	inputs.eq( inputs.index(this) + 1 ).val('')  ;  
                        	inputs.eq( inputs.index(this) + 2 ).val('')  ;  
                        	inputs.eq( inputs.index(this) + 3 ).focus(); 
                        	inputs.eq( inputs.index(this) + 3 ).select(); 
                        };
                    }else if ( inArray($(this).attr('id'),array_especiales_min ) ) {// VALIDA MINUTOS Y HORAS seccion III
                    	//alert(inputs.eq( inputs.index(this)-2).val()  + '-'+ inputs.eq( inputs.index(this)-1 ==0).val() + '-'+ inputs.eq( inputs.index(this) ==0).val()) ;
						        if ( inputs.eq( inputs.index(this)-2).val() == 1 && inputs.eq( inputs.index(this)-1 ).val()==0 && inputs.eq( inputs.index(this) ).val()==0 ) {
						        	alert('Error en horas o minutos debe de haber un dato diferente de cero');
		                            inputs.eq( inputs.index(this)).focus();                             
		                            inputs.eq( inputs.index(this) ).select(); 						        	
						        } else{
		                        	inputs.eq( inputs.index(this) + 1 ).focus(); 
		                        	inputs.eq( inputs.index(this) + 1 ).select();
					            }
                    }else if ( inArray($(this).attr('id'), array_demas_no_vacios )) {// VALIDA CAMPOS no vacios
                        	var sc = ($(this).attr('id')).substring(1,2);
                        	var pr = ($(this).attr('id')).substring(3,4);
						        if ( $.isNumeric( ($(this).attr('id')).substring(4,5) ) ) {
						        	var pr = ($(this).attr('id')).substring(3,5)  };                        	
                        	var acu =0;
	                        	$("#SEC"+sc+"_"+pr+' :input').each(function(){
	                        		  if ($.isNumeric($(this).val())) { acu = acu + parseInt( $(this).val() ) };
	                        	})
						        if (acu == 0 ) {
						        	alert('Tiene que seleccionar en al menos una alternativa ');
		                            inputs.eq( inputs.index(this)).focus();                             
		                            inputs.eq( inputs.index(this) ).select(); 						        	
						        } else{
		                        	inputs.eq( inputs.index(this) + 1 ).focus(); 
		                        	inputs.eq( inputs.index(this) + 1 ).select();
					            }
                    }else if ( $(this).attr('id') == 'S4_2_5') {// VALIDA CAMPOS de educacion NO TODO debe ser 2
                        	var sc = ($(this).attr('id')).substring(1,2);
                        	var pr = ($(this).attr('id')).substring(3,4);
						        if ( $.isNumeric( ($(this).attr('id')).substring(4,5) ) ) {
						        	var pr = ($(this).attr('id')).substring(3,5)  };                        	
                        	var acu =0;
	                        	$("#SEC"+sc+"_"+pr+' :input').each(function(){
	                        		  if ($.isNumeric($(this).val())) { acu = acu + parseInt( $(this).val() ) };
	                        	})
						        if (acu == 10 ) {
						        	alert('Tiene que seleccionar en al menos una afirmativa ');
		                            inputs.eq( inputs.index(this)).focus();                             
		                            inputs.eq( inputs.index(this) ).select(); 						        	
						        } else{
		                        	inputs.eq( inputs.index(this) + 1 ).focus(); 
		                        	inputs.eq( inputs.index(this) + 1 ).select();
					            }
                    }else{// permite el pase a los inputs ya con datos
                    	if(  ( $(this).attr('id') == 'S7_1_9_O')  ){// campo especial, que sigue a terminar seccion
		                			var cont =0,  cont_2 =0; 
					                    for (y = 3; y <= 9; y++){
					                        if ($("#S7_1_"+y).val() == 1){ cont++; }
					                    }
					                    for (z = 1; z < 3; z++){
					                        if ($("#S7_1_"+z).val() == 1){ cont_2++;}
					                    }	
					                    if(cont>=1 && cont_2 ==0){alert('Finalice esta sección'); };
		                }else if(  ( $(this).attr('id') != 'S4_1_C')  ){
		                	for (key in array_pases){ // si el INPUT fue seguido de 
		                		if (inputs.eq( inputs.index(this)-1).attr('id') == key){
		                			if(  (array_pases[key][7] == 1) &&   (inputs.eq( inputs.index(this) - 1 ).val() == array_pases[key][5] )  ){	alert('Finalice esta sección');}
		                		}
		                	}
		                }
                        inputs.eq( inputs.index(this) + 1 ).focus(); 
                        inputs.eq( inputs.index(this) + 1 ).select(); 
                   }                         
                }
            }else if (key == 27) {// RETROCESO (scape)
                var inputs = $(this).closest('form').find(':input:enabled');
                if ($(this).val()=="" ){// NO VACIOS
               		if ( inArray( inputs.eq( inputs.index(this)- 1).attr('id') ,  array_otros_v) && ( parseInt(inputs.eq( inputs.index(this)- 1).val()) == 0  || inputs.eq( inputs.index(this)- 1).val() == "" ) ){
	                    inputs.eq( inputs.index(this)- 1).focus();  
	                    inputs.eq( inputs.index(this)- 1).select(); return;  
               		}
	                    alert("Campo requerido");                  			
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
//////////////////////  P A S E     P R E G U N T A S   \\\\\\\\\\\\\\\\\\\\\\\
    // PARAMETROS 
    //s = seccion // pi =pregunta actual//pf =pregunta a pasar// //vc = boolean de pregunta de un solo codigo
    //si =sub pregunta inicial// sf =sub pregunta final // e = boolean para especificar //ts = boolean si termina la seccion
    function pase_preguntas(s,pi,pf,vc,si,sf,e,ts){
       // var obj = input;
        //var e = even;
        var sc = s;
        var p_actual = pi;
        var p_pase = pf;
        var sub_ini = si;
        var sub_fin = sf;
        var esp = e;
        var code = vc;
        var cont =0;
        var p_focus =0;
        var termina_s = ts;


                if (code){ //valida si son de varios codigos

                    for (y = sub_ini; y <= sub_fin; y++){
                        if ($("#S"+sc+"_"+p_actual+"_"+y).val() == 1){
                            cont++;
                        }
                    }
                    if(cont >= 1){// valida si se encontro al menos un codigo en el rango
                        for (x = p_actual+1;x<p_pase;x++){
                            $("#SEC"+sc+"_"+x+' :input').attr('disabled','disabled');
                        }
                        if (termina_s) {// verifica si termina la seccion
                            alert("Finalice esta sección");
                            document.blur();
                            $(":submit").focus();
                            return;
                        }                
                        if (!esp){//verifica si el input es seguido de ESPECIFIQUE
                        	document.blur();
                            $("#S"+sc+"_"+p_pase+"_1").focus();
                            $("#S"+sc+"_"+p_pase).focus();      
                        }
                    }else if(cont <= 0){
                        for (x = p_actual+1;x<p_pase;x++){
                            $("#SEC"+sc+"_"+x+' :input').removeAttr('disabled');
                        }
                        if (!esp) {
                            p_focus = p_actual+1;
                            $("#S"+sc+"_"+p_focus).focus();
                            $("#S"+sc+"_"+p_focus+"_1").focus();
                        }
                    }
                } else{
                    for (y = sub_ini; y <= sub_fin; y++){
                        if ($("#S"+sc+"_"+p_actual).val() == y){
                            cont++;
                        }
                    }

                    if(cont >= 1){// valida si se encontro al menos un codigo en el rango
                        for (x = p_actual+1;x<p_pase;x++){
                            $("#SEC"+sc+"_"+x+' :input').attr('disabled',true);
                        }
                        if (termina_s) {// verifica si termina la seccion
                            //document.getElementById('seccion3').blur();
                            alert("Finalice esta sección");
                            $(":submit").focus();
                            return;
                        }
                        if(!esp){//verifica si el input es seguido de ESPECIFIQUE
                            $("#S"+sc+"_"+p_pase+"_1").focus();
                            $("#S"+sc+"_"+p_pase).focus();                     
                        };
                    }else if(cont <= 0){
                        for (x = p_actual+1;x<p_pase;x++){
                            $("#SEC"+sc+"_"+x+' :input').removeAttr('disabled');
                        }   
                        if (!esp) {
                            p_focus = p_actual+1;
                            $("#S"+sc+"_"+p_focus).focus();
                            $("#S"+sc+"_"+p_focus+"_1").focus();                 
                        } 
                    }
                }
    }
//\\\\\\\\\\\\\\\\\\\\  P A S E     P R E G U N T A S   ///////////////////////      
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////



///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//////////////////////// E S P E C I F I C A R   O T R O  \\\\\\\\\\\\\\\\\\\\\ 
    function especifique(uno,dos,otro){
        var x = uno;
        var y = dos;
        if ((y.value ==otro) && (x.value =="")){
            alert('seleccionó OTRO, especifique');          
            $(dos).focus();
        }
    }
//\\\\\\\\\\\\\\\\\\\\\\ E S P E C I F I C A R   O T R O  /////////////////////  
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////

///////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////////// S O L O     L  E T R A S - 2 \\\\\\\\\\\\\\\\\\\\\\\
    function solo_letras_2(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.,";
        especiales = [8, 9,37, 39,127];

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
//\\\\\\\\\\\\\\\\\\\\\\\\ S O L O     L  E T R A S - /////////////////////////  
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\///////////////////////////////////////


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
// =========>> S O L O   N U M E R O S  <<===============//

// <<======= S O L O   N U M E R O S  0 - 1 ===========>>//
    function solo_0_to_1(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "019";
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
        letras = "1239";
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
        letras = "12349";
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
        letras = "123459";
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
// =======>> S O L O   N U M E R O S  1 - 5 <<===========//   

// <<======= S O L O   N U M E R O S  1 - 6 ===========>>//   
    function solo_1_to_6(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "1234569";
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
// =======>> S O L O   N U M E R O S  1 - 6 <<===========//  


function alfa_numericos(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789.;,";
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

//FORM REGISTRO -------------------------------------------------------------------------------------------------------------------------------

$(function(){


      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
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
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_prov/" + $("#SEDE_COD").val() + "/" + $(this).val();
                op      = 1;
                break;

            case 'NOM_PP':
                sel     = $("#NOM_DI");
                $('#CCPP').val(mivalue);                 
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_dist/" + $("#SEDE_COD").val() + "/" + dep.val() + "/" + $(this).val();
                op      = 2;
                break;

            case 'NOM_DI':
                sel     = $("#NOM_CCPP");
                $("#CCDI").val(mivalue);          
                url     = CI.base_url + "ajax/marco_ajax/get_ajax_ccpp/" + $("#SEDE_COD").val() + "/"  + dep.val() + "/" + prov.val() + "/" + $(this).val();
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
        //sel.empty(); // LIMPIAS EL COMBO SIGUIENTE	
		sel.attr('disabled','disabled');   // deshabilita el siguiente combo a llenar   
        $.ajax({
            url: url,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){ // habilita el siguiente combo a llenar 
				sel.empty();
                sel.removeAttr('disabled');  
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
     required: "Requerido",
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

 $.validator.addMethod(
    "ranges",
     function(value, element, ranges) {
        var noUpperBound = false;
        var valid = false;
        for(var i=0; i<ranges.length; i++) {
            if(ranges[i].length == 1) { 
                noUpperBound = true;
            }
            if(value >= ranges[i][0] && (value <= ranges[i][1] || noUpperBound)) {
                valid = true;
                break;
            }            
        }

        return this.optional(element) || valid;
    },
    "Ingrese valores permitidos"
 );

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


//validacion
$("#frm_comunidad").validate({
    rules: {
        NFORM:{
            required: true,
            minlength: 1,
            maxlength: 6,
			digits: true,
			valueNotEquals: 0,
			range: [1,10000],
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
//FIN RULES
    },

    messages: {
    	NFORM:{
    		required: 'Ingrese Nro Formularios',
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
            ajax:1
        };
        var bsub = $( "#frm_comunidad :submit" );
        bsub.attr("disabled", "disabled");
        $.ajax({
            url: CI.base_url + "digitacion/comunidad/consulta",
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json){
            	



            	if(json.flag == 0){//cuando no fue registrado
				        $.ajax({
				            url: CI.base_url + "digitacion/comunidad/insertar",
				            type:'POST',
				            data:form_data,
				            dataType:'json',
				            success:function(json){
				            	//alert(json.msg);
				            	$("#frm_comunidad :input").attr("disabled", true);
				            	//insercion correcta
				            	if(json.flag == 1){
				            		alert(json.msg);
				            		$('#frm_comunidad').trigger('submit');
				            	}else if(json.flag == 2){
				            		alert(json.msg);
				            	}else{
									//error en la insercion	
				            	}
				            }
				        });    
				              		
            	}else if(json.flag == 1){ //registro encontrado, ver secciones que faltan 
            		$("#frm_comunidad :input").attr("disabled", true);              
            		$('#comunidades_tabs').removeClass('hide');
                    $("input[name='comunidad_id']").val(json.idx);   // guarda el ID de COMUNIDAD.
				    var i = 0;
                    var flagi = false;
					$.each( json.secciones, function( key, value ) { //key = seccciones, value = 1 || 2
                        //alert(value);
						if(value != 0){// oculta las secciones que ya tienen el registro.
								if(key == 9){
									//$('#cinfo').remove();
									//$('#info').remove();		
                                    $('#cinfo').removeClass('active');
                                    $('#info').removeClass('active');  													
								}else{	
									//$('#tab'+ key).remove();
									//$('#ctab'+ key).remove();
									$('#ctab'+ key).removeClass('active');
                                    $('#tab'+ key).removeClass('active');
								}
								
						}else { //muestra secciones 
                            //activar tab     
                            if(!flagi){                                  
                                if(key == 9){
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
					});
					if (!$.isEmptyObject(json.secciones_llenas)){
						$.each(json.secciones_llenas, function(p, va){//tablas
                    		$.each(va , function(k, v){ // registros
                    			$.each(v, function(key, value){ // campos
									if(key == 'S2_10_DD_COD'){
										$("#"+key).val(value);
										$('#S2_10_DD_COD').trigger('change');
									}else if(key == 'S2_10_PP_COD'){
                                        var interval_PP = setInterval(function(){
                                        	if($('#S2_10_PP_COD option:nth-child(2)').length){
                                                clearInterval(interval_PP);
                                                $('#S2_10_PP_COD').val(value); 
                                                $('#S2_10_PP_COD').trigger('change');
                                            }
                                        }, 100); 
									}else if(key == 'S2_10_DI_COD'){
                                        var interval_DI = setInterval(function(){
                                            if($('#S2_10_DI_COD').has('option').length > 0){
                                                clearInterval(interval_DI);
                                                $('#S2_10_DI_COD').val(value); 
                                                $('#S2_10_DI_COD').trigger('change'); 
                                            }
                                        }, 2000); 
									}else if(key == 'S2_10_CCPP_COD'){
                                        var interval_CCPP = setInterval(function(){
                                            if($('#S2_10_CCPP_COD').has('option').length > 0){
                                                clearInterval(interval_CCPP);
                                                $('#S2_10_CCPP_COD').val(value); 
                                                $('#S2_10_CCPP_COD').trigger('change'); 
                                            }
                                        }, 3000); 
									}else if(key == 'EMP_DNI'){
											$("#EMP_combo").val(value);
											$("#EMP_DNI").val(value);
									}else{
										$("#"+key).val(value);
										if(key == 'S2_5'){	$("#S2_5_DD").val(value);}
										if(key == 'S2_6'){	$("#S2_6_DD").val(value);}
										if ( (key == 'salto_seccion') && ( value == 1)){$('#seccion8 :input').attr('disabled','disabled'); };
									}
                    			});
							}); 
						});
					}	
						//despues de cargar, disparamos los change (para los especifique) y blur (los pases)
							//*******************************
							$("input").trigger('change');
							//*******************************
					 		if ($('#S3_2').val() == 2) { $('#S3_2').trigger('blur') } else{ $('#S3_3').trigger('blur'); }

					 		$('#S4_1').trigger('blur');
					 		$('#S5_1').trigger('blur');
					 		$('#S6_1').trigger('blur');

					 		// para la seccion3 
					 		var sc = 3; var p_actual = 6; var sub_ini = 2;	var sub_fin = 5; var cont = 0 ; var cont_2 = 0 ;
						        for (y = sub_ini; y <= sub_fin; y++){
						            if ($("#S"+sc+"_"+p_actual+"_"+y).val() == 1){//1 si fue seleccionado
						                cont++;
						            }
						        }
						        for (z = 1; z < sub_ini; z++){
						            if ($("#S"+sc+"_"+p_actual+"_"+z).val() == 1){//1 si fue seleccionado
						                cont_2++;
						            }
						        }
						    if (cont >=1 && cont_2 == 0){
						    	$('#S3_6_5').trigger('blur');// pase a la 9
						    }else{
						    	$('#S3_7').trigger('blur'); 
						    }

					 		$('#S3_9_6').trigger('blur');
					 		$('#S3_15').trigger('blur');					 	

					 		// para la seccion7 
					 		var sc = 7; var p_actual = 1; var sub_ini = 3;	var sub_fin = 9; var cont = 0 ; var cont_2 = 0 ;
						        for (y = sub_ini; y <= sub_fin; y++){
						            if ($("#S"+sc+"_"+p_actual+"_"+y).val() == 1){//1 si fue seleccionado
						                cont++;
						            }
						        }
						        for (z = 1; z < sub_ini; z++){
						            if ($("#S"+sc+"_"+p_actual+"_"+z).val() == 1){//1 si fue seleccionado
						                cont_2++;
						            }
						        }	
						    if (cont >=1 && cont_2 == 0){
						    	$('#S7_1_9').trigger('blur');// pases de finalizar seccion
						    }else{
						    	$('#S7_2_9').trigger('blur'); $('#S7_8_19').trigger('blur');
						    	if ($('#S7_11').val() == 2 ) { $('#S7_11').trigger('blur');} else{ $('#S7_14').trigger('blur'); };
						    	$('#S8_1').trigger('blur');
						    }
					 	// 
					if(!flagi){
						alert('Formulario completado');
						$('#ctab2').addClass('active');
						$('#tab2').addClass('active');
					}else{
                        alert('Por favor complete la informacion en las secciones a continuacion');   
                    }
            	}else if(json.flag == 2){
                    alert('El Nro de formulario no coincide con  UDRA');
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