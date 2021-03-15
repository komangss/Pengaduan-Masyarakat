<?php 
require "../../connection.php";
require "../../class/AdminClass.php";

$class_admin = new Admin($pdo);

$id_petugas = $_GET['id_petugas'];

$delete_petugas = $class_admin->delete_petugas($id_petugas);

if($delete_petugas){
    echo'
        <script> 
            alert("Berhasil menghapus data petugas !");
            setTimeout(function() {
                window.location.href="../../../admin/dashboard.php";
            }, 1000);
        </script>';
}else {
    echo"gagal";
}