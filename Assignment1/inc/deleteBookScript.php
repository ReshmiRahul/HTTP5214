<?php
if (isset($_POST['deleteBook'])) {
    $bookID = $_POST['bookID'];

    require('../reusables/connect.php');

    $query = "DELETE FROM books WHERE `Book-ID` = '" . mysqli_real_escape_string($connect, $bookID) . "'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        header("Location: ../index.php");
    } else {
        echo "There was an error deleting the book: " . mysqli_error($connect);
    }
}
?>
