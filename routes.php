<?php

$router->get('/', 'index.php');
$router->post('/', 'email.php');

$router->get('/web', 'web.php');

$router->get('/hosting', 'hosting.php');
