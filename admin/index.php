<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>Petugas | Login</title>
</head>

<body>
    <!-- Inget Download Fontawesome -->
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin-top: 7em;">
                <div class="card mx-auto" style="width: 20em;">
                    <h1 class="card-title text-center">Sign In Petugas</h1>
                    <div class="card-body">
                        <form action="../include/action/admin/login-action.php" method="POST">
                            <div class="form-group">
                                <label for="inlineFormInputGroup">Username</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="text" name="username" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
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