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

    <title>Pizza to Go</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

   
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
                  echo "<a href='editmenu.php'><b>".$_SESSION['username']."</b></a>";
                }
              ?>
            </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Pizza!</h1>
            <p>ONLINE ORDERING NOW AVAILABLE.</p>
          </div>

          <div class="row">
            <!-- 320*150 -->
            <!-- add -->
            <?php
              $con = mysqli_connect("localhost","root","root" , "OnlinePizzaOrder");
              $sql="SELECT * FROM Products";
              $result = mysqli_query($con,$sql);
              while($row = mysqli_fetch_array($result)){
                echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
                echo "<div class='thumbnail' style='height: 340px;display: table;width: 100%;'>";
                $id = $row['P_Id'];
                $name = $row['Name'];
                $pictures = $row['Image'];
                $price = $row['Price'];
                $stock = $row['Stock'];
                $description = $row['Description'];
                echo "<center><p><img style='max-height:270px;max-width:200px;' src='images/$pictures'></p></center>";
                echo "<div class='caption'>";
                echo "<center><p class='name'><strong>" . $name . "</strong></p></center>";
                echo "<center><p class='description'>" . $description . "</p></center>";
                echo "<center><p class='price'>$ " . $price . "</p></center>";
                echo "<center><p class='stock'>Stock: " . $stock . "</p></center>";
                echo "<center><p><a class='btn btn-default' href='addtocart.php?id={$id}' role='button'>Add to cart</a></p></center>";
                echo "</div></div></div>";
              }
            ?>

          </div>

        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <p class="lead">Category</p>
            <a href="#" class="list-group-item active">PIZZAS</a>
            <a href="#" class="list-group-item">COMBO</a>
            <a href="#" class="list-group-item">SIDES</a>
            <a href="#" class="list-group-item">DRINKS</a>
          </div>
          <div class="list-group">
            <p class="lead">Price</p>
            <a href="#" class="list-group-item active">< $5</a>
            <a href="#" class="list-group-item">$5-10</a>
            <a href="#" class="list-group-item">$10-15</a>
            <a href="#" class="list-group-item">> $15</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; 2018 Ruolan Zeng Web Final Projects</p>
      </footer>

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
