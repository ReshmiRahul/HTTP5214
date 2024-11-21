<?php 
require('reusables/connect.php');

// Check if the bookID is passed
if (isset($_GET['bookID'])) {
    $bookID = intval($_GET['bookID']); // Sanitize the bookID to avoid SQL injection

    // Fetch the book details using the bookID
    $query = 'SELECT * FROM books WHERE `Book-ID` = ?';
    $stmt = $connect->prepare($query);
    $stmt->bind_param('i', $bookID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a book with the given ID exists
    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
    } else {
        die('Book not found.');
    }

    $stmt->close();
} else {
    die('Invalid book selection.');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rating</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($book['Image_URL_M']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($book['Book_Title']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($book['Book_Title']); ?></h5>
                        <p class="card-text">Author: <?php echo htmlspecialchars($book['Book_Author']); ?></p>
                        <p class="card-text">Year: <?php echo htmlspecialchars($book['Year_Of_Publication']); ?></p>
                        <p class="card-text">Publisher: <?php echo htmlspecialchars($book['Publisher']); ?></p>
                        <span class="badge bg-secondary">ISBN: <?php echo htmlspecialchars($book['ISBN']); ?></span>
                    </div>
                    <div class="card-footer">
                        <form method="POST" action="submitRating.php">
                            <label for="rating" class="form-label">Rate this book:</label>
                            <select name="rating" id="rating" class="form-select" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <input type="hidden" name="bookID" value="<?php echo $book['Book-ID']; ?>">
                            <button type="submit" class="btn btn-primary mt-3">Submit Rating</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
