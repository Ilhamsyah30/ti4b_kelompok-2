<?php 
if(isset($_POST['add'])) {
	$FullName = htmlspecialchars($_POST['FullName']);
	$UserName = htmlspecialchars($_POST['UserName']);
	$Password = htmlspecialchars($_POST['Password']);

	$sql = $conn->query("INSERT INTO tbl_user VALUES (null, '$UserName', '$Password', '$FullName')") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Success.');window.location='?p=admin';</script>";
	} else {
		echo "<script>alert('Failed.')</script>";
	}
}

?>
<div class="container">
  <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="index.php?p=admin">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
    </ol>
  </nav>
  <div class="card mb-4">
      <div class="card-header">
        <i class="bi bi-plus mr-1"></i>
        Add Admin
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="mb-3">
            <label for="FullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="FullName" name="FullName" placeholder="ex ..." required>
          </div>
          <div class="mb-3">
            <label for="UserName" class="form-label">UserName</label>
            <input type="text" class="form-control" id="UserName" name="UserName" placeholder="ex ..." required>
          </div>
          <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" placeholder="ex ..." required>
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="add">ADD</button>
          </div>
        </form>
      </div>
  </div>
</div>