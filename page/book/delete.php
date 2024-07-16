<?php 
$Id_Book = $_GET['Id_Book'];

$conn->query("DELETE FROM tbl_books WHERE Id_Book = $Id_Book") or die(mysqli_error($conn));
echo "<script>alert('Success');window.location='?p=book';</script>";

?>