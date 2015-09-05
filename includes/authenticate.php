<?php
  require_once("config.php");

    global $connection;

    // check if the email and password is set
    if(isset($_POST['email']) && isset($_POST['password']))
    {
      //set the email and password from form values
      
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Build the query
      $sql = "SELECT studentNumber, firstName, lastName FROM users WHERE email = ? AND password = ?";

      //prepare the sql statement
      $stmt = $connection->prepare($sql);

      // bind variables to the paramenters ? present in sql
      $stmt->bind_param('ss', $email, $password);

      //execute the prepared statement
      $stmt->execute();

      //bind the results ($id corresponds to the items we are selecting)
      $stmt->bind_result($id, $fname, $lname);

      if($stmt->fetch())
      {
        session_start();
        echo 'true';

        // create a new session

        $_SESSION['studentNumber'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['fullName'] = $fname." ".$lname;
      //  $_SESSION['accent'] = $accent;


      }

      $connection->close();


    }






?>
