<?php

// Routing
$app->get('/',                      '\App\Controller\Document::news');
$app->get('/news',                  '\App\Controller\Document::news');
$app->get('/catalog',               '\App\Controller\Document::catalog');
$app->get('/document/{id}',         '\App\Controller\Document::document');

$app->get('/myborrows',             '\App\Controller\Borrow::myBorrows');
$app->get('/borrows',               '\App\Controller\Borrow::borrows');
$app->get('/resa/{id}',             '\App\Controller\Borrow::resa');
$app->get('/borrow/{id}',           '\App\Controller\Borrow::borrow');
$app->get('/closeBorrowing/{id}',   '\App\Controller\Borrow::closeBorrowing');

$app->get('/events',                '\App\Controller\Event::events');

