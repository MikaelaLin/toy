<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
        unset($_SESSION['SESS_USER_NAME']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
        unset($_SESSION['SESS_EMAIL']);
        unset($_SESSION['SESS_PHONE_NUMBER']);
?>

<html>
  <head>
    <title>Thinking of You</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!--Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
    
    <!--Bootshape-->
    <link href="snippet.css" rel="stylesheet">

  </head>
  <body>
      <section>
        <div class="container bootshape">
            <form class="simple-login" role="form" action="login.php" method="post">
            	<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
                <h1>Simple Login</h1>
                <input name="username" type="text" type="username" autofocus required placeholder="Username" class="form-control">
                <input name="password" type="text" type="password" required placeholder="Password" class="form-control">
                <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                <p class="forgot-password">
                <a href="#" onclick="alert('Please call: 0424890297 - Lin');">Forget Password?</a>
</p>
            </form>
            <p class="footer">&copy; 2014 Thinking of You</p>
        </div>
      </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="snippet.js"></script>
  </body>
</html>