<?php

$conn = mysqli_connect("localhost","root","","loginform") or die("Error in connecting database");

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $query = "select * from user where username='$username' and password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if ($row >= 1)
    {
        ob_start();
        session_start();
        $_SESSION['login'] = $row['username'];

        $session = $_SESSION['login'];
        header('location:index.php');

    }
    else{
        echo "<script>alert('Login Failed');</script>";
    }

}


?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Form Template</title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>HELLO!</strong> Login Form</h1>
                            <div class="description">
                            	<p>
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to HELLO!</h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form action="" method="post" class="login-form">    
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username" required>
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" required>
			                        </div>
                                    <!-- <div class="row align-items-end">
                                        <p><?= $error;?></p>
                                    </div> -->
                                    <div class="form-group">
			                        <button type="submit" class="btn" name="login">Sign in</button>
                                    </div>
			                    </form>
                                <div class="login-form">
                                    <div class="form-group login-form">
                                    <a href="register.php" class="btn ">Register</a>
                                </div>
                            </div>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>