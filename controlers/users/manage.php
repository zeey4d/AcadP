<?php 

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$users = []; 

try{
    $users = $db->query("SELECT * FROM users")->fetchAll();
}
catch(PDOException $ex){
    error_log($ex->getMessage());
}



require 'views/users/manage_view.php';

