<script src="<?php echo base_url('js/vendor/jquery.printElement.min.js'); ?>"></script>
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

$P6 = array(
	'name'	=> 'P6',
	'id'	=> 'P6',
	'maxlength'	=> 4,
	'class' => $span_class,
);

$P7 = array(
	'name'	=> 'P7',
	'id'	=> 'P7',
	'maxlength'	=> 4,
	'class' => $span_class,
	// 'readonly' => 'readonly',
);

$P8 = array(
	'name'	=> 'P8',
	'id'	=> 'P8',
	'maxlength'	=> 3,
	'class' => $span_class,
	'readonly' => 'readonly',
);

$P9 = array(
	'name'	=> 'P9',
	'id'	=> 'P9',
	'maxlength'	=> 1,
	'class' => $span_class,
	// 'readonly' => 'readonly',
);

$P10 = array(
	'name'	=> 'P10',
	'id'	=> 'P10',
	'maxlength'	=> 2,
	'class' => $span_class,
	// 'readonly' => 'readonly',
);


$P11 = array(
	'name'	=> 'P11',
	'id'	=> 'P11',
	'maxlength'	=> 3,
	'class' => $span_class,
	// 'readonly' => 'readonly',
);


$P13 = array(
	'name'	=> 'P13',
	'id'	=> 'P13',
	'maxlength'	=> 80,
	'class' => $span_class,
);

$P15 = array(
	'name'	=> 'P15',
	'id'	=> 'P15',
	'maxlength'	=> 5,
	'class' => $span_class,
);

$P18 = array(
	'name'	=> 'P18',
	'id'	=> 'P18',
	'maxlength'	=> 1,
	'class' => $span_class,
);

$P19 = array(
	'name'	=> 'P19',
	'id'	=> 'P19',
	'maxlength'	=> 1,
	'class' => $span_class,
);

$P20 = array(
	'name'	=> 'P20',
	'id'	=> 'P20',
	'maxlength'	=> 1,
	'class' => $span_class,
);

$P21 = array(
	'name'	=> 'P21',
	'id'	=> 'P21',
	'maxlength'	=> 1,
	'class' => $span_class,
);

$P22 = array(
	'name'	=> 'P22',
	'id'	=> 'P22',
	'maxlength'	=> 1,
	'class' => $span_class,
);

//Observaciones
$OBS_1 = array(
	'name'	=> 'OBS_1',
	'id'	=> 'OBS_1',
	'rows' => 2,
	'maxlength'	=> 1000,
	'class' => $span_class,
);

//Observaciones
$OBS_2 = array(
	'name'	=> 'OBS_2',
	'id'	=> 'OBS_2',
	'rows' => 1,
	'maxlength'	=> 1000,
	'class' => $span_class,
);


		$empad = array(-1 => '-'); 
		foreach($sups->result() as $e)
		{
			$empad[$e->dni]=strtoupper($e->nombre);
		}


		$odei = array(-1 => '-'); 
		foreach($odeis->result() as $o)
		{
			$odei[$o->odei_cod]=strtoupper($o->nombre);
		}

	$provArray = array(-1 => '-'); 
	$distArray = array(-1 => '-'); 
	$ccppArray = array(-1 => '-'); 


$attr = array('class' => 'form-vertical form-auth','id' => 'inform');
echo '<div id="imprimir" style="overflow:auto">';
echo '<div class="row-fluid">';
echo '<div class="span12">';
echo form_open($this->uri->uri_string(),$attr); 
/////////////////////////////////////////////////////////////
//Empadronador_DNI
$INF_N = array(
	'name'	=> 'INF_N',
	'id'	=> 'INF_N',
	'maxlength'	=> 2,
);



    
	echo '<div class="well modulo">';
			echo '<div class="control-group">';
      			echo '<h4 style="text-align:center">Informe de Supervisión Nacional</h4>';
					echo form_label('INFORME NRO','INF_N',$labelnroform);
						echo '<div class="controls" style="text-align:center">';	
							echo form_input($INF_N);
							echo '<div class="help-block error"></div>';
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
							    echo form_dropdown('DNI_SUP', $empad, FALSE,'class="span12" id="DNI_SUP"');
								echo '<span class="help-inline"></span>';
								echo '<div class="help-block error">' . form_error('DNI_SUP') . '</div>';
							echo '</div>'; 	
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
								echo form_label('ODEI','ODEI_COD',$label1);
							echo '</div>';								
							echo '<div class="controls span8">';
								echo form_dropdown('ODEI_COD', $odei, FALSE,'class="span12" id="ODEI_COD"'); 
								echo '<div class="help-block error"></div>';
							echo '</div>';
					echo '</div>';  
				
			echo '</div>'; 
	

			echo '<div class="span4">';	
					echo '<div class="control-group">';
								echo '<div class="controls span4">';
									echo form_label('DEPARTAMENTO','DEP_COD',$label1);
								echo '</div>';		
								echo '<div class="controls span8">';
									echo form_dropdown('DEP_COD', $provArray, FALSE,'class="span12" id="DEP_COD"'); 
								echo '<div class="help-block error"></div>';
								echo '</div>';	

					echo '</div>'; 
			echo '</div>'; 

			echo '<div class="span4">';
					echo '<div class="control-group">';
									echo '<div class="controls span4">';
										echo form_label('PROVINCIA','PROV_COD',$label1);
									echo '</div>';	
									echo '<div class="controls span8">';
										echo form_dropdown('PROV_COD', $distArray, FALSE,'class="span12" id="PROV_COD"'); 
										echo '<div class="help-block error"></div>';
									echo '</div>';	
					echo '</div>'; 	
			echo '</div>'; 	


		echo '</div>'; 	









		echo '<div class="row-fluid" style="margin-top:15px">';

			echo '<div class="offset1 span5">';
					echo '<div class="control-group">';
								echo '<div class="controls span4">';
									echo form_label('DISTRITO','DIST_COD',$label1);
								echo '</div>';	
								echo '<div class="controls span8">';
									echo form_dropdown('DIST_COD', $ccppArray, FALSE,'class="span12" id="DIST_COD"'); 
								echo '<div class="help-block error"></div>';
								echo '</div>';	

					echo '</div>'; 	
			echo '</div>'; 	

			echo '<div class="span5">';
					echo '<div class="control-group">';
								echo '<div class="controls span4">';
									echo form_label('CENTRO POBLADO CONCENTRACION','CCPPCOD',$label1);
								echo '</div>';	
								echo '<div class="controls span8">';
									echo form_dropdown('CCPPCOD', $ccppArray, FALSE,'class="span12" id="CCPPCOD"'); 
									echo '<div class="help-block error"></div>';
								echo '</div>';	

					echo '</div>'; 	
			echo '</div>'; 	

		echo '</div>'; 
		
echo '</div>'; 	

echo form_submit('consulta', 'Consulta','class="btn btn-primary pull-right"');
echo anchor(site_url('digitacion/informe'), 'Nuevo Formato','class="btn btn-success pull-left"');
echo anchor(site_url('digitacion/informe_reporte'), 'Exportar','class="btn btn-success pull-left" style="margin-left:20px"');
echo form_close(); 

		echo '</div>'; 			
	echo '</div>'; 		





$attr = array('class' => 'form-vertical form-auth hide','id' => 'serrors');
echo form_open($this->uri->uri_string(),$attr); 
echo '<div class="well modulo" style="margin-top:15px; margin-bottom:20px">';
		echo form_hidden('informid', '');
		echo '<div class="row-fluid">';
			echo '<div class="offset1 span5">';
					echo '<h5>1. COORDINACIÓN CON AUTORIDADES</h5>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo form_label('A .CONTACTO CON AUTORIDADES','P1',$label1);
								echo '<div class="controls span8">';
									echo form_dropdown('P1', $combo2, FALSE,'class="span12" id="P1"'); 
									echo '<div class="help-block error"></div>';
								echo '</div>';	
							echo '</div>';	
						echo '</div>'; 		

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo form_label('B. INFORMACIÓN DE FORMULARIO DE COMUNIDAD','P2',$label1);
								echo '<div class="controls span8">';
									echo form_dropdown('P2', $combo3, FALSE,'class="span12" id="P2"'); 
									echo '<div class="help-block error"></div>';
								echo '</div>';	
							echo '</div>';	
						echo '</div>'; 	

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo form_label('C. COORDINACIÓN  DE LA CONVOCATORIA','P3',$label1);
								echo '<div class="controls span8">';
									echo form_dropdown('P3', $combo3, FALSE,'class="span12" id="P3"'); 
									echo '<div class="help-block error"></div>';
								echo '</div>';	
							echo '</div>';	
						echo '</div>'; 									
			echo '</div>'; 	

			echo '<div class="offset1 span5">';
					echo '<h5>2. EMPADRONAMIENTO</h5>';		
						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo form_label('A. CONSECUCIÓN DE LOCAL','P4',$label1);
								echo '<div class="controls span8">';
									echo form_dropdown('P4', $combo2, FALSE,'class="span12" id="P4"'); 
									echo '<div class="help-block error"></div>';									
								echo '</div>';	
							echo '</div>';	
						echo '</div>'; 		

						echo '<div class="row-fluid">';
							echo '<div class="span12">';
									echo form_label('B. CONVOCATORIA','P5',$label1);
								echo '<div class="controls span8">';
									echo form_dropdown('P5', $combo2, FALSE,'class="span12" id="P5"'); 
									echo '<div class="help-block error"></div>';									
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
										echo form_input($P6); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('P6') . '</div>';
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
										echo form_input($P7); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('P7') . '</div>';
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
										echo form_input($P8); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('P8') . '</div>';
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
										echo form_input($P9); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('P9') . '</div>';
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
										echo form_input($P10); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('P10') . '</div>';
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
										echo form_input($P11); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('P11') . '</div>';
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
										echo form_dropdown('P12', $combo3, FALSE,'class="span12" id="P12"'); 
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
										echo form_input($P13); 
										echo '<span class="help-inline"></span>';
										echo '<div class="help-block error">' . form_error('P13') . '</div>';
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
							echo form_textarea($OBS_1); 
							echo '<span class="help-inline"></span>';
							echo '<div class="help-block error">' . form_error($OBS_1['name']) . '</div>';
						echo '</div>'; 	
				echo '</div>';
			echo '</div>'; 
				
		echo '</div>'; 		




//bucle
echo '<h5 style="text-align:center; margin-top:15px">5. DILIGENCIAMIENTO EN CAMPO</h5>';	
		
echo '<a class="btn btn-primary" id="addil">Añadir</a>';

echo '<div id="quest">';		

echo '</div>'; 


//modulo fin
echo '</div>'; 

// echo '<a class="btn btn-success pull-left" href="#" id="printt">Imprimir</a>';
echo form_submit('guardar', 'Guardar','class="btn btn-primary pull-right"');
echo form_close(); 
//imprimir
echo '</div>'; 
?>

<script type="text/javascript">

//FORM INFORME -------------------------------------------------------------------------------------------------------------------------------
var helper = {};
$(function(){

  $('#INF_N').blur(function (){
     n = $(this).val().toString();
     while(n.length < 2) n = "0" + n;
     return $(this).val(n);
  });


$(document).on("blur",'.nf',function() {
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


  $('#addil').click(function (){
  	dil(0);
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



$("#ODEI_COD").change(function(event) {
		var sel = $('#DEP_COD');
		var ah = $(this);
        var form_data = {
            csrf_token_c: CI.cct,
            code: ah.val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/inform_ajax/get_ajax_dep/" + $(this).val(),
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1"> - </option>');             
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.dep_cod + '">' + data.nombre + '</option>');
                });
                sel.trigger('change');
            }
        });   

}); 

$("#DEP_COD").change(function(event) {
		var sel = $('#PROV_COD');
		var ah = $(this);
		var aha = $("#ODEI_COD");

        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            dep: ah.val(),
            odei: aha.val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/marco_ajax/get_ajax_prov/" + aha.val() + '/' + ah.val(),
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1"> - </option>');             
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.CCPP + '">' + data.PROVINCIA + '</option>');
                });
                sel.trigger('change');
            }
        });   

}); 


$("#PROV_COD").change(function(event) {
		var sel = $('#DIST_COD');
		var ah = $(this);
		var aha = $("#ODEI_COD");
		var ahaa = $("#DEP_COD");

        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            odei: aha.val(),
            dep: ahaa.val(),
            prov: ah.val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/marco_ajax/get_ajax_dist/" + aha.val() + '/' + ahaa.val() + '/' + ah.val(),
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1"> - </option>');             
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.CCDI + '">' + data.DISTRITO + '</option>');
                });
                sel.trigger('change');
            }
        });   

}); 


$("#DIST_COD").change(function(event) {
		var sel = $('#CCPPCOD');
		var ah = $(this);
		var aha = $("#ODEI_COD");
		var ahaa = $("#DEP_COD");
		var ahaaa = $("#PROV_COD");

        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            odei: aha.val(),
            dep: ahaa.val(),
            prov: ahaaa.val(),
            dist: ah.val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/marco_ajax/get_ajax_ccpp/" + aha.val() + '/' + ahaa.val() + '/' + ahaaa.val() + '/' +  $(this).val(),
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1"> - </option>');             
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.CODCCPP + '">' + data.CENTRO_POBLADO + '</option>');
                });
                sel.trigger('change');
            }
        });   

}); 

//  $(document).on("dblclick",'.comba',function() {
// 		var sel = $(this);
//         var form_data = {
//             code: $(this).val(),
//             csrf_token_c: CI.cct,
//             ajax:1
//         };

//         $.ajax({
//             url: CI.base_url + "ajax/inform_ajax/get_ajax_a/",
//             type:'POST',
//             data:form_data,
//             dataType:'json',
//             success:function(json_data){
//                 sel.empty();
//                 sel.append('<option value="-1"> - </option>');             
//                 $.each(json_data, function(i, data){
//                     sel.append('<option value="' + data.val + '">' + data.nombre + '</option>');
//                 });
//             }
//         });   
// }); 

$(document).on("change",'.comba',function() {
// $(".comba").change(function(event) {





  		var pre = $(this).attr('id');
  		if(pre.length == 6)
  			var npreg = pre.substring(4,6);
  		else
  			var npreg = pre.substring(4,5);
		var sel = $('#P16' + '_' + npreg);
		var ah = $(this);

		//comunidades
		if(ah.val() == 14){
			$('#P15' + '_' + npreg).addClass('comunidades');
		}else{
			$('#P15' + '_' + npreg).removeClass('comunidades');
		}

        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            cl: ah.val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/inform_ajax/get_ajax_b/" + $(this).val(),
            type:'POST',
            data:form_data,
            async:false,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1"> - </option>');             
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.val + '">' + data.nombre + '</option>');
                });
                sel.trigger('change');
            }
        });   

}); 



$(document).on("change",'.combb',function() {
  		var pre = $(this).attr('id');
  		if(pre.length == 6)
  			var npreg = pre.substring(4,6);
  		else
  			var npreg = pre.substring(4,5);
		var sel = $('#P17' + '_' + npreg);
		var ah = $(this);
		var aha = $("#P14" + '_' + npreg);
        var form_data = {
            code: $(this).val(),
            csrf_token_c: CI.cct,
            ft: ah.val(),
            cl: aha.val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/inform_ajax/get_ajax_c/" + aha.val() + '/' + ah.val(),
            type:'POST',
            data:form_data,
            async:false,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1"> - </option>');             
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.val + '">' + data.nombre + '</option>');
                });

            }
        });   

}); 



function dil(nume){
  			var cont = nume;
  			var inic = 1;
			if(nume==0){
				var nexta = $("#quest").children().last().attr('id');
				if(nexta.length == 7)
					var pnpreg = parseInt(nexta.substring(5,7))
				else
					var pnpreg = parseInt(nexta.substring(5,6))
  				var npreg =  pnpreg + 1;				
				cont = npreg;
				inic = npreg;
			}
				for(var i = inic; i<=cont; i++){
            		var strq;
					strq = '<div id="test' + '_' + i + '" style="border:1px solid #EA0000; padding:5px;margin-top:2px;">';	
						strq +=  '<input type="hidden" value="" name="error_' + i + '" id="error_' + i + '">';
							strq +=  '<div class="row-fluid" style="text-align:center;">';
								strq +=  '<div class="span12" style="text-align:center">';		
									// strq +=  '<a class="btn btn-danger pull-right" id="remil">x</a>';
									strq +=  '<div class="span2">';		
											strq +=  '<p style="text-align:center; margin-top:30px">TIPO DE FORMULARIO</p>';		

														strq +=  '<div class="control-group">';
															strq +=  '<div class="controls">';
																strq +=  '<select id="P14' + '_' + i + '" class="span12 comba" name="P14' + '_' + i + '"><option value="-1">-</option></select>';
																strq +=  '<span class="help-inline"></span>';
															strq +=  '<div class="help-block error"></div>';
															strq +=  '</div>';	
														strq +=  '</div>'; 		
									strq +=  '</div>'; 

									strq +=  '<div class="span1">';		
											strq +=  '<p style="text-align:center; margin-top:30px">NRO FORM</p>';		

														strq +=  '<div class="control-group">';
															strq +=  '<div class="controls">';
																strq +=  '<input type="text" class="span12 nf" maxlength="5" id="P15' + '_' + i + '" value="" name="P15' + '_' + i + '">';
																strq +=  '<span class="help-inline"></span>';
																strq +=  '<div class="help-block error"></div>';
															strq +=  '</div>';	
														strq +=  '</div>'; 		
									strq +=  '</div>'; 

									strq +=  '<div class="span2">';		
											strq +=  '<p style="text-align:center; margin-top:30px">SECCIÓN</p>';		

														strq +=  '<div class="control-group">';
															strq +=  '<div class="controls">';
																strq +=  '<select id="P16' + '_' + i + '" class="span12 combb" name="P16' + '_' + i + '"><option value="-1">-</option></select>';										
																strq +=  '<span class="help-inline"></span>';
																strq +=  '<div class="help-block error"></div>';
															strq +=  '</div>';	
														strq +=  '</div>'; 		
									strq +=  '</div>'; 

									strq +=  '<div class="span2">';		
											strq +=  '<p style="text-align:center; margin-top:30px">PREGUNTA</p>';		

														strq +=  '<div class="control-group">';
															strq +=  '<div class="controls">';
																strq +=  '<select id="P17' + '_' + i + '" class="span12 combc" name="P17' + '_' + i + '"><option value="-1">-</option></select>';	
																strq +=  '<span class="help-inline"></span>';
																strq +=  '<div class="help-block error"></div>';
															strq +=  '</div>';	
														strq +=  '</div>'; 		
									strq +=  '</div>'; 

									strq +=  '<p style="text-align:center; margin-top:15px;">TIPO DE ERROR</p>';		

									strq +=  '<div class="span5">';		
													strq +=  '<div class="row-fluid">';

														strq +=  '<div class="span2">';		
															strq +=  '<div class="control-group">';
																strq +=  'CONCEPTO';
																strq +=  '<div class="controls">';
																	strq +=  '<input type="text" class="span12 terror" maxlength="1" id="P18' + '_' + i + '" value="" name="P18' + '_' + i + '">';
																	strq +=  '<span class="help-inline"></span>';
																	strq +=  '<div class="help-block error"></div>';
																strq +=  '</div>';	
															strq +=  '</div>'; 		
														strq +=  '</div>'; 	

														strq +=  '<div class="span3">';		
															strq +=  '<div class="control-group">';
																strq +=  'DILIGENCIAMIENTO';
																strq +=  '<div class="controls">';
																	strq +=  '<input type="text" class="span12 terror" maxlength="1" id="P19' + '_' + i + '" value="" name="P19' + '_' + i + '">';
																	strq +=  '<span class="help-inline"></span>';
																	strq +=  '<div class="help-block error"></div>';
																strq +=  '</div>';	
															strq +=  '</div>'; 		
														strq +=  '</div>'; 	

														strq +=  '<div class="span3">';		
															strq +=  '<div class="control-group">';
																strq +=  'FORMULACIÓN';
																strq +=  '<div class="controls">';
																	strq +=  '<input type="text" class="span12 terror" maxlength="1" id="P20' + '_' + i + '" value="" name="P20' + '_' + i + '">';
																	strq +=  '<span class="help-inline"></span>';
																	strq +=  '<div class="help-block error"></div>';
																strq +=  '</div>';	
															strq +=  '</div>'; 		
														strq +=  '</div>'; 

														strq +=  '<div class="span2">';		
															strq +=  '<div class="control-group">';
																strq +=  'SONDEO';										
																strq +=  '<div class="controls">';
																	strq +=  '<input type="text" class="span12 terror" maxlength="1" id="P21' + '_' + i + '" value="" name="P21' + '_' + i + '">';
																	strq +=  '<span class="help-inline"></span>';
																	strq +=  '<div class="help-block error"></div>';
																strq +=  '</div>';	
															strq +=  '</div>'; 		
														strq +=  '</div>'; 

														strq +=  '<div class="span2">';		
															strq +=  '<div class="control-group">';
																strq +=  'OMISIÓN';										
																strq +=  '<div class="controls">';
																	strq +=  '<input type="text" class="span12 terror" maxlength="1" id="P22' + '_' + i + '" value="" name="P22' + '_' + i + '">';
																	strq +=  '<span class="help-inline"></span>';
																	strq +=  '<div class="help-block error"></div>';
																strq +=  '</div>';	
															strq +=  '</div>'; 		
														strq +=  '</div>'; 	

													strq +=  '</div>'; 		
									strq +=  '</div>'; 


								strq +=  '</div>'; 
									
							strq +=  '</div>'; 	

							strq +=  '<div class="row-fluid">';
								strq +=  '<div class="span12">';		
									strq +=  '<div class="control-group">';
										strq +=  '<p style="text-align:center">OBSERVACIONES</p>';
											strq +=  '<div class="controls">'; 
												strq +=  '<textarea class="span12" maxlength="1000" id="OBS_2' + '_' + i + '" rows="1" cols="40" name="OBS_2' + '_' + i + '"></textarea>'; 
												strq +=  '<span class="help-inline"></span>';
												strq +=  '<div class="help-block error"></div>';
											strq +=  '</div>'; 	
									strq +=  '</div>';
								strq +=  '</div>'; 
									
							strq +=  '</div>'; 
					strq +=  '</div>'; 
					$('#quest').append(strq);
					// $('#P14' + '_' + i).trigger('dblclick');	
					var sel = $('#P14' + '_' + i);
					$.each(<?php echo $comboe; ?>, function(j, data){
                    	sel.append('<option value="' + data.val + '">' + data.nombre + '</option>');
                	});
				}		

}



//especifique por que pescador
$('#P6, #P7').change(function() {
	valor = $('#P6').val();
	peam = $('#P7').val();
	$('#P8').val(Math.round(valor * 100 / peam));
});

$('#P12').change(function() {
	if($(this).val() == 1){
		$('#P13').val('');
		$('#P13').removeAttr('disabled');
	}else{
		$('#P13').attr('disabled', 'disabled');
	}
});

///////////////////////////////////////////////////////////////////////////////////////////////////////
//CAMPOS DESHABILIADOS
///////////////////////////////////////////////////////////////////////////////////////////////////////
$('#P13').attr('disabled', 'disabled');

///////////////////////////////////////////////////////////////////////////////////////////////////////
//
///////////////////////////////////////////////////////////////////////////////////////////////////////


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
}, "Solo 1 formulario por comunidad");

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

//validacion inform
$("#inform").validate({
    rules: {
        INF_N:{
            required: true,
            exactlength: 2,
			digits: true,
			valueNotEquals: 0,
         }, 
        EMPX: {
            required: true,
            valueNotEquals: -1,
         }, 
       F_DIA: {
            required: true,
           	valdia:true,
         }, 
       F_MES: {
           required: true,
           valmescen:true,
         },   
       ODEI_COD: {
           required: true,
           valueNotEquals: -1,
         },  
        DEP_COD: {
           required: true,
           valueNotEquals: -1,
         },   
       PROV_COD: {
           required: true,
           valueNotEquals: -1,
         },  
        DIST_COD: {
           required: true,
           valueNotEquals: -1,
         },      
        CCPP_COD: {
           required: true,
           valueNotEquals: -1,
         },                                                                                                    
//FIN RULES
    },

    messages: {
    	INF_N:{
    		required: 'Ingrese Nro Formulario',
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
			var inform_data = $("#inform").serializeArray();
				inform_data.push(
					{name: 'ajax',value:1},							        
					{name: 'N_SUP',value:$('#DNI_SUP :selected').text()},
					{name: 'ODEI',value:$('#ODEI_COD :selected').text()},
					{name: 'DEP',value:$('#DEP_COD :selected').text()},    
					{name: 'PROV',value:$('#PROV_COD :selected').text()},    
					{name: 'DIST',value:$('#DIST_COD :selected').text()},    
					{name: 'CCPP',value:$('#CCPPCOD :selected').text()}    
				);
									
				var bsub2 = $( "#inform :submit" );
				$.ajax({
						url: CI.base_url + "digitacion/informe/consulta",
						type:'POST',
						data:inform_data,
						dataType:'json',
						success:function(json){
							if(json.flag == 1){
								$("#inform :input").attr("disabled", true);  
								$('#serrors').removeClass('hide');	
								$("input[name='informid']").val(json.supform.id);	
								// $('#P7').val(json.isup.MARCO);															
								// $('#P9').val(json.isup.EQUIPO);																
								// $('#P10').val(json.isup.RUTA);																
								// $('#P11').val(json.isup.CCPPCONCOD);																
								$.each(json.supform, function( fila, valor ) {
	                                if(fila == 'P12' || fila == 'P6' || fila == 'P7'){
	                                     $('#' + fila).val(valor);
	                                     $('#' + fila).trigger('change');
	                                // }else if( fila != 'P7' && fila != 'P9' && fila != 'P10' && fila != 'P11'){
	                                 }else{
	                                     $('#' + fila).val(valor);
	                                }  				
                                });						
								//errors

								if(json.numerrors > 0){
									dil(json.numerrors);
									var intervalos = null;
									var intervalosx = null;
									
									for(var j = 0; j < json.numerrors; j++){
										$.each(json.errors[j], function( fila, valor ) {
											k = j+1;
			                                if(fila == 'P14' || fila == 'P16'){
                                                $('#' + fila + '_' + k).val(valor);
                                                $('#' + fila + '_' + k).trigger('change');
											}else if(fila == 'P17'){

												subv = valor.split(".");
												var mval;
													if(subv[1] == null){
														mval = valor;
													}else if(subv[1].length == 1){
														mval = valor;
													}else if(subv[1].length == 2){
														if(subv[1] == '00'){
															mval = subv[0];
														}														
														else if(subv[1].substring(1,2) == '0' && valor!='23.10'){
															mval = subv[0] + '.' + subv[1].substring(0,1);	
														}else{
															mval = valor;
														}
													}
			                                   $('#' + fila + '_' + k).val(mval);
			                                }else if(fila == 'id'){
			                                   $('#error_' + k).val(valor);
			                                }else{
			                                    $('#' + fila + '_' + k).val(valor);
			                                }  		
			                                

		                                });	
									}
								}else{
									dil(1);
								}
								alert(json.msg);
							}else if(json.flag == 2){	
								alert(json.msg);						
								$('#inform').trigger('submit');													
							}else if(json.flag == 3){
								alert(json.msg);
							}	


						}
			});   
          	
    }       
});







$.validator.addClassRules('terror', {
  required: true,
  range:[0,1],
});

$.validator.addClassRules('comba', {
  required: true,
  valueNotEquals:-1,
});

$.validator.addClassRules('combb', {
  required: true,
  valueNotEquals:-1,
});

$.validator.addClassRules('combc', {
  required: true,
  valueNotEquals:-1,
});

$.validator.addClassRules('comunidades', {
  required: true,
  valueEquals: '00001',
});
//validacion inform
$("#serrors").validate({
    rules: {
        P1:{
            required: true,
            valueNotEquals: -1,
         }, 
        P2: {
            required: true,
            valueNotEquals: -1,
         }, 
       P3: {
            required: true,
            valueNotEquals: -1,
         }, 
       P4: {
            required: true,
            valueNotEquals: -1,
         }, 
       P5: {
           required: true,
           valueNotEquals: -1,
         },  
        P6: {
           required: true,
           range: [0,1000],
         },   
        P7: {
           required: true,
           range: [0,1000],
         },     
        P9: {
           required: true,
           digits: true,
         },    
        P10: {
           required: true,
           digits: true,
         },     
        P11: {
           required: true,
           digits: true,
         },                               
       P12: {
           required: true,
           valueNotEquals: -1,
         },  
        P13: {
        	required:true,
           maxlength: 80,
           validName: true,
         },  
        OBS_1: {
           maxlength: 1000,
         },                                                                                                                 
//FIN RULES
    },

    messages: {
    	INF_N:{
    		required: 'Ingrese Nro Formulario',
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

			var nexta = $("#quest").children().last().attr('id');
  			var npreg = parseInt(nexta.substring(5,7));	
			var inform_data = $("#serrors").serializeArray();
				inform_data.push(
					{name: 'ajax',value:1},
					{name: 'nerror',value:npreg}
				);			
			$.ajax({
					url: CI.base_url + "digitacion/informe/actualiza",
					type:'POST',
					data:inform_data,
					dataType:'json',
					success:function(json){
						if(json.flag == 1){															
							alert(json.msg);																	
						}else if(json.flag == 2){							
							alert(json.msg);														
						}	

					}
			});   
          	
    }       
});


$('#printt').click(function(){
	$('#imprimir').show().printElement();
})











 }); 







// CARGA COMBOS UBIGEO <-----------------------------
//-------------------------------------------------------------------------------------------------------------------------------

</script>