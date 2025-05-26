<?php

$page = "users_create" ;


use core\App;
use core\Database;


$db  = App::resolve(Database::class);



require "views/users/create_view.php";

?>

