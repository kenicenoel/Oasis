<?php
include_once "../config.php";

if(isset($_POST['landlordNumber']) && isset($_POST['price']) && isset($_POST['description']))
{
    $sql = "INSERT INTO listing(landlordNumber, description, type, address, location, price) VALUES(?,?,?,?,?,?)";

          //prepare the sql statement
          $stmt = $connection->prepare($sql);

          // bind variables to the paramenters ? present in sql
          $stmt->bind_param('isssss', $landlordNumber, $description, $type, $address, $location, $price);

          //set the variables from form values
          $landlordNumber = $_POST['landlordNumber'];
          $description = $_POST['description'];
          $type = $_POST['type'];
          $address = $_POST['address'];
          $location = $_POST['location'];
          $price = $_POST['price'];

          //execute the prepared statement
          $stmt->execute();

          if(isset($_FILES['images']['name'][0]))
          {
            $images = $_FILES['images'];
            $i=1;
            $last = $stmt->insert_id;


            foreach($images['name'] as $position => $data)
            {
              $target_dir = "uploads/";
              $target_file = $target_dir . basename($_FILES["images"]["name"][$position]);
              $uploadOk = 1;
              $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

              // Check if image file is a actual image or fake image

                  $check = getimagesize($images["tmp_name"][$position]);
                  if($check !== false)
                  {
                      $uploadOk = 1;
                  }
                  else
                  {
                      echo "File is not an image.";
                      $uploadOk = 0;
                  }
                  // Check if file already exists
                  if (file_exists($target_file))
                  {
                      echo "One or more images already exist.";
                      $uploadOk = 0;

                  }
                // Check file size to ensure it is not larger than 50MB
                if ($images["size"][$position] > 50000000)
                {
                    echo "Sorry, one or more images are larger than 50MB.";
                    $uploadOk = 0;

                }
                // // Allow certain file formats
                // if($imageFileType != "jpg" && $imageFileType != "jpeg")
                // {
                //     echo "Sorry, only JPG, JPEG files are allowed.";
                //     $uploadOk = 0;
                // }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0)
                {
                  $sql = "DELETE from listing WHERE listingNumber=?";

                    //prepare the sql statement
                    $stmt = $connection->prepare($sql);

                    // bind variables to the paramenters ? present in sql
                    $stmt->bind_param('i', $last);

                    //execute the prepared statement
                    $stmt->execute();


                    goto end;

                // if everything is ok, try to upload file
                }
                else
                {
                    if (move_uploaded_file($images["tmp_name"][$position], $target_file))
                    {
                      $sql = "UPDATE listing SET image{$i}= ? WHERE listingNumber=?";

                        //prepare the sql statement
                        $stmt = $connection->prepare($sql);

                        // bind variables to the paramenters ? present in sql
                        $stmt->bind_param('si', ${'image'.$i}, $last);
                        ${'image'.$i} = $target_file;

                        //execute the prepared statement
                        $stmt->execute();
                        $i++;
                    }




                }



            }
            echo 'Successfully created listing!';
          }

          end:
          echo '';



          $stmt->close();
          $connection->close();




}

else
{
  echo '

      <header>Add a new listing to OASIS </header>

      <form id="listing" enctype="multipart/form-data" method = "post" action = "includes/tasks/addlisting.php">
            <br>
            <p id="errorMessage"></p>
            <label for="landlord">Landlord</label>
            <select form="listing" name="landlordNumber" required>
              <option disabled selected>Pick landlord</option>';
            $sql = "SELECT landlordNumber, firstName, lastName FROM landlord ORDER BY firstName ASC";

            // prepare the sql statement
            $stmt = $connection->prepare($sql);

            // execute the prepared statement
            $stmt->execute();

            /* store result */
            $stmt->store_result();

            /* Bind the results to variables */
            $stmt->bind_result($landlordNumber, $firstName, $lastName );
            while ($stmt->fetch())
              {

                  echo '<option value="'.$landlordNumber.'">'.$firstName." ". $lastName .'</option>';
              }

              /* Close statement */
            $stmt ->close();
            echo '</select><br>
            <textarea rows="8" cols="70" form="listing" id = "description" name="description" required>
            </textarea> <br>

            <label for="type">Type</label>
            <select form="listing" name="type" required> <br>
              <option disabled selected>Pick listing type</option>
              <option value = "Room">Room</option>
              <option value = "Apartment">Apartment</option>
              <option value = "House">House</option>
              <option value = "Studio">Studio</option>
              <option value = "Shared Room">Shared Room</option>
              <option value = "Dorm">Dorm</option>

            </select><br>

            <label for="address">Address</label>
            <input type = "text" id = "address" name="address" /><br>

            <label>Location </label>
            <select form="listing" name="location" required>
    					<option disabled selected>Choose a location</option>

    						<option value="All">All</option>
    						<option value="Curepe">Curepe</option>
    						<option value="Mt Hope">Mt Hope</option>
    						<option value="St Augustine">Saint Augustine</option>
    						<option value="St Johns Road">Saint Johns Road</option>
    						<option value="St Joseph">Saint Joseph</option>
    						<option value="Port of Spain">Port of Spain</option>
    						<option value="Tunapuna">Tunapuna</option>

    				</select><br>

            <label for="price">Price</label>
            <input type = "text" id = "price" name="price" /> <br>

            <label for="images">Images (up to 10)</label>
            <input type = "file" id = "images" name="images[]" accept=".jpg" multiple> <br>
            <input id="upload" type = "submit" value="Add" />

        </form> ';

}

?>
