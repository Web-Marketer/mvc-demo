<?php

namespace App\Controllers;

use App\Controller;
use App\Controllers\DbController;

class MainController extends Controller
{
    public function index()
    {
        $db  = new DbController('localhost', 'sian', '', 'demotest', 'utf8');
        $query = 'SELECT * FROM demotest ORDER BY id DESC LIMIT 10';
        $result = $db->query($query);
        $this->render('index', ['data' => $result]);
    }
}
