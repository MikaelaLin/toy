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

    <title>TOY - Overview</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">

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
        log(location, "", "SmsSent");
        
//        alert(firstName + " " + phoneNumber);//print
//        alert("TextSender.php"
//                + "?name=" + encodeURIComponent(firstName)
//                + "&number=" + encodeURIComponent(phoneNumber));
        
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET","../TextSender.php"
                + "?name=" + encodeURIComponent(firstName)
                + "&number=" + encodeURIComponent(phoneNumber)
                ,true);
        xmlhttp.send();
    } else {
        log(location, "", "SmsCancel");
    }
    document.getElementById("demo").innerHTML = x;
    
}

function log(location, pageName, linkName) {
    
//    alert ("[" + location + "][" + pageName + "][" + linkName + "]");
    
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
    
//    alert(encodeString);

    xmlhttp.open("GET", encodeString,true);
    xmlhttp.send();
}
</script>

    <!-- Page Content -->
    <div class="container">
        <div style="z-index: 1000000; font-size: 100px; position: absolute; top: 0; left: 30px;  font-size: 300%;"><a href='../gallery/gallery.php' onclick="log('','','back to slider')"><<--</a></div>
                
        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:#bdc3c7">Thinking of You</h1>
            </div>
        </div>
        <!-- /.row -->
<?php
        $userID = $_SESSION['SESS_USER_ID'];
        $userName = $_SESSION['SESS_USER_NAME'];
        $query = "select * from photo where userID = '$userID' and relationship = 'Family'";
        $result=mysql_query($query);
        //$resultarray = mysql_fetch_assoc($result);
echo "<div class='row'>";
        if($result) {
		if(mysql_num_rows($result) > 0) {
                    
                    
                    while ($data = mysql_fetch_assoc($result)) {
                        //$str = '..'.'&#47;'.'image'.'&#47;'.$data['location'];
                        //echo $data['location'];
                       //echo $data["firstName"];
                       //echo $data["location"];
                       //echo $data["color"];
                       
                       echo "<div class='col-md-4 portfolio-item'>";
                       echo "<a href='#'>";
                       echo "<img class='img-responsive' src='../image/".$data["location"]."'"; 
                       //echo "onclick='myFunction(\"".$data['firstName']."\",\"".$data['phoneNumber']."\")' alt=''>";
                       printf("onclick='myFunction(\"%s\",\"%s\",\"%s\");' alt=''>", $data['firstName'], $data['phoneNumber'], $data['location']);
                       echo "<h3>";
                       echo "<a><center><font color='".$data["color"]."'>".$data["firstName"]."</font></center></a>";
                       echo "</h3>";
                       echo "</div>";
                    }
			//exit();
		}else {
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
echo "</div>";


        $query2 = "select * from photo where userID = '$userID' and relationship = 'Other'";
        $result2=mysql_query($query2);
        //$resultarray = mysql_fetch_assoc($result);
echo "<div class='row'>";
                if($result2) {
		if(mysql_num_rows($result2) > 0) {
                    
                    
                    while ($data = mysql_fetch_assoc($result2)) {
                        //$str = '..'.'&#47;'.'image'.'&#47;'.$data['location'];
                        //echo $data['location'];
                       //echo $data["firstName"];
                       //echo $data["location"];
                       //echo $data["color"];
                       
                       echo "<div class='col-md-4 portfolio-item'>";
                       echo "<a href='#'>";
                       echo "<img class='img-responsive' src='../image/".$data["location"]."'"; 
                       //echo "onclick='myFunction(\"".$data['firstName']."\",\"".$data['phoneNumber']."\")' alt=''>";
                       printf("onclick='myFunction(\"%s\",\"%s\",\"%s\");' alt=''>", $data['firstName'], $data['phoneNumber'], $data['location']);
                       echo "<h3>";
                       echo "<a><center><font color='".$data["color"]."'>".$data["firstName"]."</font></center></a>";
                       echo "</h3>";
                       echo "</div>";
                    }
			//exit();
		}else {
			$errmsg_arr[] = 'no image found';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
			}
		}
	}else {
		die("Query failed");
	}
echo "</div>";


        $query3 = "select * from photo where userID = '$userID' and relationship = 'Friend'";
        $result3=mysql_query($query3);
        //$resultarray = mysql_fetch_assoc($result);
echo "<div class='row'>";
                if($result3) {
		if(mysql_num_rows($result3) > 0) {
                    
                    
                    while ($data = mysql_fetch_assoc($result3)) {
                        //$str = '..'.'&#47;'.'image'.'&#47;'.$data['location'];
                        //echo $data['location'];
                       //echo $data["firstName"];
                       //echo $data["location"];
                       //echo $data["color"];
                       
                       echo "<div class='col-md-4 portfolio-item'>";
                       echo "<a href='#'>";
                       echo "<img class='img-responsive' src='../image/".$data["location"]."'"; 
                       //echo "onclick='myFunction(\"".$data['firstName']."\",\"".$data['phoneNumber']."\")' alt=''>";
                       printf("onclick='myFunction(\"%s\",\"%s\",\"%s\");' alt=''>", $data['firstName'], $data['phoneNumber'], $data['location']);
                       echo "<h3>";
                       echo "<a><center><font color='".$data["color"]."'>".$data["firstName"]."</font></center></a>";
                       echo "</h3>";
                       echo "</div>";
                    }
			//exit();
		}else {
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
echo "</div>";

?>
        <!-- Projects Row -->
        

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
