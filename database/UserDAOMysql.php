<?php

require_once 'models/User.php';

class UserDAOMyql implements UserDAO {

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    
    public function findByToken($token)
    {

    }


}