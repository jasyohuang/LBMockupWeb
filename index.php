<?php

$conn = mysqli_connect("localhost","skes","external","loginform") or die("Error in connecting database");
        ob_start();
        session_start();

$username = $_SESSION["login"];
if(!isset($username)) {
    header("location:./login.php");
}

if(isset($_POST['logout']))
{
    session_start();
    $_SESSION = [];
    session_destroy();
    header("Location:./login.php");

}


if(isset($_POST['addwords']))
{
   
    $word = $_POST['word'];

    $sql = "SELECT words FROM user WHERE username='$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);

    $words = $row['words'];
    $morewords = $words . '<br>' . $word;

    $query = "UPDATE `user` SET `words`='$morewords' WHERE username='$username'";
    if(mysqli_query($conn, $query)){
        echo "success";
    }else{
        echo "error: " . mysqli_error($conn);
    }
}

if(isset($_POST['refresh']))
{
    $query = "UPDATE `user` SET `words`='' WHERE username='$username'";
    if(mysqli_query($conn, $query)){
        echo "success";
    }else{
        echo "error: " . mysqli_error($conn);
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
            <div class="form-group">
                <form action="" method="post" class="login-form"> 
                    <button type="submit" class="btn" name="logout">Log Out</button>
                </form>
            </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Hi</strong> <?php echo $username; ?>!</h1>
                            <div class="description">
                                <p>Please say something..</p>
                            </div>
                            <div class="form-bottom">
                                <form action="" method="post" class="login-form">    
                                    <div class="form-group">
                                        <input type="text" name="word" placeholder="Hello World!" class="form-username form-control" id="form-username" required>
                                    </div>
                                   
                                    <div class="form-group">
                                         <button type="submit" class="btn" name="addwords">Send</button>
                                    </div>

                                </form>
                            </div>
                            <?php 

                                $query = "select words from user where username='$username'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result);

                                $words = $row['words'];
                                ?>
                            <div class="row">
                                <h4><?= $words;?></h4>
                            </div>
                            <form action="" method="post" class="login-form"> 
                                         <div class="form-group">
                                             <button type="submit" class="btn" name="refresh"><i class="fa fa-refresh"></i> Refresh Words</button>
                                        </div>
                                    </form>
                                    
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