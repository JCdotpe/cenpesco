
<div class="row-fluid">
  <div class="span2">
        <?php $this->load->view('digitacion/includes/sidebar_view.php'); ?>
  </div><!--/span-->




  <div class="span10">

		<table border="1" class="table table-hover table-condensed" style="width: 100%;">
			<thead>
				<tr>
				<th class="span1">Departamento</th>
				<th class="span1">COD</th>
				<th class="span1">Provincia</th>
				<th class="span1">COD</th>
				<th>Distrito</th>
				<th>COD</th>
				<th class="span2">Centro Poblado</th>
				<th>COD</th>
				<th>Total Registros</th>
				<th>Total Pescadores</th>
				<th>Total Acuicultores</th>
				<th>Total Embarcaciones</th>	
			</thead>
			<tbody>
		<?php  
			$contador=0;
			foreach($registros->result() as $row){
				echo "<tr>";
				//echo "<td>". $contador = $contador+ 1 ."</td>";
				echo "<td>". $row->NOM_DD ."</td>";
				echo "<td>". $row->CCDD ."</td>";
				echo "<td>". $row->NOM_PP ."</td>";
				echo "<td>". $row->CCPP ."</td>";
				echo "<td>". $row->NOM_DI ."</td>";
				echo "<td>". $row->CCDI ."</td>";	
				echo "<td>". $row->NOM_CCPP ."</td>";
				echo "<td>". $row->COD_CCPP ."</td>";
				echo "<td>". $row->T_F_D ."</td>";								
				echo "<td>". $row->T_PES ."</td>";	
				echo "<td>". $row->T_ACUI ."</td>";	
				echo "<td>". $row->T_EMB ."</td>";	
				echo "</tr>";  
			}
		?>
			</tbody>
		</table>

		<?php

		echo '<div class="span3 preguntas titulos">';
			echo '<h5>TOTAL PESCADORES : &nbsp;&nbsp;&nbsp;'.$resumen->row()->PESCADORES.'</h5>';
		echo '</div>';	
		echo '<div class="offset1 span3 preguntas titulos">';
			echo '<h5>TOTAL ACUICULTORES : &nbsp;&nbsp;&nbsp;'.$resumen->row()->ACUICULTORES.'</h5>';
		echo '</div>';	
		echo '<div class="offset1 span3 preguntas titulos">';
			echo '<h5>TOTAL EMBARCACIONES : &nbsp;&nbsp;&nbsp;'.$resumen->row()->EMBARCACIONES.'</h5>';
		echo '</div>';	

		?>


  </div>

</div>
