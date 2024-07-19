<?php 

$Id_User = $_GET['id'];

$getUser = $conn->query("SELECT * FROM tbl_user WHERE Id_User = $Id_User") or die(mysqli_error($conn));
$admin = $getUser->fetch_assoc();

if(isset($_POST['edit'])) {
	$idUser = htmlspecialchars($_POST['idUser']);
	$FullName = htmlspecialchars($_POST['FullName']);
	$UserName = htmlspecialchars($_POST['UserName']);
	$Password = password_hash(htmlspecialchars($_POST['Password']), PASSWORD_DEFAULT);
  $stringPass = "";
  if ($_POST['Password']){
    $stringPass = ", Password = '$Password'";
  }

	$sql = $conn->query("UPDATE tbl_user SET Username = '$UserName', FullName = '$FullName' $stringPass WHERE Id_User = $idUser") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Success.');window.location='?p=admin';</script>";
	} else {
		echo "<script>alert('Failed.');window.location='?p=admin';</script>";
	}
}

?>
<div class="container">
  <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="index.php?p=admin">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
    </ol>
  </nav>
  <div class="card mb-4">
    <div class="card-header">
      <i class="bi bi-pencil mr-1"></i>
      Edit Admin
    </div>
    <div class="card-body">
      <form action="" method="post">
        <input type="hidden" id="idUser" name="idUser" value="<?= $admin['Id_User']; ?>" >
        <div class="mb-3">
          <label for="FullName" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="FullName" name="FullName" value="<?= $admin['FullName']; ?>" placeholder="ex ...">
        </div>
        <div class="mb-3">
          <label for="UserName" class="form-label">UserName</label>
          <input type="text" class="form-control" id="UserName" name="UserName" value="<?= $admin['Username']; ?>" placeholder="ex ...">
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="password" class="form-control" id="Password" name="Password"  placeholder="ex ...">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="edit">EDIT</button>
        </div>
      </form>
    </div>
  </div>
</div>