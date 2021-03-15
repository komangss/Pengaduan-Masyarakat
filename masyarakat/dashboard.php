<?php 
    require "../include/connection.php";
    require "../include/class/MasyarakatClass.php";

    if(!isset($_SESSION['login_masyarakat'])) {
        header("Location: ../index.php");
        exit;
    }else {
        $class_masyarakat = new Masyarakat($pdo);
        $fetch_masyarakat = $class_masyarakat->fetch_masyarakat($_SESSION['username_masyarakat']);
    }
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
                        <a href="#" class="d-block">Username : <?= $fetch_masyarakat->username ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Mailbox
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a onclick="return confirm('Yakin ingin keluar ?')"
                                href="../include/action/masyarakat/logout.php" class="nav-link">
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
                                    <h3 class="card-title">Isi Form Pengaduan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="../include/action/masyarakat/pengaduan-action.php" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="nik" value="<?= $fetch_masyarakat->nik; ?>">
                                        <div class="form-group">
                                            <label for="images">Insert Foto</label>
                                            <input type="file" name="foto" id="images" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea id="compose-textarea" class="form-control" name="isi_laporan">
                                            </textarea>
                                        </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>
                                            Send</button>
                                    </div>
                                    </form>
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