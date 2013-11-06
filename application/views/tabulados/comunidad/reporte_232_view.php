<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.datepicker.css'); ?>">


<div class="row-fluid">
    <div id="ap-sidebar" class="span2">
		<?php $this->load->view('tabulados/comunidad/includes/sidebar_view'); ?>       
    </div><!--/span-->



 	<div class="span10" id="ap-content">
    	<h4 style="text-align:center">CUADRO N° 232</h4>
    	<h4 style="text-align:center">PERÚ: COMUNIDADES POR TIPO DE ENFERMEDADES Y/O ACCIDENTES, SEGÚN DEPARTAMENTO, 2013</h4>
    	<?php
	    		echo form_open("/tabulados/export");
	    			$c_title = 'PERÚ: COMUNIDADES POR TIPO DE ENFERMEDADES Y/O ACCIDENTES, SEGÚN DEPARTAMENTO, 2013';

					echo '<table border="1" class="table table-hover table-condensed" id="tablet" name="tablet">';
						echo '<caption><h4>
										CUADRO N° '. $opcion .'
										<br><br>
										'. $c_title .'
						     </h4></caption>';

					echo '<thead>';
						echo '<tr>';
						echo '<th rowspan="4" style="vertical-align:middle">Departamento</th>';					
						echo '<th rowspan="3" colspan="2" style="vertical-align:middle;text-align:center">Total</th>';																																																																																										
						echo '<th colspan="98" style="text-align:center">Especies que extraen generalmente en la comunidad</th>';
						echo '<th colspan="2" rowspan="3" style="vertical-align:middle;text-align:center">NEP</th>';																																													
						echo '</tr>';

						echo '<tr>';
						echo '<th rowspan="2" colspan="2" style="text-align:center">Acarahuazu</th>';										
						echo '<th rowspan="2" colspan="2" style="text-align:center">Bagre</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Bocón</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Boquichico</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Bujurqui</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Camarón de río</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Carachama</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Carachi amarillo</th>';										
						echo '<th rowspan="2" colspan="2" style="text-align:center">Carachi negro</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Chambira</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Chiochio</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Corvina</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Dentón</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Doncella</th>';	
						echo '<th rowspan="2" colspan="2" style="text-align:center">Dorado</th>';										
						echo '<th rowspan="2" colspan="2" style="text-align:center">Fasaco</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Ispi</th>';	
						echo '<th rowspan="2" colspan="2" style="text-align:center">Langostino</th>';										
						echo '<th rowspan="2" colspan="2" style="text-align:center">Lisa</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Llambina</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Manitoa</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Maparate</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Mauri</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Mota</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Novia</th>';										
						echo '<th rowspan="2" colspan="2" style="text-align:center">Paco</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Palometa</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Paña, piraña</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Pejerrey</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Ractacara</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Sabalo</th>';	
						echo '<th rowspan="2" colspan="2" style="text-align:center">Sardina</th>';										
						echo '<th rowspan="2" colspan="2" style="text-align:center">Shiripira</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Shuyo</th>';		
						echo '<th rowspan="2" colspan="2" style="text-align:center">Tilapia</th>';										
						echo '<th rowspan="2" colspan="2" style="text-align:center">Trucha</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Yahuarachi</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Yaraqui</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Yulilla</th>';						
						echo '<th rowspan="2" colspan="2" style="text-align:center">Zungaro</th>';	
						echo '<th rowspan="2" colspan="2" style="text-align:center">Otro</th>';	
						echo '<th colspan="16" style="text-align:center;vertical-align:middle">Peces ornamentales</th>';																																
						echo '</tr>';

						echo '<tr>';											
						echo '<th colspan="2" style="text-align:center">Anguila eléctrica</th>';										
						echo '<th colspan="2" style="text-align:center">Arahuana</th>';						
						echo '<th colspan="2" style="text-align:center">Corydoras jumbo</th>';						
						echo '<th colspan="2" style="text-align:center">Escalar amazónico</th>';						
						echo '<th colspan="2" style="text-align:center">Neón tetra</th>';						
						echo '<th colspan="2" style="text-align:center">Pez disco</th>';						
						echo '<th colspan="2" style="text-align:center">Tucunare</th>';	
						echo '<th colspan="2" style="text-align:center">Otro</th>';						
						echo '</tr>';
						echo '<tr>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';		
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';	
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';
						echo '<th style="text-align:center">Abs</th>';										
						echo '<th style="text-align:center;color:green">%</th>';																																																
						echo '</tr>';
					echo '</thead>';

					echo '<tbody>';
						$tot_tot = 0;
						$tot_a = 0;
						$tot_b = 0;
						$tot_c = 0;
						$tot_d = 0;
						$tot_e = 0;
						$tot_f = 0;
						$tot_g = 0;
						$tot_h = 0;
						$tot_i = 0;
						$tot_j = 0;
						$tot_k = 0;
						$tot_l = 0;
						$tot_m = 0;
						$tot_n = 0;
						$tot_o = 0;
						$tot_p = 0;
						$tot_q = 0;
						$tot_r = 0;
						$tot_s = 0;
						$tot_t = 0;
						$tot_u = 0;
						$tot_v = 0;
						$tot_w = 0;
						$tot_x = 0;
						$tot_y = 0;
						$tot_z = 0;						
						$tot_aa = 0;
						$tot_ab = 0;
						$tot_ac = 0;
						$tot_ad = 0;	
						$tot_ae = 0;
						$tot_af = 0;
						$tot_ag = 0;
						$tot_ah = 0;	
						$tot_ai = 0;
						$tot_aj = 0;
						$tot_ak = 0;
						$tot_al = 0;	
						$tot_am = 0;
						$tot_an = 0;
						$tot_ao = 0;
						$tot_ap = 0;
						$tot_aq = 0;
						$tot_ar = 0;
						$tot_as = 0;
						$tot_at = 0;	
						$tot_au = 0;
						$tot_av = 0;
						$tot_aw = 0;						
						$tot_ax = 0;						

						// TOTALES
						foreach($tables->result_array() as $reg){
							$tot_tot += $reg['TOTAL'];
							$tot_a += $reg['1'];
							$tot_b += $reg['2'];
							$tot_c += $reg['3'];
							$tot_d += $reg['4'];
							$tot_e += $reg['5'];
							$tot_f += $reg['6'];
							$tot_g += $reg['7'];
							$tot_h += $reg['8'];
							$tot_i += $reg['9'];
							$tot_j += $reg['10'];
							$tot_k += $reg['11'];
							$tot_l += $reg['12'];
							$tot_m += $reg['13'];	
							$tot_n += $reg['14'];
							$tot_o += $reg['15'];
							$tot_p += $reg['16'];
							$tot_q += $reg['17'];	
							$tot_r += $reg['18'];
							$tot_s += $reg['19'];
							$tot_t += $reg['20'];
							$tot_u += $reg['21'];
							$tot_v += $reg['22'];
							$tot_w += $reg['23'];
							$tot_x += $reg['24'];
							$tot_y += $reg['25'];
							$tot_z += $reg['26'];
							$tot_aa += $reg['27'];
							$tot_ab += $reg['28'];
							$tot_ac += $reg['29'];
							$tot_ad += $reg['30'];	
							$tot_ae += $reg['31'];
							$tot_af += $reg['32'];
							$tot_ag += $reg['33'];
							$tot_ah += $reg['34'];	
							$tot_ai += $reg['35'];
							$tot_aj += $reg['36'];
							$tot_ak += $reg['37'];
							$tot_al += $reg['38'];	
							$tot_am += $reg['39'];
							$tot_an += $reg['40'];
							$tot_ao += $reg['41'];
							$tot_ap += $reg['42'];
							$tot_aq += $reg['43'];
							$tot_ar += $reg['44'];
							$tot_as += $reg['45'];
							$tot_at += $reg['46'];	
							$tot_au += $reg['47'];
							$tot_av += $reg['48'];
							$tot_aw += $reg['49'];							
							$tot_ax += $reg['NEP'];							
						}
							echo '<tr>';
							echo '<td> TOTAL</td>';										
							echo '<td style="text-align:center">' . $tot_tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . 100 . '</td>';	
							echo '<td style="text-align:center">' . $tot_a . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_a*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_b. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_b*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_c . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_c*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_d. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_d*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_e . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_e*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_f. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_f*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_g . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_g*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_h. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_h*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_i. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_i*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_j . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_j*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_k. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_k*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_l . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_l*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_m. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_m*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_n . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_n*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_o. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_o*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_p . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_p*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_q. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_q*100/$tot_tot,2) . '</td>';
							echo '<td style="text-align:center">' . $tot_r. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_r*100/$tot_tot,2) . '</td>';		
							echo '<td style="text-align:center">' . $tot_s. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_s*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_t . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_t*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_u. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_u*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_v . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_v*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_w. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_w*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_x . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_x*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_y. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_y*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_z. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_z*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_aa . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_aa*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_ab. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ab*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_ac . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ac*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_ad. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ad*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_ae . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ae*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_af. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_af*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_ag . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ag*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_ah. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ah*100/$tot_tot,2) . '</td>';
							echo '<td style="text-align:center">' . $tot_ai . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ai*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_aj. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_aj*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_ak . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ak*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_al. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_al*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_am . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_am*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_an. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_an*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_ao . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ao*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_ap. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ap*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_aq . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_aq*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_ar. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ar*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_as . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_as*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_at. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_at*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_au . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_au*100/$tot_tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $tot_av. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_av*100/$tot_tot,2) . '</td>';
							echo '<td style="text-align:center">' . $tot_aw. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_aw*100/$tot_tot,2) . '</td>';														
							echo '<td style="text-align:center">' . $tot_ax. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($tot_ax*100/$tot_tot,2) . '</td>';	
							echo '</tr>';						
						foreach($tables->result_array() as $reg){
							//reiniciadores
							$dep = NULL;
							$tot = 0;
							$a = 0;
							$b = 0;
							$c = 0;
							$d = 0;
							$e = 0;
							$f = 0;
							$g = 0;
							$h = 0;
							$i = 0;
							$j = 0;
							$k = 0;
							$l = 0;
							$m = 0;	
							$n = 0;
							$o = 0;
							$p = 0;
							$q = 0;		
							$q = 0;
							$r = 0;
							$s = 0;
							$t = 0;
							$u = 0;
							$v = 0;
							$w = 0;
							$x = 0;
							$y = 0;
							$z = 0;						
							$aa = 0;
							$ab = 0;
							$ac = 0;
							$ad = 0;	
							$ae = 0;
							$af = 0;
							$ag = 0;
							$ah = 0;	
							$ai = 0;
							$aj = 0;
							$ak = 0;
							$al = 0;	
							$am = 0;
							$an = 0;
							$ao = 0;
							$ap = 0;
							$aq = 0;
							$ar = 0;
							$as = 0;
							$at = 0;	
							$au = 0;
							$av = 0;
							$aw = 0;
							$ax = 0;

							$dep = $reg['DEPARTAMENTO'];
							$tot = $reg['TOTAL'];
							$serie_1[] = round(($a = $reg['1'])*100/$tot,2);
							$serie_2[] = round(($b = $reg['2'])*100/$tot,2);
							$serie_3[] = round(($c = $reg['3'])*100/$tot,2);
							$serie_4[] = round(($d = $reg['4'])*100/$tot,2);
							$serie_5[] = round(($e = $reg['5'])*100/$tot,2);
							$serie_6[] = round(($f = $reg['6'])*100/$tot,2);
							$serie_7[] = round(($g = $reg['7'])*100/$tot,2);
							$serie_8[] = round(($h = $reg['8'])*100/$tot,2);
							$serie_9[] = round(($i = $reg['9'])*100/$tot,2);
							$serie_10[] = round(($j   = $reg['10'])*100/$tot,2);
							$serie_11[] = round(($k   = $reg['11'])*100/$tot,2);
							$serie_12[] = round(($l   = $reg['12'])*100/$tot,2);
							$serie_13[] = round(($m   = $reg['13'])*100/$tot,2);	
							$serie_14[] = round(($n   = $reg['14'])*100/$tot,2);
							$serie_15[] = round(($o   = $reg['15'])*100/$tot,2);
							$serie_16[] = round(($p   = $reg['16'])*100/$tot,2);
							$serie_17[] = round(($q   = $reg['17'])*100/$tot,2);
							$serie_18[] = round(($r   = $reg['18'])*100/$tot,2);
							$serie_19[] = round(($s   = $reg['19'])*100/$tot,2);
							$serie_20[] = round(($t   = $reg['20'])*100/$tot,2);
							$serie_21[] = round(($u   = $reg['21'])*100/$tot,2);
							$serie_22[] = round(($v   = $reg['22'])*100/$tot,2);
							$serie_23[] = round(($w   = $reg['23'])*100/$tot,2);
							$serie_24[] = round(($x   = $reg['24'])*100/$tot,2);
							$serie_25[] = round(($y   = $reg['25'])*100/$tot,2);
							$serie_26[] = round(($z   = $reg['26'])*100/$tot,2);
							$serie_27[] = round(($aa  = $reg['27'])*100/$tot,2);
							$serie_28[] = round(($ab  = $reg['28'])*100/$tot,2);
							$serie_29[] = round(($ac  = $reg['29'])*100/$tot,2);
							$serie_30[] = round(($ad  = $reg['30'])*100/$tot,2);	
							$serie_31[] = round(($ae  = $reg['31'])*100/$tot,2);
							$serie_32[] = round(($af  = $reg['32'])*100/$tot,2);
							$serie_33[] = round(($ag  = $reg['33'])*100/$tot,2);
							$serie_34[] = round(($ah  = $reg['34'])*100/$tot,2);	
							$serie_35[] = round(($ai  = $reg['35'])*100/$tot,2);
							$serie_36[] = round(($aj  = $reg['36'])*100/$tot,2);
							$serie_37[] = round(($ak  = $reg['37'])*100/$tot,2);
							$serie_38[] = round(($al  = $reg['38'])*100/$tot,2);	
							$serie_39[] = round(($am  = $reg['39'])*100/$tot,2);
							$serie_40[] = round(($an  = $reg['40'])*100/$tot,2);
							$serie_41[] = round(($ao  = $reg['41'])*100/$tot,2);
							$serie_42[] = round(($ap  = $reg['42'])*100/$tot,2);
							$serie_43[] = round(($aq  = $reg['43'])*100/$tot,2);
							$serie_44[] = round(($ar  = $reg['44'])*100/$tot,2);
							$serie_45[] = round(($as  = $reg['45'])*100/$tot,2);
							$serie_46[] = round(($at  = $reg['46'])*100/$tot,2);	
							$serie_47[] = round(($au  = $reg['47'])*100/$tot,2);
							$serie_48[] = round(($av  = $reg['48'])*100/$tot,2);
							$serie_49[] = round(($aw  = $reg['49'])*100/$tot,2);	
							$serie_50[] = round(($ax  = $reg['NEP'])*100/$tot,2);	

							echo '<tr>';
							echo '<td>' . $dep . '</td>';										
							echo '<td style="text-align:center">' . $tot . '</td>';										
							echo '<td style="text-align:center;color:green">' . round(100,2) .'</td>';	
							echo '<td style="text-align:center">' . $a . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($a*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $b. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($b*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $c . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($c*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $d. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($d*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $e . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($e*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $f. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($f*100/$tot,2) . '</td>';		
							echo '<td style="text-align:center">' . $g . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($g*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $h. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($h*100/$tot,2) . '</td>';
							echo '<td style="text-align:center">' . $i. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($i*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $j . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($j*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $k. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($k*100/$tot,2) . '</td>';		
							echo '<td style="text-align:center">' . $l . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($l*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $m. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($m*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $n . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($n*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $o. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($o*100/$tot,2) . '</td>';		
							echo '<td style="text-align:center">' . $p . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($p*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $q. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($q*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $r. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($r*100/$tot,2) . '</td>';		
							echo '<td style="text-align:center">' . $s. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($s*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $t . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($t*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $u. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($u*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $v . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($v*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $w. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($w*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $x . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($x*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $y. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($y*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $z. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($z*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $aa . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($aa*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $ab. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ab*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $ac . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ac*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $ad. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ad*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $ae . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ae*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $af. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($af*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $ag . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ag*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $ah. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ah*100/$tot,2) . '</td>';
							echo '<td style="text-align:center">' . $ai . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ai*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $aj. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($aj*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $ak . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ak*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $al. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($al*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $am . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($am*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $an. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($an*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $ao . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ao*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $ap. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ap*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $aq . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($aq*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $ar. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ar*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $as . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($as*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $at. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($at*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $au . '</td>';										
							echo '<td style="text-align:center;color:green">' . round($au*100/$tot,2) . '</td>';	
							echo '<td style="text-align:center">' . $av. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($av*100/$tot,2) . '</td>';
							echo '<td style="text-align:center">' . $aw. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($aw*100/$tot,2) . '</td>';
							echo '<td style="text-align:center">' . $ax. '</td>';										
							echo '<td style="text-align:center;color:green">' . round($ax*100/$tot,2) . '</td>';																																																																																															
							echo '</tr>';
						}
					echo '</tbody>';
				echo '</table>';

		?>
		<?php 
			$this->load->view('tabulados/comunidad/includes/text_view.php'); 

			$series = array(
							array("name" => 'Pes 1'				,"data" => $serie_1),
							array("name" => 'Pes 2'				,"data" => $serie_2),
							array("name" => 'Pes 3'				,"data" => $serie_3),
							array("name" => 'Pes 4'				,"data" => $serie_4),
							array("name" => 'Pes 5'				,"data" => $serie_5),
							array("name" => 'Pes 6'				,"data" => $serie_6),
							array("name" => 'Pes 7'				,"data" => $serie_7),
							array("name" => 'Pes 8'				,"data" => $serie_8),
							array("name" => 'Pes 9'				,"data" => $serie_9),
							array("name" => 'Pes 10'			,"data" => $serie_10),
							array("name" => 'Pes 11'			,"data" => $serie_11),
							array("name" => 'Pes 12'			,"data" => $serie_12),
							array("name" => 'Pes 13'			,"data" => $serie_13),
							array("name" => 'Pes 14'			,"data" => $serie_14),
							array("name" => 'Pes 15'			,"data" => $serie_15),
							array("name" => 'Pes 16'			,"data" => $serie_16),
							array("name" => 'Pes 17'			,"data" => $serie_17),
							array("name" => 'Pes 18'			,"data" => $serie_18),
							array("name" => 'Pes 19'			,"data" => $serie_19),
							array("name" => 'Pes 20'			,"data" => $serie_20),
							array("name" => 'Pes 21'			,"data" => $serie_21),
							array("name" => 'Pes 22'			,"data" => $serie_22),
							array("name" => 'Pes 23'			,"data" => $serie_23),
							array("name" => 'Pes 24'			,"data" => $serie_24),
							array("name" => 'Pes 25'			,"data" => $serie_25),
							array("name" => 'Pes 26'			,"data" => $serie_26),
							array("name" => 'Pes 27'			,"data" => $serie_27),
							array("name" => 'Pes 28'			,"data" => $serie_28),
							array("name" => 'Pes 29'			,"data" => $serie_29),
							array("name" => 'Pes 30'			,"data" => $serie_30),
							array("name" => 'Pes 31'			,"data" => $serie_31),
							array("name" => 'Pes 32'			,"data" => $serie_32),
							array("name" => 'Pes 33'			,"data" => $serie_33),
							array("name" => 'Pes 34'			,"data" => $serie_34),
							array("name" => 'Pes 35'			,"data" => $serie_35),
							array("name" => 'Pes 36'			,"data" => $serie_36),
							array("name" => 'Pes 37'			,"data" => $serie_37),
							array("name" => 'Pes 38'			,"data" => $serie_38),
							array("name" => 'Pes 39'			,"data" => $serie_39),
							array("name" => 'Pes 40'			,"data" => $serie_40),
							array("name" => 'Pes 41'			,"data" => $serie_41),
							array("name" => 'Pes 42'			,"data" => $serie_42),
							array("name" => 'Pes 43'			,"data" => $serie_43),
							array("name" => 'Pes 44'			,"data" => $serie_44),
							array("name" => 'Pes 45'			,"data" => $serie_45),
							array("name" => 'Pes 46'			,"data" => $serie_46),
							array("name" => 'Pes 47'			,"data" => $serie_47),
							array("name" => 'Pes 48'			,"data" => $serie_48),
							array("name" => 'Pes 49'			,"data" => $serie_49),
							array("name" => 'NEP'				,"data" => $serie_50)	);
			$data['xx'] =  15550;
			$data['yy'] =  450;
			$data['series'] =  $series;
			$data['c_title'] = $c_title;
			$this->load->view('tabulados/comunidad/includes/grafico_view.php', $data); 

			echo form_close(); 
		?>

		<h5>Fuente: Instituto Nacional de Estadística e Informática - Primer Censo Nacional de Pesca Continental 2013.</h5>
	</div>
</div>

 <?php $this->load->view('convocatoria/includes/footer_view.php'); ?>