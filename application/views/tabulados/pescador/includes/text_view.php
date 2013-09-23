<textarea class="span12" id="textn" rows="10"><?php echo $texto; ?></textarea>
<input type="button" class="btn btn-primary pull-right" id="btab" value="Guardar" name="guardar">

<script type="text/javascript">

$(function(){
		$('#btab').click(function() {

							    var t_data = {
						            csrf_token_c: CI.cct,
						            texto: $("#textn").val(),
						            preg: <?php echo $opcion; ?>,
						            tipo: 1,
						            ajax:1							    	   
							    };
								
						        var bsub3 = $(this);
						        bsub3.attr("disabled", "disabled");

						        $.ajax({
						            url: CI.base_url + "tabulados/pescador/texto",
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