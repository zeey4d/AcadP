<?php
use core\App;
use core\Database;


$db  = App::resolve(Database::class);


$username   = $_POST['username'];
$email = $_POST['email'];
$password   = $_POST['password']   ;
 $university = $_POST['university'] ;
 $department = $_POST['department'];

$erorrs = [] ;

if(! Validator::email($email)){
    $erorrs['email'] = "not a valid email ";
}
if(! Validator::string($password , 8 ,255)){
    $erorrs['password'] = "password is too short password ";
}

if(! empty($erorrs)){
    require 'views/registertion/create_view.php';
}





$user =  $db->query('select * from users where email = :email',
['email' => $email])->fetch();


if($user){
    header("Location: /");
}else{
   
    $db->query('INSERT INTO users (username , email , password,university,department ) VALUES (:username ,:email , :password ,:university, :department );',[
        'username' => $username,
        'email' => $email,
        'password' =>password_hash($password ,PASSWORD_BCRYPT ) ,
        'university' => $university,
        'department' => $department,
    ]
);

logIn($user);



header("Location: /");
die();

}

