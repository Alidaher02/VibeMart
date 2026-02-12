<?php




use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$user_id = $_SESSION['user']['id'] ?? null;


try {

    $id = $_POST['id']; // item id from Buy button
    $user_id = $_SESSION['user']['id'];
    

    // Check if item exists in items table
    $item = $db->query(
        "SELECT price FROM gift_cards WHERE id = :iid",
        [':iid' => $id]
    )->find();

    $cart = $db->query(
        "Select * from cart_items where item_id = :iid and user_id = :user_id" ,
        [
            ':iid' => $id,
            ':user_id' => $user_id
        
        ]
    )->find();

    if($cart){
    header("Location: /GiftCards/public/"); // redirect back
    exit;
    }

        

    //Insert new row in cart_items
    $db->query(
        "INSERT INTO cart_items (item_id, quantity , user_id) VALUES (:iid,  :q , :user_id)",
        [
            ':iid' => $id,
            ':q' => 1,
            ':user_id' => $user_id
        ]
    );

    header("Location: /GiftCards/public/"); // redirect back
    exit;

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "error" => "Database error",
        "message" => $e->getMessage()
    ]);
}
