<?php
  try{
    $HOST_NAME = "localhost";
    $HOST_USER = "root";
    $HOST_PASS = "Skillset1234567890";
    $HOST_DBNAME = "u434306754_skillset";
    $conn = mysqli_connect($HOST_NAME, $HOST_USER, $HOST_PASS, $HOST_DBNAME);
  }
  catch(Exception $e){
    die("Connection Error");
  }
?>