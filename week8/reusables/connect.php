<?php
  $connect = mysqli_connect(
    'localhost', 
    'root', 
    '', //write your password
    'publicschools' // write your database name
  );

  if(!$connect){
    echo "Connection Failed: " . mysqli_connect_error();
  }