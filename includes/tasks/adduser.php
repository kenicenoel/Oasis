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

    echo 'Sorry. User not added. You may be trying to add a user that exists.';

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

else
{
  echo '

      <header>Add a new user to OASIS  </header>

      <form id="user" class="user" method = "post" action = "includes/tasks/adduser.php">
            <p id="errorMessage"></p>
            <label for="userId">Student ID#</label>
            <input type = "text" id = "userId" name="userId" required autofocus/> <br>

            <label for="userPass">Password</label>
            <input type = "text" id = "userPass" name="password" required /> <br>

            <label for="firstName">First Name</label>
            <input type = "text" id = "firstName" name="firstName" /> <br>

            <label for="lastName">Last Name</label>
            <input type = "text" id = "lastName" name="lastName" /> <br>

            <label for="email">Email address</label>
            <input type = "text" id = "email" name="email" /> <br>

            <label for="phoneNumber">Phone Number</label>
            <input type = "text" id = "phoneNumber" name="phoneNumber" /> <br>

            <label for="address">Address</label>
            <input type = "text" id = "address" name="address" /> <br>

            <input id="submitUser" type = "submit" value="Add" />
        </form> ';

}

?>
