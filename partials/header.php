
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base_url;?>/assets/css/style.css" />
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="<?=$base_url;?>">
                <img style="height:5em;" src="<?=$base_url;?>/assets/images/dev-society-logo.png" />
                </a>
            </div>
            <div class="head-side">
                <div class="head-side-left">
                    <div class="search-area">
                        <form method="GET" action="<?=$base_url;?>/search.php">
                            <input type="search" placeholder="Pesquisar" name="s" />
                        </form>
                    </div>
                </div>
                <div class="head-side-right">
                    <a href="<?=$base_url;?>/perfil.php" class="user-area">
                        <div class="user-area-text"><?=$userInfo->name;?></div>
                        <div class="user-area-icon">
                            <img src="<?=$base_url;?>/media/avatars/default.jpg<?=$userInfo->avatar;?>" />
                        </div>
                    </a>
                    <a href="<?=$base_url;?>/logout.php" class="user-logout">
                        <img src="<?=$base_url;?>/assets/images/power_white.png" />
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="container main">