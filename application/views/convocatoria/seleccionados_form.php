
<!-- <h3 style="color:red;">Las inscripciones para la prueba piloto han finalizado. Gracias por su participación.</h3> -->
<!-- <h5>Verifica el estado de tu postulación en el modulo de consulta. A partir del día de mañána a las 10:00 am se estarán mostrando los resultados del proceso de convocatoria.</h5> -->
<h2 style="text-align:center;color: #454545; font-weight: 200;">PRIMER CENSO NACIONAL DE PESCA CONTINENTAL 2013</h2>
<h3 style="text-align:center;color: #454545; font-weight: 200;">SELECCIONADOS PARA EL CURSO DE CAPACITACIÓN</h3>
<!-- <h5>Presentarse el día 18/05/2013 a las 8:00 am en la ODEI con su Curriculum para el curso de capacitación.</h5> -->
<p>El personal seleccionado, deberá presentarse el día martes 16 de julio del presente a la Oficina Departamental o Zonal del INEI donde postula, para dejar su CV documentado, con fotografía actual tamaño carnet. En el caso del personal seleccionado en  Lima se deberá presentar en la Av. Arnaldo Márquez 1511 Oficina 506 Jesus María .</p>
<p>El personal seleccionado deberá tener disponibilidad para asistir al curso de capacitación en la ciudad de Lima desde el 18/07/2013 al 26/07/2013; los pasajes y gastos en la ciudad de Lima estarán a cargo del INEI.</p>
<p>Al finalizar el curso se selecionará al personal aprobado para cubrir las vacantes requeridas según la convocatoria para el trabajo operativo en el departamento al cual postuló.</p>
<div class="well modulo">

    <?php foreach($odeis->result() as $o){ ?>

  	<div class="accordion" id="accordion2">
        <div class="accordion-group">

            <div class="accordion-heading_new">
              	<a class="accordion-toggle_new" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo $o->COD_DEPARTAMENTO ?>">
              		<h5><?php echo $o->DES_DISTRITO ?></h5>
              	</a>
             </div>

            <div id="<?php echo $o->COD_DEPARTAMENTO ?>" class="accordion-body collapse">
              	<div class="accordion-inner_new">

				<table border="1" class="table table-hover table-condensed">
					<thead>
						<tr>
						<th>N°</th>
						<!-- <th>DNI N°</th> -->
						<th>APELLIDO PATERNO</th>
						<th>APELLIDO MATERNO</th>
						<th>PRIMER NOMBRE</th>
						<th>SEGUNDO NOMBRE</th>
						<th>ESTADO</th>
						</tr>
					</thead>
					<tbody>
				<?php  
					$contador=0;
					foreach($dd[$o->COD_DEPARTAMENTO]->result() as $row){
						echo "<tr>";
						echo "<td>". $contador = $contador+ 1 ."</td>";
						// echo "<td>". $row->dni ."</td>";
						echo "<td>". $row->ap_paterno ."</td>";
						echo "<td>". $row->ap_materno ."</td>";
						echo "<td>". $row->nombre1 ."</td>";
						echo "<td>". $row->nombre2 ."</td>";
						if($row->estado ==2){
						echo "<td>SELECCIONADO PARA CAPACITACIÓN</td>"	;
						}else {
							echo "<td>NO SELECCIONADO PARA CAPACITACIÓN</td>"	;
						}
						echo "</tr>";  
					}
				?>
					</tbody>
				</table>

              	</div>

            </div>

        </div>        


  	</div> 
  	<?php } ?>
</div>	