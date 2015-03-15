<?php
include_once "../config.php";

if(isset($_POST['landlordNumber']) && isset($_POST['price']) && isset($_POST['description']))
{
    $sql = "INSERT INTO listing(landlordNumber, description, type, address, price) VALUES(?,?,?,?,?)";

          //prepare the sql statement
          $stmt = $connection->prepare($sql);

          // bind variables to the paramenters ? present in sql
          $stmt->bind_param('issss', $landlordNumber, $description, $type, $address, $price);

          //set the variables from form values
          $landlordNumber = $_POST['landlordNumber'];
          $description = $_POST['description'];
          $type = $_POST['type'];
          $address = $_POST['address'];
          $price = $_POST['price'];

          //execute the prepared statement
          $stmt->execute();

          if(isset($_FILES['images']['name'][0]))
          {
            $images = $_FILES['images'];
            $i=1;
            $last = $stmt->insert_id;
            // echo '<br>','Listing Number: ',$last, '<br>', 'Added listing info...<br> Attempting to add image data...<br>';

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
                      // echo "File is not an image.";
                      $uploadOk = 0;
                  }
                  // Check if file already exists
                  if (file_exists($target_file))
                  {
                      // echo "One or more images already exist.";
                      $uploadOk = 0;
                  }
                // Check file size to ensure it is not larger than 50MB
                if ($images["size"][$position] > 50000000)
                {
                    // echo "Sorry, one or more images are larger than 50MB.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "jpeg")
                {
                    // echo "Sorry, only JPG, JPEG files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0)
                {
                    echo "One or more images were not uploaded.";

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
                    else
                    {
                        echo "Sorry, there was an error uploading your images.";
                    }
                }



            }
          }



          $stmt->close();
          $connection->close();
          echo 'Successfully created listing!';



}

else
{
  echo 'Whoops!. Something went wrong :(';

}



?>
