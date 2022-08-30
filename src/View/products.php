<?php use KameGame\Database;

require 'layout/header.php'; ?>

<!--<div class="row row-cols-3 row-cols-md-2 g-4">-->
<div class="d-flex flex-wrap">
        <?php foreach($GLOBALS['products'] as $product){?>
        <div class="col">
            <div class="card m-1">
    <!--            <img src="..." class="card-img-top" alt="...">-->



                <div class="card-body">
                    <h5 class="card-title"><?php echo $product->getProdName();   ?></h5>
                    <p class="card-text"><?php  echo $product->getProdDesc();  ?></p>
                    <p class="card-text">Price: &euro;<?php  echo $product->getProdPrice();  ?></p>
                    <a href="/?action=addCart&prodID=<?php echo $product->getProdID();?> " class="btn btn-primary">Add to Cart</a>
                </div>
             </div>
        </div>
        <?php }?>
</div>


<?php require 'layout/footer.php'; ?>

