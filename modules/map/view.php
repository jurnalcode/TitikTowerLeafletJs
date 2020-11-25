
				<script src="js/cari.js"></script>
        <script>
		function peta_awal() {
			var map = L.map('map').setView([0.818410,  100.402070], 12);
			L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				maxZoom: 18,
				attribution: ''
			}).addTo(map);
            
            var myIcon = L.icon({
                iconUrl: 'images/marker-icon-2x.png',
                iconSize: [38, 95],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76],
                shadowUrl: 'my-icon-shadow.png',
                shadowSize: [68, 95],
                shadowAnchor: [22, 94]
            });


			<?php
			require_once "config/database.php";
			$sql = mysqli_query($mysqli, "SELECT * FROM tower
            LEFT JOIN jenis_tower
            ON tower.id_jenis = jenis_tower.id_jenis
            LEFT JOIN kecamatan
            ON tower.id_kec = kecamatan.id_kec")
				or die('Ada kesalahan pada query tampil Data : '.mysqli_error($mysqli));
			

			$js = '';
			while ($row = mysqli_fetch_assoc($sql)) { 
				$js .= 'L.marker(['.$row['lat'].', '.$row['lang'].']).addTo(map)
						.bindPopup("<table class=table><tr><td colspan=3 align=center bgcolor=#fff class=center><strong>DATA TOWER</strong></td></tr><tr><tr><td>PEMILIK TOWER</td><td>:</td><td>'.$row['pemilik'].'</td></tr><tr><td>NOOR IZIN</td><td>:</td><td>'.$row['nomor_izin'].'</td></tr><tr><td>JENIS TOWER</td><td>:</td><td>'.$row['jenis'].'</td></tr><tr><td>KECAMATAN</td><td>:</td><td>'.$row['nama_kecamatan'].'</td></tr><tr><td> LATITUDE </td><td>:</td><td>'.$row['lat'].'</td></tr><tr><td> LONGITUDE </td><td>:</td><td>'.$row['lang'].'</td></tr><tr><tr><td colspan=3 align=center class=center><img src=images/'.$row['gambar'].'></td></tr><tr><tr><td colspan=3 align=center class=center> </td></tr><tr></table>");
						
						';
			}
			echo $js;
            ?>
    var data = [

        <?php
			require_once "config/database.php";
			$sql1 = mysqli_query($mysqli, "SELECT * FROM tower
            LEFT JOIN jenis_tower
            ON tower.id_jenis = jenis_tower.id_jenis
            LEFT JOIN kecamatan
            ON tower.id_kec = kecamatan.id_kec")
				or die('Ada kesalahan pada query tampil Data : '.mysqli_error($mysqli));
             while ($row1 = mysqli_fetch_assoc($sql1)) { ?>
		            {"loc":[<?php echo $row1['lat'];?>,<?php echo $row1['lang'];?>] , "title":"<?php echo $row1['pemilik']?> ","judul":"<?php echo '<table class=table><tr><td colspan=3 align=center bgcolor=#fff class=center><strong>DATA TOWER</strong></td></tr><tr><tr><td>PEMILIK TOWER</td><td>:</td><td>'.$row1['pemilik'].'</td></tr><tr><td>NOOR IZIN</td><td>:</td><td>'.$row1['nomor_izin'].'</td></tr><tr><td>JENIS TOWER</td><td>:</td><td>'.$row1['jenis'].'</td></tr><tr><td>KECAMATAN</td><td>:</td><td>'.$row1['nama_kecamatan'].'</td></tr><tr><td> LATITUDE </td><td>:</td><td>'.$row1['lat'].'</td></tr><tr><td> LONGITUDE </td><td>:</td><td>'.$row1['lang'].'</td></tr><tr><tr><td colspan=3 align=center class=center><img src=images/'.$row1['gambar'].'></td></tr><tr><tr><td colspan=3 align=center class=center> </td></tr><tr></table> '?> "},
		    <?php } ?>
	];   
	

map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));
    var markersLayer = new L.LayerGroup();
	
	map.addLayer(markersLayer);

	var controlSearch = new L.Control.Search({
		position:'topright',		
		layer: markersLayer,
		initial: false,
		zoom: 12,
		marker: false,
		
		hideMarkerOnCollapse: true,
		marker: {
			
			circle: {
				radius: 20,
				color: '#0a0',
				opacity: 1
			}
		}
	});
	map.addControl( controlSearch );
	for(i in data) {
		var title = data[i].title,
		judul = data[i].judul,	
			loc = data[i].loc,	
			marker = new L.Marker(new L.latLng(loc), {title: title} );
		marker.bindPopup( judul );
		markersLayer.addLayer(marker);
	}
	
            var popup = L.popup();
            L.marker([50.505, 30.57], {icon: myIcon}).radius,addTo(map);
		}
    </script>
                       
						<div class="row">
							<div class="col-lg-6 col-xl-12 col-md-12 col-12">
								<div class="card">
									<div class="card-body">
										
										 <div id="map" style="width: 100%; height:600px;"></div>
                                  
								</div>
							</div><!-- End col -->
							
							
						</div>
						<!-- End row -->
						
						