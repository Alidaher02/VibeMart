<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);



// Tell browser we are returning JSON

try {
        $userId = $_SESSION['user']['id'] ?? null;
    $items = $db->query("SELECT * FROM cart_items")->Get();

   
        echo json_encode($items);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error" => "Database error",
        "message" => $e->getMessage()
    ]);
}