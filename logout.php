<<?php 
	session_start();
	session_destroy();
	echo "you successfuly log out";
	echo $_COOKIE['usercookie'];
 ?>