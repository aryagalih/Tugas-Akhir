<?php
														$sql = "SELECT a.*, b.nama as nama_kelas, b.status from tb_siswa a JOIN tb_kelas b on a.kelas = b.id_kelas where b.status = 0";
														$query= mysqli_query($conn, $sql);	
														$n = 1;
														while($siswa = mysqli_fetch_array($query)){
														?>
														<tr>
															<td><?php echo $n++; ?></td>
															<?php 
																if($siswa['foto'] == ''){
																echo "<td><img style='witdh: 50px; height: 50px;' src='../assets/images/fotosiswa/siswa.png'/></td>";
																}else{
																	echo "<td><img style='witdh: 50px; height: 50px;' src='../assets/images/fotosiswa/".$siswa['foto']."'/></td>";
																}
															 ?>
															<td><?php echo $siswa['nis'] ?></td>
															<td><?php echo $siswa['nama'] ?></td>
															<td><?php echo $siswa['nama_kelas'] ?></td>
															<td><?php echo $siswa['alamat'] ?></td>
															<td><?php echo $siswa['jk'] ?></td>
															<td></td>
														</tr>
														<?php
						                  				}
						                  			?>