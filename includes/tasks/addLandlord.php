<?php
include_once "../config.php";


if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phoneNumber']))
{


    //set the username and password from form values
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];

    // Build the query
    $sql = "SELECT firstName, lastName, phoneNumber FROM landlord WHERE firstName = ? AND lastName = ? AND phoneNumber = ?";

    //prepare the sql statement
    $stmt = $connection->prepare($sql);

    // bind variables to the paramenters ? present in sql
    $stmt->bind_param('sss', $firstName, $lastName, $phoneNumber);

    //execute the prepared statement
    $stmt->execute();

    //bind the results ($id corresponds to the items we are selecting)
    $stmt->bind_result($f, $l, $p);

    if($stmt->fetch())
    {

      echo 'Sorry. Landlord not added. Maybe you are adding the same landlord twice?';

      $stmt->close();
      $connection->close();


    }

    else
    {


      $sql = "INSERT INTO landlord(firstName, lastName, email, phoneNumber, address)
            VALUES(?,?,?,?,?)";

            //prepare the sql statement
            $stmt = $connection->prepare($sql);

            // bind variables to the paramenters ? present in sql
            $stmt->bind_param('sssss', $firstName, $lastName, $email, $phoneNumber, $address);

            //set the variables from form values

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $address = $_POST['address'];

            //execute the prepared statement
            $stmt->execute();

            echo 'New landlord added succesfully';

            $stmt->close();
            $connection->close();

    }



}

else
{
  echo '
  <header>Add a new landlord to OASIS</header>

  <form id="landlord" class="landlord" method = "post" action = "includes/tasks/addLandlord.php">
        <p id="errorMessage"></p>

        <label for="firstName">First Name</label>
        <input type = "text" id = "firstName" name="firstName" required /> <br>

        <label for="lastName">Last Name</label>
        <input type = "text" id = "lastName" name="lastName" required /> <br>

        <label for="email">Email address</label>
        <input type = "text" id = "email" name="email" /> <br>

        <label for="phoneNumber">Phone Number</label>
        <input type = "text" id = "phoneNumber" name="phoneNumber" required /> <br>

        <label for="address">Address</label>
        <input type = "text" id = "address" name="address" /> <br>

        <input id="submitLandlord" type = "submit" value="Add" />
    </form>

 ';

}

?>
