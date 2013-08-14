<div class="row-fluid">
	<h4>INFORME DE OBSERVACION DE CAMPO </4>
</div>

<div class="row-fluid" style="padding-bottom: 20px !important">
	<div class="btn btn-success pull-left"><?php echo anchor('seguimiento/observacion_campo/export','Exportar Excel'); ?></div>
</div>


<div class="row-fluid" style="width: 1800px !important">

		<table border="1" class="table table-hover table-condensed" >
			<thead>
				<tr>
				<th style="width: 10px !important">NSSS°</th>
				<th style="width: 160px !important">SEDE</th>
				<th style="width: 160px !important">ODEI</th>				
				<th style="width: 160px !important">Departamento</th>
				<th style="width: 160px !important">Provincia</th>
				<th style="width: 160px !important">Distrito</th>
				<th style="width: 180px !important">Centro Poblado</th>
				<th style="width: 20px !important">Día</th>
				<th style="width: 20px !important">Mes</th>
				<th style="width: 190px !important">Funcionario</th>
				<th style="width: 10px !important">Cargo </th>
				<th style ="text-align: center">Formulario Pescador</th>
				<th style ="text-align: center">Formulario Acuicultor</th>
				<th style ="text-align: center">Formulario Comunidades</th>
				<th style ="text-align: center">Seccion</th>
				<th style ="text-align: center">Pregunta</th>
				<th style ="text-align: center">Error de concepto</th>
				<th style ="text-align: center">Error de diligenciamiento</th>
				<th style ="text-align: center">Error de pregunta</th>
				<th style ="text-align: center">Error  sondeo</th>
				<th style ="text-align: center">Error  omision</th>
				<th style ="text-align: center">Descripccion del error</th>
				</tr>
			</thead>
			<tbody>
<?php 						
			$num = 1;
			foreach($tables->result() as $row){
				echo "<tr>";
					echo '<td>'. $num++ ."</td>";
					echo '<td>'. $row->NOM_SEDE ."</td>";
					echo '<td>'. $row->NOM_ODEI ."</td>";					
					echo '<td>'. $row->NOM_DD ."</td>";
					echo '<td>'. $row->NOM_PP ."</td>";
					echo '<td>'. $row->NOM_DI ."</td>";
					echo '<td>'. $row->NOM_CCPP ."</td>";
					echo '<td>'. $row->F_D ."</td>";
					echo '<td>'. $row->F_M ."</td>";
					echo '<td>'. $row->NOM ."</td>";
					echo '<td style ="text-align: center">'. $row->CARGO ."</td>";
					echo '<td style ="text-align: center">'. $row->F_PES."</td>";
					echo '<td style ="text-align: center">'. $row->F_ACU."</td>";
					echo '<td style ="text-align: center">'. $row->F_COM."</td>";
					echo '<td style ="text-align: center">'. $row->SEC."</td>";
					echo '<td style ="text-align: center">'. $row->PREG_N."</td>";
					echo '<td style ="text-align: center">'. $row->E_CONC."</td>";
					echo '<td style ="text-align: center">'. $row->E_DILIG."</td>";
					echo '<td style ="text-align: center">'. $row->E_PREG."</td>";
					echo '<td style ="text-align: center">'. $row->E_SOND."</td>";
					echo '<td style ="text-align: center">'. $row->E_OMI."</td>";
					echo '<td>'. $row->DES_E."</td>";						
				echo "</tr>";  }
			echo '</tbody>';
		echo '</table>';

?>
</div>