<?php

namespace KameGame;

use KameGame\MainController;
use KameGame\LoginController;

class WebApplication
{

    private LoginController $loginController;
    private MainController $mainController;

    public function __construct()
    {
        $this->loginController = new LoginController();
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
                $this->loginController->Login();
                break;

            case 'home':
            default:
                $this->mainController->Home();
        }
    }
}