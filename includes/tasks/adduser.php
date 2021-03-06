<?php
include_once "../config.php";
include_once "../common.php";

if(isset($_POST['studentNumber']) && isset($_POST['password']))
{


  //set the username and password from form values
  $studentNumber = $_POST['studentNumber'];
  $password = $_POST['password'];

  // Build the query
  $sql = "SELECT studentNumber FROM users WHERE studentNumber = ?";

  //prepare the sql statement
  $stmt = $connection->prepare($sql);

  // bind variables to the paramenters ? present in sql
  $stmt->bind_param('i', $studentNumber);

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


    $sql = "INSERT INTO users(studentNumber, password, firstName, lastName, email, phoneNumber, address)
          VALUES(?,?,?,?,?,?,?)";

          //prepare the sql statement
          $stmt = $connection->prepare($sql);

          // bind variables to the paramenters ? present in sql
          $stmt->bind_param('issssss', $studentNumber, $password, $firstName, $lastName, $email, $phoneNumber, $address);

          //set the variables from form values
          $studentNumber = $_POST['studentNumber'];
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
  $password = generateSecurePassword(20);
  echo '

      

      <form id="user" class="card" method = "post" action = "../includes/tasks/adduser.php">
            <header class="subheading"><span class="fa fa-plus-circle"></span> Add a new user to OASIS  </header>
            <p id="errorMessage"></p>
            <label for="studentNumber">Student ID</label>
            <input type = "text" id = "studentNumber" name="studentNumber" required autofocus/> <br>

            <label for="userPass">Password</label>
            <input type = "text" id = "userPass" name="password" value="'.$password.'" readonly /> <br>

            <label for="firstName">First Name</label>
            <input type = "text" id = "firstName" name="firstName" /> <br>

            <label for="lastName">Last Name</label>
            <input type = "text" id = "lastName" name="lastName" /> <br>

            <label for="email">Email address</label>
            <input type = "email" id = "email" name="email" required /> <br>

            <label for="phoneNumber">Phone Number</label>
            <input type = "text" id = "phoneNumber" name="phoneNumber" /> <br>

            <label for="address">Address</label>
            <input type = "text" id = "address" name="address" /> <br>

            <button id="submitUser" type = "submit">Add</button>
        </form> ';

}

?>
