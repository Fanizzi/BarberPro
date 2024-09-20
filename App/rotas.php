<?php

use App\Controller\LoginController;
use App\Controller\CadastroController;

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch ($uri_parse) {

    case '/register/form':
        CadastroController::form();
        break;

    case '/register/save':
        CadastroController::save();
        break;

    case '/login':
        LoginController::index();   
        break;

    case '/login/auth':
        LoginController::auth();
        break;

    
}