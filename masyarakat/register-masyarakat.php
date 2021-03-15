<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>Masyarakat | Register</title>
</head>

<body>
    <!-- Inget Download Fontawesome -->
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin-top: 7em;">
                <div class="card mx-auto" style="width: 40em;">
                    <h1 class="card-title text-center">Register Masyakarat</h1>
                    <div class="card-body">
                        <form action="../include/action/masyarakat/register-action.php" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="inlineFormInputGroup">NIK</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">510</div>
                                        </div>
                                        <input type="text" name="nik" class="form-control" id="inlineFormInputGroup"
                                            placeholder="NIK" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="inlineFormInputGroup">Nama</label>
                                    <div class="input-group mb-2">
                                        <input type="text" name="nama" class="form-control" id="inlineFormInputGroup"
                                            placeholder="Nama" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="inlineFormInputGroup">Username</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" name="username" class="form-control"
                                            id="inlineFormInputGroup" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Nomer Telpon</label>
                                    <input type="number" name="telp" class="form-control" placeholder="Nomer Telpon"
                                        required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Re-Type Password</label>
                                    <input type="password" name="password2" class="form-control" placeholder="Password"
                                        required>
                                </div>
                                <div class="col-12 mt-2 text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    <p>Already have account ? <a href="../index.php">Click Here</a></p>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="assets/js/bootstrap.js"></script>
</body>

</html>