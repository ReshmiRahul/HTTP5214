<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Details</title>
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
    $query = "
      SELECT 
        books.Book_Title,
        books.Book_Author,
        books.Year_Of_Publication,
        books.Publisher,
        users.`User-ID` AS User_ID,
        users.Location,
        users.Age,
        ratings.`Book-Ratings`  -- Corrected column name here
      FROM books
      LEFT JOIN ratings ON books.`Book-ID` = ratings.`Book-ID`
      LEFT JOIN users ON ratings.`User-ID` = users.`User-ID`
      WHERE books.`Book-ID` = '$bookID'
    ";

    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $bookDetails = $result->fetch_assoc();
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-4">Book Details: <?php echo htmlspecialchars($bookDetails['Book_Title']); ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <h3>Book Information</h3>
          <p><strong>Author:</strong> <?php echo htmlspecialchars($bookDetails['Book_Author']); ?></p>
          <p><strong>Year of Publication:</strong> <?php echo htmlspecialchars($bookDetails['Year_Of_Publication']); ?></p>
          <p><strong>Publisher:</strong> <?php echo htmlspecialchars($bookDetails['Publisher']); ?></p>
          
          <h3>User Information</h3>
          <?php 
           
            mysqli_data_seek($result, 0); 
            while ($userDetails = mysqli_fetch_assoc($result)) {
              echo "<p><strong>User ID:</strong> " . htmlspecialchars($userDetails['User_ID']) . "</p>";
              echo "<p><strong>Location:</strong> " . htmlspecialchars($userDetails['Location']) . "</p>";
              echo "<p><strong>Age:</strong> " . htmlspecialchars($userDetails['Age']) . "</p>";
              echo "<p><strong>Rating:</strong> " . htmlspecialchars($userDetails['Book-Ratings']) . "</p>";
              echo "<hr>";
            }
          ?>

          <div class="d-flex justify-content-between mt-3">
            <form method="GET" action="editBook.php">
              <input type="hidden" name="bookID" value="<?php echo htmlspecialchars($bookID); ?>">
              <button class="btn btn-primary">Update</button>
            </form>
            <form method="GET" action="deleteBook.php">
              <input type="hidden" name="bookID" value="<?php echo htmlspecialchars($bookID); ?>">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php
    } else {
      echo '<p>No details found for this book.</p>';
    }

    mysqli_close($connect);
  ?>
</body>
</html>
