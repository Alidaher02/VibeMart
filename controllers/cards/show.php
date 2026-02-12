<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$gcard = $db ->query("SELECT * from gift_cards where id = :id" , [':id' => $_GET['id']])->findorFail();

$user_id = $_SESSION['user']['id'] ?? null;

$count = $db ->query("select COUNT(*) as count from cart_items where user_id = :user_id" , [':user_id' => $user_id])->find();

require base_path("views/show.view.php");
