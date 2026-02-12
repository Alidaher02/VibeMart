<?php

require __DIR__.'/../bootstrap.php';

use Core\App;
use Core\Database;


// Tell browser we are returning JSON
header("Content-Type: application/json");

try {
    $db = App::resolve(Database::class);

    $items = $db ->query("SELECT * FROM gift_cards")->Get();
        echo json_encode($items);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error" => "Database error",
        "message" => $e->getMessage()
    ]);
}