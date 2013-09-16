<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('digitacion/includes/sidebar_reportes_view');?>       
    </div><!--/span-->



    <div class="span10" id="freg">

    	<h4>REPORTE DE AVANCE DE DIGITACION DE FORMULARIO PESCADOR INCOMPLETOS</h4>
    	<?php

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>INGRESADO</th>';
						echo '<th>COD</th>';
						echo '<th>SEDE</th>';
						echo '<th>ID </th>';
						echo '<th>DIGITADOR</th>';												
						echo '<th>CCDD</th>';
						echo '<th>DEPARTAMENTO</th>';
						echo '<th>CCPP</th>';
						echo '<th>PROVINCIA</th>';
						echo '<th>CCDI</th>';
						echo '<th>DISTRITO</th>';
						echo '<th>COD CCPP</th>';
						echo '<th>CENTRO POBLADO</th>';
						echo '<th>N° FORM</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';


					$i = 1;
					if (isset($formularios_inc) ){
						foreach($formularios_inc->result() as $row){
							echo "<tr>";
							echo "<td>". $i++."</td>";
							echo "<td>". $row->created ."</td>";
							echo "<td>". $row->sede_cod ."</td>";						
							echo "<td>". $row->nom_sede ."</td>";						
							echo "<td>". $row->user_id ."</td>";
							echo "<td>". $row->nombres ."</td>";
							echo "<td>". $row->ccdd ."</td>";
							echo "<td>". $row->nom_dd ."</td>";
							echo "<td>". $row->ccpp ."</td>";
							echo "<td>". $row->nom_pp ."</td>";
							echo "<td>". $row->ccdi ."</td>";
							echo "<td>". $row->nom_di ."</td>";
							echo "<td>". $row->cod_ccpp ."</td>";
							echo "<td>". $row->nom_ccpp ."</td>";
							echo "<td>". $row->nform ."</td>";
							echo "</tr>"; 
						 }
					}
					echo '</tbody>';
				echo '</table>';

		// echo '<div class="span3 preguntas titulos">';
		// 	echo '<h5>UDRA TOTAL  : &nbsp;&nbsp;&nbsp;'.$udra_total->row()->FORMULARIOS.'</h5>';
		// echo '</div>';	
		// echo '<div class="offset1 span3 preguntas titulos">';
		// 	echo '<h5>TOTAL REGISTRADOS : &nbsp;&nbsp;&nbsp;'.$registros_total->row()->NFORM.'</h5>';
		// echo '</div>';	
		// echo '<div class="offset1 span2 preguntas titulos">';
		// 	echo '<h5>AVANCE : &nbsp;&nbsp;&nbsp;'.number_format(($registros_total->row()->NFORM*100)/$udra_total->row()->FORMULARIOS).'%</h5>';
		// echo '</div>';	

		?>

    </div>

</div>