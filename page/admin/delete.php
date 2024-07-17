<?php 
$Id_User = $_GET['id'];

$conn->query("DELETE FROM TBL_USER WHERE Id_User = $Id_User") or die(mysqli_error($conn));
echo "<script>alert('Success');window.location='?p=admin';</script>";

?>