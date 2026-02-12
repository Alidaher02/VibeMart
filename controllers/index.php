<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$user_id = $_SESSION['user']['id'] ?? null;

$gcards = $db ->query("SELECT * from gift_cards")->Get();

$count = $db ->query("select COUNT(*) as count from cart_items where user_id = :user_id" , [':user_id' => $user_id])->find();

$totalPrice = $db->query(
    "SELECT SUM(i.price * ci.quantity) AS total_price
     FROM cart_items ci
     JOIN gift_cards i ON ci.item_id = i.id
     WHERE ci.user_id = :user_id",
    [':user_id' => $user_id]
)->find();


require base_path('views/index.view.php');

