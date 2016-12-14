<?php

// Dependencies
require_once dirname(__FILE__) . '/vendor/autoload.php';
require_once dirname(__FILE__) . '/controller/document.php'; // un autoloader pourrait être plus intéerssant ...
require_once dirname(__FILE__) . '/dao/dao.inc.php';

// Config
require_once dirname(__FILE__) . '/config.inc.php';

// Slim
$app = new \Slim\App($config);