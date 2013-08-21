<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/comunidad/includes/sidebar_view');?>       
    </div><!--/span-->



    <div class="span10" id="freg">

    	<h4>VERIFICACION DEL TIEMPO QUE DEMORAN PARA TRASLADRSE DE SU COMUNIDAD A LA CAPITAL DISTRITAL MENOS DE 20 MINUTOSY MAYOR A 10 HORAS (P20 DE SECCION III)</h4>
    	<?php

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>SEDE</th>';
						echo '<th>DEPARTAMENTO</th>';						
						echo '<th>PROVINCIA</th>';
						echo '<th>DISTRITO</th>';						
						echo '<th>CENTRO POBLADO</th>';						
						echo '<th>FORMULARIO N°</th>';

						echo '<th>Tiempo de demora en horas: A pie (S3_21_1_1_H)</th>';
						echo '<th>Tiempo de demora en minutos: A pie (S3_21_2_1_M)</th>';

						echo '<th>Tiempo de demora en horas: acemila (S3_21_1_2_H)</th>';
						echo '<th>Tiempo de demora en minutos: acemila (S3_21_2_2_M)</th>';

						echo '<th>Tiempo de demora en horas: mototaxi (S3_21_1_3_H)</th>';
						echo '<th>Tiempo de demora en minutos: mototaxi (S3_21_2_3_M)</th>';						

						echo '<th>Tiempo de demora en horas: auto (S3_21_1_4_H)</th>';
						echo '<th>Tiempo de demora en minutos: auto (S3_21_2_4_M)</th>';	

						echo '<th>Tiempo de demora en horas: camioneta (S3_21_1_5_H)</th>';
						echo '<th>Tiempo de demora en minutos: camioneta (S3_21_2_5_M)</th>';	

						echo '<th>Tiempo de demora en horas: lancha (S3_21_1_6_H)</th>';
						echo '<th>Tiempo de demora en minutos: lancha (S3_21_2_6_M)</th>';	

						echo '<th>Tiempo de demora en horas: canoa, balsa (S3_21_1_7_H)</th>';
						echo '<th>Tiempo de demora en minutos: canoa, balsa (S3_21_2_7_M)</th>';	

						echo '<th>Tiempo de demora en horas: via ferrea (S3_21_1_8_H)</th>';
						echo '<th>Tiempo de demora en minutos: via ferrea (S3_21_2_8_M)</th>';	

						echo '<th>Tiempo de demora en horas: via area (S3_21_1_9_H)</th>';
						echo '<th>Tiempo de demora en minutos: via area (S3_21_2_9_M)</th>';	
																																				
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					$i = 1;

					foreach($tables->result() as $row){
						echo "<tr>";
						echo "<td>". $i++."</td>";
						echo "<td>". $row->NOM_SEDE ."</td>";
						echo "<td>". $row->NOM_DD ."</td>";						
						echo "<td>". $row->NOM_PP ."</td>";
						echo "<td>". $row->NOM_DI ."</td>";
						echo "<td>". $row->NOM_CCPP ."</td>";	
						echo "<td>". $row->NFORM ."</td>";
						echo "<td>". $row->S3_21_1_1_H ."</td>";												
						echo "<td>". $row->S3_21_2_1_M ."</td>";
						echo "<td>". $row->S3_21_1_2_H ."</td>";												
						echo "<td>". $row->S3_21_2_2_M ."</td>";
						echo "<td>". $row->S3_21_1_3_H ."</td>";												
						echo "<td>". $row->S3_21_2_3_M ."</td>";
						echo "<td>". $row->S3_21_1_4_H ."</td>";												
						echo "<td>". $row->S3_21_2_4_M ."</td>";
						echo "<td>". $row->S3_21_1_5_H ."</td>";												
						echo "<td>". $row->S3_21_2_5_M ."</td>";
						echo "<td>". $row->S3_21_1_6_H ."</td>";												
						echo "<td>". $row->S3_21_2_6_M ."</td>";
						echo "<td>". $row->S3_21_1_7_H ."</td>";												
						echo "<td>". $row->S3_21_2_7_M ."</td>";
						echo "<td>". $row->S3_21_1_8_H ."</td>";												
						echo "<td>". $row->S3_21_2_8_M ."</td>";
						echo "<td>". $row->S3_21_1_9_H ."</td>";												
						echo "<td>". $row->S3_21_2_9_M ."</td>";																																				

						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';

	

		?>

    </div>

</div>