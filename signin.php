<?php
          $email = $_POST['email'];
          $pw = $_POST['password'];
          $con = mysqli_connect("localhost","root","root" , "OnlinePizzaOrder");
          $sql="SELECT * FROM `Users` WHERE Email = '$email'";
          $result = mysqli_query($con,$sql);
          $row = mysqli_fetch_array($result);
          // echo $username;
          // echo mysqli_num_rows($result);

          if (isset($_POST['submit'])) {
            if(password_verify($pw, $row['Password'])){

              //setcookie("usercookie", $email, time()+60*60*7);

              session_start();
              $_SESSION['email'] = $email;
              $_SESSION['username'] = $row[Username];

              if($row[Authority] === '1'){
                $_SESSION['admin'] = 1;
              }

            header('Location: index.php');
              exit();
            }else{
              echo "<p id='Hint' class = 'alert alert-danger'> Email or Password is Invalid</p>";
            }
          }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Please Sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" action="signin.php">
        <h2 class="form-signin-heading">Please sign in</h2>



        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <p> New User? <a href="signup.php"> Sign Up Now! </a></p>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>

          
      </form>

    </div> <!-- /container -->


  </body>
</html>



