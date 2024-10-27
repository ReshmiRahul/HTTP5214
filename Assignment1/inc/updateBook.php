<?php 
if (isset($_POST['updateBook'])) {
    $bookID = $_POST['bookID'];
    $bookTitle = $_POST['bookTitle'];
    $bookAuthor = $_POST['bookAuthor'];
    $yearOfPublication = $_POST['yearOfPublication'];
    $isbn = $_POST['isbn'];
    $publisher = $_POST['publisher'];
    $imageUrl = $_POST['imageUrl'];

    require('../reusables/connect.php');

    // Using mysqli_real_escape_string for sanitization
    $query = "UPDATE books SET 
    Book_Title = '" . mysqli_real_escape_string($connect, $bookTitle) . "',
    Book_Author = '" . mysqli_real_escape_string($connect, $bookAuthor) . "',
    Year_Of_Publication = '" . mysqli_real_escape_string($connect, $yearOfPublication) . "',
    ISBN = '" . mysqli_real_escape_string($connect, $isbn) . "',
    Publisher = '" . mysqli_real_escape_string($connect, $publisher) . "',
    Image_URL_M = '" . mysqli_real_escape_string($connect, $imageUrl) . "'
    WHERE `Book-ID` = '" . mysqli_real_escape_string($connect, $bookID) . "'";

    $update = mysqli_query($connect, $query);

    if ($update) {
        header("Location: ../index.php");
    } else {
        echo "There was an error updating the book: " . mysqli_error($connect); 
    }

    mysqli_close($connect);
}
?>
