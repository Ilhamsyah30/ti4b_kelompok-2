<?php 
require_once 'function.php';

$getTransactions = $conn->query("SELECT * FROM TBL_TRANSACTION INNER JOIN TBL_MEMBER 
										ON TBL_TRANSACTION.Id_Member = TBL_MEMBER.Id_Member INNER JOIN TBL_BOOKS
										ON TBL_TRANSACTION.Id_Book = TBL_BOOKS.Id_Book WHERE StatusTransaction = 'Returned'
										") or die(mysqli_error($conn));

?>
<div class="container">
  <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">List Transaction Returned</li>
    </ol>
  </nav>
  <hr>
  <div class="row mt-4">
    <div class="col-md-12" class="">
      <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            List Transaction Returned
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Membership</th>
                    <th>Books</th>
                    <th>Borrow Date</th>
                    <th>Due Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  while ($transaction = $getTransactions->fetch_assoc()) {
                    // var_dump($transaction); die;

                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $transaction['FullName']; ?></td>
                    <td><?= $transaction['Title']; ?></td>
                    <td><?= $transaction['BorrowDate']; ?></td>
                    <td><?= $transaction['DueDate']; ?></td>
                    <td>
                        	<?php 
                        	$denda = 1000;
                        	$tgl_dateline = $transaction['DueDate'];
                        	$tgl_kembali = $transaction['ReturnDate'];

                        	$lambat = terlambat($tgl_dateline, $tgl_kembali);
                        	$denda1 = $lambat * $denda;

                        	if($lambat > 0) { ?>
                        		<div style='color:red;'><?= $tgl_kembali ?><br><?= $lambat ?> Day  <br> (Rp. <?= number_format($denda1) ?>)</div>
                        	<?php
                        	} else {
                        		echo $tgl_kembali . "<br>" . $lambat . " Day";
                        	}
                        	?>
                    </td>
                    <td><?= $transaction['StatusTransaction']; ?></td>
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