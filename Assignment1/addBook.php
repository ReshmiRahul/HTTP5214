<?php
 include('inc/functions.php');
 secure();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Book</title>
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
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-2">Add Book</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <form method="POST" action="inc/addBookScript.php">
          <div class="mb-3">
            <label for="bookTitle" class="form-label">Book Title</label>
            <input type="text" class="form-control" id="bookTitle" name="bookTitle" required>
          </div>

          <div class="mb-3">
            <label for="bookAuthor" class="form-label">Author</label>
            <input type="text" class="form-control" id="bookAuthor" name="bookAuthor" required>
          </div>

          <div class="mb-3">
            <label for="yearOfPublication" class="form-label">Year of Publication</label>
            <input type="number" class="form-control" id="yearOfPublication" name="yearOfPublication" required>
          </div>

          <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
          </div>

          <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher" required>
          </div>

          <div class="mb-3">
            <label for="imageUrl" class="form-label">Image URL (Medium Size)</label>
            <input type="text" class="form-control" id="imageUrl" name="imageUrl">
          </div>

          <button type="submit" class="btn btn-primary" name="addBook">Add Book</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
