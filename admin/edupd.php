<?php



$connection= mysqli_connect("localhost","root","","user-verification");


if (isset ($_POST["update"])) 
{
    $id=['id'];
    $fpoints = $_POST['fpoints'];
    $cpoints = $_POST['cpoints'];
    $mpoints = $_POST['mpoints'];
    
  $query = "UPDATE game SET fpoints='$fpoints', cpoints='$cpoints', mpoints='$mpoints',  WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);
  if($query_run){
    echo "success";
  }
  else
  {
      echo "$fpoints,$cpoints,$mpoints";
  }


}


 ?>