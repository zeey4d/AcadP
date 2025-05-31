<?php 

use core\App;
use core\Database;


// header("Content-Type: text/plain");

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['research_id']) && is_numeric($_POST['research_id'])) {
//     $researchId = (int) $_POST['research_id'];
//     $userId = $_SESSION['user']['id'] ?? null;

//     if (!$userId) {
//         echo "unauthenticated";
//         exit;
//     }

//     $db = App::resolve(Database::class);

//     $db->query("DELETE FROM favorites WHERE user_id = :user_id AND research_id = :research_id", [
//         'user_id' => $userId,
//         'research_id' => $researchId
//     ]);

//     echo "success";
// } else {
//     echo "invalid";
// }

$db = App::resolve(Database::class);



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['research_id']) && is_numeric($_POST['research_id'])) {
    $researchId = (int) $_POST['research_id'];
    $userId = $_SESSION['user']['id'] ?? null;

    if (!$userId) {
        die("❌ المستخدم غير مسجل الدخول.");
    }


    $db->query("DELETE FROM favorites WHERE user_id = :user_id AND research_id = :research_id", [
        'user_id' => $userId,
        'research_id' => $researchId
    ]);

    // إعادة التوجيه إلى صفحة المفضلة
    header("Location: /cart");
    exit;
} else {
    die("❌ طلب غير صالح.");
}

