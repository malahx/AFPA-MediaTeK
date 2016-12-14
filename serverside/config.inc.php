<?php

// Database
define('BDD_DSN',      'mysql:host=localhost;dbname=mediatek;charset=utf8');
define('BDD_USERNAME', 'root');
define('BDD_PASSWORD', 'admin');

// Directories
define('ASSET', 'asset/');
define('IMG', ASSET . 'img/');
define('UPLOAD', IMG . 'uploads/');
define('CSS', ASSET . 'css/');
define('JS', ASSET . 'js/');

// Slim
$config = [
    'settings' => [
        'addContentLengthHeader' => false,
    ]];