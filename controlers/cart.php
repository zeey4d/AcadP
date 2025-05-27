<?php 


$_SESSION['name'] = "Developer";


use core\App;
use core\Database;

// session_start();

$db = App::resolve(Database::class);

$userId = filter_var($_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT);

$researches = $db->query(
    "SELECT 
        r.research_id, r.title, r.abstract, r.thumbnail_url, r.publication_date
     FROM 
        favorites f 
     JOIN 
        researches r 
     ON 
        f.research_id = r.research_id
     WHERE 
        f.user_id = :user_id",
    [
        'user_id' => $userId
    ]
)->fetchAll();



require 'views/cart_view.php';



?>