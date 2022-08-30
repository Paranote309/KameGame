<?php

namespace KameGame;

use KameGame\MainController;
use KameGame\AccountController;

class WebApplication
{

    private AccountController $accountController;
    private MainController $mainController;

    public function __construct()
    {
        $this->accountController = new AccountController();
        $this->mainController = new MainController();
    }

    public function run()
    {

        foreach($_GET as $key => $value) {
            $_GET[$key] = Utility::validate($value);
        }

        foreach($_POST as $key => $value) {
            $_POST[$key] = Utility::validate($value);
        }

        $action = filter_input(INPUT_GET, 'action');

        switch($action){
            case 'login':
                $this->accountController->Login();
                break;

            case 'register':
                $this->accountController->Register();
                break;

            case 'logout':
                $this->accountController->Logout();
                break;

            case 'products':
                $this->mainController->displayProducts();
                break;

            case 'addCart':
                $this->mainController->addToCart();
                break;

            case 'checkout':
                $this->mainController->Checkout();
                break;

            case 'about':
                $this->mainController->About();
                break;

            case 'contact':
                $this->mainController->Contact();
                break;

            case 'seller':
                $this->mainController->Seller();
                break;

            case 'order':
                $this->mainController->Order();
                break;


            case 'home':
            default:
                $this->mainController->Home();
        }
    }
}