<?php
if (isset($_POST["submit"])){
    $torn=$_POST['torn'];
    $game=$_POST['game'];
    $pat=$_POST['pat'];
    $prize=$_POST['prize'];
    $date=$_POST['date'];
    $conn = new mysqli('localhost','root','','user-verification');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }
        $sql = "CREATE TABLE $torn (
            id NOT NULL AUTO_INCREMENT,
            player VARCHAR(255) ,
            PRIMARY KEY (ID),
            )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }
    }
      $conn->close();
      ?>
