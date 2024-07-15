<?php 
session_start();
require_once 'config/koneksi.php';

if(isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM tb_user WHERE username = '$username'") or die(mysqli_error($conn));
    if($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])) {
            // pasang session
            $_SESSION['login'] = $row;

            header("Location: index.php");
            exit;
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="libs\bootstrap\css\bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-primary">
  <style>
    a {
        text-decoration: none;
    }
    .login-page {
        width: 100%;
        height: 100vh;
        display: inline-block;
        display: flex;
        align-items: center;
    }
    .form-right i {
        font-size: 100px;
    }
  </style>
  <div class="login-page bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <h3 class="mb-3">Login Perpustakaan</h3>
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">
                                <form action="" method="post" class="row g-4">
                                  <div class="col-12">
                                    <label>Username<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                      <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                      <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
                                    </div>
                                  </div>

                                  <div class="col-12">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                      <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                      <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
                                    </div>
                                  </div>

                                  <div class="col-sm-6">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="rememberPasswordCheck">
                                      <label class="form-check-label" for="rememberPasswordCheck">Remember me</label>
                                    </div>
                                  </div>

                                  <div class="col-sm-6">
                                    <a href="register.php" class="float-end text-primary">Need an account? Sign up!</a>
                                  </div>

                                  <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-4 float-end mt-4">login</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                <i class="bi bi-bootstrap"></i>
                                <h2 class="fs-1">Welcome Back!!!</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-end text-secondary mt-3">Kelompok 2 Login Page Design</p>
            </div>
        </div>
    </div>
  </div>
    <script src="libs\jquery.js" crossorigin="anonymous"></script>
    <script src="libs\bootstrap\js\bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
