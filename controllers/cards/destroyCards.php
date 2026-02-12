<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_POST['id'];

$gcard = $db->query('select * from cart_items where item_id = :id', [
    'id' => $id
    ])->find();

$db->query('delete from cart_items where item_id = :id', [
    'id' => $id
]);


header('location: /GiftCards/public/');
exit();