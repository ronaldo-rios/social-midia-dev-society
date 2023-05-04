<?php

require_once 'dao/UserDAOMysql.php';

class Auth {

    private $pdo;
    private $base;

    public function __construct(PDO $pdo, $base_url)
    {
        $this->pdo = $pdo;
        $this->base = $base_url;
    }

    public function checkToken() 
    {
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $userDao = new UserDAOMysql($this->pdo);
            $user = $userDao->findByToken($token);

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
        $userDao = new UserDAOMysql($this->pdo);
        $user = $userDao->findByEmail($email);

        if($user){

            if(password_verify($password, $user->password)){
                $token = md5(time().rand(0, 9999));
                $_SESSION['token'] = $token;
                $user->token = $token;
                $userDao->update($user); 

                return true;

            }

        }

        return false;
    }

    public function emailExists($email)
    {
        $userDao = new UserDAOMysql($this->pdo);
        return $userDao->findByEmail($email) ? true : false;
    }

    public function registerUser($name, $email, $password, $birthdate)
    {
        $token = md5(time().rand(0, 9999));

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->birthdate = $birthdate;
        $user->token = $token;

        $userDao = new UserDAOMysql($this->pdo);
        $userDao->insert($user);

        $_SESSION['token'] = $token;
    }

}