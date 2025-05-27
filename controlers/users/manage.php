<?php 

use core\App;
use core\Database;

$db = App::resolve(Database::class);

// تأكد من أن المستخدم مسجل الدخول (اختياري)
if (!isset($_SESSION['user'])) {
    die("يجب تسجيل الدخول أولاً.");
}


$users = []; 

try{
    $users = $db->query("SELECT * FROM users")->fetchAll();
}
catch(PDOException $ex){
    error_log($ex->getMessage());
}



require 'views/users/manage_view.php';

