<?php
//error_reporting(E_ALL); ini_set('display_errors', 'On'); 
require_once('auth.php');

ob_start();
//Start session
//session_start();
//Include database connection details
require_once('../dbconnection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thinking of You</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<script>
function myFunction1() {

    if (confirm("Send a message to Nurka") == true) {
    } else {

    }
    document.getElementById("demo").innerHTML = x;
}
</script>

<script>
function myFunction2() {

    if (confirm("Send a message to Seyeon") == true) {
    } else {

    }
    document.getElementById("demo").innerHTML = x;
}
</script>

<script>
function myFunction3() {

    if (confirm("Send a message to Enrique") == true) {
    } else {

    }
    document.getElementById("demo").innerHTML = x;
}
</script>

<script>
function myFunction4() {

    if (confirm("Send a message to Lin") == true) {
    } else {

    }
    document.getElementById("demo").innerHTML = x;
}
</script>

<script>
function myFunction5() {

    if (confirm("Send a message to Catherine") == true) {
    } else {

    }
    document.getElementById("demo").innerHTML = x;
}
</script>


    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('../image/lin/1.jpg');" onclick="myFunction1()"></div>
                <div class="carousel-caption">
                    <h2>Nurka</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('../image/lin/2.jpg');" onclick="myFunction2()"></div>
                <div class="carousel-caption">
                    <h2><font color="#81d8d0">Seyeon</font></h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('../image/lin/3.jpg');" onclick="myFunction3()"></div>
                <div class="carousel-caption">
                    <h2><font color="87c540">Enrique</font></h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('../image/lin/4.jpg');" onclick="myFunction4()"></div>
                <div class="carousel-caption">
                    <h2><font color="ffcb00">Lin</font></h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('../image/lin/5.jpg');" onclick="myFunction5()"></div>
                <div class="carousel-caption">
                    <h2><font color="d73249">Catherine</font></h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
