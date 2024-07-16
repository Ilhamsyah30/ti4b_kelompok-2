<?php 

$Id_Book = $_GET['Id_Book'];

$getBook = $conn->query("SELECT * FROM tbl_books WHERE Id_Book = $Id_Book") or die(mysqli_error($conn));
$book = $getBook->fetch_assoc();

if(isset($_POST['edit'])) {
	$Title = htmlspecialchars($_POST['Title']);
	$Author = htmlspecialchars($_POST['Author']);
	$Publisher = htmlspecialchars($_POST['Publisher']);
	$PublicationYear = htmlspecialchars($_POST['PublicationYear']);
	$Genre = htmlspecialchars($_POST['Genre']);
	$Status = htmlspecialchars($_POST['Status']);
	$RackLocation = htmlspecialchars($_POST['RackLocation']);
	$ISBN = htmlspecialchars($_POST['ISBN']);
	$NumberOfCopies = htmlspecialchars($_POST['NumberOfCopies']);

	$sql = $conn->query("UPDATE tbl_books SET Title = '$Title', Author = '$Author', Publisher = '$Publisher', PublicationYear = '$PublicationYear', Genre = '$Genre', Status = '$Status', RackLocation = '$RackLocation', ISBN = '$ISBN', NumberOfCopies = '$NumberOfCopies' WHERE Id_Book = $Id_Book") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Success.');window.location='?p=book';</script>";
	} else {
		echo "<script>alert('Failed.');window.location='?p=book';</script>";
	}
}

?>
<div class="container">
  <nav class="mt-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="index.php?p=book">Book</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Book</li>
    </ol>
  </nav>
  <div class="card mb-4">
    <div class="card-header">
      <i class="bi bi-pencil mr-1"></i>
      Edit Book
    </div>
    <div class="card-body">
      <form action="" method="post">
        <div class="mb-3">
          <label for="Title" class="form-label">Title</label>
          <input type="text" class="form-control" id="Title" name="Title" value="<?= $book['Title']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="Author" class="form-label">Author</label>
          <input type="text" class="form-control" id="Author" name="Author" value="<?= $book['Author']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="Publisher" class="form-label">Publisher</label>
          <input type="text" class="form-control" id="Publisher" name="Publisher" value="<?= $book['Publisher']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="PublicationYear" class="form-label">Publication Year</label>
          <input type="number" class="form-control" id="PublicationYear" name="PublicationYear" value="<?= $book['PublicationYear']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="Genre" class="form-label">Genre</label>
          <input type="text" class="form-control" id="Genre" name="Genre" value="<?= $book['Genre']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="Status" class="form-label">Status</label>
          <select name="Status" id="Status" class="form-control" required>
            <option value="">-- Choise Status --</option>
            <option value="Available" <?php echo $book['Status'] == 'Available' ? 'selected' : ''; ?>>Available</option>
            <option value="Reserved" <?php echo $book['Status'] == 'Reserved' ? 'selected' : ''; ?>>Reserved</option>
            <option value="Lost" <?php echo $book['Status'] == 'Lost' ? 'selected' : ''; ?>>Lost</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="RackLocation" class="form-label">Rack Location</label>
          <select name="RackLocation" id="RackLocation" class="form-control" required>
            <option value="">-- Choise Rack --</option>
            <option value="Rack 1" <?php echo $book['RackLocation'] == 'Rack 1' ? 'selected' : ''; ?>>Rack 1</option>
            <option value="Rack 2" <?php echo $book['RackLocation'] == 'Rack 2' ? 'selected' : ''; ?>>Rack 2</option>
            <option value="Rack 3" <?php echo $book['RackLocation'] == 'Rack 3' ? 'selected' : ''; ?>>Rack 3</option>
            <option value="Rack 4" <?php echo $book['RackLocation'] == 'Rack 4' ? 'selected' : ''; ?>>Rack 4</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="ISBN" class="form-label">ISBN</label>
          <input type="text" class="form-control" id="ISBN" name="ISBN" value="<?= $book['ISBN']; ?>" placeholder="ex ..." required>
        </div>
        <div class="mb-3">
          <label for="NumberOfCopies" class="form-label">Number of Copies</label>
          <input type="number" class="form-control" id="NumberOfCopies" value="<?= $book['NumberOfCopies']; ?>" name="NumberOfCopies" placeholder="ex ..." required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="edit">EDIT</button>
        </div>
      </form>
    </div>
  </div>
</div>