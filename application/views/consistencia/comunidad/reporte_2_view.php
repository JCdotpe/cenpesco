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
						echo '<th>SEDE</th>';
						echo '<th>DEPARTAMENTO</th>';						
						echo '<th>PROVINCIA</th>';
						echo '<th>DISTRITO</th>';						
						echo '<th>CENTRO POBLADO</th>';						
						echo '<th>FORMULARIO N°</th>';
						echo '<th>En la comunidad, ¿Existen instituciones educativas? (S4_1_C)</th>';

																																				
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
						echo "<td>". $row->S4_1_C ."</td>";																																															

						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';

	

		?>

    </div>

</div>