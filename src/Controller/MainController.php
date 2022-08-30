<?php

namespace KameGame;

class MainController
{

    private $database;

    public function __construct() {
        $this->database = new Database();
        if(!isset($_SESSION['cart'])){

            $_SESSION['cart'] = array();
        }
    }

    public function Home()
    {
        if(isset($_SESSION['user'])){


            require '../src/View/home.php';
        }
        else{
            header("location:/?action=login");  /* Redirect to login page */
        }

    }

    public function About()
    {
        require '../src/View/about.php';
    }

    public function Contact()
    {
        require '../src/View/contact.php';
    }


    public function displayProducts()
    {

        $GLOBALS['products'] = $this->database->getAll(
            tablename: "Product"
        );

        require '../src/View/products.php';
    }

    public function addToCart(){
        $prodID = filter_input(INPUT_GET, 'prodID');

        if (isset($prodID,$_SESSION['user'])) {
            $item = $this->database->getOne(
                tablename: "Product",
                column: "prodID",
                value: $prodID
            );
           array_push(  $_SESSION['cart'], $item);
           header("location:/?action=checkout");
        }
        else{
            header("location:/?action=login");
        }



    }
    public function Checkout(){
        require '../src/View/checkout.php';
    }

    public function Seller(){
        $prodName = filter_input(INPUT_POST, 'prodName');
        $prodDesc = filter_input(INPUT_POST, 'prodDesc');
        $prodPrice = filter_input(INPUT_POST, 'prodPrice');



        if(isset($prodName,$prodDesc,$prodPrice)){
            $new_product = array(
                "prodName" => $_POST['prodName'],
                "prodDesc" => $_POST['prodDesc'],
                "prodPrice" => $_POST['prodPrice'],
                "userId" => $_SESSION['user']->getId()
            );
            $product = $this->database->addOne(
                tablename: "Product",
                values: $new_product
            );

                header("location:/?action=products");

        }
        require '../src/View/seller.php';
    }

    public function Order()
    {

        // the message
        $msg = "Order Sent". implode("\nProduct ",$_SESSION['cart']);

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        // send email
        mail($_SESSION['user']->getEmail(), "Order Confirmed", $msg);

        foreach ($_SESSION['cart'] as $product) {
            $seller = $this->database->getOne(
                tablename: "User",
                column: "id",
                value:$product->getUserId()

            );

            // the message
            $msg = $_SESSION['user']->getUsername() . " has placed an order your product: " . $product->getProdName();

                // use wordwrap() if lines are longer than 70 characters
                $msg = wordwrap($msg, 70);

            // send email
            mail($seller->getEmail(), "Order Received", $msg);
        }
        $_SESSION['cart'] = array(); // clear cart 
        require '../src/View/confirmation.php';

    }


}