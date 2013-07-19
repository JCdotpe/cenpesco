
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
);

    echo form_hidden('comunidad_id', '');
	echo '<div class="well modulo">';
            echo '<h3 style="text-align:center">Formulario de Comunidad</h3>';
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
			echo '<h4>SECCION I. LOCALIZACIÓN DEL PUNTO DE CONCENTRACIÓN</h4>';
			echo '<h5>A. UBICACION GEOGRAFICA</h5>';

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
		    <li id="ctab2"><a href="#tab2" data-toggle="tab">Seccion II</a></li>
		    <li id="ctab3"><a href="#tab3" data-toggle="tab">Seccion III</a></li>
		    <li id="ctab4"><a href="#tab4" data-toggle="tab">Seccion IV</a></li>
		    <li id="ctab5"><a href="#tab5" data-toggle="tab">Seccion V</a></li>
		    <li id="ctab6"><a href="#tab6" data-toggle="tab">Seccion VI</a></li>
		    <li id="ctab7"><a href="#tab7" data-toggle="tab">Seccion VII</a></li>
		    <li id="ctab8"><a href="#tab8" data-toggle="tab">Seccion VIII</a></li>
		    <li id="ctab9"><a href="#tab9" data-toggle="tab">Seccion IX</a></li>
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
		    <div class="tab-pane" id="tab9">
		      <p><?php $this->load->view('digitacion/forms/comunidad/seccion9_form'); ?></p>
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
        //alert("seccion: " + sc + " preg: " +preg);
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


///////////////////////////////////////////////////////////////////////////////
// <<=================== E N T E R   L I K E  T A B  ======================>>//
    $('input').keydown( function(e) {
            var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
            var array_otros = [ 'S3_4_4','S3_5_5','S3_7_4','S3_9_5','S3_11_10','S3_15_5','S3_16_8','S3_16_9','S3_17_5','S3_17_6','S3_18_4', //SECCCION 3
                                'S5_2_7','S5_3_17', // SECCION 5
                                'S6_3_6','S6_4_15']; // SECCION 6
            var array_libres = ['S6_2_2_A','S6_2_3_A'];
            var array_especiales = ['S3_1','S7_15'];
	  	 	var array_ninguno = ['S3_8_6','S3_8_10','S3_18_5','S6_3_7','S7_2_10','S7_6_4','S7_8_20','S7_16_5']; // NINGUNOS
	  	 	var array_pases = {
	  	 		'S3_2' : [1,2, 3 ],
	  	 		'S3_3' : [1,2, 3 ],
	  	 		};
	  	 	//codigo, value
            if(key == 13) {
                e.preventDefault();
                var inputs = $(this).closest('form').find(':input:enabled:visible');
                $(this).blur();  
                if ( inArray($(this).attr('id'), array_libres )) {// CAMPOS LIBRES: no requieren ingreso obligatorio
                    inputs.eq( inputs.index(this)+ 1 ).focus(); 
                    return;
                }
                if ($(this).val()==""){// NO VACIOS
                    alert("Campo requerido");
                    inputs.eq( inputs.index(this)).focus(); 
                }else{
                    if ( inArray($(this).attr('id'), array_otros )) {// BUSCA CAMPOS que requieren ESPECIFICAR
                        if ($(this).val() == 1 ) {
                            inputs.eq( inputs.index(this)+ 1 ).focus();  
                        } else{
                            inputs.eq( inputs.index(this)+ 2 ).focus();                             
                        }
                    } else if ( inArray($(this).attr('id'), array_pases )) {// BUSCA CAMPOS NINGUNO
                        // if (!ningunos(this)) {
                        // 	alert("Ingresó en  NINGUNO, y en otro elemento, confírmelo");
                        // 	inputs.eq( inputs.index(this) ).focus();  
                        // 	inputs.eq( inputs.index(this) ).select();  
                        // } else{
                        // 	inputs.eq( inputs.index(this)+ 1 ).focus(); 
                        // };
                        alert('entrro');
                    }else if ( inArray($(this).attr('id'), array_ninguno )) {// BUSCA CAMPOS NINGUNO
                        if (!ningunos(this)) {
                        	alert("Ingresó en  NINGUNO, y en otro elemento, confírmelo");
                        	inputs.eq( inputs.index(this) ).focus();  
                        	inputs.eq( inputs.index(this) ).select();  
                        } else{
                        	inputs.eq( inputs.index(this)+ 1 ).focus(); 
                        };
                    } else if( $(this).attr('id') == 'S3_1' ){// PREGUNTA CON OTRO Y UN SOLO INGRESO
                        if ($(this).val() == 4 ) {
                            inputs.eq( inputs.index(this)+ 1 ).focus();                              
                        } else{
                            inputs.eq( inputs.index(this)+ 2 ).focus();                             
                        }
                    }else if( $(this).attr('id') == 'S7_15' ){// PREGUNTA CON OTRO Y UN SOLO INGRESO
                        if ($(this).val() == 6 ) {
                            inputs.eq( inputs.index(this)+ 1 ).focus();                              
                        } else{
                            inputs.eq( inputs.index(this)+ 2 ).focus();                             
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

//validacion
$("#frm_comunidad").validate({
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
				            		$('#frm_comunidad').trigger('submit');
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
									$('#cinfo').remove();
									$('#info').remove();						
								}else{	
									$('#tab'+ key).remove();
									$('#ctab'+ key).remove();
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
					if(!flagi){
						alert('Formulario completado');
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