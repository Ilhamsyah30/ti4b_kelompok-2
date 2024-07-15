<?php 
session_start();
require_once 'config/koneksi.php';

if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$page = @$_GET['p'];
$aksi = @$_GET['aksi'];

// masih bug
// di halaman tambah transaksi
// di halaman transaksi/perpanjang.php
?>
<!-- <pre>
<?php var_dump($_SESSION['login']);  ?>
</pre> -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        <?php
        if($page == 'buku') {
            if($aksi == 'tambah') {
                echo "Tambah Buku";
            } else if($aksi == 'ubah') {
                echo "Ubah Buku";
            } else {
                echo "Halaman Buku";
            }
            
        } else if($page == 'anggota') {
            if($aksi == 'tambah') {
                echo "Tambah Anggota";
            } else if($aksi == 'ubah') {
                echo "Ubah Anggota";
            } else {
                echo "Halaman Anggota";
            }
        } else if($page == 'transaksi') {
            if($aksi == 'tambah') {
                echo "Tambah Transaksi";
            } else {
                echo "Halaman Transaksi";
            }
        } else {
            echo "Dashboard";
        }
        ?>
    </title>
    <link href="libs\bootstrap\css\bootstrap.min.css" rel="stylesheet" />
    <link href="libs\bootstrap\css\bootstrap.min.css" rel="stylesheet" />
    <link href="css\style.css" rel="stylesheet" />

    <script src="libs\jquery.js"></script>
    <script src="libs\bootstrap\js\bootstrap.min.js"></script>
    <script src="libs\script.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
      <div class="container-xl">
        <a class="navbar-brand" href="#">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav mx-lg-auto">
            <a class="nav-item nav-link active" href="#" aria-current="page">Dashboard</a>
            <a class="nav-item nav-link" href="#">Data Anggota</a>
            <a class="nav-item nav-link" href="#">Data Buku</a>
            <a class="nav-item nav-link" href="#">Transaksi</a>
          </div>

          <!-- <div class="navbar-nav ms-lg-4">
            <a class="nav-item nav-link" href="#">Sign in</a>
          </div> -->
          <!-- Action -->
          <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
            <a href="logout.php" class="btn btn-sm btn-danger w-full w-lg-auto">
              Logout
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div class="p-10 bg-surface-secondary">
      <div class="mb-8 text-center">
        <h3 class="mb-2">with <a href="https://github.com/webpixels/css" target="_blank">Kelompok 2</a></h3>
        <p>Content here ....</p>
      </div>
    </div>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
  </body>
</html>
