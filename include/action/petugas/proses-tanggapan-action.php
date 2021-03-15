<?php 
require "../../connection.php";
require "../../class/AdminClass.php";

$class_masyarakat = new Admin($pdo); 

$id_pengaduan = isset($_GET['id_pengaduan']) ? $_GET['id_pengaduan'] : '' ;
$tanggapan = $_POST['tanggapan'];
$id_petugas = $_POST['id_petugas'];

$insert_tanggapan = $class_masyarakat->insert_tanggapan($id_pengaduan, $tanggapan, $id_petugas);
if($insert_tanggapan > 0)
{
    echo '
        <script> 
            alert("Berhasil mengirim pengaduan");
            setTimeout(function() {
                window.location.href="../../../petugas/dashboard.php";
            }, 1000);
        </script>
    ';
}else {
    echo"gagal";
}