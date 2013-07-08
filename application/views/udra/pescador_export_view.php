<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div class="span2">
        <?php $this->load->view('udra/includes/sidebar_view.php'); ?>
    </div><!--/span-->


    <div class="span10" id="freg">

    	<?php

				echo '<table border="1" class="table table-hover table-condensed">';
					echo '<thead>';
						echo '<tr>';
						echo '<th>N°</th>';
						echo '<th>CODIGO</th>';
						echo '<th>DEPARTAMENTO</th>';
						echo '<th>CODIGO</th>';
						echo '<th>PROVINCIA</th>';
						echo '<th>CODIGO</th>';
						echo '<th>DISTRITO</th>';
						echo '<th>CODIGO</th>';
						echo '<th>CENTRO POBLADO</th>';
						echo '<th>UDRA</th>';
						echo '<th>PESCADOR</th>';
						echo '<th>AVANCE</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					foreach($tables as $row){
						echo "<tr>";
						echo "<td>". $row->id ."</td>";
						echo "<td>". $row->CCDD ."</td>";
						echo "<td>". $row->DEPARTAMENTO ."</td>";
						echo "<td>". $row->CCPP ."</td>";
						echo "<td>". $row->PROVINCIA ."</td>";
						echo "<td>". $row->CCDI ."</td>";
						echo "<td>". $row->DISTRITO ."</td>";
						echo "<td>". $row->COD_CCPP ."</td>";
						echo "<td>". $row->CENTRO_POBLADO ."</td>";
						echo "<td>". $row->FORMULARIOS ."</td>";
				

				
						foreach ($formularios as $key ) {
							if (($row->CCDD == $key->CCDD) && ($row->CCPP == $key->CCPP) && ($row->CCDI == $key->CCDI) && ($row->COD_CCPP == $key->COD_CCPP)){
								$nform =  $key->NFORM;
								break;
							}
						}
						if (is_numeric($nform)){
							echo "<td>". $nform ."</td>";
							echo "<td>". number_format(($nform*100)/$row->FORMULARIOS) ." %</td>";	
						}else{
							echo "<td> ". 0 ."</td>";
							echo "<td> ". 0 ."%</td>";								
						}






						echo "</tr>";  }
					echo '</tbody>';
				echo '</table>';

		?>

    </div>

</div>