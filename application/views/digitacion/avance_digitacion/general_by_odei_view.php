<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('digitacion/includes/sidebar_reportes_view');?>       
    </div><!--/span-->



    <div class="span10" id="freg">

    	<h4>REPORTE DE AVANCE DE DIGITACION GENERAL</h4>
    	<?php

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>CODIGO</th>';
						echo '<th>ODEI</th>';						
						echo '<th>PEA GENERAL</th>';
						echo '<th>UDRA</th>';
						echo '<th>DIGITACIÓN</th>';
						echo '<th>% AVANCE DE DIGITACION</th>';
						echo '<th>%  COMPARATIVO DE UDRA Y MARCO</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					//TOTALES
						echo "<tr>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td>TOTAL</td>";
						$total_1 = 0;
						$total_2 = 0;
						$total_3 = 0;
						$tot_udra_acui = 0;
						$tot_udra_pes = 0;
						$tot_dig_acui = 0;
						$tot_dig_pes = 0;
						foreach($tables as $row){ //TOTAL MARCO PES GENERAL
							$total_1 = $total_1 + $row->TOTAL_GEN;
						}
						echo "<td>". $total_1 . "</td>";

						foreach ($udra_acui->result() as $key ) {// TOTAL UDRA acuicultor
								$tot_udra_acui = $tot_udra_acui +  $key->TOTAL_FORM; 
						}
						foreach ($udra_pes->result() as $key ) {// TOTAL UDRA pescador
								$tot_udra_pes = $tot_udra_pes +  $key->TOTAL_FORM; 
						}
						$total_2 = $tot_udra_acui + $tot_udra_pes;
						echo "<td>". $total_2 ."</td>"; // UDRA PES + UDRA ACUI

						if (isset($formularios_acui)){
							foreach ($formularios_acui->result() as $key ) { //TOTAL ACUI DIGITADOS
									$tot_dig_acui = $tot_dig_acui +  $key->TOTAL_DIG;
							}	
						}
						if (isset($formularios_pes)){
							foreach ($formularios_pes->result() as $key ) { //TOTAL PES DIGITADOS
									$tot_dig_pes = $tot_dig_pes +  $key->TOTAL_DIG;
							}	
						}
						$total_3 = $tot_dig_acui + $tot_dig_pes;
						echo "<td>" . $total_3 ."</td>";  // DIG ACUI + DIG PES

						if ( $total_2>0){
							echo "<td>". number_format( ($total_3*100)/$total_2 , 2,'.' ,'') ." %</td>";								
						}else{
							echo "<td> 0.00% </td>";
						}

						if ( $total_1>0){
							echo "<td><strong>". number_format( ($total_2*100)/$total_1 , 2,'.' ,'') ." %</strong></td>";								
						}else{
							echo "<td> 0.00% </td>";
						}
						echo "</tr>";
					// TOTALES

					$i = 1;
					$nform_udra_acui = null;
					$nform_udra_pes = null;
					$nform_udra_gen = null;
					$nform_dig_acui = null;
					$nform_dig_pes = null;
					$nform_dig_gen = null;
					foreach($tables as $row){
						echo "<tr>";
						echo "<td>". $i++."</td>";
						echo "<td>". $row->ODEI_COD ."</td>";
						echo "<td>". $row->NOM_ODEI ."</td>";						
						echo "<td>". $row->TOTAL_GEN ."</td>";

						if (isset($udra_acui)){
							foreach ($udra_acui->result() as $key ) {
								if (($row->ODEI_COD == $key->ODEI_COD)  ){
									$nform_udra_acui =  $key->TOTAL_FORM; break;
								}
							}
						}
						if (!is_numeric($nform_udra_acui)){ $nform_udra_acui = 0; }
						if (isset($udra_pes)){
							foreach ($udra_pes->result() as $key ) {
								if (($row->ODEI_COD == $key->ODEI_COD)  ){
									$nform_udra_pes =  $key->TOTAL_FORM; break;
								}
							}
						}
						if (!is_numeric($nform_udra_pes)){ $nform_udra_pes = 0; }
						$nform_udra_gen =  $nform_udra_acui + $nform_udra_pes; // UDRA ACUI + PES
						echo "<td>". $nform_udra_gen ."</td>";


						if (isset($formularios_acui)){
							foreach ($formularios_acui->result() as $key ) {
								if ( ($row->ODEI_COD == $key->ODEI_COD) ){
									$nform_dig_acui =  $key->TOTAL_DIG; break;
								}
							}
						}
						if (!is_numeric($nform_dig_acui)){ $nform_dig_acui = 0; }
						if (isset($formularios_pes)){
							foreach ($formularios_pes->result() as $key ) {
								if ( ($row->ODEI_COD == $key->ODEI_COD) ){
									$nform_dig_pes =  $key->TOTAL_DIG; break;
								}
							}
						}
						if (!is_numeric($nform_dig_pes)){ $nform_dig_pes = 0; }
						$nform_dig_gen =  $nform_dig_acui + $nform_dig_pes; // UDRA ACUI + PES
						echo "<td>". $nform_dig_gen ."</td>";						

						if ( $nform_udra_gen>0){
							echo "<td>". number_format( ($nform_dig_gen*100)/$nform_udra_gen , 2,'.' ,'') ." %</td>";								
						}else{
							echo "<td> ". 0 ."</td>";
						}

						if ( $row->TOTAL_GEN>0){
							echo "<td><strong>". number_format( ($nform_udra_gen*100)/$row->TOTAL_GEN , 2,'.' ,'') ." %</strong></td>";								
						}else{
							echo "<td> ". 0 ."</td>";
						}

						$nform_udra_acui = null;
						$nform_udra_pes = null;
						$nform_udra_gen = null;
						$nform_dig_acui = null;
						$nform_dig_pes = null;
						$nform_dig_gen = null;

						echo "</tr>"; 

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