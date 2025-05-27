<?php 

use core\App;
use core\Database;

$db = App::resolve(Database::class);

try{


$researches = $db->query(
    "SELECT 
    r.research_id,
    r.category_id,
    r.title,
    r.abstract,
    r.full_text,
    r.pdf_url,
    r.thumbnail_url,
    r.publication_date,
    r.page_count,
    r.doi,
    r.views_count,
    r.downloads_count,
    r.citations_count,
    r.volume,
    r.issue,
    r.is_published,
    r.created_at,
    r.updated_at
FROM researches r;

"
)->fetchAll();

}catch(PDOException $e){
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البعانات";


}

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 2;
$offset = ($page - 1) * $limit;

// $researches = $db->query(
//     "SELECT r.research_id, r.title, r.abstract, r.thumbnail_url, r.publication_date
//      FROM favorites f 
//      JOIN researches r ON f.research_id = r.research_id
//      WHERE f.user_id = :user_id
//      LIMIT $limit OFFSET $offset",
//     ['user_id' => $userId]
// )->fetchAll();

$total = $db->query(
    "SELECT COUNT(*) as total FROM favorites WHERE user_id = :user_id",
    ['user_id' => $userId]
)->fetch()['total'];

$totalPages = ceil($total / $limit);



require "views/research_view.php";

?>