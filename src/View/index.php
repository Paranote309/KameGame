
<?php
    require 'lib/functions.php';




    $cleverWelcomeMessage = "Welcome to Kame Game " ;



?>

<?php require '../layout/header2.php'; ?>

    <div class="jumbotron">
        <div class="container">
            <h1><?php echo strtoupper(strtolower($cleverWelcomeMessage)) + $_SESSION['username']; ; ?></h1>

            <p>With books!</p>

            <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php //foreach ($book as $books) { ?>
                <div class="col-lg-4 book-list-item">
                    <h2><?php  //echo $books['name']; ?></h2>

                    <img src="/images/<?php //echo $books['image']; ?>" class="img-rounded">

                    <blockquote class="book-details">
                        <span class="label label-info"></span>
                        <?php
                        //if (!array_key_exists('price', $books) || $books['price'] == '') {
                            //echo 'Unknown';
                        //} //elseif ($books['price'] == 'hidden') {
                           // echo '(contact owner for price)';
                        //} //else {
                           // echo $books['price'];
                           // echo ' euro';
                        //}
                        ?>
                        <?php //echo "ISBN:".$books['ISBN']; ?>
                </div>
            <?php //} ?>
        </div>

        <hr>

<?php require '../layout/footer.php'; ?>
