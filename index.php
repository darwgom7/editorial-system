<?php
$GLOBALS['asyncRequest'] = false;
require_once './core/configApp.php';
require_once './controllers/ViewController.php';
require_once './controllers/UserController.php';
$viewController = new ViewController();
$viewController->getTemplateController();
$userController = new UserController();
?> 