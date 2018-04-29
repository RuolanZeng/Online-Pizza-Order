<?php
  session_start();
  $email = $_SESSION['email'];
  $price = $_SESSION['finalprice'];
  $date = date("Y/m/d H:i:s",time());

  $con = mysqli_connect("localhost","root","root" , "OnlinePizzaOrder");

  $sql="SELECT * FROM Cart WHERE Email = '$email'";
  $result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result)){
    $p_id = $row['P_Id'];
    $count = $row['Count'];
    $sql2 = "INSERT INTO Orders (Email, P_Id,O_date,O_price,P_count) VALUES ('$email', '$p_id','$date','$price', '$count');";
    $result2 = mysqli_query($con,$sql2);

    $sql3 = "SELECT Stock FROM Products WHERE P_Id = $p_id";
    $result3 = mysqli_query($con,$sql3);
    while($row3 = mysqli_fetch_array($result3)){
      $stock = $row3['Stock'];
    }
    $newstock = $stock - $count;
    $sql4 = "UPDATE Products SET Stock = $newstock WHERE P_Id = $p_id";
    $result4 = mysqli_query($con,$sql4);
  }

  $sql5 = "DELETE FROM Cart WHERE Email = '$email'";
  mysqli_query($con,$sql5);

  header("Location: index.php");

?>