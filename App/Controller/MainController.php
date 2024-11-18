<?php

namespace App\Controller;

use App\DAO\BarbeariaDAO;

class MainController extends Controller
{
    public static function index()
    {
        $dao = new BarbeariaDAO();
        $barbearias = $dao->getAllBarbearias();

        parent::render('/Main/main');
    }
}
