<?php

require_once  "../autoload.php";
session_start();

use KameGame\WebApplication;

$app = new WebApplication();
$app->run();

