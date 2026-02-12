<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$gcard = $db->query('select * from gift_cards where id = :id', [
    'id' => $_POST['id']
])->findOrFail();


$db->query('delete from gift_cards where id = :id', [
    'id' => $_POST['id']
]);


header('location: /GiftCards/public/');
exit();