<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

    <title>Kame Game</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
</head>

<body style="padding-top:5rem ">

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/?action=home">Kame Game</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
<!--                    <li class="nav-item"><a class="nav-link " href="/?action=home">Home</></li>-->
                    <li class="nav-item"><a class="nav-link" href="/?action=about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/?action=contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/?action=products">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="/?action=login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/?action=register">Register</a></li>
                    <?php
                    if(isset($_SESSION['user'])) {
                        echo <<<END
                             <li class="nav-item"><a class="nav-link" href="/?action=logout">Log out</a></li>
                        END;


                        if ($_SESSION['user']->isSeller()) {
                            echo <<<END
                            
                                 <li class="nav-item"><a class="nav-link" href="/?action=seller">Sell Product</a></li>
                            END;

                        }
                    }

                    ?>


            </ul>

        </div>
    </div>
</nav>


