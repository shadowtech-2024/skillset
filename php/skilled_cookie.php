<?php 
    include("connection.php");
    session_start();
    
    if(!isset($_COOKIE['BDAY']) || !isset($_SESSION['LOGGED-IN'])){
        header("location: ../");
    }
    else{
        $userToken = mysqli_real_escape_string($conn, $_COOKIE['BDAY']);

        $query = mysqli_query($conn,"SELECT * FROM `user` WHERE `user_token`='$userToken';");
        if(mysqli_num_rows($query)>0){
            $rows = mysqli_fetch_array($query);
            if($rows['role'] !== "Skilled"){
                header("location: ../");
            }
        }
        else{
            header("location: ../");
        }
    }
?>