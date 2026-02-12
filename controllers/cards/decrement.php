<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_POST['id'];

$gcard = $db->query('select * from cart_items where item_id = :id', [
    'id' => $id
    ])->find();

    $db->query(
        "UPDATE cart_items 
         SET quantity = quantity - 1 
         WHERE item_id = :id",
        ['id' => $id]
    );

    $db->query('DELETE From cart_items where item_id = :id And quantity <= 0' , [':id' => $id]);

    header('location: /GiftCards/public/');
exit();