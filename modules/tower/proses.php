<?php
session_start();
require_once "../../config/database.php";
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            $pemilik  = mysqli_real_escape_string($mysqli, trim($_POST['pemilik']));
			$nomor_izin  = mysqli_real_escape_string($mysqli, trim($_POST['nomor_izin']));
            $id_jenis = mysqli_real_escape_string($mysqli, trim($_POST['id_jenis']));
            $id_kec  = mysqli_real_escape_string($mysqli, trim($_POST['id_kec']));
            $lat  = mysqli_real_escape_string($mysqli, trim($_POST['lat']));
			$lang  = mysqli_real_escape_string($mysqli, trim($_POST['lang']));
            $id_user = $_SESSION['id_user'];
            $photo = $_FILES['gambar']['name'];
			$folderphoto     = "../../images/".$photo;
            $photonya     = $_FILES['gambar']['tmp_name'];
			move_uploaded_file($photonya,$folderphoto);
            $query = mysqli_query($mysqli, "INSERT INTO tower(pemilik,nomor_izin,id_jenis,id_kec,lat,lang,gambar,id_user) 
                                            VALUES('$pemilik','$nomor_izin','$id_jenis','$id_kec','$lat','$lang','$photo','$id_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            if ($query) {
                header("location: ../../main.php?module=tower&alert=1");
            }   
        }   
    }
    elseif ($_GET['act']=='update') {
		if (isset($_POST['simpan'])) {
			if (isset($_POST['id'])) {
				// ambil data hasil submit dari form
				$id = $_POST['id'];   
                $pemilik  = mysqli_real_escape_string($mysqli, trim($_POST['pemilik']));
                $nomor_izin  = mysqli_real_escape_string($mysqli, trim($_POST['nomor_izin']));
                $id_jenis = mysqli_real_escape_string($mysqli, trim($_POST['id_jenis']));
                $id_kec  = mysqli_real_escape_string($mysqli, trim($_POST['id_kec']));
                $lat  = mysqli_real_escape_string($mysqli, trim($_POST['lat']));
                $lang  = mysqli_real_escape_string($mysqli, trim($_POST['lang']));
				$nama_file          = $_FILES['gambar']['name'];
				$ukuran_file        = $_FILES['gambar']['size'];
				$tipe_file          = $_FILES['gambar']['type'];
				$tmp_file           = $_FILES['gambar']['tmp_name'];
				$allowed_extensions = array('jpg','jpeg','png');
				$path_file          = "../../images/".$nama_file;
				$file               = explode(".", $nama_file);
				$extension          = array_pop($file);
				if (empty($_FILES['gambar']['name'])) {
                    $query = mysqli_query($mysqli, "UPDATE tower SET pemilik 	= '$pemilik',
                                                                    nomor_izin 	= '$nomor_izin',
                                                                    id_jenis 	= '$id_jenis',
                                                                    id_kec 	= '$id_kec',
                                                                    lat 	= '$lat',
                                                                    lang 	= '$lang'
                                                                  WHERE id 	= '$id'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
                    if ($query) {
                        header("location: ../../main.php?module=tower&alert=2");
                    }
				}
				else {
					if (in_array($extension, $allowed_extensions)) {
	                    if($ukuran_file <= 1000000) { 
	                        if(move_uploaded_file($tmp_file, $path_file)) { 
			                    $query = mysqli_query($mysqli, "UPDATE tower SET pemilik 	= '$pemilik',
                                                                    nomor_izin 	= '$nomor_izin',
                                                                    id_jenis 	= '$id_jenis',
                                                                    id_kec 	= '$id_kec',
                                                                    lat 	= '$lat',
                                                                    lang 	= '$lang',
                                                                    gambar = '$nama_file'
                                                                  WHERE id 	= '$id'")
			                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
			                    if ($query) {
			                        header("location: ../../main.php?module=tower&alert=1");
			                    }
                        	} else {
	                            header("location: ../../main.php?module=tower&alert=2");
	                        }
	                    } else {
	                        header("location: ../../main.php?module=tower&alert=3");
	                    }
	                } else {
	                    header("location: ../../main.php?module=tower&alert=4");
	                } 
				}
			}
		}
	}	

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = mysqli_query($mysqli, "DELETE FROM tower WHERE id='$id'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            
            if ($query) {
                header("location: ../../main.php?module=tower&alert=3");
            }
        }
    }       
}       
?>