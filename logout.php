<?php

require 'config.php';

$_SESSION['token'] = '';
header('Location: '.$base_url);
exit;