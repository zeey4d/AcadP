<?php
use core\App;
use core\Database;


// تأكد من أن المستخدم مسجل الدخول (اختياري)
if (!isset($_SESSION['user'])) {
    die("يجب تسجيل الدخول أولاً.");
}

$db = App::resolve(Database::class);

// التصفح
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// جلب الأبحاث
$researches = $db->query(
    "SELECT * FROM researches ORDER BY created_at DESC LIMIT $limit OFFSET $offset"
)->fetchAll();

// إجمالي عدد الأبحاث
$total = $db->query("SELECT COUNT(*) as total FROM researches")->fetch()['total'];
$totalPages = ceil($total / $limit);



require "views/research/manage_view.php";


?>