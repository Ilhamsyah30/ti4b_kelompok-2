<?php 

$Id_Member = $_GET['Id_Member'];

$getUser = $conn->query("SELECT * FROM tbl_member WHERE Id_Member = $Id_Member") or die(mysqli_error($conn));
$user = $getUser->fetch_assoc();

if(isset($_POST['edit'])) {
	$NIM = htmlspecialchars($_POST['NIM']);
	$FullName = htmlspecialchars($_POST['FullName']);
	$DateOfBirth = htmlspecialchars($_POST['DateOfBirth']);
	$Gender = htmlspecialchars($_POST['Gender']);
	$Email = htmlspecialchars($_POST['Email']);
	$PhoneNumber = htmlspecialchars($_POST['PhoneNumber']);
	$Address = htmlspecialchars($_POST['Address']);
	$JoinDate = htmlspecialchars($_POST['JoinDate']);
	$MembershipStatus = htmlspecialchars($_POST['MembershipStatus']);
	$YearOfStudy = htmlspecialchars($_POST['YearOfStudy']);
	$StudyProgram = htmlspecialchars($_POST['StudyProgram']);

	$sql = $conn->query("UPDATE tbl_member SET NIM = '$NIM', FullName = '$FullName', DateOfBirth = '$DateOfBirth', Gender = '$Gender', Email = '$Email', PhoneNumber = '$PhoneNumber', Address = '$Address', JoinDate = '$JoinDate', MembershipStatus = '$MembershipStatus', YearOfStudy = '$YearOfStudy', StudyProgram = '$StudyProgram' WHERE NIM = $NIM") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Success.');window.location='?p=user';</script>";
	} else {
		echo "<script>alert('Failed.');window.location='?p=user';</script>";
	}
}

?>
<div class="container">
  <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="index.php?p=user">Member</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Member</li>
    </ol>
  </nav>
  <div class="card mb-4">
    <div class="card-header">
      <i class="bi bi-pencil mr-1"></i>
      Edit Member
    </div>
    <div class="card-body">
      <form action="" method="post">
        <div class="mb-3">
          <label for="NIM" class="form-label">NIM</label>
          <input type="text" class="form-control" id="NIM" name="NIM" value="<?= $user['NIM']; ?>" placeholder="ex ..." readonly>
        </div>
        <div class="mb-3">
          <label for="FullName" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="FullName" name="FullName" value="<?= $user['FullName']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="DateOfBirth" class="form-label">Date of Birth</label>
          <input type="text" class="form-control" id="DateOfBirth" name="DateOfBirth" value="<?= $user['DateOfBirth']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="Gender" class="form-label">Gender</label>
          <select name="Gender" id="Gender" class="form-control" required>
            <option value="">-- Choise Gender --</option>
            <option value="Male" <?php echo $user['Gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo $user['Gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="Email" class="form-label">Email</label>
          <input type="email" class="form-control" id="Email" name="Email" value="<?= $user['Email']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="PhoneNumber" class="form-label">Phone Number</label>
          <input type="number" class="form-control" id="PhoneNumber" name="PhoneNumber" value="<?= $user['PhoneNumber']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="Address" class="form-label">Address</label>
          <input type="text" class="form-control" id="Address" name="Address" value="<?= $user['Address']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="JoinDate" class="form-label">JoinDate</label>
          <input type="text" class="form-control" id="JoinDate" name="JoinDate" value="<?= $user['JoinDate']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="MembershipStatus" class="form-label">Membership Status</label>
          <select name="MembershipStatus" id="MembershipStatus" class="form-control" required>
            <option value="">-- Choise Membership Status --</option>
            <option value="Active" <?php echo $user['MembershipStatus'] == 'Active' ? 'selected' : ''; ?>>Active</option>
            <option value="Inactive" <?php echo $user['MembershipStatus'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="edit">EDIT</button>
        </div>
      </form>
    </div>
  </div>
</div>