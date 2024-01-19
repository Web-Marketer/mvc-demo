<?php

use App\Controllers\MainController;
use App\Controllers\FormController;
use App\Router;

$router = new Router();

$router->get('/', MainController::class, 'index');
$router->post('/save', FormController::class, 'save', $_POST);
$router->post('/delete', FormController::class, 'delete', $_POST);
$router->get('/save', FormController::class, 'error');
$router->get('/delete', FormController::class, 'error');

$router->dispatch();
