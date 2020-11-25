 <?php  
if ($_GET['form']=='add') { ?> 
 <div class=" content-area overflow-hidden">
						<div class="page-header">
            <div class="card-title white">Tambahkan Data Jenis</div>
						</div>
						<div class="row">
  <div class="col-lg-12">
		<div class="card">
			<div class="card-body">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/jenis/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
             

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Tower</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jenis" autocomplete="off" required>
                </div>
              </div>
             
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=jenis" class="btn btn-warning btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>  
    </div><!--/.col -->
    </div> 
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
	  $id = $_GET['id'];
      $query = mysqli_query($mysqli, "SELECT * FROM jenis_tower WHERE id_jenis='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data kategori : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <div class=" content-area overflow-hidden">
						<div class="page-header">
					  <div class="card-title white">Ubah Data Jenis</div>
						</div>
						<div class="row">
 <div class="col-lg-12">
		<div class="card">
			<div class="card-body">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/jenis/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">
            <input type="hidden" name="id_jenis" value="<?php echo $id; ?>" />
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Kategori</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jenis" value="<?php echo $data['jenis'];?>" autocomplete="off" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=jenis" class="btn btn-warning btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div> 
     </div><!--/.col -->
    </div>  
<?php
}
?>