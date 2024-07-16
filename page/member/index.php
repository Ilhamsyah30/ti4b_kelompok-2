<?php 
// menampilkan DB buku
$getUsers = $conn->query("SELECT * FROM tbl_member ORDER BY Id_Member DESC") or die(mysqli_error($conn));

?>
<div class="container">
  <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">List Member</li>
    </ol>
  </nav>
  <hr>
  <div class="row mt-4">
    <div class="col-md-12" class="">
      <a href="?p=member&aksi=add" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Add Member</a>
      <div class="card mb-4">
          <div class="card-header">
            <i class="bi bi-table mr-1"></i>
            List Member
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="table">
              <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Date Of Birth</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($user = $getUsers->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $user['NIM']; ?></td>
                        <td><?= $user['FullName']; ?></td>
                        <td><?= $user['PhoneNumber']; ?></td>
                        <td><?= $user['Gender']; ?></td>
                        <td><?= $user['Address']; ?></td>
                        <td><?= $user['DateOfBirth']; ?></td>
                        <td>
                            <a href="?p=member&aksi=edit&Id_Member=<?= $user['Id_Member']; ?>" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i></a>
                            <a href="?p=member&aksi=delete&Id_Member=<?= $user['Id_Member']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash" onclick="return confirm('Yakin ?')"></i></a>
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