<?php
  include("connection.php");
  session_start();

  if (isset($_POST['imgBase64'])) {
    // Decode the base64 image
    $imgData = $_POST['imgBase64'];
    $imgData = str_replace('data:image/png;base64,', '', $imgData);
    $imgData = str_replace(' ', '+', $imgData);
    $decodedData = base64_decode($imgData);

    // Generate a unique filename
    $fileName = 'face_' . uniqid() . '.png';

    // Save the image to the server
    if (file_put_contents($fileName, $decodedData)) {
        echo json_encode(["status" => "success", "fileName" => $fileName]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}

?>