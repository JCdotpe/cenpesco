<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/comunidad/includes/sidebar_view');?>       
    </div><!--/span-->



    <div class="span10" id="freg">

    	<h4>VERIFICACION DEL NUMERO DE INSTITUCIONES EDUCATIVAS EN LA COMUNIDAD MAYOR A 10 (P1  DE LA SECCION IV)</h4>
    	<?php

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>COD</th>';
						echo '<th>SEDE</th>';
						echo '<th>CCDD</th>';						
						echo '<th>DEPARTAMENTO</th>';						
						echo '<th>CCPP</th>';						
						echo '<th>PROVINCIA</th>';
						echo '<th>CCDI</th>';						
						echo '<th>DISTRITO</th>';						
						echo '<th>COD CCPP</th>';						
						echo '<th>CENTRO POBLADO</th>';						
						echo '<th>FORMULARIO N°</th>';
						echo '<th>TODAS LAS PREGUNTAS QUE TENGAN RESPUESTA EN LA ALTERNATIVA OTROS</th>'; 
						echo '<th>LITERAL DE LAS ESPECIFICACIONES</th>';

																																				
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					$i = 1;
					$k = 1;

					foreach($tables as $row){
						echo "<tr>";
						echo "<td>". $i++."</td>";						
						foreach($row as $key => $value){
							if ( $k <= 11) {
								echo "<td>". $value ."</td>";
							} else if ( $k == 12) {
								echo "<td>". $key ."</td>";
								echo "<td>". $value ."</td>";
							}
							$k++;
						}
						$k = 1;
						echo "</tr>"; 



					 }
					echo '</tbody>';
				echo '</table>';

	

		?>

    </div>

</div>