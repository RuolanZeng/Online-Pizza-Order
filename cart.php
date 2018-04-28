<!DOCTYPE html>                         
<html>                     
<head>                                  
    <meta charset="utf-8">              
    <title>Cart</title>             
</head>                                 

<body>                                  
	<h1>Cart</h1>
<table cellpadding="0" cellspacing="0" border="1" width="100%">
 <tr>
  <td>Name</td>
  <td>Count</td>
  <td>Price</td>
 </tr>



<a class='btn btn-default' href='index.php' role='button'>home</a>

<?php

session_start();

$arr=array();

if(!empty($_SESSION["gwc"]))
{
	$arr=$_SESSION["gwc"];
}

$con = mysqli_connect("localhost","root","root" , "OnlinePizzaOrder");

foreach($arr as $v)
{
	global $con;
	$sql="SELECT * FROM Products where P_Id='{$v[0]}'";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)){
	echo"<tr>
		<td>{$row['Name']}</td>
		<td>{$v[1]}</td>
		<td>{$row['Price']}</td>
	</tr>";

}
}

?>
 
</table>
<div>
  

</body>                                 

</html>             