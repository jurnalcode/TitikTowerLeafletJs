
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
										  Data Kecamatan baru berhasil disimpan.
										</div>";
								}
								// jika alert = 2
								
								elseif ($_GET['alert'] == 2) {
								  echo "<div class='alert alert-success alert-dismissable'>
										  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										  <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
										  Data Kecamatan berhasil diubah.
										</div>";
								}
								// jika alert = 3
								
								elseif ($_GET['alert'] == 3) {
								  echo "<div class='alert alert-success alert-dismissable'>
										  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										  <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
										  Data Kecamatan berhasil dihapus.
										</div>";
								}
								?>
							<div class="card">
								<div class="card-header">
									
									<a class="btn btn-danger btn pull-right" href="?module=form_kecamatan&form=add">
									  <i class="fa fa-plus"></i> Tambah Data Kecamatan
									</a>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
										<table id="datatable" class="table table-striped table-bordered text-nowrap w-100">
											<thead>
												<tr class="bg-white">
													
													<th class="wd-15p">No</th>
													<th class="wd-20p">Nama kecamatan</th>
													<th class="wd-20p">Aksi</th>
													
												</tr>
											</thead>
											<tbody>
												<?php  
													$no = 1;            
													$query = mysqli_query($mysqli, "SELECT * FROM kecamatan ")
																					or die('Ada kesalahan pada query tampil Data : '.mysqli_error($mysqli));

													// tampilkan data
													while ($data = mysqli_fetch_assoc($query)) { 
												
														
												 
													  echo "<tr>
															  <td width='10' class='center'>$no</td>
															  <td width='450' class='left'>$data[nama_kecamatan]</td>
															  <td class='center' width='10'>
																<div>
																  <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_kecamatan&form=edit&id=$data[id_kec]'>
																	  Edit
																  </a>";
													?>
																  <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/kecamatan/proses.php?act=delete&id=<?php echo $data['id_kec'];?>" onclick="return confirm('Anda yakin ingin menghapus  <?php echo $data['nama_kecamatan']; ?> ?');">
																	  Delete
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



