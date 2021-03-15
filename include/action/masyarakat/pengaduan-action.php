<?php 
require "../../connection.php";
require "../../class/MasyarakatClass.php";

$class_masyarakat = new Masyarakat($pdo); 

$nik = $_POST['nik'];
$isi = $_POST['isi_laporan'];

$insert_pengaduan = $class_masyarakat->insert_pengaduan($nik, $isi);

if($insert_pengaduan > 0) {
    echo'
        <script> 
            alert("Berhasil mengirim pengaduan");
            setTimeout(function() {
                window.location.href="../../../masyarakat/dashboard.php";
            }, 1000);
        </script>
    ';
}else {
    echo"gagal";
}