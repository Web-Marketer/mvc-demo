<?php

namespace App\Controllers;

use App\Controller;

class RequestController extends Controller
{
    private $request;
    private static $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function request(): RequestController
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function post()
    {
        return $_POST;
    }

    public function get()
    {
        return $_GET;
    }
}
