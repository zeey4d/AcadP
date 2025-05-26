<?php 

use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;


// $researches = $db->query("select 
//     r.research_id,
//     r.category_id,
//     r.title,
//     r.abstract,
//     r.full_text,
//     r.pdf_url,
//     r.thumbnail_url,
//     r.publication_date,
//     r.page_count,
//     r.doi,
//     r.views_count,
//     r.downloads_count,
//     r.citations_count,
//     r.volume,
//     r.issue,
//     r.is_published,
//     r.created_at,
//     r.updated_at
// from researches r;" , [
//     'research_id' => $_GET['research_id'],
// ])->fetchAll();

// $researches = $db->query(
//     "SELECT 
//     r.research_id,
//     r.category_id,
//     r.title,
//     r.abstract,
//     r.full_text,
//     r.pdf_url,
//     r.thumbnail_url,
//     r.publication_date,
//     r.page_count,
//     r.doi,
//     r.views_count,
//     r.downloads_count,
//     r.citations_count,
//     r.volume,
//     r.issue,
//     r.is_published,
//     r.created_at,
//     r.updated_at
// FROM researches r;

// "
// )->fetchAll();

$researches = $db->query("
    SELECT 
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
    FROM researches r
    WHERE r.research_id = :research_id
", [
    ':research_id' => $_GET['research_id']
])->fetchAll();







// if (isset($_GET['research_id'])) {
//     $research_id = $_GET['research_id'];
// } else {
//     die("المعرف 'research_id' غير موجود في الرابط.");
// }

// if (!$research) {
//     echo "<p>لا يوجد بحث بهذا المعرف.</p>";
//     return;
// }

// dd($researches);

// echo $sql;
// print_r($params);
// exit;

 
require "views/research/show_view.php";



?>


