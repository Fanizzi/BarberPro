<?php

namespace App\Controller;

use App\Model\MainModel;

class MainController extends Controller
{
    public static function index()
    {
        parent::render('/Main/main');
    }
}