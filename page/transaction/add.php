<?php 
$ViewNameBooks = $conn->query("SELECT * FROM TBL_BOOKS ORDER BY Id_Book") or die(mysqli_error($conn));

$ViewNameMember = $conn->query("SELECT * FROM TBL_MEMBER ORDER BY NIM") or die(mysqli_error($conn));

$tgl_pinjam = date('d-m-Y');
$tujuh_hari = mktime(0,0,0, date('n'), date('j') + 7, date('Y'));
$kembali = date('d-m-Y', $tujuh_hari);

if(isset($_POST['add'])) {
    
    $tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($_POST['tgl_kembali']);
    $nama_buku = $_POST['title'];
    $pecahB = explode(".", $nama_buku);
    $id = $pecahB[0];
    $judul = $pecahB[1];

    $nama_anggota = $_POST['nama'];
    $pecahN = explode(".", $nama_anggota);
    $nim = $pecahN[0];
    $nama = $pecahN[1];
    
    $sql = $conn->query("SELECT * FROM TBL_BOOKS WHERE Title = '$judul'") or die(mysqli_error($conn));
    while($data = $sql->fetch_assoc()) {
        $sisa = $data['NumberOfCopies'];
        
        if($sisa == 0) {
            echo "<script>alert('Stok Buku Habis, Transaksi, tidak dapat dilakukan, silahkan tambahkan stok buku dulu.');window.location='?p=transaction&aksi=add';</script>";
        } else {
            // var_dump(null, $nim, $id, $tgl_pinjam, $tgl_kembali, null, 'Borrowed'); die;
            $conn->query("INSERT INTO TBL_TRANSACTION VALUES(null, '$nim', '$id', '$tgl_pinjam', '$tgl_kembali', null, 'Borrowed')") or die(mysqli_error($conn));
            $conn->query("UPDATE TBL_BOOKS SET NumberOfCopies = (NumberOfCopies-1) WHERE Id_Book = '$id'") or die(mysqli_error($conn));
            echo "<script>alert('Data transaksi berhasil ditambahkan.');window.location='?p=transaction';</script>";
        }
    }
}


?>

<div class="container">
    <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Transaction</li>
        </ol>
    </nav>
<hr>
<h1 class="mt-4">Add New Transaction</h1>
<div class="card-header mb-5">
	
	<form action="" method="post">
    
    <div class="form-group">
        <label class="small mb-1" for="title">Books</label>
        <select name="title" id="title" class="form-control">
            <option value="">-- Select Books --</option>
            <?php 
            while ($Books = $ViewNameBooks->fetch_assoc()) {
            echo "<option value='$Books[Id_Book].$Books[Title]'>$Books[Title]</option>";
            
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Name Member</label>
        <select name="nama" id="nama_anggota" class="form-control">
            <option value="">-- Select Membership --</option>
            <?php 
            while ($membership = $ViewNameMember->fetch_assoc()) {
            echo "<option value='$membership[Id_Member].$membership[FullName]'>$membership[NIM] - $membership[FullName]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tgl_pinjam" class="mb-2">Tanggal Pinjam</label>
        <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="" value="<?= $tgl_pinjam ?>">
    </div>
    <div class="form-group">
        <label for="tgl_kembali" class="mb-2">Tanggal Kembali</label>
        <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="" value="<?= $kembali ?>">
    </div>
    <div class="form-group mt-2">
    	<button type="submit" class="btn btn-primary" name="add">Tambah Data</button>
    </div>
	</form>
</div>
</div>