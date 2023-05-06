<?php 

require 'config.php';
require 'models/Auth.php';

$auth = new Auth($pdo, $base_url);
$userInfo = $auth->checkToken();
$activeMenu = 'home';

require 'partials/header.php';
require 'partials/navbar.php';

?>

<section class="feed mt-10">
    <?php var_dump($userInfo); ?>
</section>

<?php require 'partials/footer.php'; ?>