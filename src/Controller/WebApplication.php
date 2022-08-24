<?php

namespace KameGame;

class WebApplication
{
    private $mainController;

    public function __construct()
    {
        $this->mainController = new MainController();
    }

    public function run()
    {
        $action = filter_input(INPUT_GET, 'action');

        switch($action){
            case 'show':
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $this->mainController->showAction($id);
                break;

            case 'list':
                $this->mainController->listAction();
                break;

            case 'home':
            default:
                $this->mainController->homeAction();
        }
    }
}