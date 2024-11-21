<?php
require('reusables/connect.php');

if (isset($_POST['rating'], $_POST['bookID'])) {
    $rating = intval($_POST['rating']);
    $bookID = intval($_POST['bookID']);

    // Validate the rating
    if ($rating < 1 || $rating > 5) {
        die('Invalid rating value. Please provide a rating between 1 and 5.');
    }

    // Insert the rating into the `ratings` table
    $query = 'INSERT INTO ratings (`Book-ID`, `Book-Ratings`) VALUES (?, ?)';
    $stmt = $connect->prepare($query);
    $stmt->bind_param('ii', $bookID, $rating);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success">Rating submitted successfully.</div>';
        echo '<br><a href="userIndex.php" class="btn btn-secondary mt-3">Return to Library</a>';
    } else {
        echo '<div class="alert alert-danger">Error submitting rating: ' . $stmt->error . '</div>';
    }

    $stmt->close();
} else {
    die('Invalid form submission. Please try again.');
}

mysqli_close($connect);
?>
