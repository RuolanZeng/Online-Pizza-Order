<?php
	$id=$_GET['id'];
    $con = mysqli_connect("localhost","root","root" , "OnlinePizzaOrder");
    $sql="DELETE FROM Products WHERE P_Id = $id";
    $result = mysqli_query($con,$sql);

    header("Location: editmenu.php");
    exit();
?>