<?php
//error_reporting(E_ALL); ini_set('display_errors', 'On'); 
require_once('auth.php');

ob_start();
//Start session
session_start();
//Include database connection details
require_once('../dbconnection.php');

//Array to store validation errors
$errmsg_arr = array();
 //Validation error flag
$errflag = false;

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
function myFunction(firstName, phoneNumber, location) {

    if (confirm("Send a message to " + firstName + ": 'I am thinking of You'.") == true) {
        log(location, "Slider", "SmsSent");
        
        alert(firstName + " " + phoneNumber);//print
        alert("TextSender.php"
                + "?name=" + encodeURIComponent(firstName)
                + "&number=" + encodeURIComponent(phoneNumber));
        
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET","../TextSender.php"
                + "?name=" + encodeURIComponent(firstName)
                + "&number=" + encodeURIComponent(phoneNumber)
                ,true);
        xmlhttp.send();
    } else {
        log(location, "Slider", "SmsCancel");
    }
    document.getElementById("demo").innerHTML = x;
    
}

function log(location, pageName, linkName) {
    
    alert ("[" + location + "][" + pageName + "][" + linkName + "]");
    
    //if no pageName given, use document title
    if (pageName === "" || pageName === null) pageName = document.title;
    
    var xmlhttp=new XMLHttpRequest();
//    xmlhttp.open("POST","../log.php",true);
//    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//    xmlhttp.send("location=" + encodeURIComponent(location)
//            + "&pageName=" + encodeURIComponent(pageName)
//            + "&linkName=" + encodeURIComponent(linkName)

    var encodeString = "../log.php?pageName=" + encodeURIComponent(pageName);
    if (location !== "" && location.toLowerCase() !== "null") {
        encodeString += "&location=" + encodeURIComponent(location);
    }
    if (linkName !== "" && linkName.toLowerCase() !== "null") {
        encodeString += "&linkName=" + encodeURIComponent(linkName);
    }
    
    alert(encodeString);

    xmlhttp.open("GET", encodeString,true);
    xmlhttp.send();
}
</script>

<div style="z-index: 1000000; font-size: 100px; position: absolute; top: 0; left: 0; text-align: center; font-size: 200%;"><a href='../overview/index.php' onclick="log('','','go to overview')">OVERVIEW</a></div>

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

<div class='carousel-inner'>
        <?php
        $userID = $_SESSION['SESS_USER_ID'];
        $userName = $_SESSION['SESS_USER_NAME'];
        $query = "select * from photo where userID = '$userID' and flag = 1";
        $result=mysql_query($query);
        //$resultarray = mysql_fetch_assoc($result);
        
        $users = array();
        
        if($result) {
		if(mysql_num_rows($result) > 0) {
                    
                    /*foreach ($resultarray as $array){
                        echo "$array";
                    }*/
                    while ($data = mysql_fetch_assoc($result)) {
  
                        //echo "<div class='carousel-inner'>";
                        echo "<div class='item active'>";
                        echo "<div class='fill'"."$nbsp style='background-image:url("; 
                        echo "../image/".$data['location']; 
                        //echo ");' onclick='myFunction(\"".$data['firstName']."\",\"".$data['phoneNumber']."\",\"".$data['location']."\")'></div>";
                        printf(");' onclick='myFunction(\"%s\",\"%s\",\"%s\");'></div>", $data['firstName'], $data['phoneNumber'], $data['location']);
                        echo "<div class='carousel-caption'>";
                        echo "<h2>"."<font color='".$data['color']."'>".$data['firstName']."</font></h2>";
                        //echo "<h2>Nurka</h2>";
                        echo "</div>";
                        echo "</div>";
                        
                        //echo "<div id=\"name\" style=\"visibility=hidden;\" >".$data['firstName']."</div>";
                        //echo "<div id=\"number\" style=\"visibility=hidden;\" >".$data['phoneNumber']."</div>";
                        
                    }
			//exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'no image found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
                                
				exit();
			}
		}
	}else {
		die("Query failed");
	}
        
        $query1 = "select * from photo where userID = '$userID' and flag = 0";
        $result1=mysql_query($query1);
        //$resultarray = mysql_fetch_assoc($result);
        if($result1) {
		if(mysql_num_rows($result1) > 0) {
                    
                    /*foreach ($resultarray as $array){
                        echo "$array";
                    }*/
                    while ($data = mysql_fetch_assoc($result1)) {
  
                        //echo "<div class='carousel-inner'>";
                        echo "<div class='item'>";
                        echo "<div class='fill'"."$nbsp style='background-image:url("; 
                        echo "../image/".$data['location']; 
                        //echo ");' onclick='myFunction(\"".$data['firstName']."\",\"".$data['phoneNumber']."\",\"".$data['location']."\")'></div>";
                        printf(");' onclick='myFunction(\"%s\",\"%s\",\"%s\");'></div>", $data['firstName'], $data['phoneNumber'], $data['location']);
                        echo "<div class='carousel-caption'>";
                        echo "<h2>"."<font color='".$data['color']."'>".$data['firstName']."</font></h2>";
                        echo "</div>";
                        echo "</div>";
                    }
			//exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'no image found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
                                
				exit();
			}
		}
	}else {
		die("Query failed");
	}
        
        
        ?>
        <!-- Wrapper for Slides -->
     
            
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
    });
    </script>
    

</body>

</html>
