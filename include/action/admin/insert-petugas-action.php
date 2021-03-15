<?php 
require "../../connection.php";
require "../../class/AdminClass.php";

$class_admin = new Admin($pdo);

$namapetugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$telp = $_POST['telp'];
$level = $_POST['level'];

$insert_petugas = $class_admin->insert_petugas($namapetugas, $username, $password, $telp, $level);

if($password == $password2){
    if($insert_petugas > 0){
        echo'   
        <script> 
            alert("Data Petugas Berhasil Masuk !")
            setTimeout(function() {
                window.location.href="../../../admin/dashboard.php"
            }, 1000);
        </script>';
    }else {
        echo "gagal";
    }
}else {
    echo '        
        <script> 
            alert("Password tidak sama")
            setTimeout(function() {
                window.location.href="../../../admin/add-petugas.php"
            }, 1000);
        </script>';
}