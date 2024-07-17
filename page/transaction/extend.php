<?php 
$id_transaksi = $_GET['id'];
$id_judul = $_GET['title'];
$id_tgl_kembali = $_GET['DueDate'];
$lambat = $_GET['lambat'];

// jika buku yang di pinjam tidak di kembalikan, lewat dari 7 hari (terlambat) tidak bisa meminjam buku lagi, sehingga kembalikan bukunya dulu.
if($lambat > 3) {
	echo "<script>alert('Pinjam buku tidak dapat di perpanjang, karena lebih dari 7 hari... kembalikan bukunya terlebih dahulu, lalu pinjam lagi.');window.location='?p=transaction';</script>";
} else {
	$pecah_tgl_kembali = explode('-', $id_tgl_kembali);
	$next7Hari = mktime(0,0,0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0] + 7, $pecah_tgl_kembali[2]);
	$hari_next = date('d-m-Y', $next7Hari);

	$sql = $conn->query("UPDATE TBL_TRANSACTION SET DueDate = '$hari_next' WHERE Id_Transaction = $id_transaksi") or die(mysqli_error($conn));

	if($sql) {
		echo "<script>alert('Perpanjang jangka waktu buku berhasil.');window.location='?p=transaction';</script>";
	} else {
		echo "<script>alert('Perpanjang gagal.');window.location='?p=transaction';</script>";
	}
}

?>