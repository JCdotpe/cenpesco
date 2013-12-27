<textarea class="span12" id="textn" name="textn" rows="5"><?php echo $texto; ?></textarea>

<div class="row-fluid"  style="padding-bottom:10px;padding-top:7px" >
	<!-- <input type="submit" class="btn btn-success pull-left" id="excel" value="↓ Excel" name="excel"> -->
	<input type="button" class="btn btn-primary pull-right" id="btab" value="Guardar" name="guardar">
	<input type="hidden"  id="excel_div"  name="excel_div" >
	<input type="hidden"  id="reporte_n"  name="reporte_n" value= <?php  echo $opcion; ?> >	 
</div>

<script type="text/javascript">

	$(function(){
		//Mueve la fila de los totales al inicio de los deps
		$.fn.extend({ 
		  moveRow: function(oldPosition, newPosition) { 
		    return this.each(function(){ 
		      var row = $(this).find('tr').eq(oldPosition).remove(); 
		      $(this).find('tr').eq(newPosition).before(row); 
		    }); 
		   } 
		 }); 

		$('#tablet').moveRow(27, 3);

		
      	//carga la tabla dentro del objeto
      	$("#excel_div").val( $("<div>").append( $("#tablet").eq(0).clone()).html());

      	//Deshabilitar comentario
		<?php
      		if($restriccion){//para usuarios no permitidos (solo: Alan, Susan, Cecilia)
      	?>
      		$("#textn").attr('readonly','readonly');
      		$("#btab").addClass('hide');
      	<?php
      		}
      	?>

			$('#btab').click(function() {

					    var t_data = {
				            csrf_token_c: CI.cct,
				            texto: $("#textn").val(),
				            preg: <?php echo $opcion; ?>,
				            tipo: 3,
				            ajax:1							    	   
					    };
				        var bsub3 = $(this);
				        bsub3.attr("disabled", "disabled");

				        $.ajax({
				            url: CI.base_url + "tabulados/comunidad/texto",
				            type:'POST',
				            data:t_data,
				            success:function(){
				            	alert('Se guardo con éxito.');
								bsub3.removeAttr('disabled');
				            }
				        });   
						
	 		}); 

	 }); 						
</script>