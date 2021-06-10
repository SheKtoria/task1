<?php

namespace app\core;

abstract class Model
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new DataBase();
    }
}