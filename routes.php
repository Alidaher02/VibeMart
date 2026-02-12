<?php

/*return  [
    '/learningPhp/' => 'controllers/index.php',
    '/learningPhp/about' => 'controllers/about.php',
    '/learningPhp/contact' => 'controllers/contact.php',
    '/learningPhp/notes' => 'controllers/notes/index.php',
    '/learningPhp/note' => 'controllers/notes/show.php',
    '/learningPhp/notes/create' => 'controllers/notes/create.php'

];
*/


$router->get('/GiftCards/public/' , 'controllers/index.php');

$router->get('/GiftCards/public/index.php/show' , 'controllers/cards/show.php');
$router->delete('/GiftCards/public/index.php/show' , 'controllers/cards/destroy.php');
$router->post('/GiftCards/public/index.php/show' , 'controllers/cards/addToCart.php');

$router->get('/GiftCards/public/index.php/register' , 'controllers/registeration/create.php');
$router->post('/GiftCards/public/index.php/register' , 'controllers/registeration/store.php');

$router->get('/GiftCards/public/index.php/login' , 'controllers/login/login.php');
$router->post('/GiftCards/public/index.php/login' , 'controllers/login/store.php');
$router->get('/GiftCards/public/index.php/logout','controllers/login/logout.php');

$router->delete('/GiftCards/public/index.php/delete','controllers/cards/destroyCards.php');
$router->patch('/GiftCards/public/index.php/increment','controllers/cards/increment.php');
$router->patch('/GiftCards/public/index.php/decrement','controllers/cards/decrement.php');















