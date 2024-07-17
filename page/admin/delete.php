<?php 
$Id_User = $_GET['id'];

$conn->query("DELETE FROM tbl_user WHERE Id_User = $Id_User") or die(mysqli_error($conn));
echo "<script>alert('Success');window.location='?p=admin';</script>";

?>