<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST["password"];
$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email' , [':email' => $email])->find();

if($user){

    if (password_verify($password, $user['password'])) {
        
        login([
        'name' =>$user['name'],   
        'email'=>$user['email'],
        'id'=>$user['id'],
        'image' => $user['image']
        ]);


    header('location: /GiftCards/public/');
    exit();
    }
}

header('location: /GiftCards/public/');
    exit();