<?php  

  session_start();
  echo "Welcome".$_SESSION['email'];
  echo $_COOKIE['usercookie'];

  echo "<a href='logout.php'>LogOut</a>";


?>

