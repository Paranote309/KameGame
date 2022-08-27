<?php require_once("../public/src/config.php");

if(!$_SESSION['Active'] ){ /* Redirects user to Login.php if not logged in. Remember, we set $_SESSION['Active'] == true in login.php*/

header("location:login.php");
exit;


} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

    <title>TreeBranches.com:</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"Kame Game </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="sign.php">Sign up</a></li>
                    <li><form action="logout.php" method="post" name="Logout_Form" class="form-signin">
                            <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
                        </form></li>
                </ul>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </div>