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
// di halaman transaction/perpanjang.php
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
        if($page == 'book') {
            if($aksi == 'add') {
                echo "Add Book";
            } else if($aksi == 'edit') {
                echo "Edit Book";
            } else {
                echo "List Book";
            }
            
        } else if($page == 'user') {
            if($aksi == 'add') {
                echo "Add User";
            } else if($aksi == 'ubah') {
                echo "Edit User";
            } else {
                echo "List User";
            }
        } else if($page == 'transaction') {
            if($aksi == 'add') {
                echo "Add Transaction";
            } else {
                echo "List Transaction";
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
            <a class="nav-item nav-link <?php echo $page == '' ? 'active' : ''; ?>" href="index.php" aria-current="page">Dashboard</a>
            <a class="nav-item nav-link <?php echo $page == 'user' ? 'active' : ''; ?>" href="?p=user">List User</a>
            <a class="nav-item nav-link <?php echo $page == 'admin' ? 'active' : ''; ?>" href="?p=admin">List Admin</a>
            <a class="nav-item nav-link <?php echo $page == 'book' ? 'active' : ''; ?>" href="?p=book">List Book</a>
            <a class="nav-item nav-link <?php echo $page == 'transaction' ? 'active' : ''; ?>" href="?p=transaction">Transaction</a>
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

    <div id="layoutSidenav_content">
      <main>
          <div class="container-fluid">
              <!-- <h1 class="mt-4">Static Navigation</h1> -->
          <?php 

          if($page == 'book') {
              if($aksi == '') {
                  require_once 'page/book/index.php';
              } else if($aksi == 'add') {
                  require_once 'page/book/add.php';
              } else if($aksi == 'edit') {
                  require_once 'page/book/edit.php';
              } else if($aksi == 'delete') {
                  require_once 'page/book/delete.php';
              }
          } else if($page == 'user') {
              if($aksi == '') {
                  require_once 'page/user/index.php';
              } else if($aksi == 'add') {
                  require_once 'page/user/add.php';
              } else if($aksi == 'edit') {
                  require_once 'page/user/edit.php';
              } else if($aksi == 'delete') {
                  require_once 'page/user/delete.php';
              }
          } else if($page == 'transaction') {
              if($aksi == '') {
                  require_once 'page/transaction/index.php';
              } else if($aksi == 'tambah') {
                  require_once 'page/transaction/add.php';
              } else if($aksi == 'back') {
                  require_once 'page/transaction/back.php';
              } else if($aksi == 'extend') {
                  require_once 'page/transaction/extend.php';
              }
          } else { ?>
              <h1 class="mt-4">Dashboard</h1>
              <ol class="breadcrumb mb-4">
                  <!-- <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li> -->
                  <li class="breadcrumb-item active">dashboard</li>
              </ol>
          <?php
          }
          ?>
              
          </div>
      </main>
    </div>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
  </body>
</html>
