<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('digitacion/includes/sidebar_reportes_view');?>       
    </div><!--/span-->



    <div class="span10" id="freg">

    	<h4>REPORTE DE AVANCE DE DIGITACION DE FORMULARIO COMUNIDADES A NIVEL CENTRO POBLADO</h4>
    	<?php
    		//if ($ubigeo == 99){
				echo anchor(site_url('digitacion/comunidad_avance/export'), 'Exportar Excel','class="btn btn-success pull-left " id="export_excel"');	
    		//}

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>CODIGO</th>';
						echo '<th>ODEI</th>';						
						echo '<th>CCPP</th>';
						echo '<th>PROVINCIA</th>';
						echo '<th>CCDI</th>';
						echo '<th>DISTRITO</th>';						
						echo '<th>CODCCPP</th>';
						echo '<th>CENTRO POBLADO</th>';						
						echo '<th>MARCO COMUNIDADES</th>';
						echo '<th>UDRA</th>';
						echo '<th>DIGITACIÓN</th>';
						echo '<th>% AVANCE DE DIGITACION</th>';
						echo '<th>%  COMPARATIVO DE UDRA Y MARCO</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					//TOTALES
						$tot_marco 	= 0;
						$tot_udra 	= 0;
						$tot_dig 	= 0;
						foreach($tables->result() as $row){ //TOTAL MARCO
							$tot_marco 	+= $row->MARCO;
							$tot_udra 	+= $row->UDRA;
							$tot_dig 	+= $row->DIGITACION;
						}
						echo "<tr>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td>TOTAL</td>";
							echo "<td>". $tot_marco . "</td>";
							echo "<td>". $tot_udra . "</td>";
							echo "<td>". $tot_dig . "</td>";
							echo "<td>". ( ( $tot_udra>0) ? number_format( ($tot_dig*100)/$tot_udra , 2,'.' ,'') : 0 ) ." %</td>";								
							echo "<td><strong>". ( ( $tot_marco>0) ? number_format( ($tot_udra*100)/$tot_marco , 2,'.' ,'') : 0 )." %</strong></td>";								
						echo "</tr>";
					// TOTALES
										
					$i = 1;
					$nform_udra = null;
					$nform_com = null;
					foreach($tables->result() as $row){
						echo "<tr>";
							echo "<td>" . $i++ . "</td>";
							echo "<td>" . $row->ODEI_COD . "</td>";
							echo "<td>" . $row->NOM_ODEI . "</td>";
							echo "<td>" . $row->CCPP . "</td>";
							echo "<td>" . $row->PROVINCIA . "</td>";
							echo "<td>" . $row->CCDI . "</td>";
							echo "<td>" . $row->DISTRITO . "</td>";
							echo "<td>" . $row->CODCCPP . "</td>";
							echo "<td>" . $row->CENTRO_POBLADO . "</td>";
							echo "<td>" . $row->MARCO . "</td>";
							echo "<td>" . $row->UDRA . "</td>";
							echo "<td>" . $row->DIGITACION  . "</td>";
							echo "<td>" . ( ( $row->UDRA>0) ?  number_format( ($row->DIGITACION * 100)/$row->UDRA , 2,'.' ,'') : 0 )  . "</td>"	;
							echo "<td>" . ( ( $row->MARCO>0) ? number_format( ($row->UDRA * 100)/$row->MARCO , 2,'.' ,'') : 0 )  . "</td>"	;
						echo "</tr>"; 
					}
					echo '</tbody>';
				echo '</table>';
		?>

    </div>

</div>