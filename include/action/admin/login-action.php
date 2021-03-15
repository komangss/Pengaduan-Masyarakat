<?php 
require "../../connection.php";
require "../../class/AdminClass.php";

$class_admin = new Admin($pdo);

$username = $_POST['username'];
$password = $_POST['password'];
$login = $class_admin->login($username, $password);

if($login == 'admin') {
    echo '
        <script>
            alert("Selamat Datang Admin !");
            setTimeout(function() {
                window.location.href = "../../../admin/dashboard.php";
            }, 1000);
        </script>
    ';
}elseif ($login == 'petugas' ){
    echo '
        <script>
            alert("Selamat Datang Petugas !");
            setTimeout(function() {
                window.location.href = "../../../petugas/dashboard.php";
            }, 1000);
        </script>
    ';
}else {
    echo '
        <script>
            alert("Username atau Password salah !");
            setTimeout(function() {
                window.location.href = "../../../admin/index.php";
            }, 1000);
        </script>
    ';
}