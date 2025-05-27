<?php
use core\App;
use core\Database;


// التحقق من تسجيل الدخول
if (!isset($_SESSION['user'])) {
    die("المستخدم غير مسجل الدخول.");
}

$db = App::resolve(Database::class);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // تنفيذ التعديل
    $researchId = filter_input(INPUT_POST, 'research_id', FILTER_VALIDATE_INT);
    $title = trim($_POST['title']);
    $abstract = trim($_POST['abstract']);
    $publication_date = $_POST['publication_date'];
    $is_published = isset($_POST['is_published']) ? 1 : 0;

    if ($researchId && $title && $abstract) {
        $db->query(
            "UPDATE researches SET title = :title, abstract = :abstract, publication_date = :publication_date, is_published = :is_published, updated_at = NOW() WHERE research_id = :id",
            [
                'title' => $title,
                'abstract' => $abstract,
                'publication_date' => $publication_date,
                'is_published' => $is_published,
                'id' => $researchId
            ]
        );

        header("Location: /manage_researches.php?updated=1");
        exit;
    } else {
        echo "جميع الحقول مطلوبة.";
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // عرض نموذج التعديل
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        die("معرف غير صالح.");
    }

    $researchId = (int)$_GET['id'];

    $research = $db->query(
        "SELECT * FROM researches WHERE research_id = :id",
        ['id' => $researchId]
    )->fetch();

    if (!$research) {
        die("البحث غير موجود.");
    }
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل البحث</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            padding: 20px;
            background: #f4f4f4;
        }
        form {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>تعديل البحث</h2>
    <form method="POST" action="">
        <input type="hidden" name="research_id" value="<?= $research['research_id'] ?>">

        <label>عنوان البحث:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($research['title']) ?>" required>

        <label>الملخص:</label>
        <textarea name="abstract" required><?= htmlspecialchars($research['abstract']) ?></textarea>

        <label>تاريخ النشر:</label>
        <input type="date" name="publication_date" value="<?= $research['publication_date'] ?>">

        <label>
            <input type="checkbox" name="is_published" <?= $research['is_published'] ? 'checked' : '' ?>> منشور
        </label>

        <button type="submit">حفظ التعديلات</button>
    </form>
</body>
</html>
<?php } ?>
