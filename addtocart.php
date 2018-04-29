<?php
session_start();
 
$id = $_GET["id"];
$email = $_SESSION['email'];
$c_id = "c_".$id;

$con = mysqli_connect("localhost","root","root" , "OnlinePizzaOrder");

if (isset($_SESSION[$c_id])) {
	$_SESSION[$c_id] += 1;
	$count = $_SESSION[$c_id];
	$sql = "UPDATE Cart SET Count = '$count' WHERE P_Id = '$id' AND Email = '$email';";
	mysqli_query($con,$sql);

}else{
	$_SESSION[$c_id] = 1;
	$count = $_SESSION[$c_id];
	$sql="INSERT INTO `Cart` (`Email`, `P_Id`, `Count`) VALUES ('$email', '$id', '$count');";
	mysqli_query($con,$sql);
}

 header("Location: index.php");
 
?>