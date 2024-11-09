<?php
  include("connection.php");
  session_start();

  if (isset($_POST['imgBase64'])) {

    try{
      // Decode the base64 image
      $imgData = $_POST['imgBase64'];
      $imgData = str_replace('data:image/png;base64,', '', $imgData);
      $imgData = str_replace(' ', '+', $imgData);
      $decodedData = base64_decode($imgData);

      $imgUnique = 'face_' . uniqid() . '.png';

      // Generate a unique filename
      $fileName = "../pictures/$imgUnique";

      // Save the image to the server
      if (file_put_contents($fileName, $decodedData)) {
          echo json_encode(["status" => "success", "fileName" => $fileName]);
          $_SESSION['SIGNUP_PICTURE'] = $imgUnique;
      } else {
          echo json_encode(["status" => "error"]);
      }
    }
    catch(Exception $e){
      echo json_encode(["response => ".$e->getMessage()]);
    }

}

?>