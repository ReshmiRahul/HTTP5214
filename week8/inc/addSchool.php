<?php 
  if(isset($_POST['addSchool'])){
    $schoolName = $_POST['schoolName'];
    $schoolType = $_POST['schoolType'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    require('../reusables/connect.php');


    //'$schoolName','$schoolType', '$phone', '$email'

    $query = "INSERT INTO public_school_contact_list_may2024_en (`School Name`, `School Level`, `Phone`, `Email`) VALUES (
      '" . mysqli_real_escape_string($connect, $schoolName) . "',
      '" . mysqli_real_escape_string($connect, $schoolType) . "',
      '" . mysqli_real_escape_string($connect, $phone) . "',
      '" . mysqli_real_escape_string($connect, $email) . "'
      )";

    $school = mysqli_query($connect, $query);

    if($school){
      header("Location: ../index.php");
    }else{
      echo "There was an error adding the school: " . mysqli_error($connect); 
    }

  }
