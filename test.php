<?php  

  session_start();
  echo "Welcome".$_SESSION['email'];

  if (isset($_SESSION['email'])) {
    echo "success";
  }

  echo "<a href='logout.php'>  LogOut</a>";


?>

