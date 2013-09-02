<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/comunidad/includes/sidebar_view');?>       
    </div><!--/span-->



    <div class="span10" id="freg">

    	<h4>VERIFICACION LA P1 DE LA SECCION VII INDICA QUE SE DEDICA A LA ACTIVIDAD DE ACUICULTURA CONTINENTAL PERO EN LA P7 DE LA MISMA SECCION INDICAN QUE NO CULTIVAN
</h4>
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
						echo '<th>"¿Los miembros de la comunidad se dedican a la actividad de: acuicultura continental? (S7_1_2 )" </th>';
						echo '<th>"¿Qué especies acuicolas generalmente crian en la comunidad? No cultivan (S7_7_16 )"</th>';
																																				
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					$i = 1;

					foreach($tables->result() as $row){
						echo "<tr>";
						echo "<td>". $i++."</td>";
						echo "<td>". $row->SEDE_COD ."</td>";
						echo "<td>". $row->NOM_SEDE ."</td>";
						echo "<td>". $row->CCDD ."</td>";						
						echo "<td>". $row->NOM_DD ."</td>";						
						echo "<td>". $row->CCPP ."</td>";
						echo "<td>". $row->NOM_PP ."</td>";
						echo "<td>". $row->CCDI ."</td>";
						echo "<td>". $row->NOM_DI ."</td>";
						echo "<td>". $row->COD_CCPP ."</td>";	
						echo "<td>". $row->NOM_CCPP ."</td>";	
						echo "<td>". $row->NFORM ."</td>";
						echo "<td>". $row->S7_1_2 ."</td>";																																															
						echo "<td>". $row->S7_7_16 ."</td>";																																															

						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';

	

		?>

    </div>

</div>