<?php

// Database
define('BDD_USERNAME', 'root');
define('BDD_PASSWORD', 'admin');
define('BDD_TABLE', 'mediatek');
define('BDD_DSN', 'mysql:host=localhost;dbname=' . BDD_TABLE . 'mediatek;charset=utf8');

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
        'displayErrorDetails' => true
        ]];

// Doctrine
$paths = array("src/Entity");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => BDD_USERNAME,
    'password' => BDD_PASSWORD,
    'dbname' => BDD_TABLE,
    'charset' => 'utf8',
    'driverOptions' => array(
        1002 => 'SET NAMES utf8'
    )
);
