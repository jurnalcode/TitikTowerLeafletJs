
 <?php  
if ($_GET['form']=='add') { ?>     
<script>
    	function addMapPicker() {
	    	var mapCenter = [22, 87];
            var map = L.map('map').setView([0.818410,  100.402070], 12);
			L.tileLayer('https://api.maptiler.com/maps/topographique/{z}/{x}/{y}.png?key=bgISsnxrAiRak6OLsnfO', {
				maxZoom: 18,
				attribution: ''
			}).addTo(map);
		
		var marker = L.marker(mapCenter).addTo(map);
		var updateMarker = function(lat, lng) {
		    marker
		        .setLatLng([lat, lng])
		        .bindPopup("Your location :  " + marker.getLatLng().toString())
		        .openPopup();
		    return false;
		};
		map.on('click', function(e) {
		    $('#latInput').val(e.latlng.lat);
		    $('#lngInput').val(e.latlng.lng);
		    updateMarker(e.latlng.lat, e.latlng.lng);
	    	});
	    	
	    	var updateMarkerByInputs = function() {
			return updateMarker( $('#latInput').val() , $('#lngInput').val());
		}
		$('#latInput').on('input', updateMarkerByInputs);
		$('#lngInput').on('input', updateMarkerByInputs);
    	}
    	
	$(document).ready(function() {
	    addMapPicker();
	});
    </script>
<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title white">Tambahkan Tower</div>
				
			</div>
			<div class="card-body">
			<div class="row">
			<div class="col-md-6 col-lg-6">
           <form role="form" class="form-horizontal" action="modules/tower/proses.php?act=insert" method="POST" enctype="multipart/form-data">
		   
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-12 control-label">Nama Pemilik</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="pemilik" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-12 control-label">Nomor Izin</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nomor_izin" required>
                </div>
              </div>
             
			       <div class="form-group">
                <label class="col-sm-12 control-label">Latitude</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="lat" id="latInput" required>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-12 control-label">Longitude</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="lang" id="lngInput" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-12 control-label">Gambar Tower</label>
                <div class="col-sm-12">
                  <input type="file" class="form-control" name="gambar" required>
                </div>
              </div>
            
              <div class="form-group">
                <label class="col-sm-12 control-label">Jenis Tower</label>
                <div class="col-sm-12">
                  <select class="form-control"  name="id_jenis">
							<?php
                              $query_jenis = mysqli_query($mysqli, "SELECT *  FROM jenis_tower ORDER BY id_jenis ASC")
                                                                    or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                              while ($data_jenis = mysqli_fetch_assoc($query_jenis)) {
                                echo"<option value=\"$data_jenis[id_jenis]\"> $data_jenis[jenis] </option>";
                              }
                            ?>
                   </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-12 control-label">Kecamatan</label>
                <div class="col-sm-12">
                  <select class="form-control"  name="id_kec">
							<?php
                              $query_kecamatan = mysqli_query($mysqli, "SELECT *  FROM kecamatan ORDER BY id_kec ASC")
                                                                    or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                              while ($data_kecamatan = mysqli_fetch_assoc($query_kecamatan)) {
                                echo"<option value=\"$data_kecamatan[id_kec]\"> $data_kecamatan[nama_kecamatan] </option>";
                              }
                            ?>
                   </select>
                </div>
              </div>
			   
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=tower" class="btn btn-danger btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div>
		<div class="col-md-6 col-lg-6">
		 <div class="card">
		<div class="card-header">
			<div class="card-title white">Ambil Titik Koordinat</div>
			</div>
			<div class="card-body">
				<div id="map"></div>				
				</div>
				</div>
		 </div>
      </div>	 
    </div> 	
	
	
	
    </div>  
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
	  $id = $_GET['id'];
      $query = mysqli_query($mysqli, "SELECT * FROM tower WHERE id='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

<div class="row">
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title white">Edit Data Tower</div>
				
			</div>
			<div class="card-body">
			<div class="row">
			<div class="col-md-6 col-lg-6">
      <form role="form" class="form-horizontal" action="modules/tower/proses.php?act=update" method="POST" enctype="multipart/form-data">
		   <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="box-body">
            <div class="form-group">
                <label class="col-sm-12 control-label">Nama Pemilik</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="pemilik" value="<?php echo $data['pemilik']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-12 control-label">Nomor Izin</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nomor_izin"  value="<?php echo $data['nomor_izin']; ?>" required>
                </div>
              </div>
             
			       <div class="form-group">
                <label class="col-sm-12 control-label">Latitude</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="lat"  value="<?php echo $data['lat']; ?>" id="latInput" required>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-12 control-label">Longitude</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="lang"  value="<?php echo $data['lang']; ?>" id="lngInput" required>
                </div>
              </div>
            
                            <div class="form-group">
                                <label class="control-label" for="name">Gambar Tower <span class="required">*</span></label>
                                <input id="name" name="gambar" type="file" placeholder="Masukan Gambar" class="form-control input-md">
                                <?php  
                                if ($data['gambar']=="") { ?>
                                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/vendor-logo.jpg" width="100">
                                <?php
                                }
                                else { ?>
                                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/<?php echo $data['gambar']; ?>" width="128">
                                <?php
                                }
                                ?>
                            </div>
            
              <div class="form-group">
                <label class="col-sm-12 control-label">Jenis Tower</label>
                <div class="col-sm-12">
                  <select class="form-control"  name="id_jenis">
                    
                  <?php
                                    $ambil_paket = mysqli_query($mysqli, "SELECT * FROM tower LEFT JOIN jenis_tower ON tower.id_jenis = jenis_tower.id_jenis WHERE tower.id ='$id'")
                                    or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                                    $data_ambil = mysqli_fetch_assoc($ambil_paket);?>

                                  <option value="<?php echo $data_ambil['id_jenis']; ?>"><?php echo $data_ambil['jenis']; ?></option>
                                  <?php
                                    $query_jenis = mysqli_query($mysqli, "SELECT *  FROM jenis_tower ORDER BY id_jenis ASC")
                                    or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                                      while ($data_jenis = mysqli_fetch_assoc($query_jenis)) {
                                      echo"<option value=\"$data_jenis[id_jenis]\"> $data_jenis[jenis] </option>";
                                      }
                                  ?>
                         
                   </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-12 control-label">Kecamatan</label>
                <div class="col-sm-12">
                  <select class="form-control"  name="id_kec">
                  <?php
                  $ambil_kec = mysqli_query($mysqli, "SELECT * FROM tower LEFT JOIN kecamatan ON tower.id_kec = kecamatan.id_kec WHERE tower.id ='$id'")
                                    or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                                    $data_kec = mysqli_fetch_assoc($ambil_kec);?>

                                  <option value="<?php echo $data_kec['id_kec']; ?>"><?php echo $data_kec['nama_kecamatan']; ?></option>
							<?php
                              $query_kecamatan = mysqli_query($mysqli, "SELECT *  FROM kecamatan ORDER BY id_kec ASC")
                                                                    or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                              while ($data_kecamatan = mysqli_fetch_assoc($query_kecamatan)) {
                                echo"<option value=\"$data_kecamatan[id_kec]\"> $data_kecamatan[nama_kecamatan] </option>";
                              }
                            ?>
                   </select>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=tower" class="btn btn-danger btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div>
		<div class="col-md-6 col-lg-6">
		 <div class="card">
		<div class="card-header">
			<div class="card-title white">Ambil Titik Koordinat</div>
			</div>
			<div class="card-body">
				<div id="map"></div>				
				</div>
				</div>
		 </div>
      </div>	 
    </div> 	
	
	
	
    </div>  






<?php
}
?>
