<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Managment</title>
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
  <div class="container">
    <div class="row">
      <div class="col-md-12">
                <h1 class="display-2">Library</h1>
            </div>
        </div>
        <div class="row">
            <?php 
                require('reusables/connect.php'); 
                $query = 'SELECT * FROM books';
                $books = mysqli_query($connect, $query);

                if (mysqli_num_rows($books) > 0) {

                    foreach ($books as $book) {
                        echo '<div class="card col-md-3 mb-2">
                            <img src="' . htmlspecialchars($book['Image_URL_M']) . '" class="card-img-top" alt="' . htmlspecialchars($book['Book_Title']) . '">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($book['Book_Title']) . '</h5>
                                <p class="card-text">Author: ' . htmlspecialchars($book['Book_Author']) . '</p>
                                <p class="card-text">Year: ' . htmlspecialchars($book['Year_Of_Publication']) . '</p>
                                <p class="card-text">Publisher: ' . htmlspecialchars($book['Publisher']) . '</p>
                                <span class="badge bg-secondary">' . htmlspecialchars($book['ISBN']) . '</span>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                     <div class="col">
                                        <form method="GET" action="bookDetails.php">
                                            <input type="hidden" name="bookID" value="' . $book['Book-ID'] . '">
                                            <button class="btn btn-info">Details</button>
                                        </form>
                                    </div>                               
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>No books found.</p>';
                }

                // Close the connection
                mysqli_close($connect);
            ?>
        </div>
    </div>
</body>
</html>
