<?php
  session_start();
  $email = $_SESSION['email'];
  $price = $_SESSION['finalprice'];
  $date = date("Y/m/d H:i:s",time());

  $con = mysqli_connect("localhost","root","root" , "OnlinePizzaOrder");

  $sql="SELECT * FROM Cart WHERE Email = '$email'";
  $result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result)){
    $p_id = $row[P_Id];
    $count = $row[Count];
    $sql2 = "INSERT INTO Orders (Email, P_Id,O_date,O_price,P_count) VALUES ('$email', '$p_id','$date','$price', '$count');";
    echo $sql2;
    $result2 = mysqli_query($con,$sql2);
  }

  header("Location: index.php");

?>