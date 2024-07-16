<?php 
// menampilkan DB Users
$getAdmins = $conn->query("SELECT * FROM TBL_USER ORDER BY Id_User DESC") or die(mysqli_error($conn));

?>
<div class="container">
  <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">List Admin</li>
    </ol>
  </nav>
  <hr>
  <div class="row mt-4">
    <div class="col-md-12" class="">
      <a href="?p=admin&aksi=add" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Add Admin</a>
      <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            List Admin
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>FullName</th>
                    <th>Photo</th>
                    <th>Level</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  while ($admin = $getAdmins->fetch_assoc()) {
                  
                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $admin['Username']; ?></td>
                    <td><?= $admin['FullName']; ?></td>
                    <td><?= $admin['Photo']; ?></td>
                    <td><?= $admin['Level']; ?></td>
                    <td>
                      <a href="?p=admin&aksi=ubah&id=<?= $admin['Id_User']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="?p=admin&aksi=hapus&id=<?= $admin['Id_User']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Yakin ?')"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#table').dataTable({
      responsive: true
    });
  });
</script>