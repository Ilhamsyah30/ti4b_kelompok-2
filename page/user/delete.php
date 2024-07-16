<?php 
$Id_Member = $_GET['Id_Member'];

$conn->query("DELETE FROM tbl_member WHERE Id_Member = $Id_Member") or die(mysqli_error($conn));
echo "<script>alert('Success');window.location='?p=book';</script>";

?>