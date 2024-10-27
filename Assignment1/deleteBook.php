<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Book</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php'); ?>
      </div>
    </div>
  </div>

  <?php 
    require('reusables/connect.php');
    $bookID = $_GET['bookID'];
    $query = "SELECT * FROM books WHERE `Book-ID` = '$bookID'";
    $book = mysqli_query($connect, $query);

    if ($book) {
      $result = $book->fetch_assoc();
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-4">Delete Book: <?php echo $result['Book_Title']; ?></h1>
          <p class="lead">Are you sure you want to delete this book?</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <form method="POST" action="inc/deleteBookScript.php">
            <input type="hidden" name="bookID" value="<?php echo $bookID; ?>">
            <button type="submit" class="btn btn-danger" name="deleteBook">Delete</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  <?php
    } else {
      echo '<p>Book not found.</p>';
    }
  ?>

</body>
</html>
