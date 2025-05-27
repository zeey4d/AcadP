<?php
use core\App;
use core\Database;

session_start();

if (!isset($_SESSION['user'])) {
    die("المستخدم غير مسجل الدخول.");
}

$db = App::resolve(Database::class);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = (int) $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $university = $_POST['university'];
    $department = $_POST['department'];

    $db->query("UPDATE users SET username = :username, email = :email, university = :university, department = :department WHERE user_id = :user_id", [
        'username' => $username,
        'email' => $email,
        'university' => $university,
        'department' => $department,
        'user_id' => $userId
    ]);

    header("Location: manage_users.php");
    exit;
}

$user = $db->query("SELECT * FROM users WHERE user_id = :id", ['id' => $_GET['id']])->findOrFail();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل المستخدم</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            padding: 20px;
            background-color: #f9f9f9;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>تعديل المستخدم</h2>
        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
        <label>الاسم:</label>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>

        <label>البريد الإلكتروني:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

        <label>الجامعة:</label>
        <input type="text" name="university" value="<?= htmlspecialchars($user['university']) ?>">

        <label>القسم:</label>
        <input type="text" name="department" value="<?= htmlspecialchars($user['department']) ?>">

        <button type="submit">حفظ التغييرات</button>
    </form>
</body>
</html>
