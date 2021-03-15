<?php 

require "../../connection.php";
require "../../class/MasyarakatClass.php";

$class_masyarakat = new Masyarakat($pdo);   

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$telp = $_POST['telp'];

if($password !== $password2){
    echo "<script> alert('Password Berbeda') </script>";
}else {
    $register = $class_masyarakat->register($nik, $nama, $username, $password, $telp);
    if($register > 0) {
        echo'
        <script> 
            alert("Data Segitiga Berhasil Ditambah");
            setTimeout(function() {
                window.location.href="../../../index.php";
            }, 1000);
        </script>';
    }else {
        echo"gagal";
    }
}