<?php
  session_start();

  function secure(){
    if(!isset($_SESSION['id'])){
      header('Location: login.php');
    }
  }

  function set_message($message, $className){
    $_SESSION['message'] = $message;
    $_SESSION['className'] = $className;
  }

  function get_message(){
    if(isset($_SESSION['message'])){
        // Ensure that the 'className' key is set, if not, set a default value.
        $className = isset($_SESSION['className']) ? $_SESSION['className'] : 'info'; // Default to 'info' class if not set

        echo 
        '<div class="alert alert-' . $className . '">' . 
           $_SESSION['message'] .
        '</div>';

        // Unset the session variables after displaying the message
        unset($_SESSION['message']);
        unset($_SESSION['className']);
    }
}


