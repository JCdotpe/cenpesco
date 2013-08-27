<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/pescador/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="freg">
    	<h4>VERIFICAR TIENE CONEXIÓN DE CABLE PERO NO CUENTA CON TELEVISOR A COLOR O TIENE CONEXIÓN A INTERNET Y NO CUENTA CON COMPUTADORA</h4>
    	<?php
				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th></th>';					
						echo '<th>SEDE</th>';					
						echo '<th>DEPARTAMENTO</th>';										
						echo '<th>PROVINCIA</th>';						
						echo '<th>DISTRITO</th>';									
						echo '<th>CENTRO POBLADO</th>';						
						echo '<th>FORMULARIO N°</th>';
						echo '<th>Su vivienda cuenta con: Televisor a color</th>';																											
						echo '<th>¿Los servicios de comunicación con que cuenta su vivienda son: Conexión a tv por cable?</th>';																											
						echo '<th>Su vivienda cuenta con: Computadora</th>';																											
						echo '<th>¿Los servicios de comunicación con que cuenta su vivienda son: Conexion a internet?</th>';																											
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
						echo "<td>". $row->S3_902 ."</td>";																	
						echo "<td>". $row->S3_1004 ."</td>";																	
						echo "<td>". $row->S3_908 ."</td>";																	
						echo "<td>". $row->S3_1003 ."</td>";																	
						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';

		?>
	</div>
</div>
