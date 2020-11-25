<?php
session_start();
require_once "../../config/database.php";
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            $jenis  = mysqli_real_escape_string($mysqli, trim($_POST['jenis']));
            $id_user = $_SESSION['id_user'];
            $query = mysqli_query($mysqli, "INSERT INTO jenis_tower(jenis,id_user) 
                                            VALUES('$jenis','$id_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            if ($query) {
                header("location: ../../main.php?module=jenis&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_jenis'])) {
               	 $id_jenis  = mysqli_real_escape_string($mysqli, trim($_POST['id_jenis']));
           		 $jenis  = mysqli_real_escape_string($mysqli, trim($_POST['jenis']));
                $query = mysqli_query($mysqli, "UPDATE jenis_tower SET  
                                                                    	jenis  = '$jenis'
                                                              			WHERE id_jenis  = '$id_jenis'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                if ($query) {
                    header("location: ../../main.php?module=jenis&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = mysqli_query($mysqli, "DELETE FROM jenis_tower WHERE id_jenis='$id'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            
            if ($query) {
                header("location: ../../main.php?module=jenis&alert=3");
            }
        }
    }       
}       
?>