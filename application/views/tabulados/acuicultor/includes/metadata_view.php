<div class="row-fluid"  style="padding-bottom:10px;padding-top:10px" >

<?php if(!isset($tipo_acuicultor) ) { ?>
<table id="tab_meta"  >
	<tr>
		<td width="30px"><h5>TABULADO </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_tabulado" name="txt_tabulado" rows="1" cols="160"><?php echo $txt_tabulado; ?></textarea></td>
	</tr>
	<tr>
		<td width="30px"><h5>CONTENIDO </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_contenido" name="txt_contenido" rows="1" cols="160"><?php echo $txt_contenido; ?></textarea></td>
	</tr>
	<tr>
		<td width="30px"><h5>CASOS </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_casos" name="txt_casos" rows="1" cols="160"><?php echo $txt_casos; ?></textarea></td>
	</tr>
	<tr>
		<td width="30px"><h5>VARIABLES </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_variables" name="txt_variables" rows="1" cols="160"><?php echo $txt_variables; ?></textarea></td>
	</tr>
	<tr>
		<td width="30px"><h5>ALTERNATIVAS </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_alternativas" name="txt_alternativas" rows="1" cols="160"><?php echo $txt_alternativas; ?></textarea></td>
	</tr>
	<tr>
		<td width="30px"><h5>OTRO </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_otro" name="txt_otro" rows="1" cols="160"><?php echo $txt_otro; ?></textarea></td>
	</tr>		
	<tr>
		<td width="30px"><h5>DATOS FALTANTES </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_faltantes" name="txt_faltantes" rows="1" cols="160"><?php echo $txt_faltantes; ?></textarea></td>
	</tr>
	<tr>
		<td width="30px"><h5>PRODUCTOR </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_productor" name="txt_productor" rows="1" cols="160"><?php echo $txt_productor; ?></textarea></td>
	</tr>		
	<tr>
		<td width="30px"><h5>DEFINICIONES </h5></td><td colspan="10" style="padding-left:2em"><textarea class="span12" id="txt_definiciones" name="txt_definiciones" rows="8" cols="160"><?php echo $txt_definiciones; ?></textarea></td>
	</tr>
</table>
<?php }?>
</div>

<div class="row-fluid"  style="padding-bottom:10px;padding-top:7px" >
	<input type="submit" class="btn btn-success pull-left" id="excel" value="↓ Excel" name="excel">
	<?php if(!isset($tipo_acuicultor)){?> <input type="button" class="btn btn-primary pull-right" id="btn_metadata" name="btn_metadata" value="Guardar" name="guardar"> <?php }?>
	<!-- <input type="hidden"  id="metadata_div"  name="metadata_div" > -->

</div>


<script type="text/javascript">

$(function(){


      	//carga la tabla dentro del objeto
      	//$("#metadata_div").val( $("<div>").append( $("#tab_meta").eq(0).clone()).html());

      	//Deshabilitar comentario
		<?php
      		if($restriccion){//para usuarios no permitidos (solo: Alan, Susan, Cecilia)
      	?>
      		$("#txt_tabulado").attr('readonly','readonly');
      		$("#txt_contenido").attr('readonly','readonly');
      		$("#txt_casos").attr('readonly','readonly');
      		$("#txt_variables").attr('readonly','readonly');
      		$("#txt_alternativas").attr('readonly','readonly');
      		$("#txt_otro").attr('readonly','readonly');
      		$("#txt_faltantes").attr('readonly','readonly');
      		$("#txt_productor").attr('readonly','readonly');
      		$("#txt_definiciones").attr('readonly','readonly');
      		$("#btn_metadata").addClass('hide');
      	<?php
      		}
      	?>

	
		$('#btn_metadata').click(function() {

				    var t_data = {
			            csrf_token_c: CI.cct,
			            txt_tabulado: $("#txt_tabulado").val(),
			            txt_contenido: $("#txt_contenido").val(),
			            txt_casos: $("#txt_casos").val(),
			            txt_variables: $("#txt_variables").val(),
			            txt_alternativas: $("#txt_alternativas").val(),
			            txt_otro: $("#txt_otro").val(),
			            txt_faltantes: $("#txt_faltantes").val(),
			            txt_productor: $("#txt_productor").val(),
			            txt_definiciones: $("#txt_definiciones").val(),
			            preg: <?php echo $opcion; ?>,
			            tipo: 2,
			            ajax:1							    	   
				    };
					
			        var bsub3 = $(this);
			        bsub3.attr("disabled", "disabled");

			        $.ajax({
			            url: CI.base_url + "tabulados/acuicultor/metadata",
			            type:'POST',
			            data:t_data,
			            success:function(){
			            	alert('Se guardó con éxito.');
							bsub3.removeAttr('disabled');
			            }
			        });   

					
 		}); 	

 }); 		

</script>