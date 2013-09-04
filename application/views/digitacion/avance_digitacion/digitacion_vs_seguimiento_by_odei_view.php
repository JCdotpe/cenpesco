<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
		<?php $this->load->view('digitacion/includes/sidebar_reportes_view');?>       
    </div><!--/span-->



    <div class="span10" id="freg">

    	<h4>REPORTE DE AVANCE DE DIGITACION GENERAL</h4>

				<table border="1" class="table table-hover table-condensed">
					<thead>
						<tr>
							<th rowspan="2" style ="text-align: center" >N°</th>
							<th rowspan="2" style ="text-align: center" >CODIGO</th>
							<th rowspan="2" style ="text-align: center" >ODEI</th>				
							<th colspan="3" style ="text-align: center" >AVANCE REGISTRO</th>
							<th colspan="3" style ="text-align: center" >AVANCE PESCADOR</th>
							<th colspan="3" style ="text-align: center" >AVANCE ACUICULTOR</th>
							<th colspan="3" style ="text-align: center" >AVANCE COMUNIDAD</th>
							<th colspan="3" style ="text-align: center" >TOTAL</th>
							<th colspan="3" style ="text-align: center" >SEGUIMIENTO</th>
							<th colspan="3" style ="text-align: center" >SEGUIMIENTO AVANCE SEGUN DIG</th>
					
						</tr>
						<tr>			
							<th>UDRA</th>
							<th>DIGITACIÓN</th>
							<th>% AVANCE DIGITACION</th>
							<th>UDRA</th>
							<th>DIGITACIÓN</th>
							<th>% AVANCE DIGITACION</th>
							<th>UDRA</th>
							<th>DIGITACIÓN</th>
							<th>% AVANCE DIGITACION</th>
							<th>UDRA</th>
							<th>DIGITACIÓN</th>
							<th>% AVANCE DIGITACION</th>
							<th>FORMULARIOS UDRA</th>
							<th>FORMULARIOS DIGITADOS</th>
							<th>% AVANCE DIGITACION</th>	
							<th>FORMULARIOS PESCADOR</th>							
							<th>FORMULARIOS ACUICULTOR</th>							
							<th>FORMULARIOS COMUNIDAD</th>		
							<th>PESCADOR</th>							
							<th>ACUICULTOR</th>							
							<th>COMUNIDAD</th>													
						</tr>
					</thead>
					<tbody>

    	<?php
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
						foreach ($row as  $value) {
							echo "<td>" . $value .'</td>';
						}

						echo "</tr>"; 

					 }
					echo '</tbody>';
				echo '</table>';

		?>

    </div>

</div>