<?php 
require "../../connection.php";
require "../../class/AdminClass.php";

$class_admin = new Admin($pdo);

$id_petugas = $_GET['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];

$update_petugas = $class_admin->update_petugas($nama_petugas, $username, $password,  $telp, $id_petugas);

if($update_petugas){
    echo'
        <script>
            alert("Berhasil Update Data Petugas !");
            setTimeout(function() {
                window.location.href="../../../admin/dashboard.php";
            }, 1000);
        </script>
    ';
}else {
    echo"gagal";
}