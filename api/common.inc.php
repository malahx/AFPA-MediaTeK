<?php

// Dependencies
require_once dirname(__FILE__) . '/vendor/autoload.php';
//require_once dirname(__FILE__) . '/Controller/document.php'; // un autoloader pourrait être plus intéerssant ...

// Config
require_once dirname(__FILE__) . '/config.inc.php';

// Slim
$app = new \Slim\App($config);
require_once dirname(__FILE__) . '/routing.php';

// Doctrine
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$doctrineConfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$em = EntityManager::create($dbParams, $doctrineConfig);
