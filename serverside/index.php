<?php

require_once dirname(__FILE__).'/common.inc.php';

// Define app routes
$app->get('/news', '\document::news');

// Run app
$app->run();
