<?php
include_once "../config.php";


if(isset($_POST['landlord']) && isset($_POST['description']) && isset($_POST['type'])
  && isset($_POST['address']) && isset($_POST['price']))
{


    $sql = "INSERT INTO listing(landlordNumber, description, type, address, price, image1, image2, image3, image4, image5)
          VALUES(?,?,?,?,?,?,?)";

          //prepare the sql statement
          $stmt = $connection->prepare($sql);

          // bind variables to the paramenters ? present in sql
          $stmt->bind_param('issssbbbbb', $landlordNumber, $description, $type, $address, $price, $image1, $image2, $image3, $image4, $image5);

          //set the variables from form values
          $landlordNumber = $_POST['landlordNumber'];
          $description = $_POST['description'];
          $type = $_POST['type'];
          $address = $_POST['address'];
          $price = $_POST['price'];

          /* Checks if the images are set */
          if(isset($_POST['image1']))
          {
            // Image 1 properties
            $image1 = file_get_contents($_FILES['image1']['tmp_name']);
            $image1_name = $_FILES['image1']['name'];
            $image1_size = getimagesize($_FILES['image1']['tmp_name']);
          }
          if(isset($_POST['image2']))
          {
            // Image 2 properties
            $image2 = file_get_contents($_FILES['image2']['tmp_name']);
            $image2_name = $_FILES['image2']['name'];
            $image2_size = getimagesize($_FILES['image2']['tmp_name']);
          }
          if(isset($_POST['image3']))
          {
            // Image 3 properties
            $image3 = file_get_contents($_FILES['image3']['tmp_name']);
            $image3_name = $_FILES['image3']['name'];
            $image3_size = getimagesize($_FILES['image3']['tmp_name']);
          }
          if(isset($_POST['image4']))
          {
            // Image 4 properties
            $image4 = file_get_contents($_FILES['image4']['tmp_name']);
            $image4_name = $_FILES['image4']['name'];
            $image4_size = getimagesize($_FILES['image4']['tmp_name']);
          }
          if(isset($_POST['image5']))
          {
            // Image 1 properties
            $image5 = file_get_contents($_FILES['image5']['tmp_name']);
            $image5_name = $_FILES['image5']['name'];
            $image5_size = getimagesize($_FILES['image5']['tmp_name']);
          }



          //execute the prepared statement
          if(!$stmt->execute() )
          {
            echo 'Sorry. Something went wrong. Please try again.';
          }

          else
          {
            echo 'New listing was successfully added';
          }



          $stmt->close();
          $connection->close();



}



?>
