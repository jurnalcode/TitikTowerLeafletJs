
<!-- row -->
<div class="row">
							<div class="col-md-12 col-lg-12">
							
							<?php
								if (empty($_GET['alert'])) {
								  echo "";
								} 
								// jika alert = 1
							   
								elseif ($_GET['alert'] == 1) {
								  echo "<div class='alert alert-success alert-dismissable'>
										  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										  <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
										  Data Tower baru berhasil disimpan.
										</div>";
								}
								// jika alert = 2
								
								elseif ($_GET['alert'] == 2) {
								  echo "<div class='alert alert-success alert-dismissable'>
										  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										  <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
										  Data Tower berhasil diubah.
										</div>";
								}
								// jika alert = 3
								
								elseif ($_GET['alert'] == 3) {
								  echo "<div class='alert alert-success alert-dismissable'>
										  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										  <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
										  Data Tower berhasil dihapus.
										</div>";
								}
								?>
							<div class="card">
								<div class="card-header">
									
									<a class="btn btn-danger pull-left" href="?module=form_tower&form=add">
									  <i class="fa fa-plus"></i> Tambah Data Tower
									</a>
									<a class="btn btn-success pull-left" href="?module=jarak">
									  <i class="fa fa-map"></i> Tampilkan Jarak Antar Titik Tower
									</a>
									<a class="btn btn-info pull-right" href="?module=map">
									  <i class="fa fa-eye"></i> Tampilkan Dalam Bentuk Map
									</a>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
										<table id="datatable" class="table table-bordered dt-responsive nowrap">
											<thead>
												<tr class="bg-white">
													
													<th class="wd-15p">No</th>
													<th class="wd-20p">Pemilik</th>
													<th class="wd-20p">Nomor izin</th>
                                                    <th class="wd-20p">Latitude</th>
                                                    <th class="wd-20p">Longitude</th>
													<th class="wd-20p">Jenis Tower</th>
													<th class="wd-20p">Kecamatan</th>

													<th class="wd-20p">Aksi</th>
													
												</tr>
											</thead>
											<tbody>
												<?php  
													$no = 1;            
													$query = mysqli_query($mysqli, " SELECT * FROM tower
															LEFT JOIN jenis_tower
															ON tower.id_jenis = jenis_tower.id_jenis
															LEFT JOIN kecamatan
															ON tower.id_kec = kecamatan.id_kec
															
													 ORDER BY tower.id DESC")
																					or die('Ada kesalahan pada query tampil Data : '.mysqli_error($mysqli));

													// tampilkan data
													while ($data = mysqli_fetch_assoc($query)) { 
												
														
												 
													  echo "<tr>
															  <td width='10' class='center'>$no</td>
															  <td width='40' class='left'>$data[pemilik]</td>
															  <td width='180' class='left'>$data[nomor_izin]</td>
															  <td width='180' class='left'>$data[lat]</td>
															  <td width='180' class='left'>$data[lang]</td>
															  <td width='180' class='left'>$data[jenis]</td>
															  <td width='180' class='left'>$data[nama_kecamatan]</td>
															  <td class='center' width='10'>
																<div>
																  <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_tower&form=edit&id=$data[id]'>
																	  Ubah
																  </a>";
													?>
																  <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/tower/proses.php?act=delete&id=<?php echo $data['id'];?>" onclick="return confirm('Anda yakin ingin menghapus ukm <?php echo $data['pemilik']; ?> ?');">
																	  Hapus
																  </a>
													<?php
													  echo "    </div>
															  </td>
															</tr>";
													  $no++;
													}
													?>
												
												
											</tbody>
										</table>
									</div>
                                </div>
								<!-- table-wrapper -->
							</div>
							<!-- section-wrapper -->
							</div>
						</div>
						<!-- row end -->



