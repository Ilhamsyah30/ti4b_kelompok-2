<?php 
require_once __DIR__ . '/../transaction/function.php';

$getTransactions = $conn->query("SELECT * FROM tbl_transaction INNER JOIN tbl_member 
                                        ON tbl_transaction.Id_Member = tbl_member.Id_Member INNER JOIN tbl_books
                                        ON tbl_transaction.Id_Book = tbl_books.Id_Book WHERE StatusTransaction != 'Returned'  
                                        ") or die(mysqli_error($conn));
$getTransactionsReturned = $conn->query("SELECT * FROM tbl_transaction INNER JOIN tbl_member 
										ON tbl_transaction.Id_Member = tbl_member.Id_Member INNER JOIN tbl_books
										ON tbl_transaction.Id_Book = tbl_books.Id_Book WHERE StatusTransaction = 'Returned'
										") or die(mysqli_error($conn));
?>
<div class="container">
  <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Transactiont</a></li>
      <li class="breadcrumb-item active" aria-current="page">Laporan</li>
    </ol>
  </nav>
  <hr>
  <div class="container p-5">
    <ul class="nav nav-pills mb-3 border-bottom border-2" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark fw-semibold active position-relative" id="pills-transactiont-tab" data-bs-toggle="pill" data-bs-target="#pills-transactiont" type="button" role="tab" aria-controls="pills-transactiont" aria-selected="true">Transactiont</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark fw-semibold position-relative" id="pills-transactionReturned-tab" data-bs-toggle="pill" data-bs-target="#pills-transactionReturned" type="button" role="tab" aria-controls="pills-transactionReturned" aria-selected="false">Transaction Returned</button>
      </li>
    </ul>
    <div class="tab-content border rounded-3 border-primary p-3 text-danger" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-transactiont" role="tabpanel" aria-labelledby="pills-transactiont-tab">
        <div class="row mt-4">
          <div class="col-md-12" class="">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Laporan
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div class="mb-2">
                    <div id="buttons"></div>
                  </div>
                  <table class="table table-bordered" id="tableTransaction">
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
                      require_once __DIR__ . '/../transaction/function.php';
                      $getTransactions = $conn->query("SELECT * FROM tbl_transaction INNER JOIN tbl_member 
                                            ON tbl_transaction.Id_Member = tbl_member.Id_Member INNER JOIN tbl_books
                                            ON tbl_transaction.Id_Book = tbl_books.Id_Book WHERE StatusTransaction != 'Returned'") 
                                            or die(mysqli_error($conn));

                      $no = 1;
                      while ($transaction = $getTransactions->fetch_assoc()) {
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
                          $Id_Transaction = $transaction['Id_Transaction'];
                          $tgl_kembali = date('d-m-Y');
                          $lambat = terlambat($tgl_dateline, $tgl_kembali, $Id_Transaction);
                          $denda1 = $lambat * $denda;
                          if ($lambat > 0) { ?>
                            <div style='color:red;'><?= $lambat ?> Day  <br> (Rp. <?= number_format($denda1) ?>)</div>
                          <?php } else {
                            echo $lambat . " Day";
                          } ?>
                        </td>
                        <td>
                          <?php 
                          $denda = 1000;
                          $tgl_dateline = $transaction['DueDate'];
                          $tgl_kembali = date('d-m-Y');
                          $lambat = terlambat($tgl_dateline, $tgl_kembali);
                          $denda1 = $lambat * $denda;
                          if ($lambat > 0) { ?>
                            <div style='color:red;'>Overdue</div>
                          <?php } else {
                            echo $transaction['StatusTransaction'];
                          } ?>
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
      <div class="tab-pane fade" id="pills-transactionReturned" role="tabpanel" aria-labelledby="pills-transactionReturned-tab">
      <div class="row mt-4">
          <div class="col-md-12" class="">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Laporan
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div class="mb-2">
                    <div id="buttonss"></div>
                  </div>
                  <table class="table table-bordered" id="tableTransactionReturned">
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
                      while ($transaction = $getTransactionsReturned->fetch_assoc()) {
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
    </div>
  </div>
</div>

<script>
   $(document).ready(function() {
    var tableTransactionReturned = $('#tableTransactionReturned').DataTable({
      responsive: true,
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'excelHtml5',
          text: 'Export to Excel',
          className: 'btn btn-success'
        }
      ]
    });

    var tableTransaction = $('#tableTransaction').DataTable({
      responsive: true,
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'excelHtml5',
          text: 'Export to Excel',
          className: 'btn btn-success'
        }
      ]
    });

    tableTransactionReturned.buttons().container().appendTo('#buttonss');
    tableTransaction.buttons().container().appendTo('#buttons');
  });
</script>