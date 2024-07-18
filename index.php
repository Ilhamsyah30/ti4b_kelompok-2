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
            
        } else if($page == 'member') {
            if($aksi == 'add') {
                echo "Add member";
            } else if($aksi == 'ubah') {
                echo "Edit member";
            } else {
                echo "List member";
            }
        } else if($page == 'admin') {
            if($aksi == 'add') {
                echo "Add Admin";
            } else if($aksi == 'ubah') {
                echo "Edit Admin";
            } else {
                echo "List Admin";
            }
        } else if($page == 'transaction') {
            if($aksi == 'add') {
                echo "Add Transaction";
            } else {
                echo "List Transaction";
            }
        } else if($page == 'laporan') {
            echo "Laporan";
        } else {
            echo "Dashboard";
        }
        ?>
    </title>
    <link href="libs\bootstrap\css\bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="css\style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
            <a class="nav-item nav-link <?php echo $page == 'member' ? 'active' : ''; ?>" href="?p=member">List Member</a>
            <a class="nav-item nav-link <?php echo $page == 'admin' ? 'active' : ''; ?>" href="?p=admin">List Admin</a>
            <a class="nav-item nav-link <?php echo $page == 'book' ? 'active' : ''; ?>" href="?p=book">List Book</a>
            <a class="nav-item nav-link <?php echo $page == 'transaction' ? 'active' : ''; ?>" href="?p=transaction">Transaction</a>
            <a class="nav-item nav-link <?php echo $page == 'laporan' ? 'active' : ''; ?>" href="?p=laporan">Laporan</a>
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
          } else if($page == 'member') {
              if($aksi == '') {
                  require_once 'page/member/index.php';
              } else if($aksi == 'add') {
                  require_once 'page/member/add.php';
              } else if($aksi == 'edit') {
                  require_once 'page/member/edit.php';
              } else if($aksi == 'delete') {
                  require_once 'page/member/delete.php';
              }
          } else if($page == 'admin') {
            if($aksi == '') {
                require_once 'page/admin/index.php';
            } else if($aksi == 'add') {
                require_once 'page/admin/add.php';
            } else if($aksi == 'edit') {
                require_once 'page/admin/edit.php';
            } else if($aksi == 'delete') {
                require_once 'page/admin/delete.php';
            }
        } else if($page == 'transaction' || $page == 'transactionReturned') {
              if($aksi == '') {
                if($page == 'transactionReturned') {
                    require_once 'page/transaction/return.php';
                } else {
                    require_once 'page/transaction/index.php';
                }
              } else if($aksi == 'add') {
                require_once 'page/transaction/add.php';
              } else if($aksi == 'back') {
                  require_once 'page/transaction/back.php';
              } else if($aksi == 'extend') {
                  require_once 'page/transaction/extend.php';
              }
        } else if ($page == 'laporan') {
          require_once 'page/laporan/index.php';
        } else { ?>
            <div class="container">
              <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                </ol>
              </nav>
              <hr>
              <div class="row mt-4">
                <div class="col-md-12" class="">
                  <h4><b>Teknik Informatika 4B</b></h4>
                  <h4><b>Nama Kelompok:</b></h4>
                  <ul>
                    <li>Muhammad Reza Nurjaman</li>
                    <li>Ilham Andriansyah</li>
                    <li>Fajar Alfayet</li>
                    <li>Dio Andia</li>
                    <li>Diki Ruhimat</li>
                  </ul>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
              
          </div>
      </main>
    </div>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
  </body>
</html>
