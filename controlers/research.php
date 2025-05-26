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



require "views/research/research_view.php";

?>