<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('consistencia/comunidad/includes/sidebar_view');?>       
    </div><!--/span-->



    <div class="span10" id="freg">

    	<h4>VERIFICACION DE P1 DE SECCION IV EL  NUMERO DE INSTITUCIONES EDUCATIVAS EN LA COMUNIDAD Y LOS NIVELES EDUCATIVOS DE LA P2 DE LA SECCION IV</h4>
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
						echo '<th> ¿Existen instituciones educativas? Cuantos (S4_1_C) </th>';
						echo '<th> Los niveles que brindan estas instituciones educativas son: (S4_2_1) </th>';
						echo '<th> Los niveles que brindan estas instituciones educativas son: (S4_2_2) </th>';
						echo '<th> Los niveles que brindan estas instituciones educativas son: (S4_2_3) </th>';
						echo '<th> Los niveles que brindan estas instituciones educativas son: (S4_2_4) </th>';
						echo '<th> Los niveles que brindan estas instituciones educativas son: (S4_2_5) </th>';
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
						echo "<td>". $row->S4_1_C ."</td>";																																															
						echo "<td>". $row->S4_2_1 ."</td>";																																															
						echo "<td>". $row->S4_2_2 ."</td>";																																															
						echo "<td>". $row->S4_2_3 ."</td>";																																															
						echo "<td>". $row->S4_2_4 ."</td>";																																															
						echo "<td>". $row->S4_2_5 ."</td>";																																															

						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';

	

		?>

    </div>

</div>