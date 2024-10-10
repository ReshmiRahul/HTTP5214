<?php
  $connect = mysqli_connect(
    'localhost', 
    'root', 
    '', 
    'publicschools' 
  );

  if(!$connect){
    echo "Connection Failed: " . mysqli_connect_error();
  }