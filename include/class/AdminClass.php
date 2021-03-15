<?php
class Admin {

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Ini function login
    public function login($username, $password)
    {
        $query = $this->pdo->query("SELECT * FROM petugas WHERE username = '$username'");
        if($query->rowCount() > 0){
            $rows = $query->fetch(PDO::FETCH_OBJ);

            if($rows->level == 'admin'){
                if($password == $rows->password){
                    $_SESSION['admin'] = $rows->username;
                    $_SESSION['login_admin'] = true;
                    return 'admin';
                }
            }else {
                if($password == $rows->password){
                    $_SESSION['petugas'] = $rows->username;
                    $_SESSION['login_petugas'] = true;
                    return 'petugas';  
                } 
            }
            return false;
        }
    }

    // ini function insert data
    public function insert_petugas($nama_petugas, $username, $password, $telp, $level)
    {
        $query = $this->pdo->query("SELECT * FROM petugas WHERE username = '$username'");
        if($query->rowCount() > 0){
            echo '        
            <script> 
                 alert("Username Petugas telah terdaftar!");
                setTimeout(function() {
                    window.location.href="../../../admin/dashboard.php";
                }, 1000);
            </script>';
        }else {
            $prepare = $this->pdo->prepare("INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUES (:nama_petugas, :username, :password, :telp, :level)");

            $prepare->bindParam(':nama_petugas', $nama_petugas);
            $prepare->bindParam(':username', $username);
            $prepare->bindParam(':password', $password);
            $prepare->bindParam(':telp', $telp);
            $prepare->bindParam(':level', $level);

            $prepare->execute();
            return $prepare->rowCount();
        }
    }

    // ini function menampilkan data berdasar field tertentu
    public function fetch_petugas($username) 
    {
        $query = $this->pdo->query("SELECT * FROM petugas WHERE username = '$username'");
        if($query->rowCount() > 0){
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
        return false;
    }

    // ini function untuk menampilkan semua data
    public function fetch_all_petugas($petugas)
    {
        $query = $this->pdo->query("SELECT * FROM petugas WHERE level = '$petugas'");
        if($query->rowCount() > 0){
            while($rows = $query->fetch(PDO::FETCH_OBJ)){
                $data[] = $rows;
            }
            return $data;
        }else {
            return 'nodata';
        }
    }

    public function fetch_id_petugas($id_petugas)
    {
        $query = $this->pdo->query("SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");
        if($query->rowCount() > 0){
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
        return false;
    }

    // ini function untuk update data
    public function update_petugas($nama_petugas, $username, $password, $telp, $id_petugas)
    {
        $query = $this->pdo->prepare("UPDATE petugas SET nama_petugas = :nama_petugas, username = :username, telp = :telp, password = :password WHERE id_petugas = :id_petugas");
        $query->bindParam(':nama_petugas', $nama_petugas);
        $query->bindParam(':username', $username);
        $query->bindParam(':telp', $telp);
        $query->bindParam(':password', $password);
        $query->bindParam(':id_petugas', $id_petugas);
        $query->execute();
        return true; 
    }
    
    // ini function untuk delete data
    public function delete_petugas($id_petugas)
    {
        $query = $this->pdo->prepare("DELETE FROM petugas WHERE id_petugas = :id_petugas");
        $query->bindParam(':id_petugas', $id_petugas);
        $query->execute();
        return true;
    }

    public function fetch_all_pengaduan()
    {
        $query = $this->pdo->query("SELECT pengaduan.*, masyarakat.nama FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik");
        if($query->rowCount() > 0){
            while($rows = $query->fetch(PDO::FETCH_OBJ)){
                $data[] = $rows;
            }
            return $data;
        }
        return 'nodata';
    }

    public function fetch_pengaduan($id_pengaduan)
    {
        $query = $this->pdo->query("SELECT pengaduan.*, masyarakat.nama FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE id_pengaduan = '$id_pengaduan'");
        if($query->rowCount() > 0){
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }
        return false;
    }

    public function insert_tanggapan($id_pengaduan, $tanggapan, $id_petugas)
    {
        date_default_timezone_set('Asia/Makassar');
        $tgl_tanggapan = date("Y-m-d");
        $prepare = $this->pdo->prepare("INSERT INTO tannggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES (:id_pengaduan, :tgl_tanggapan, :tanggapan, :id_petugas)");

        $prepare->bindParam(':id_pengaduan', $id_pengaduan);
        $prepare->bindParam(':tgl_tanggapan', $tgl_tanggapan);
        $prepare->bindParam(':tanggapan', $tanggapan);
        $prepare->bindParam(':id_petugas', $id_petugas);

        if($prepare->execute()) {
            $status = $_POST['status'];
            $id_pengaduan = $_GET['id_pengaduan'];
            $prepare2 = $this->pdo->prepare("UPDATE pengaduan SET status = :status WHERE id_pengaduan = :id_pengaduan");

            $prepare2->bindParam(':status', $status);
            $prepare2->bindParam(':id_pengaduan', $id_pengaduan);

            $prepare2->execute();
            return $prepare2->rowCount();
        }
        return $prepare->rowCount();
    }

    public function fetch_tanggapan($id_pengaduan)
    {   
        $query = $this->pdo->query("SELECT * FROM tannggapan WHERE id_pengaduan = '$id_pengaduan'");
        if($query->rowCount() > 0 ){
            $rows = $query->fetch(PDO::FETCH_OBJ);
            return $rows;
        }else {
            return 'nodata';
        }
    }
}