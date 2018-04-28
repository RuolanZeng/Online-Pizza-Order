<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Pizza Online Order-Home page">
    <meta name="author" content="ruolan zeng">
    <link rel="icon" href="../../favicon.ico">

    <title>Add New Item</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/signup.css" rel="stylesheet">
    <link href="assets/css/offcanvas.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-inverse" style="background-color:#ff471a;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Pizza to Go</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul id="upright" class="nav navbar-nav navbar-right">
            <li id="upright1" class="dropdown">
              <?php
                session_start();
                if (isset($_SESSION['username'])) {
                  echo "<a href='logout.php'><b>Log out</b></a>";
                }else{
                  echo "<a href='signup.php'><b>Register</b></a>";
                }
              ?>
            </li>
          </ul>
          <ul id="upright" class="nav navbar-nav navbar-right">
            <li id="upright1" class="dropdown">
              <?php
                session_start();
                if (isset($_SESSION['username'])) {
                  echo "<a href='cart.php'><b>Cart</b></a>";
                }else{
                  echo "<a href='signin.php'><b>Log In</b></a>";
                }
              ?>
            </li>
          </ul>
          <ul id="upright" class="nav navbar-nav navbar-right">
            <li id="upright1" class="dropdown">
              <?php
                session_start();
                if (isset($_SESSION['username'])) {
                  echo "<a href='usercenter.php'><b>".$_SESSION['username']."</b></a>";
                }
              ?>
            </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

     <form class="form-signin" method="POST" action="add.php">
        <h2 class="form-signin-heading">Please Add New Dish</h2>

        <p>Name: </p>
        <label for="inputName" class="sr-only">Name</label>
        <input type="text" name="dishname" id="inputname" class="form-control" placeholder="Name" required autofocus>
        <p></p>

        <p>Category: </p>
        <label for="inputCategory" class="sr-only">Category</label>
        <input type="text" name="category" id="inputCategory" class="form-control" placeholder="Category" required>
        <p></p>

        <p>Price: </p>
        <label for="inputPrice" class="sr-only">Price</label>
        <input type="text" name="category" id="inputCategory" class="form-control" placeholder="Price" required>
        <p></p>

        <p>Description: </p>
        <label for="inputDescription" class="sr-only">Description</label>
        <input type="text" name="description" id="inputDescription" class="form-control" placeholder="Description" required>
        <p></p>

        <p>Stock: </p>
        <label for="inputStock" class="sr-only">Stock</label>
        <input type="text" name="stock" id="inputStock" class="form-control" placeholder="Stock" required>
        <p></p>

        <p>Image: </p>
        <label for="inputImage" class="sr-only">Image</label>
        <input type="text" id="inputImage" name="image" class="form-control" placeholder="Image" required>
        <p></p>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Add</button>

        <?php
            $dishname = $_POST['dishname'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $stock = $_POST['stock'];
            $image = $_POST['image'];

            if (isset($_POST['submit'])) {
                if(!is_null($dishname)&&!is_null($category)&&!is_null($description)&&!is_null($stock)){
                    $con = mysqli_connect("localhost","root","root" , "OnlinePizzaOrder");
                    $sql="INSERT INTO `Products` (`Name`, `Category`, `Price`, `Description`, `Stock`, `Image`) VALUES ('$dishname', '$category','$price', '$description', '$stock', '$image');";

                    mysqli_query($con,$sql);

                    // setcookie("usercookie", $email, time()+6000);
                    // echo "right";
                    // echo "$_COOKIE[$usercookie]";

                    header("Location: index.php");
                    echo "right";
                    exit();
                }
            }
        ?>

      </form>
      </div><!--/row-->


    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>
