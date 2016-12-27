<?php

// Routing
$app->get('/api/news',                  '\App\Controller\Document::news');
$app->get('/api/catalog',               '\App\Controller\Document::catalog');
$app->get('/api/document/{id}',         '\App\Controller\Document::document');

$app->get('/api/myborrows',             '\App\Controller\Borrow::myBorrows');
$app->get('/api/borrows',               '\App\Controller\Borrow::borrows');
$app->get('/api/resa/{id}',             '\App\Controller\Borrow::resa');
$app->get('/api/borrow/{id}',           '\App\Controller\Borrow::borrow');
$app->get('/api/closeBorrowing/{id}',   '\App\Controller\Borrow::closeBorrowing');

$app->get('/api/events',                '\App\Controller\Event::events');

