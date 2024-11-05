<?php

use App\Controller\LoginController;
use App\Controller\CadastroController;
use App\Controller\MainController;
use App\Controller\CadastroBarberController;

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch ($uri_parse) {

    case '/register/':
        CadastroController::form();
        break;

    case '/register/save':
        CadastroController::save();
        break;
    
    case '/regiser_barbershop/':
        CadastroBarberController::form();
        break;
    
    case '/register_barbershop/save':
        CadastroBarberController::save();
        break;

    case '/login':
        LoginController::index();   
        break;

    case '/login/auth':
        LoginController::auth();
        break;

    case '/login_barbershop':
        LoginBarberController::index();
        break;    
    case '/login_barbershop/auth':
        LoginBarberController::auth();
        break;
    
    case '/main':
        MainController::index();
        break;
    
}