<?php
session_start();
require_once "../../config/database.php";
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
          
          
            $nama_kecamatan  = mysqli_real_escape_string($mysqli, trim($_POST['nama_kecamatan']));
            $id_user = $_SESSION['id_user'];
            $query = mysqli_query($mysqli, "INSERT INTO kecamatan(nama_kecamatan,id_user) 
                                            VALUES('$nama_kecamatan','$id_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            if ($query) {
                header("location: ../../main.php?module=kecamatan&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_kec'])) {
               	    $id_kec = mysqli_real_escape_string($mysqli, trim($_POST['id_kecamatan']));
                    $nama_kecamatan  = mysqli_real_escape_string($mysqli, trim($_POST['nama_kecamatan']));
                $query = mysqli_query($mysqli, "UPDATE kecamatan SET 	nama_kecamatan  = '$nama_kecamatan'
                                                              			WHERE id_kec = '$id_kec'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                if ($query) {
                    header("location: ../../main.php?module=kecamatan&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = mysqli_query($mysqli, "DELETE FROM kecamatan WHERE id_kec='$id'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            
            if ($query) {
                header("location: ../../main.php?module=kecamatan&alert=3");
            }
        }
    }       
}       
?>