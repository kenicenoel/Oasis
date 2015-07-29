<?php
include_once "../config.php";
include_once "../common.php";

if(isset($_POST['studentNumber']) && isset($_POST['password']))
{


  //set the username and password from form values
  $studentNumber = $_POST['studentNumber'];
  $password = $_POST['password'];

  // Build the query
  $sql = "DELETE FROM users WHERE studentNumber = ?";

  //prepare the sql statement
  $stmt = $connection->prepare($sql);

  // bind variables to the paramenters ? present in sql
  $stmt->bind_param('i', $studentNumber);

  if($stmt->execute())
  {

    echo 'All details have been removed successfully.';

    $stmt->close();
    $connection->close();


  }

  else
  {

          echo 'Something happened and we could not delete the user.';

  }

} // End If isset

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
