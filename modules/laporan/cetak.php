<?php
session_start();
ob_start();
require_once "../../config/database.php";
include "../../config/fungsi_tanggal.php";

$kecamatan = $_GET['kecamatan'];
$jenis = $_GET['jenis'];

?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Laporan </title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <style>
	.main {
	max-width:1100px;
	margin:0 auto;
	padding:10px;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	line-height:20px;
	font-size:11px;
	}
#laporan {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
 font-size:11px;
 width:100%;
 
}

#laporan td, #laporan th {
 
padding: 4px 10px 4px 10px;
}

#laporan tr:nth-child(even){background-color: #f2f2f2;}

#laporan tr:hover {background-color: #ddd;}

#laporan th {
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.ttd {
	margin-left:0px;
	width:250px;
	height:220px;
	text-align:center;
}
</style>
    <body>
  <div align="center">
	
  </div><br>
   	<div align="center">
           <strong>LAPORAN DATA TOWER </strong> <br>
</div>
        <br>
        <br>
        <div id="isi">
            <table id="laporan" width="100%" align="center">
                <thead style="background:#e8ecee">
                <tr class="bg-white">
													
													<th class="wd-15p">No</th>
													<th class="wd-20p">Pemilik</th>
													<th class="wd-20p">Nomor izin</th>
                                                    <th class="wd-20p">Latitude</th>
                                                    <th class="wd-20p">Longitude</th>
													<th class="wd-20p">Jenis Tower</th>
													<th class="wd-20p">Kecamatan</th>
													
												</tr>
                </thead>
                <tbody>
                <?php  
													$no = 1;            
													$query = mysqli_query($mysqli, " SELECT * FROM tower
															LEFT JOIN jenis_tower
															ON tower.id_jenis = jenis_tower.id_jenis
															LEFT JOIN kecamatan
															ON tower.id_kec = kecamatan.id_kec
                                                            WHERE tower.id_kec = '$kecamatan' 
                                                            AND tower.id_jenis = '$jenis'
															
													 ORDER BY tower.id DESC")
																					or die('Ada kesalahan pada query tampil Data : '.mysqli_error($mysqli));

													// tampilkan data
													while ($data = mysqli_fetch_assoc($query)) { 
												 
													  echo "<tr>
															  <td width='10' class='center'>$no</td>
															  <td width='' class='left'>$data[pemilik]</td>
															  <td width='' class='left'>$data[nomor_izin]</td>
															  <td width='' class='left'>$data[lat]</td>
															  <td width='' class='left'>$data[lang]</td>
															  <td width='' class='left'>$data[jenis]</td>
															  <td width='' class='left'>$data[nama_kecamatan]</td>
															</tr>";
													  $no++;
													}
													?>
												
                </tbody>
            </table>

           
    </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN.pdf"; 
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
require_once('../../config/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('L','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>
