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
              $limit = 6;  
              if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
              $start_from = ($page-1) * $limit;

              if (isset($_GET["category"])) {
                $category = $_GET["category"];
                $sql="SELECT * FROM Products WHERE Category = '$category' LIMIT $start_from, $limit";
                // echo $sql;
              }else if(isset($_POST["submit"])){
                $search = $_POST["search"];
                $sql="SELECT * FROM Products WHERE Name like '%$search%' LIMIT $start_from, $limit";
              }else{
                $sql="SELECT * FROM Products LIMIT $start_from, $limit";
              }

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
                if (isset($_SESSION['username'])) {
                  echo "<center><p><a class='btn btn-default' href='addtocart.php?id={$id}' role='button'>Add to cart</a></p></center>";
                }
                echo "</div></div></div>";
              }
            ?>

        </div><!--/.col-xs-12.col-sm-9-->

        <center><nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <?php
                    $page = $_GET["page"];
                    // echo $page-1;
                    if ($page>=2) {
                      $page = $page - 1;
                      echo "<a class='page-link' href='index.php?page=".$page."' aria-label='Previous'>";
                      echo "<span aria-hidden='true'>&laquo;</span>";
                      echo "<span class='sr-only'>Previous</span>";
                      echo "</a> ";
                    }
                  ?>
                  <!-- <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a> -->
                </li>
                <!-- <li class="page-item"><a class="page-link" href="index.php?page=1">1</a></li>
                <li class="page-item"><a class="page-link" href="index.php?page=2">2</a></li>
                <li class="page-item"><a class="page-link" href="index.php?page=3">3</a></li> -->
                <li class="page-item">
                  <?php
                    $page = $_GET["page"];
                    // echo $page-1;
                    if ($page<3) {
                      $page = $page + 1;
                      echo "<a class='page-link' href='index.php?page=".$page."' aria-label='Next'>";
                      echo "<span aria-hidden='true'>&raquo;</span>";
                      echo "<span class='sr-only'>Next</span>";
                      echo "</a> ";
                    }
                  ?>
                  <!-- <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a> -->
                </li>
              </ul>
            </nav>
          </div></center>

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <p class="lead">Category</p>
            <a href="index.php" class="list-group-item">ALL</a>
            <a href="index.php?category=PIZZAS" class="list-group-item">PIZZAS</a>
            <a href="index.php?category=COMBO" class="list-group-item">COMBO</a>
            <a href="index.php?category=SIDES" class="list-group-item">SIDES</a>
            <a href="index.php?category=DRINKS" class="list-group-item">DRINKS</a>
          </div>
          <div class="list-group">
            <p class="lead">Search</p>
            <form action="index.php" method="POST" class="navbar-form" role="search">
                  <div class="input-group">
                      <input name = "search" type="text" class="form-control" placeholder="Search movies" name="q">
                      <div class="input-group-btn">
                          <button class="btn btn-default searchheight" type="submit" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </div>
                  </div>
              </form>
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
