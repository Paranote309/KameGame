<?php require 'layout/header.php'; ?>
<div class="py-5 text-center">

    <div class="jumbotron mx-auto" style="width: 25%">
        <div class="container ">
            <h1><?php echo "Welcome " . $_SESSION['user']->getUsername(); ?></h1>

            <p>products Below!</p>

            <p><a class="btn btn-primary btn-lg " href="/?action=products"> Products &raquo;</a></p>
        </div>
    </div>


</div>

<?php require 'layout/footer.php'; ?>
