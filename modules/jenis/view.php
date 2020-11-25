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
										  Data Jenis baru berhasil disimpan.
										</div>";
								}
								// jika alert = 2
								
								elseif ($_GET['alert'] == 2) {
								  echo "<div class='alert alert-success alert-dismissable'>
										  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										  <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
										  Data Jenis berhasil diubah.
										</div>";
								}
								// jika alert = 3
								
								elseif ($_GET['alert'] == 3) {
								  echo "<div class='alert alert-success alert-dismissable'>
										  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
										  <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
										  Data Jenis berhasil dihapus.
										</div>";
								}
								?>
							<div class="card">
								<div class="card-header">
									
									<a class="btn btn-danger btn pull-left" href="?module=form_jenis&form=add">
									  <i class="fa fa-plus"></i> Tambah Data Jenis
									</a>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
										<table id="dynamic-table" class="table table-striped table-bordered text-nowrap w-100">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                
                <th class="left">Data Jenis Tower</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;            
            $query = mysqli_query($mysqli, "SELECT * FROM jenis_tower")
                                            or die('Ada kesalahan pada query tampil Data : '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
         
              echo "<tr>
                      <td width='10' class='center'>$no</td>
                      <td width='450' class='left'>$data[jenis]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_jenis&form=edit&id=$data[id_jenis]'>
                             Ubah
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/jenis/proses.php?act=delete&id=<?php echo $data['id_jenis'];?>" onclick="return confirm('Anda yakin ingin menghapus Jenis <?php echo $data['jenis']; ?> ?');">
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



