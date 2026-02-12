<?php


use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = "you should provide an email!!";
}
if (!Validator::string($password, 7, 255)) {
    
    $errors['password'] = "you should provide a well password!!";
}

if (count($errors)) {
    
    return view("registeration/create.view.php", ['errors' => $errors]);
    
}



$user = $db->query('select * from users where email = :email' , [':email' => $email])->find();

if($user){
 header('Location: /GiftCards/public');
       exit();
    
}else{
    $db->query('insert into users(name , email, password) values(:name , :email , :password)' , [
        ':name' => $name,
        ':email' => $email,
        'password' => password_hash($password,PASSWORD_DEFAULT)
       ]);

   
       header('Location: /GiftCards/public');
       exit();
}

