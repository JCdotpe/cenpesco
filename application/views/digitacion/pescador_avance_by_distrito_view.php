<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('digitacion/includes/sidebar_reportes_view');?>           
    </div><!--/span-->



    <div class="span10" id="freg">

    	<?php

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>CODIGO</th>';
						echo '<th>ODEI</th>';						
						// echo '<th>CODIGO</th>';
						// echo '<th>DEPARTAMENTO</th>';
						echo '<th>CODIGO</th>';
						echo '<th>PROVINCIA</th>';
						echo '<th>CODIGO</th>';
						echo '<th>DISTRITO</th>';
						echo '<th>CODIGO</th>';
						echo '<th>CENTRO POBLADO</th>';
						echo '<th>UDRA</th>';
						echo '<th>COMPLETOS</th>';
						echo '<th>AVANCE</th>';
						echo '<th>INCOMPLETOS</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					$i = 1;
					$nform = null;
					foreach($tables as $row){
						echo "<tr>";
						echo "<td>". $i++."</td>";
						echo "<td>". $row->ODEI_COD ."</td>";
						echo "<td>". $row->NOM_ODEI ."</td>";						
						// echo "<td>". $row->CCDD ."</td>";
						// echo "<td>". $row->DEPARTAMENTO ."</td>";
						echo "<td>". $row->CCPP ."</td>";
						echo "<td>". $row->PROVINCIA ."</td>";
						echo "<td>". $row->CCDI ."</td>";
						echo "<td>". $row->DISTRITO ."</td>";
						echo "<td>". $row->COD_CCPP ."</td>";
						echo "<td>". $row->CENTRO_POBLADO ."</td>";
						echo "<td>". $row->FORMULARIOS ."</td>";

						if (isset($formularios)){
							foreach ($formularios->result() as $key ) {
								if (($row->CCDD == $key->CCDD) && ($row->CCPP == $key->CCPP) && ($row->CCDI == $key->CCDI) && ($row->COD_CCPP == $key->COD_CCPP)){
									$nform =  $key->NFORM;
									break;
								}
							}
							if (is_numeric($nform)){
								echo "<td>". $nform ."</td>";
								echo "<td>". number_format( ($nform*100)/$row->FORMULARIOS) ." %</td>";	
							}else{
								echo "<td> ". 0 ."</td>";
								echo "<td> ". 0 ."%</td>";								
							}

						}else{
								echo "<td> ". 0 ."</td>";
								echo "<td> ". 0 ."%</td>";	
						}


						if (isset($formularios_inc)){
							foreach ($formularios_inc->result() as $key ) {
								if ( ($row->ODEI_COD == $key->ODEI_COD) && ($row->CCDD == $key->CCDD) && ($row->CCPP == $key->CCPP) && ($row->CCDI == $key->CCDI) && ($row->COD_CCPP == $key->COD_CCPP)){
									$nform2 =  $key->NFORM;
									break;
								}
							}
							if (is_numeric($nform2)){
								echo "<td>". $nform2 ."</td>";
								$nform2 = NULL;
							}else{
								echo "<td> ". 0 ."</td>";
							}
						}else{
							echo "<td> ". 0 ."</td>";
						}

						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';

		echo '<div class="span3 preguntas titulos">';
			echo '<h5>UDRA TOTAL  : &nbsp;&nbsp;&nbsp;'.$udra_total->row()->FORMULARIOS.'</h5>';
		echo '</div>';	
		echo '<div class="offset1 span3 preguntas titulos">';
			echo '<h5>TOTAL REGISTRADOS : &nbsp;&nbsp;&nbsp;'.$registros_total->row()->NFORM.'</h5>';
		echo '</div>';	
		echo '<div class="offset1 span2 preguntas titulos">';
			echo '<h5>AVANCE : &nbsp;&nbsp;&nbsp;'.number_format(($registros_total->row()->NFORM*100)/$udra_total->row()->FORMULARIOS).'%</h5>';
		echo '</div>';	

		?>

    </div>

</div>