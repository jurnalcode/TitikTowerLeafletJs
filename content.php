<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}
	elseif ($_GET['module'] == 'tower') {
		include "modules/tower/view.php";
	}
	elseif ($_GET['module'] == 'form_tower') {
		include "modules/tower/form.php";
	}
	elseif ($_GET['module'] == 'jenis') {
		include "modules/jenis/view.php";
	}
	elseif ($_GET['module'] == 'form_jenis') {
		include "modules/jenis/form.php";
	}
	elseif ($_GET['module'] == 'kecamatan') {
		include "modules/kecamatan/view.php";
	}
	elseif ($_GET['module'] == 'form_kecamatan') {
		include "modules/kecamatan/form.php";
	}
	elseif ($_GET['module'] == 'map') {
		include "modules/map/view.php";
	}
	elseif ($_GET['module'] == 'jarak') {
		include "modules/jarak/view.php";
	}
	elseif ($_GET['module'] == 'laporan') {
		include "modules/laporan/view.php";
	}
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>