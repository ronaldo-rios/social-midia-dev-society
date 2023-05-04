<?php

require 'config.php';
require 'models/Auth.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$birthdate = filter_input(INPUT_POST, 'birthdate');

if($name && $email && $password & $birthdate){
    $auth = new Auth($pdo, $base_url);

    $birthdate = explode('/', $birthdate);
    if(count($birthdate) != 3){
        $_SESSION['flash'] = 'Data de nascimento inválida!';
        header('Location: '.$base_url.'/signup.php');
        exit;
    }
        
    $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
    if(strtotime($birthdate) === false){
        $_SESSION['flash'] = 'Data de nascimento inválida!';
        header('Location: '.$base_url.'/signup.php');
        exit;
    }

    if($auth->emailExists($email) === false){
        $auth->registerUser($name, $email, $password, $birthdate);
        header('Location: '.$base_url);
        exit;
    } 
    else {
        $_SESSION['flash'] = 'E-mail já cadastrado!';
        header('Location: '.$base_url.'/signup.php');
        exit;
    }
}
$_SESSION['flash'] = 'Existem campos vazios!';
header('Location: '.$base_url.'/login.php');
exit;