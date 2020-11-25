
 <?php  
if ($_GET['form']=='add') { ?> 
  
<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title white">Tambahkan Data Kecamatan</div>
				
			</div>
			<div class="card-body">
          <!-- form start -->
           <form role="form" class="form-horizontal" action="modules/kecamatan/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama kecamatan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_kecamatan" required>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=kecamatan" class="btn btn-danger btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
	</div><!--/.col -->
    </div>  
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
	  $id = $_GET['id'];
      $query = mysqli_query($mysqli, "SELECT * FROM kecamatan WHERE id_kec='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data  : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>


<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">Edit Data kecamatan</div><hr>
				
			</div>
			<div class="card-body">
          <!-- form start -->
           <form role="form" class="form-horizontal" action="modules/kecamatan/proses.php?act=update" method="POST" enctype="multipart/form-data">
		   <input type="hidden" name="id_kec" value="<?php echo $id; ?>" />
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama kecamatan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_kecamatan"  value="<?php echo $data['nama_kecamatan'];?>" required>
                </div>
              </div>
			
			
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=kecamatan" class="btn btn-danger btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
	</div><!--/.col -->
    </div>  
<?php
}
?>
