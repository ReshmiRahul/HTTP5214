<?php
  $connect = mysqli_connect(
    'localhost', 
    'root', 
    '', 
    'library' 
  );

  if(!$connect){
    echo "Connection Failed: " . mysqli_connect_error();
  }