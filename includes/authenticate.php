<?php

  //a function to establish a database connection
  function dbConnect()
    {
      //Connection to the MySQL Server
      define('DB_SERVER', 'localhost'); // Mysql hostname, usually localhost
      define('DB_USERNAME', 'root'); // Mysql username
      define('DB_PASSWORD', 'afrique'); // Mysql password
      define('DB_DATABASE', 'oasisdb'); // Mysql database name

      // create new mysqli object
      $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
      if ($connection->connect_error)
      {
          die("Connection failed: " . $connection->connect_error);
      }

      return $connection;
    }


  //the loginUser function below will verify and login a student to the system
  function loginUser()
  {
    $connection = dbConnect();

    // check if the username and password is set
    if(isset($_POST['userId']) && isset($_POST['password']))
    {
      //set the username and password from form values
      $userId = $_POST['userId'];
      $password = $_POST['password'];

      // Build the query
      $sql = "SELECT userID FROM users WHERE userId = ? AND password=?";

      //prepare the sql statement
      $stmt = $connection->prepare($sql);

      // bind variables to the paramenters ? present in sql
      $stmt->bind_param('is', $userId, $password);

      //execute the prepared statement
      $stmt->execute();

      //bind the results ($id corresponds to the items we are selecting)
      $stmt->bind_result($id);

      if($stmt->fetch())
      {
        /* set the cache limiter to 'private' */

        session_cache_limiter('private');
        $cache_limiter = session_cache_limiter();

        /* set the cache expire to 15 minutes */
        session_cache_expire(15);
        $cache_expire = session_cache_expire();
        // create a new session
        session_start();

        $_SESSION['userId'] = $userId;
        header("Location:system.php");


      }

      else if(!($stmt->fetch()))
      {
        echo
        '<script type="text/javascript">
            window.location.href="../index.php?flagLogin=1";
          </script>'
          ;
      }

      $connection->close();


    }



  } // end the loginUser function


  function addUser()
  {
    if(isset($_POST['userId']) && isset($_POST['password']))
    {
      $connection = dbConnect();

      //set the username and password from form values
      $userId = $_POST['userId'];
      $password = $_POST['password'];

      // Build the query
      $sql = "SELECT userID FROM users WHERE userId = ?";

      //prepare the sql statement
      $stmt = $connection->prepare($sql);

      // bind variables to the paramenters ? present in sql
      $stmt->bind_param('i', $userId);

      //execute the prepared statement
      $stmt->execute();

      //bind the results ($id corresponds to the items we are selecting)
      $stmt->bind_result($id);

      if($stmt->fetch())
      {

        echo '<script type="text/javascript">
                window.location.href="?addUser=false";
              </script>';

        $stmt->close();
        $connection->close();


      }

      else
      {


        $sql = "INSERT INTO users(userId, password, firstName, lastName, email, phoneNumber, address)
              VALUES(?,?,?,?,?,?,?)";

              //prepare the sql statement
              $stmt = $connection->prepare($sql);

              // bind variables to the paramenters ? present in sql
              $stmt->bind_param('issssss', $userId, $password, $firstName, $lastName, $email, $phoneNumber, $address);

              //set the variables from form values
              $userId = $_POST['userId'];
              $password = $_POST['password'];
              $firstName = $_POST['firstName'];
              $lastName = $_POST['lastName'];
              $email = $_POST['email'];
              $phoneNumber = $_POST['phoneNumber'];
              $address = $_POST['address'];

              //execute the prepared statement
              $stmt->execute();

              echo '<script type="text/javascript">
                    alert("Added successfully");
                    </script>';

              $stmt->close();
              $connection->close();

      }







    }
  }



?>
