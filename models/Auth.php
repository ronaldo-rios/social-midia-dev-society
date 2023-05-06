<?php

require_once 'dao/UserDAOMysql.php';

class Auth {

    private $pdo;
    private $base;
    private $dao;

    public function __construct(PDO $pdo, $base_url)
    {
        $this->pdo = $pdo;
        $this->base = $base_url;
        $this->dao = new UserDAOMysql($this->pdo);
    }

    public function checkToken() 
    {
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $user = $this->dao->findByToken($token);

            if($user){
                return $user;
            }
           
        }

        // if empty is redirect:
        header('Location: '.$this->base.'/login.php');
        exit;
    }

    public function validateLogin($email, $password)
    {
        $user = $this->dao->findByEmail($email);

        if($user){

            if(password_verify($password, $user->password)){
                $token = bin2hex(random_bytes(16));
                
                $_SESSION['token'] = $token;
                $user->token = $token;
                $this->dao->update($user); 

                return true;

            }

        }

        return false;
    }

    public function emailExists($email)
    {
        return $this->dao->findByEmail($email) ? true : false;
    }

    public function registerUser($name, $email, $password, $birthdate)
    {
        $token = bin2hex(random_bytes(16));

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->birthdate = $birthdate;
        $user->token = $token;
        $this->dao->insert($user);

        $_SESSION['token'] = $token;
    }

}