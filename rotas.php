<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/...';

switch ($uri_parse) {

    case '/login':
        LoginController::index();   
        break;

    case '/login/auth':
        LoginController::auth();
        break;

    
}