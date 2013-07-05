
<h2 style="text-align:center">PRESENTACIÓN</h2>

<p>El Instituto Nacional de Estadística e Informática (INEI) llevara a cabo el Primer Censo Nacional de Pesca Continental 2013 con el propósito de recolectar, procesar y contar con información estadística actualizada y confiable sobre los pescadores y acuicultores que desarrollan su actividad en el ámbito continental del país. 
</p>
<p>Los datos recolectados en este censo serán la base para la toma de decisiones de los organismos gubernamentales y de los propios ciudadanos en busca del fortalecimiento del sector pesquero.
</p>
<p>El empadronamiento se realizará mediante entrevista directa a cada uno de los pescadores y acuicultores del país. El instrumento de recolección serán los formularios censales que contienen las variables, en forma de preguntas, que serán investigadas en el censo.
</p>
<p>El éxito de este censo requiere del apoyo de todos quienes de una u otra forma se encuentran vinculados con el sector de la pesca continental. Solo así lograremos que los peruanos dedicados a la actividad de pesca y acuicultura tengan una mejor calidad de vida y contribuir con el desarrollo integral y sostenido de nuestro país.
</p>
<p><b>Amigo inscríbete y participa de la prueba piloto del censo, cualquier  información o consulta la podrás encontrar en la Oficina Departamental del INEI.<b></p>



<!-- <h3 style="color:red;">Las inscripciones para la prueba piloto han finalizado. Gracias por su participación.</h3> -->
<!-- <h5>Verifica el estado de tu postulación en el modulo de consulta. A partir del día de mañána a las 10:00 am se estarán mostrando los resultados del proceso de convocatoria.</h5> -->
<h3 style="color:red;">Resultados de la Convocatoria</h3>
<h5>Presentarse el día 18/05/2013 a las 8:00 am en la ODEI con su Curriculum para el curso de capacitación.</h5>




<div class="well modulo">

  	<div class="accordion" id="accordion2">

        <div class="accordion-group">

            <div class="accordion-heading_new">
              	<a class="accordion-toggle_new" data-toggle="collapse" data-parent="#accordion2" href="#loreto ">
              		<h5>LORETO</h5>
              	</a>
             </div>

            <div id="loreto" class="accordion-body collapse">
              	<div class="accordion-inner_new">


				<table border="1" class="table table-hover table-condensed">
					<thead>
						<tr>
						<th>N°</th>
						<th>DNI N°</th>
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
					foreach($loreto->result() as $row){
						echo "<tr>";
						echo "<td>". $contador = $contador+ 1 ."</td>";
						echo "<td>". $row->dni ."</td>";
						echo "<td>". strtoupper($row->ap_paterno) ."</td>";
						echo "<td>". strtoupper($row->ap_materno) ."</td>";
						echo "<td>". strtoupper($row->nombre1) ."</td>";
						echo "<td>". strtoupper($row->nombre2) ."</td>";
						if($row->estado ==2){
						echo "<td><strong>SELECCIONADO</strong></td>"	;
						}else {
							echo "<td>NO SELECCIONADO</td>"	;
						}
						;
						echo "</tr>";  
					}
				?>
					</tbody>
				</table>

              	</div>

            </div>

        </div> 

        <div class="accordion-group">

            <div class="accordion-heading_new">
              	<a class="accordion-toggle_new" data-toggle="collapse" data-parent="#accordion2" href="#piura ">
              		<h5>PIURA</h5>
              	</a>
             </div>

            <div id="piura" class="accordion-body collapse">
              	<div class="accordion-inner_new">


					<table border="1" class="table table-hover table-condensed">
						<thead>
						<tr>
						<th>N°</th>
						<th>DNI N°</th>
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
						foreach($piura->result() as $row){
							echo "<tr>";
							echo "<td>". $contador = $contador+ 1 ."</td>";
							echo "<td>". $row->dni ."</td>";
							echo "<td>". $row->ap_paterno ."</td>";
							echo "<td>". $row->ap_materno ."</td>";
							echo "<td>". $row->nombre1 ."</td>";
							echo "<td>". $row->nombre2 ."</td>";
							if($row->estado ==2){
							echo "<td>SELECCIONADO</td>"	;
							}else{
								echo "<td>NO SELECCIONADO</td>"	;
							}
							;
							echo "</tr>";  
						}
					?>
						</tbody>
					</table>

              	</div>

            </div>

        </div> 
       
        <div class="accordion-group">

            <div class="accordion-heading_new">
              	<a class="accordion-toggle_new" data-toggle="collapse" data-parent="#accordion2" href="#puno ">
              		<h5>PUNO</h5>
              	</a>
             </div>

            <div id="puno" class="accordion-body collapse">
              	<div class="accordion-inner_new">

				<table border="1" class="table table-hover table-condensed">
					<thead>
						<tr>
						<th>N°</th>
						<th>DNI N°</th>
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
					foreach($puno->result() as $row){
						echo "<tr>";
						echo "<td>". $contador = $contador+ 1 ."</td>";
						echo "<td>". $row->dni ."</td>";
						echo "<td>". $row->ap_paterno ."</td>";
						echo "<td>". $row->ap_materno ."</td>";
						echo "<td>". $row->nombre1 ."</td>";
						echo "<td>". $row->nombre2 ."</td>";
						if($row->estado ==2){
						echo "<td>SELECCIONADO</td>"	;
						}else {
							echo "<td>NO SELECCIONADO</td>"	;
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

</div>	