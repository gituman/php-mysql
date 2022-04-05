<?php
include "newcon.php";

   $conn = new mysqli('localhost','root','','user-verification');
if (isset($_POST["submit"])){
    $wageid=$_POST['number'];
    $winner=$_POST['winner'];
    $loser=$_POST['loser'];
    $comp=$_POST['comp'];

    $sql = "SELECT * FROM accepted WHERE postid='$wageid' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) < 1) {
        echo "wager doesnt exist";
    }
    $username=$_SESSION['username'];
    if ($username!= $winner&&$loser){
        echo "you didnt play this wager";
    }
   
    else{
    $stmt = $conn->prepare("insert into results(wager_id,winner,loser,complaint)
    values (?,?,?,?)");
    $stmt->bind_param("ssss",$wageid, $winner, $loser, $comp );
    $stmt->execute();
    if($stmt->error){
        echo "\r\nMYSQL Error:  ", $stmt->error, "\r\n";
    }
    header("location: wage.php?resultsaved=sucess");
        $stmt->close();
    $conn->close();
}
}else{
    echo "Not submited";
}
?>  