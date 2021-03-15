<?php
class Masyarakat {

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login($username, $password)
    {
          $query = $this->pdo->query("SELECT * FROM masyarakat WHERE username = '$username'");
          if ($query->rowCount() > 0) {
              $rows = $query->fetch(PDO::FETCH_OBJ);
              if ($password == $rows->password) {
                  $_SESSION['username_masyarakat'] = $rows->username;
                  $_SESSION['login_masyarakat'] = true;
                  return true;
              }
              return false;
          }
    }

    // ini untuk register actor
    public function register($nik, $nama, $username, $password, $telp)
    {
        $query = $this->pdo->query("SELECT * FROM masyarakat WHERE nik = '$nik'");
        if($query->rowCount() > 0 ){
            var_dump('NIK sudah terdaftar');
        }else {
            $prepare = $this->pdo->prepare("INSERT INTO masyarakat (nik, nama,username, password, telp) VALUES (:nik, :nama, :username, :password, :telp)");
            $prepare->bindParam(':nik', $nik);
            $prepare->bindParam(':nama', $nama);
            $prepare->bindParam(':username', $username);
            $prepare->bindParam(':password', $password);
            $prepare->bindParam(':telp', $telp);

            $prepare->execute();
            return $prepare->rowCount();
        }    
    }

    public function fetch_masyarakat($username) {
        $query = $this->pdo->query("SELECT * FROM masyarakat WHERE username = '$username'");
        if($query->rowCount() > 0){
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
    }

    public function insert_pengaduan($nik, $isi){
        
        // Find Location images
        $targetDir = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR . "images". DIRECTORY_SEPARATOR;
        $targetFile = $targetDir . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile);
        
        date_default_timezone_set("Asia/Makassar");
        $tgl_pengaduan = date("Y-m-d");
        $status = 0;
        $prepare = $this->pdo->prepare("INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) VALUES (:tgl_pengaduan, :nik, :isi_laporan, :foto, :status)");
        
        $prepare->bindParam(':tgl_pengaduan', $tgl_pengaduan);  
        $prepare->bindParam(':nik', $nik);  
        $prepare->bindParam(':isi_laporan', $isi);
        $prepare->bindParam(':foto', $_FILES['foto']['name']);
        $prepare->bindParam(':status', $status);
        
        $prepare->execute();
        return $prepare->rowCount();
    }
}