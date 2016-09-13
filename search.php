<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mumbai Pet Adoption </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Mumbai Pet Adoption</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="/">Search</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Search Results
                </h1>

            </div>
        </div>
<?php

$db = new SQLite3('FullDatabase.db');

$num = $_POST["Number"];
$animalType = $_POST["Animal"];

if($animalType == "Both" && $num == "Any")
{
$results = $db->query("SELECT * FROM DOGS3");
}
elseif ($animalType == "Both" && $num != "Any") {
  $results = $db->query("SELECT * FROM DOGS3 WHERE NUMBER==".$num);
}
elseif ($animalType != "Both" && $num == "Any")
{
  $results = $db->query("SELECT * FROM DOGS3 WHERE TYPE=='".$animalType."'");
}
else {
  $str = "SELECT * FROM DOGS3 WHERE NUMBER=".$num." AND TYPE=='".$animalType."'";
  $results = $db->query($str);
}





while($row = $results->fetchArray(SQLITE3_ASSOC))
{


$var =  "<!-- Project One -->
          <div class=\"row\">
              <div class=\"col-md-4 img-portfolio\">

                      <img class=\"img-responsive img-hover\" src=\"".$row["PICTUREURL"]."\" alt=\"\">

              </div>
              <div class=\"col-md-4\">
                  <h3>".$row["NAME"]."</h3>
                  <h4>".$row["AGE"]." months</h4>"."
                  <p>".$row["WRITEUP"]."<br><i>".$row["TIMEREMAINING"]." months remaining</i></p>
                  <a class=\"btn btn-primary\" href=\"tel:".$row["CONTACT"]."\">Contact: ".$row["CONTACT"]."</i></a>
              </div></div>
              <!-- /.row -->";



echo $var;

}
?>


</div>

</div>

</div>

</div>
<!-- /.container -->

<div class="container">

<hr>

<!-- Footer -->
<footer>
<div class="row">
<div class="col-lg-12">
    <p>Copyright &copy; Rayan Sud 2016</p>
</div>
</div>
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
