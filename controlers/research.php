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

// الشريط الذي في الاسفل

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 2;
$offset = ($page - 1) * $limit;


$total = $db->query(
    "SELECT COUNT(*) as total FROM favorites WHERE user_id = :user_id",
    ['user_id' => $userId]
)->fetch()['total'];

$totalPages = ceil($total / $limit);

//  فلتره



// استلام مدخلات الفلترة من المستخدم (POST أو GET)
$filters = [
    'category_id' => $_GET['category_id'] ?? null,
    'is_published' => $_GET['is_published'] ?? null,
    'title' => $_GET['title'] ?? null,
    'date_from' => $_GET['date_from'] ?? null,
    'date_to' => $_GET['date_to'] ?? null,
];

// بناء الاستعلام بشكل ديناميكي
$query = "SELECT researches.*, categories.name AS category_name
          FROM researches
          LEFT JOIN categories ON researches.category_id = categories.category_id
          WHERE 1=1";

$params = [];

if (!empty($filters['category_id'])) {
    $query .= " AND researches.category_id = :category_id";
    $params[':category_id'] = $filters['category_id'];
}

if (!is_null($filters['is_published'])) {
    $query .= " AND researches.is_published = :is_published";
    $params[':is_published'] = $filters['is_published'];
}

if (!empty($filters['title'])) {
    $query .= " AND researches.title LIKE :title";
    $params[':title'] = '%' . $filters['title'] . '%';
}

if (!empty($filters['date_from'])) {
    $query .= " AND researches.publication_date >= :date_from";
    $params[':date_from'] = $filters['date_from'];
}

if (!empty($filters['date_to'])) {
    $query .= " AND researches.publication_date <= :date_to";
    $params[':date_to'] = $filters['date_to'];
}

$query .= " ORDER BY researches.publication_date DESC";

$researches = $db->query($query, $params)->fetchAll();

// جلب التصنيفات من قاعدة البيانات
$categories = $db->query("SELECT * FROM categories")->fetchAll();






require "views/research_view.php";

?>