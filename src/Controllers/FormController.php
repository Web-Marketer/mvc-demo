<?php

namespace App\Controllers;

use App\Controller;
use App\Controllers\RequestController;
use App\Controllers\DbController;
use Exception;

class FormController extends Controller
{
    public function save()
    {

        $request = RequestController::request()->post();
        $data = json_decode($request['data'], true);

        $db  = new DbController('localhost', 'sian', '', 'demotest', 'utf8');
        $query = "INSERT INTO demotest set articul='" . $data['articul'] . "', name='" . $data['name'] . "'";
        $db->query($query);
    }

    public function delete()
    {
        $db  = new DbController('localhost', 'sian', '', 'demotest', 'utf8');
        $request = RequestController::request()->post();
        $data = json_decode($request['data'], true);

        $query = "DELETE FROM demotest WHERE id='" . (int)$data['id'] . "'";
        $db->query($query);
    }

    public function error()
    {
        echo 'Request POST via GET';
    }
}
