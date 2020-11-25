<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">Laporan Data Tower </h4>
                       
                    </div>
                   
                </div>          
            </div>   
            <div class="contentbar"> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                    <form role="form" class="form-horizontal" method="GET" action="modules/laporan/cetak.php" target="_blank">
                        <div class="card-body">
                        <div class="row">
                                      <div class="col-md-4">
                                      <select class="form-control"  name="kecamatan">
                                                            <?php
                                                            $query = mysqli_query($mysqli, "SELECT *  FROM kecamatan")
                                                                    or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                echo"<option value='$data[id_kec]'> $data[nama_kecamatan] </option>";
                                                            }
                                                            ?>
                                                </select>
                                     
                                      </div>
                                      <div class="col-md-4">
                                    
                                      <select class="form-control"  name="jenis">
                                                            <?php
                                                            $query = mysqli_query($mysqli, "SELECT *  FROM jenis_tower")
                                                                    or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                                                            while ($data = mysqli_fetch_assoc($query)) {
                                                                echo"<option value='$data[id_jenis]'> $data[jenis] </option>";
                                                            }
                                                            ?>
                                                </select>

                                      </div>
                                      <div class="ol-md-4">
                                          <button type="submit" class="btn btn-danger mb-2"><i class="fa fa-print"></i>&nbsp; Cetak Laporan</button>
                                      </div>
                                  </div>
                                   </div>
                              </form>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
           
                 
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
							