<?php
  require_once("config.php");

    global $connection;
    // check if the username and password is set
    if(isset($_POST['studentNumber']) && isset($_POST['password']))
    {
      //set the username and password from form values
      $studentNumber = $_POST['studentNumber'];
      $password = $_POST['password'];

      // Build the query
      $sql = "SELECT studentNumber, firstName, lastName FROM users WHERE studentNumber = ? AND password=?";

      //prepare the sql statement
      $stmt = $connection->prepare($sql);

      // bind variables to the paramenters ? present in sql
      $stmt->bind_param('is', $studentNumber, $password);

      //execute the prepared statement
      $stmt->execute();

      //bind the results ($id corresponds to the items we are selecting)
      $stmt->bind_result($id, $fname, $lname);

      if($stmt->fetch())
      {
        /* set the cache limiter to 'private' */

        session_cache_limiter('private');
        // $update = "UPDATE users SET lastLogin=? WHERE studentNumber=?";
        //
        // //prepare the sql statement
        // $stmt = $connection->prepare($update);
        //
        // // bind variables to the paramenters ? present in sql
        // $stmt->bind_param('si', current_timestamp,$studentNumber);
        //
        // //execute the prepared statement
        // $stmt->execute();

        $cache_limiter = session_cache_limiter();

        /* set the cache expire to 15 minutes */
        session_cache_expire(15);
        $cache_expire = session_cache_expire();
        // create a new session
        session_start();

        $_SESSION['studentNumber'] = $studentNumber;
        $_SESSION['fullName'] = $fname." ".$lname;
        header("Location:../system/oasis.php");
        


      }

      else if(!($stmt->fetch()))
      {
        echo
        '0';

      }

      $connection->close();


    }






?>
