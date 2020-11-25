<!doctype html>
<html lang="en"><head>
        
        <meta charset="utf-8" />
        <title>Sistem Informasi Pemetaan Titik Tower</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="dist/leaflet.css" />
		<script type="text/javascript" src="dist/leaflet.js"></script>
        <script type="text/javascript" src="js/app.js"></script>

    </head>
<script> 
		
$( document ).ready(function() {  
	initilizeMap();
	createMarker();
});
function initilizeMap() {
    map = L.map('map').setView([0.818410,  100.402070], 12);
			L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				maxZoom: 12,
				attribution: ''
			}).addTo(map);
   
	
}
function createMarker()
{
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
if(isset($_GET['ukur'])){ 
    $awal = $_GET['awal'];
    $str = explode(",",$awal);
    $lat = $str[0];
    
    require_once "config/database.php";
    $sql = mysqli_query($mysqli, "SELECT * FROM tower WHERE lat='$lat'")
				or die('Ada kesalahan pada query tampil Data : '.mysqli_error($mysqli));
            $row = mysqli_fetch_assoc($sql);
            
    $akhir = $_GET['akhir'];
    $str1 = explode(",",$akhir);
    $lat1 = $str1[0];
            
     require_once "config/database.php";
            $sql1 = mysqli_query($mysqli, "SELECT * FROM tower WHERE lat='$lat1'")
                        or die('Ada kesalahan pada query tampil Data : '.mysqli_error($mysqli));
                    $row1 = mysqli_fetch_assoc($sql1);
    ?>    
	 var markerFrom = L.marker([<?php echo $_GET['awal'];?>], { color: "#F00", radius: 10 });
	 var markerTo =  L.marker([<?php echo $_GET['akhir'];?>], { color: "#4AFF00", radius: 10 });
<?php } else { ?>
     var markerFrom = L.marker([0.8263492191598636,100.37129973527045], { icon: myIcon: 10 });
	 var markerTo =  L.marker([0.7621540360190914,100.40803526993842], { icon: myIcon: 10 });
<?php } ?>

	 var from = markerFrom.getLatLng();
	 var to = markerTo.getLatLng();
     var latlngs = [from,to];
	 markerFrom.bindPopup('<?php echo $row['pemilik'];?> ' + (from).toString());
	 markerTo.bindPopup('<?php echo $row1['pemilik'];?> ' + (to).toString());
	 map.addLayer(markerTo);
	 map.addLayer(markerFrom);
	 getDistance(from, to);

     var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);
            map.fitBounds(polyline.getBounds());
}

function getDistance(from, to)
{
    <?php 
    if(isset($_GET['ukur'])){ ?>
	var container = document.getElementById('distance');
    container.innerHTML = ("Jarak Dari <?php echo $row['pemilik'];?> Ke <?php echo $row1['pemilik'];?> = " + (from.distanceTo(to)).toFixed(0)/1000) + ' km';
    <?php }  ?>
}		
	</script>
    
    <body data-layout="horizontal" data-topbar="colored" onload="peta_awal()">

        <!-- Begin page -->
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="20">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="topnav">

                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
    
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                               <?php include "menu.php";?>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="content-box p-20 mt-15 fadeInUp animated">
                                            <div class="text-size-14 lh-20">Sistem Informasi Pemetaan UMKM Kabupaten Rokan Hulu.</div>
                                           <hr>
                                           <form method="get" action="">
                                           <div class="row">
                                           <div class="form-group">
                                                <label class="col-12 control-label">Pilih Titik Utama</label>
                                                <div class="col-sm-12">
                                                <select class="form-control"  name="awal">
                                                            <?php
                                                             require_once "config/database.php";
                                                            $query_umkm = mysqli_query($mysqli, "SELECT *  FROM tower")
                                                                                                    or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                                                            while ($data_umkm = mysqli_fetch_assoc($query_umkm)) {
                                                                echo"<option value='$data_umkm[lat],$data_umkm[lang]'> $data_umkm[pemilik] </option>";
                                                            }
                                                            ?>
                                                </select>
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Pilih Titik kedua</label>
                                                <div class="col-sm-12">
                                                <select class="form-control"  name="akhir">
                                                            <?php
                                                             require_once "config/database.php";
                                                            $query_umkm = mysqli_query($mysqli, "SELECT *  FROM tower")
                                                                                                    or die('Ada kesalahan pada query tampil : '.mysqli_error($mysqli));
                                                            while ($data_umkm = mysqli_fetch_assoc($query_umkm)) {
                                                                echo"<option value='$data_umkm[lat],$data_umkm[lang]'> $data_umkm[pemilik] </option>";
                                                            }
                                                            ?>
                                                </select>
                                                </div>
                                            </div>  
                                            </div>
                                            <div class="form-group">
                                                
                                                <div class="col-sm-12">
                                               <input type="submit" value="Lihat Jarak" class="btn btn-primary btn-sm" name="ukur" >
                                                </div>
                                              
                                            </div>
                                           </form>
                                           <?php 
                                           if(isset($_GET['ukur'])){ ?>                                           
                                           <div class="alert-primary text-white"><div id="distance" style="backgroud:#000; padding:10px; text-align:center; width:100%; height:45px;"></div></div>
										    <div id="map" style="width: 100%; height:600px;"></div>
                                           <?php } ?>
                                        </div>
                                    </div>
   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/pages/datatables.init.js"></script>

    </body>
	</html>
