<?php
require_once "config/database.php";
$umkm = $_GET["query"];
$query  = $mysqli->query("SELECT * FROM umkm WHERE nama_umkm LIKE '%$nama_umkm%' ");
$result = $query->fetch_All(MYSQLI_ASSOC);
if (count($result) > 0) {
    foreach($result as $data) {
        $output['suggestions'][] = [
            'value' => $data['nama_umkm'],
            'nama_umkm'  => $data['nama_umkm']
        ];
    }
    echo json_encode($output);
} else {
    $output['suggestions'][] = [
        'value' => '',
        'nama_umkm'  => ''
    ];
    echo json_encode($output);
}
