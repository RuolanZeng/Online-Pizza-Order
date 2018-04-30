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

    <title>Edit Item</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/signup.css" rel="stylesheet">
    <link href="assets/css/offcanvas.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">   
    <link href="assets/css/offcanvas.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  </head>

  <body>
     <nav class="navbar navbar-fixed-top navbar-inverse" style="background-color:#ff471a">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" style="color: #ffffff; font-size:25px;"><i class="fas fa-utensils"></i> Pizza to Go</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <!-- <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul> -->
          <ul id="upright" class="nav navbar-nav navbar-right">
            <li id="upright1" class="dropdown">
              <?php
                session_start();
                if (isset($_SESSION['username'])) {
                  echo "<a href='logout.php' style='color: #ffffff;font-size:16px;'><b>Log out</b></a>";
                }else{
                  echo "<a href='signup.php' style='color: #ffffff;font-size:16px;'><b>Register</b></a>";
                }
              ?>
            </li>
          </ul>
          <ul id="upright" class="nav navbar-nav navbar-right">
            <li id="upright1" class="dropdown">
              <?php
                session_start();
                if (!isset($_SESSION['username'])) {
                  echo "<a href='signin.php' style='color: #ffffff;font-size:16px;'><b>Log In</b></a>";
                }
              ?>
            </li>
          </ul>
          <ul id="upright" class="nav navbar-nav navbar-right">
            <li id="upright1" class="dropdown">
              <?php
                session_start();
                if (isset($_SESSION['username'])) {
                  if (isset($_SESSION['admin'])) {
                    echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' style='color: #ffffff;font-size:16px;'><b> Admin User: ".$_SESSION['username']."</b><span class='caret'></span></a>";
                    echo "<ul id='drop' class='dropdown-menu'>";
                    echo "<li><a role='menuitem' href='editmenu.php''>EDIT MENU</a></li>";
                    echo "<li><a role='menuitem' href='cart.php''>CART</a></li>";
                    echo "<li><a role='menuitem' href='orderinfo.php''>ORDER INFO</a></li>";
                    echo "</ul>";
                  }else{
                    echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' style='color: #ffffff;font-size:16px;'><b> Normal User: ".$_SESSION['username']."</b><span class='caret'></span></a>";
                    echo "<ul id='drop' class='dropdown-menu'>";
                    echo "<li><a role='menuitem' href='cart.php'>CART</a></li>";
                    echo "<li><a role='menuitem' href='orderinfo.php'>ORDER INFO</a></li>";
                    echo "</ul>";
                  } 
                }
              ?>
            </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <?php 
          $id=$_GET['id'];
          $con = mysqli_connect("localhost","root","root" , "OnlinePizzaOrder");
          $sql="SELECT * FROM Products WHERE P_Id = $id";
          $result = mysqli_query($con,$sql);
          while($row = mysqli_fetch_array($result)){
      ?>

     <form class="form-signin" method="POST" <?php echo "action='edititem.php?id=$id'";  ?>>
        <h2 class="form-signin-heading">Eidt</h2>
        <p>Name: </p>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="dishname" id="inputname" class="form-control" <?php echo "value='".$row[Name]."'"; ?> required autofocus>
        <p></p>

        <p>Category: </p>
        <label for="inputCategory" class="sr-only">Category</label>
        <input type="text" name="category" id="inputCategory" class="form-control" <?php echo "value='".$row[Category]."'"; ?> required>
        <p></p>

        <p>Price: </p>
        <label for="inputPrice" class="sr-only">Price</label>
        <input type="text" name="price" id="inputPrice" class="form-control" <?php echo "value='".$row[Price]."'"; ?> required>
        <p></p>

        <p>Description: </p>
        <label for="inputPrice" class="sr-only">Description</label>
        <textarea type="text" name="description" id="inputDescription" class="form-control" required> <?php echo $row[Description];?> </textarea>
        <p></p>

        <p>Stock: </p>
        <label for="inputStock" class="sr-only">Stock</label>
        <input type="text" name="stock" id="inputStock" class="form-control" <?php echo "value='".$row[Stock]."'"; ?> required>
        <p></p>

        <p>Image: </p>
        <label for="inputImage" class="sr-only">Image</label>
        <input type="text" id="inputImage" name="image" class="form-control" <?php echo "value='".$row[Image]."'"; ?> required>
        <p></p>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Edit</button>

        <?php 
          
          }
            $id=$_GET['id'];
            $dishname = $_POST['dishname'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $stock = $_POST['stock'];
            $image = $_POST['image'];

            if (isset($_POST['submit'])) {
                if(!is_null($dishname)&&!is_null($category)&&!is_null($description)&&!is_null($stock)){
                    $sql2="UPDATE Products SET Name = '$dishname', Category = '$category', Price = '$price', Description = '$description', Stock = '$stock', Image = '$image' WHERE P_Id = $id ";

                    mysqli_query($con,$sql2);
                }
                
                header("Location: editmenu.php");
                exit();
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
