<?php 

use core\App ;
use core\Database ;
$db = App::resolve(Database::class);

$page = "users_index" ;



require "views/users/index_view.php";

?>