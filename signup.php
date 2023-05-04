
<?php
require 'config.php';
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=$base_url;?>">
                <img src="<?=$base_url;?>/assets/images/dev-society-logo.png" />
            </a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?=$base_url;?>/signup_action.php" >

        <?php if(!empty($_SESSION['flash'])) : ?>
            <?php 
                echo $_SESSION['flash']
            ?>
            <?php
                 $_SESSION['flash'] = '' 
            ?>
        <?php endif; ?>

            <input placeholder="Digite seu nome completo" class="input" type="text" name="name" />

            <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />

            <input placeholder="Digite sua senha" class="input" type="password" name="password" />

            <input placeholder="Digite sua data de nascimento" class="input" type="text" name="birthdate" id="birthdate" />

            <input class="button" type="submit" value="Cadastrar" />

            <a href="<?=$bse_url;?>/login.php">Já tem conta? Faça o login</a>
        </form>
    </section>

    <script src="https://unpkg.com/imask">
        var element = document.getElementById('birthdate');
        var maskOptions = {
            mask: '00/00/0000'
        };
        var mask = IMask(element, maskOptions);
    </script>
    
</body>
</html>