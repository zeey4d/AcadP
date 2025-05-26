<?php 


use core\App;
use core\Database;

$db = App::resolve(Database::class);


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user']['id'])) {
    die("المستخدم غير مسجل الدخول.");
}

// if (isset($_SESSION['user']) && isset($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
//     $userId = (int) $_SESSION['user']['id']; // تأكيد أنه رقم صحيح
// } else {
//     die("❌ المستخدم غير مسجل الدخول أو معرف المستخدم غير صالح.");
// }

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

$userId = filter_var($_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT);
$researchId = filter_var($_POST['research_id'], FILTER_SANITIZE_NUMBER_INT);

// التحقق من عدم وجود البحث مسبقًا
$check = $db->query(
    "SELECT * FROM favorites WHERE user_id = :user_id AND research_id = :research_id",
    [
        'user_id' => $userId,
        'research_id' => $researchId
    ]
)->fetch();

if (!$check) {
    $db->query(
        "INSERT INTO favorites (user_id, research_id) VALUES (:user_id, :research_id)",
        [
            'user_id' => $userId,
            'research_id' => $researchId
        ]
    );
}

// إعادة التوجيه أو الاستجابة حسب الحاجة
header("Location: /");
exit();


