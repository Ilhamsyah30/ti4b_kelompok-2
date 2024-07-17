<?php 
require_once 'config/koneksi.php';

if(isset($_POST['regis'])) {
  $NIM = htmlspecialchars($_POST['NIM']);
	$FullName = htmlspecialchars($_POST['FullName']);
	$DateOfBirth = htmlspecialchars($_POST['DateOfBirth']);
	$Gender = htmlspecialchars($_POST['Gender']);
	$Email = htmlspecialchars($_POST['Email']);
	$PhoneNumber = htmlspecialchars($_POST['PhoneNumber']);
	$Address = htmlspecialchars($_POST['Address']);
	$JoinDate = date('Y-m-d');
	$YearOfStudy = htmlspecialchars($_POST['YearOfStudy']);
	$StudyProgram = htmlspecialchars($_POST['StudyProgram']);
  
	$sql = $conn->query("INSERT INTO tbl_member VALUES (null, '$NIM', '$FullName', '$DateOfBirth', '$Gender', '$Email', '$PhoneNumber', '$Address', '$JoinDate', 'Active', '$YearOfStudy', '$StudyProgram')") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Success.');window.location='login.php';</script>";
	} else {
		echo "<script>alert('Failse.')</script>";
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
    <title>Halaman Registrasi</title>
    <link href="libs\bootstrap\css\bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="css\style.css" rel="stylesheet" />

    <script src="libs\jquery.js"></script>
    <script src="libs\bootstrap\js\bootstrap.min.js"></script>
    <script src="libs\script.js"></script>
  </head>
  <body class="bg-primary">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Member</h3></div>
                  <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="NIM" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="NIM" name="NIM" placeholder="ex ...">
                      </div>
                      <div class="mb-3">
                        <label for="FullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="FullName" name="FullName" placeholder="ex ..." required>
                      </div>
                      <div class="mb-3">
                        <label for="DateOfBirth" class="form-label">Date of Birth</label>
                        <input type="text" class="form-control" id="DateOfBirth" name="DateOfBirth" placeholder="ex ..." required>
                      </div>
                      <div class="mb-3">
                        <label for="Gender" class="form-label">Gender</label>
                        <select name="Gender" id="Gender" class="form-control" required>
                          <option value="">-- Choise Gender --</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" placeholder="ex ..." required>
                      </div>
                      <div class="mb-3">
                        <label for="PhoneNumber" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="ex ..." required>
                      </div>
                      <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address" placeholder="ex ..." required>
                      </div>

                      <div class="form-group mt-4 mb-0">
                        <button type="submit" name="regis" class="btn btn-primary btn-block">Buat Akun</button>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center">
                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
