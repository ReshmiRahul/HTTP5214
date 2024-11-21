<?php
 include('inc/functions.php');
 secure();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Book</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php') ?>
      </div>
    </div>
  </div>
  <?php 
    require('reusables/connect.php');
    $bookID = $_GET['bookID'];
    $query = "SELECT * FROM books WHERE `Book-ID` = '$bookID'";
    $book = mysqli_query($connect, $query);
    $result = $book->fetch_assoc();
?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4"><?php echo $result['Book_Title']; ?></h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <form method="POST" action="inc/updateBook.php">
          <input type="hidden" name="bookID" value="<?php echo $bookID; ?>">
          <div class="mb-3">
            <label for="bookTitle" class="form-label">Book Title</label>
            <input type="text" class="form-control" id="bookTitle" name="bookTitle" value="<?php echo $result['Book_Title']; ?>">
          </div>

          <div class="mb-3">
            <label for="bookAuthor" class="form-label">Book Author</label>
            <input type="text" class="form-control" id="bookAuthor" name="bookAuthor" value="<?php echo $result['Book_Author']; ?>">
          </div>

          <div class="mb-3">
            <label for="yearOfPublication" class="form-label">Year of Publication</label>
            <input type="text" class="form-control" id="yearOfPublication" name="yearOfPublication" value="<?php echo $result['Year_Of_Publication']; ?>">
          </div>

          <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $result['ISBN']; ?>">
          </div>

          <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $result['Publisher']; ?>">
          </div>

          <div class="mb-3">
            <label for="imageUrl" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="imageUrl" name="imageUrl" value="<?php echo $result['Image_URL_M']; ?>">
          </div>
          
          <button type="submit" class="btn btn-primary" name="updateBook">Update Book</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
