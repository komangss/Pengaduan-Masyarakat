<?php 
    require "../include/connection.php";
    require "../include/class/AdminClass.php";

    if(!isset($_SESSION['login_admin'])) {
        header("Location: admin/index.php");
    }

    $class_petugas = new Admin($pdo);

    $fetch_all_pengaduan = $class_petugas->fetch_all_pengaduan();
    $fetch_petugas = $class_petugas->fetch_petugas($_SESSION['admin']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Masyarakat</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/adminlte/css/adminlte.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../assets/adminlte/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">Petugas : <?= $fetch_petugas->username; ?> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview ">
                            <a href="./dashboard.php" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Data Petugas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="./form-pengaduan.php" class="nav-link active">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Form Pengaduan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a onclick="return confirm('Yakin ingin keluar ?')"
                                href="../include/action/admin/logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Log Out </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Semua Data Form Pengaduan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th style="width: 20%;">Nama Pengirim</th>
                                                <th style="width: 20%;">Tanggal</th>
                                                <th>Foto</th>
                                                <th style="width: 20%;">Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <?php $i = 1; ?>
                                        <?php if($fetch_all_pengaduan == 'nodata') :?>
                                        <tbody>
                                            <tr>
                                                <td>Tidak Ada Form Pengaduan</td>
                                            </tr>
                                            <?php else : ?>
                                            <?php foreach($fetch_all_pengaduan as $pengaduan) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $pengaduan->nama; ?></td>
                                                <td><?= $pengaduan->tgl_pengaduan ?></td>
                                                <td><img src="../assets/images/<?= $pengaduan->foto?>" alt=""
                                                        style="width: 100%;"></td>
                                                <td>
                                                    <?php if($pengaduan->status == '0'): ?>
                                                    <button type="button" class="btn btn-danger">Menunggu</button>
                                                    <?php elseif($pengaduan->status == 'proses') : ?>
                                                    <button type="button" class="btn btn-info">Sedang Diproses</button>
                                                    <?php else : ?>
                                                    <button type="button" class="btn btn-success">Selesai</button>
                                                    <?php endif; ?>
                                                    <a href="details-pengaduan.php?id_pengaduan=<?= $pengaduan->id_pengaduan?>"
                                                        class="btn btn-primary">Detail </a>
                                                </td>
                                                <td> <a href="tanggapan-petugas.php?id_pengaduan=<?= $pengaduan->id_pengaduan?>"
                                                        class="btn btn-secondary">Lihat
                                                        Tanggapan</a></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2021 <a href="http://adminlte.io">gdamerda</a>.</strong> All rights
            reserved.
        </footer>
    </div>

    <!-- jQuery -->
    <script src="../assets/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/adminlte/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/adminlte/js/demo.js"></script>
    <!-- Summernote -->
    <script src="../assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Page Script -->
    <script>
    $(function() {
        //Add text editor
        $('#compose-textarea').summernote()
    })
    </script>
</body>

</html>