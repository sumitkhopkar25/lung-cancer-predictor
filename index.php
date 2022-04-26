<?php 
  require 'db/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Prediction of Lung Cancer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap-3.3.7/bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="css/font-families/montserrat.css" rel="stylesheet" type="text/css">
  <link href="css/font-families/lato.css" rel="stylesheet" type="text/css">
  <script src="javascript/jquery.min.js"></script>
  <script src="javascript/main.js"></script>
  <script src="css/bootstrap-3.3.7/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li data-toggle="modal" data-target="#loginModal" style="cursor:pointer;"><a>GET STARTED</a></li>
          <!-- Modal -->
          <div class="modal fade login-modal" id="loginModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" action="index.php" method="post">
                    <div class = "form-group">
                      <div class = "col-sm-2">
                        <label class="control-label">Email: </label><br><br>
                      </div>
                      <div class="col-sm-10">
                        <input name="username" class="form-control" type="text" placeholder="Type Your Username" required/><br><br>
                      </div>
                      <div class="col-sm-2">  
                        <label class="control-label">Password:</label><br><br>
                      </div>
                      <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" placeholder="Type Your password" required/><br><br>
                      </div>   
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4">
                        <button name = "login" class="btn btn-success" type="submit" id="login_btn" value="Login" style="width: 100%">LOGIN</button><br><br>
                      </div>   
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  Not signed up yet?
                  <a href = "register_view.php" style="text-decoration: none">register</a>
                </div>
              </div>
              
            </div>
          </div>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>Lung cancer predictor</h1> 
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <h2>What we provide</h2><br>
      <h4>Make no mistake about it—lung cancer can be detected at an early stage, when it is more likely to be treatable and cured.</h4><br>
      <p>Yes, you heard it right—treatable and cured. And not just for a handful of people, but for millions of people at   risk.
      We provide an efficient system which helps to predict a person's probability of having Lung Cancer. This means elevating the issue among primary care providers and individuals at the highest risk, and persistent advocacy for continued and enhanced health benefits.
      </p>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <h4><strong>MISSION:</strong> Lung cancer remains the most important cause of cancer death worldwide, and cases diagnosed at a late stage have extremely poor survival rates. An important aim is to evaluate the risk of lung cancer using Artificial Neural Networks . The ultimate aim is to improve the validity of existing risk prediction models and improve the health condition of the people.</p>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>We provide a textual as well as graphical analysis report</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span><i class="fa fa-bar-chart fa-4x" aria-hidden="true" style="color: orange"></i></span>
      <h4>GRAPHS</h4>
    </div>
    <div class="col-sm-4">
      <span><i class="fa fa-pie-chart fa-4x" aria-hidden="true" style="color: orange"></i></span>
      <h4>PIE CHARTS</h4>
    </div>
    <div class="col-sm-4">
      <span><i class="fa fa-line-chart fa-4x" aria-hidden="true" style="color: orange"></i></span>
      <h4>ANALYSIS</h4>
    </div>
  </div>
  <br><br>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Pune, India</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <h3>Created by</h3>
  <br>
  <p>Sumit Khopkar</p>
  <p>Neil Gupte</p>
  <p>Purva Kulkarni</p>
  <p>Anvay Sonpimple</p>
</footer>

</body>
</html>
