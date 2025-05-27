<?php
use core\App;
use core\Database;


if (!isset($_SESSION['user'])) {
    die("المستخدم غير مسجل الدخول.");
}

if (!isset($_GET['id'])) {
    die("معرف المستخدم غير موجود.");
}

$db = App::resolve(Database::class);
$userId = (int) $_GET['id'];

$db->query("DELETE FROM users WHERE user_id = :id", ['id' => $userId]);

header("Location: manage_users.php");
exit;
?>