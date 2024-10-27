<?php 
  if(isset($_POST['addBook'])){
    $bookTitle = $_POST['bookTitle'];
    $bookAuthor = $_POST['bookAuthor'];
    $yearOfPublication = $_POST['yearOfPublication'];
    $isbn = $_POST['isbn'];
    $publisher = $_POST['publisher'];
    $imageUrl = $_POST['imageUrl'];

    require('../reusables/connect.php');

    // Using mysqli_real_escape_string for sanitization
    $query = "INSERT INTO books (`Book_Title`, `Book_Author`, `Year_Of_Publication`, `ISBN`, `Publisher`, `Image_URL_M`) VALUES (
      '" . mysqli_real_escape_string($connect, $bookTitle) . "',
      '" . mysqli_real_escape_string($connect, $bookAuthor) . "',
      '" . mysqli_real_escape_string($connect, $yearOfPublication) . "',
      '" . mysqli_real_escape_string($connect, $isbn) . "',
      '" . mysqli_real_escape_string($connect, $publisher) . "',
      '" . mysqli_real_escape_string($connect, $imageUrl) . "'
    )";

    $book = mysqli_query($connect, $query);

    if($book){
      header("Location: ../index.php");
    } else {
      echo "There was an error adding the book: " . mysqli_error($connect); 
    }

    mysqli_close($connect);
  }
?>
