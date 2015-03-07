<?php
include_once "../config.php";


if(isset($_POST['userId']) && isset($_POST['password']))
{


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

    echo 'Sorry. User not added. Maybe you are adding the same user twice?';

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

          echo 'New user added succesfully';

          $stmt->close();
          $connection->close();

  }

}



?>
