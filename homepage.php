<?php 
  session_start();
  require 'db/questionnaire.php'
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
  <script src="javascript/questionnaire.js"></script>
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
        <li><a href="#form">FORM</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="index.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>Welcome</h1> 
</div>

<div id="form" class="container-fluid">
  <center><h3>Provide your details</h3></center>
  <form class="form-horizontal" action="homepage.php" method="post">
    <div class = "form-group">
      <label class="control-label">Age in yrs</label><br><br>
      <input type="number" class="form-control" name="age" required/>
      <hr> 
      <label class="control-label">Sex </label><br><br>
      <input type="radio" name="sex" value="1" required>Male<br>
      <input type="radio" name="sex" value="2">Female<br>
      <hr> 
      <label class="control-label">Education </label><br><br>
      <input type="radio" name="education" value="1" required>Less Than 8 Years<br>
      <input type="radio" name="education" value="2">8-11 Years<br>
      <input type="radio" name="education" value="3">12 Years Or Completed High School<br>
      <input type="radio" name="education" value="4">Post High School Training Other Than College<br>
      <input type="radio" name="education" value="5">Some College<br>
      <input type="radio" name="education" value="6">College Graduate<br>
      <input type="radio" name="education" value="7">Postgraduate<br>
      <hr>
      <label class="control-label">Marital Status</label><br><br>
      <input type="radio" name="marital" value="1" required>Married Or Living As Married<br>
      <input type="radio" name="marital" value="2">Widowed<br>
      <input type="radio" name="marital" value="3">Divorced<br>
      <input type="radio" name="marital" value="4">Separated<br>
      <input type="radio" name="marital" value="5">Never Married<br>  
      <hr>
      <label class="control-label">Occupation</label><br><br>
      <input type="radio" name="occupation" value="1" required>Homemaker<br>
      <input type="radio" name="occupation" value="2">Working<br>
      <input type="radio" name="occupation" value="3">Unemployed<br>
      <input type="radio" name="occupation" value="4">Retired<br>
      <input type="radio" name="occupation" value="5">Extended Sick Leave<br>
      <input type="radio" name="occupation" value="6">Disabled<br>
      <input type="radio" name="occupation" value="7">Other<br>
      <hr>
      <label class="control-label">WHICH RACE DO YOU BELONG TO</label><br><br>
      <input type="radio" name="race" value="1" required>White, Non-Hispanic<br>
      <input type="radio" name="race" value="2">Black, Non-Hispanic<br>
      <input type="radio" name="race" value="3">Hispanic<br>
      <input type="radio" name="race" value="4">Asian<br>
      <input type="radio" name="race" value="5">Pacific Islander<br>
      <input type="radio" name="race" value="6">American Indian<br>
      <hr>
      <label class="control-label">cigarette smoking status </label><br><br>
      <input type="radio" name="cig-stat" value="0" id = "never-smoke" required>Never Smoked Cigarettes<br> 
      <input type="radio" name="cig-stat" value="1" id = "curr-smoker">Current Cigarette Smoker<br>
      <input type="radio" name="cig-stat" value="2" id = "former-smoker">Former Cigarette Smoker<br> 
      <hr>
      <div id = "former-smoke-hide">
      <label class="control-label">The number of years passed since the participant has stopped smoking</label><br><br> 
      <input type="number" class="form-control" name="cig-stop" id = "cig-stop" required><br> 
      <hr>
      </div>
      <div id = "never-smoker-hide">
      <label class="control-label">The total number of years the participant smoked.</label><br><br>
      <input type="number" class="form-control" name="cig-years" id = "cig-years" required><br>
      <hr>
      
      <label class="control-label">Do you now or did you ever smoke cigars regularly for a year or longer?</label><br><br> 
      <input type="radio" name="cigar" value="0" id = "cigar" required>Never<br> 
      <input type="radio" name="cigar" value="1">Current Cigar Smoker<br>
      <input type="radio" name="cigar" value="2">Former Cigar Smoker<br>       
      <hr>
      <label class="control-label">During the time periods when you smoked, how many cigarettes did or do you usually smoke per day?</label><br><br> 
      <input type="radio" name="cig-pd" value="0" id = "cig-pd" required>0<br>
      <input type="radio" name="cig-pd" value="1">1-10<br>
      <input type="radio" name="cig-pd" value="2">11-20<br>
      <input type="radio" name="cig-pd" value="3">21-30<br>
      <input type="radio" name="cig-pd" value="4">31-40<br>
      <input type="radio" name="cig-pd" value="5">41-60<br>
      <input type="radio" name="cig-pd" value="6">61-80<br>
      <input type="radio" name="cig-pd" value="7">81+<br> 
      <hr>
      <label class="control-label">During the time periods when you smoked, did or do you more often smoke filter or non-filter cigarettes?</label><br><br> 
      <input type="radio" name="filtered" value="1" id = "filtered" required>Filter<br>
      <input type="radio" name="filtered" value="2">Non-Filter<br>
      <input type="radio" name="filtered" value="3">About Equal<br>
      <hr>
      <label class="control-label">Number of packs smoked per day * years smoked.</label><br><br>
      <input type="number" class="form-control" name="pack-years" id = "pack-years" required><br>
      <hr>
      <label class="control-label">Do you now or did you ever smoke a pipe regularly for a year or longer?</label><br><br>
      <input type="radio" name="pipe" value="0" id = "pipe" required>Never<br>
      <input type="radio" name="pipe" value="1">Current Pipe Smoker<br>
      <input type="radio" name="pipe" value="2">Former Pipe Smoker<br>
      <hr>
      <label class="control-label">Have you ever smoked cigarettes regularly for six months or longer?</label><br><br>
      <input type="radio" name="smoked-f" value="0" id = "smoked-f" required>No<br>
      <input type="radio" name="smoked-f" value="1">Yes<br>
      <hr>
      <label class="control-label">At what age did you start smoking cigarettes regularly?</label><br><br>
      <input type="number" class="form-control" name="smoked-af" id = "smoked-af" required><br>
      <hr>
      <label class="control-label">Do you smoke cigarettes regularly now?</label><br><br>
      <input type="radio" name="smoked-r" value="0" id = "smoked-r" required>No<br>
      <input type="radio" name="smoked-r" value="1">Yes<br>
      <hr>
      <label class="control-label">At what age did you last stop smoking cigarettes regularly?</label><br><br>
      <input type="number" class="form-control" name="smoked-s" id = "smoked-s" required><br>
      <hr>
      </div>

      <label class="control-label">How many full and half-sisters do you have, both living and deceased?</label><br><br>
      <input type="radio" name="sisters" value="0" required>None<br>
      <input type="radio" name="sisters" value="1">One<br>
      <input type="radio" name="sisters" value="2">Two<br>
      <input type="radio" name="sisters" value="3">Three<br>
      <input type="radio" name="sisters" value="4">Four<br>
      <input type="radio" name="sisters" value="5">Five<br>
      <input type="radio" name="sisters" value="6">Six<br>
      <input type="radio" name="sisters" value="7">Seven Or More<br>
      <hr>
      <label class="control-label">How many full and half-brothers do you have, both living and deceased?</label><br><br>
      <input type="radio" name="brothers" value="0" required>None<br>
      <input type="radio" name="brothers" value="1">One<br>
      <input type="radio" name="brothers" value="2">Two<br>
      <input type="radio" name="brothers" value="3">Three<br>
      <input type="radio" name="brothers" value="4">Four<br>
      <input type="radio" name="brothers" value="5">Five<br>
      <input type="radio" name="brothers" value="6">Six<br>
      <input type="radio" name="brothers" value="7">Seven Or More<br>
      <hr>
      <label class="control-label">BMI at Baseline (In kg/m2)</label><br><br>
      <input type="number" class="form-control" name="bmi" required><br>
      <hr>
      <label class="control-label">Weight (lbs) at Baseline</label><br><br>
      <input type="number" class="form-control" name="weight" required><br><br>
      <label class="control-label">Height (inches)</label><br><br>
      <input type="number" class="form-control" name="height" required><br>
      <hr>
      <button type="submit" class="btn btn-success" id="submit_btn" name="submit">Submit</button><br>
    </div>     
  </form>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
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
