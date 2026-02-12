<?php


require __DIR__.'/../bootstrap.php';

use Core\App;
use Core\Database;





session_start();

// Tell browser we are returning JSON
header('Content-Type: application/json');


try {

    $db = App::resolve(Database::class);

    if (!isset($_SESSION['user']['id'])) {
        echo json_encode(['error' => 'User not logged in']);
        exit;
    }
    
    $userId = $_SESSION['user']['id'];

    $items = $db->query(
        "SELECT ci.*, i.*
         FROM cart_items ci
         JOIN gift_cards i ON ci.item_id = i.id
         WHERE ci.user_id = :user_id",
        [':user_id' => $userId]
    )->Get();

    

    
   
    echo json_encode($items); 

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error" => "Database error",
        "message" => $e->getMessage()
    ]);
}