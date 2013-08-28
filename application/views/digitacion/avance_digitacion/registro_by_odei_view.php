<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('digitacion/includes/sidebar_reportes_view');?>       
    </div><!--/span-->



    <div class="span10" id="freg">

    	<h4>REPORTE DE AVANCE DE DIGITACION DE FORMULARIO DE REGISTRO DE PESCADORES Y ACUICULTORES A NIVEL ODEI</h4>
    	<?php

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>CODIGO</th>';
						echo '<th>ODEI</th>';						
						echo '<th>UDRA</th>';
						echo '<th>DIGITACIÓN</th>';
						echo '<th>% AVANCE DE DIGITACION</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					//TOTALES
						echo "<tr>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td>TOTAL</td>";
						$total_2 = 0;
						$total_3 = 0;

						foreach ($udra->result() as $key ) {// TOTAL UDRA
								$total_2 = $total_2 +  $key->TOTAL_FORM; 
						}
						echo "<td>". $total_2 ."</td>";

						foreach ($formularios->result() as $key ) { //TOTAL DIGITADOS
								$total_3 = $total_3 +  $key->TOTAL_DIG;
						}	
						echo "<td>" . $total_3 ."</td>";
						if ( $total_2>0){
							echo "<td><strong>". number_format( ($total_3*100)/$total_2 , 2,'.' ,'') ." %</strong></td>";								
						}else{
							echo "<td> 0.00% </td>";
						}
						echo "</tr>";
					// TOTALES

					$i = 1;
					$nform_udra = null;
					$nform_reg = null;
					foreach($tables as $row){
						echo "<tr>";
						echo "<td>". $i++."</td>";
						echo "<td>". $row->ODEI_COD ."</td>";
						echo "<td>". $row->NOM_ODEI ."</td>";						
						//udra
						if (isset($udra)){
							foreach ($udra->result() as $key ) {
								if (($row->ODEI_COD == $key->ODEI_COD)  ){
									$nform_udra =  $key->TOTAL_FORM; break;
								}
							}
							if (is_numeric($nform_udra)){
								echo "<td>". $nform_udra ."</td>";
								//echo "<td>". number_format( ($nform*100)/$row->FORMULARIOS) ." %</td>";	
							}else{
								echo "<td> ". 0 ."</td>";
							}
						}else{
								echo "<td> ". 0 ."</td>";
						}
						//digitacion
						if (isset($formularios)){
							foreach ($formularios->result() as $key ) {
								if ( ($row->ODEI_COD == $key->ODEI_COD) ){
									$nform_reg =  $key->TOTAL_DIG;
									break;
								}
							}
							if (is_numeric($nform_reg)){
								echo "<td>". $nform_reg ."</td>";
								//echo "<td>". number_format( ($nform*100)/$row->FORMULARIOS) ." %</td>";	
							}else{
								echo "<td> ". 0 ."</td>";
							}

						}else{
								echo "<td> ". 0 ."</td>";
						}
						// avance digitacion
						if ( $nform_udra>0){
							echo "<td>". number_format( ($nform_reg*100)/$nform_udra , 2,'.' ,'') ." %</td>";								
						}else{
							echo "<td> 0.00% </td>";
						}


						$nform_udra = null;
						$nform_reg = null;
						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';


		?>

    </div>

</div>