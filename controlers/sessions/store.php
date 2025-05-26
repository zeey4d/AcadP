<?php

use core\App;
use core\Database;
use models\User;

$db  = App::resolve(Database::class);


$erorrs = [];




if (empty($_POST['email'])) {
    $erorrs['email'] = "Please enter your email";
}

if (empty($_POST['password'])) {
    $erorrs['password'] = "Please enter your password";
}


if (! Validator::email($_POST['email'])) {
    $erorrs['email'] = "not a valid email ";
}
if (! Validator::string($_POST['password'])) {
    $erorrs['password'] = "password is not valid ";
}

if (! empty($erorrs)) {
    require 'views/users/index_view.php';
}

$user = $db->query("select * from users where email = :email ; ", [
    "email" => $_POST['email']
])->fetch();



if ($user) {
    if ($_POST['password'] == $user['password']) {
        logIn($user);
        header("Location: /");
        exit();
    }
}



var_dump($_POST);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $_POST['email']
])->fetch();

if (!$user) {
    $errors['sessions_store'] = "البريد الإلكتروني أو كلمة المرور غير صحيحة.";
    require 'views/users/index_view.php';
    exit();
}

if (!password_verify($_POST['password'], $user['password'])) {

    $erorrs["Wrong password."];
    require 'views/users/index_view.php';
    exit();
}


$erorrs['email'] = "There No Matching Email Or Password Like this";



require 'views/users/index_view.php';

