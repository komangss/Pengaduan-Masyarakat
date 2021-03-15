<?php 
require "../../connection.php";
require "../../class/MasyarakatClass.php";

$class_masyarakat = new Masyarakat($pdo);

$username = $_POST['username'];
$password = $_POST['password'];

$login = $class_masyarakat->login($username, $password);
if($login){
    if(isset($_SESSION['login_masyarakat'])){
    echo'        
        <script> 
            alert("Selamat Datang !");
            setTimeout(function() {
                window.location.href="../../../masyarakat/dashboard.php";
            }, 1000);
        </script>';
    }else {
        header("Location: ../../../index.php");
    }
}else {
    echo"gagal";
}