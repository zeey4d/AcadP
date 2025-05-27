<?php
use core\App;
use core\Database;


// التحقق من تسجيل الدخول
if (!isset($_SESSION['user'])) {
    die("المستخدم غير مسجل الدخول.");
}

// التأكد من أن معرف البحث موجود
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("معرف غير صالح.");
}

$researchId = (int)$_GET['id'];

$db = App::resolve(Database::class);

// تنفيذ الحذف
$deleted = $db->query(
    "DELETE FROM researches WHERE research_id = :id",
    [
        'id' => $researchId
    ]
);

if ($deleted) {
    header("Location: /?success=1");
    exit;
} else {
    echo "فشل في حذف البحث.";
}
