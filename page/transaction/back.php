<?php 
$Id_Transaction = $_GET['id'];
$id_judul_buku = $_GET['title'];

// var_dump($Id_Transaction, $id_judul_buku); die;
$conn->query("UPDATE TBL_TRANSACTION SET StatusTransaction = 'Returned' WHERE Id_Transaction = $Id_Transaction") or die(mysqli_error($conn));

$conn->query("UPDATE TBL_BOOKS SET NumberOfCopies = (NumberOfCopies+1) WHERE Title = '$id_judul_buku'") or die(mysqli_error($conn));

	echo "<script>alert('Proses, kembalian buku berhasil.');window.location='?p=transaction';</script>";

?>