<?php
            $email = $_POST['email'];
            $username = $_POST['username'];
            $pw = $_POST['password'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $hashedPassword = password_hash($pw, PASSWORD_DEFAULT);

            if (isset($_POST['submit'])) {
                if(!is_null($email)&&!is_null($username)&&!is_null($pw)){
                    $con = mysqli_connect("localhost","root","root" , "OnlinePizzaOrder");
                    $sql="INSERT INTO `Users` (`Email`, `Username`, `Password`, `Authority`, `Name`, `Phone`,`Address`) VALUES ('$email', '$username', '$hashedPassword', 0, '$name', '$phone', '$address');";

                    mysqli_query($con,$sql);

                    // setcookie("usercookie", $email, time()+6000);
                    // echo "right";
                    // echo "$_COOKIE[$usercookie]";

                    header("Location: index.php");
                    exit();
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

    <title>Please Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/signup.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/md5.min.js"></script>
    <script type="text/javascript">

        function checkUsername(){
            var username = document.getElementById("inputUsername").value;
            if(!username){
                document.getElementById("usernameHint").innerHTML = "username cannot be empty";
                document.getElementById("usernameHint").className = "alert alert-danger";
                return;
            }
            document.getElementById("usernameHint").innerHTML = "username is avilable";
            document.getElementById("usernameHint").className = "alert alert-success";
        }

        function checkPw1(){
            var pw1 = document.getElementById("inputPassword").value;
            if(!pw1){
                document.getElementById("pw1Hint").innerHTML = "Password cannot be empty";
                document.getElementById("pw1Hint").className = "alert alert-danger";
                return;
            }else{
                var strength = 0
                if (pw1.length > 7) strength += 1
                var re1 = /([a-z].*[A-Z])|([A-Z].*[a-z])/;
                var re2 = /([a-zA-Z])/;
                var re3 = /([0-9])/;
                var re4 = /([!,%,&,@,#,$,^,*,?,_,~])/;
                var re5 = /(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/;

                if (re1.test(pw1)) strength += 1
                // If it has numbers and characters, increase strength value.
                if (re2.test(pw1) && re3.test(pw1)) strength += 1
                    // If it has one special character, increase strength value.
                if (re4.test(pw1)) strength += 1
                    // If it has two special characters, increase strength value.
                if (re5.test(pw1)) strength += 1


                if (strength < 2) {
                    document.getElementById("pw1Hint").innerHTML = "password strength: Weak";
                    document.getElementById("pw1Hint").className = "alert alert-danger";
                } else if (strength == 2) {
                    document.getElementById("pw1Hint").innerHTML = "password strength: Good";
                    document.getElementById("pw1Hint").className = "alert alert-success";
                } else {
                    document.getElementById("pw1Hint").innerHTML = "password strength: Strong";
                    document.getElementById("pw1Hint").className = "alert alert-success";
                }
 
            }
        }

        function checkPw2(){
            var pw1 = document.getElementById("inputPassword").value;
            var pw2 = document.getElementById("inputConfirmPassword").value;
            if(!pw2){
                document.getElementById("pw2Hint").innerHTML = "Confirm Password cannot be empty";
                document.getElementById("pw2Hint").className = "alert alert-danger";
                return;
            }else if(pw2 !== pw1){
                document.getElementById("pw2Hint").innerHTML = "Password does not match";
                document.getElementById("pw2Hint").className = "alert alert-danger";
                return;
          }
          document.getElementById("pw2Hint").innerHTML = "match success";
          document.getElementById("pw2Hint").className = "alert alert-success";
        }

</script>

  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="POST" action="signup.php">
        <h2 class="form-signin-heading">Please sign up</h2>

        <p>Email: </p>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <p id="emailHint"></p>

        <p>Username: </p>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" name="username" id="inputUsername" class="form-control" onblur="checkUsername()" placeholder="Username" required>
        <p id="usernameHint"></p>

        <p>Password: </p>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" onblur="checkPw1()" placeholder="Password" required>
        <p id="pw1Hint"></p>

        <p>Confirm Password: </p>
        <label for="inputPassword" class="sr-only">Confirm Password</label>
        <input type="password" name="password2" id="inputConfirmPassword" class="form-control" onblur="checkPw2()" placeholder="Confirm Password" required>
        <p id="pw2Hint"></p>

        <p>Name: </p>
        <label for="inputName" class="sr-only">Name</label>
        <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required>
        <p></p>

        <p>Phone: </p>
        <label for="inputPhone" class="sr-only">Phone</label>
        <input type="text" id="inputPhone" name="phone" class="form-control" placeholder="Phone" required>
        <p></p>

        <p>Address: </p>
        <label for="inputAddress" class="sr-only">Address</label>
        <input type="text" id="inputAddress" name="address" class="form-control" placeholder="Address" required>
        <p></p>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" >Sign up</button>

        
      </form>

    </div> <!-- /container -->
  </body>
</html>
