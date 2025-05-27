<?php
use core\App;
use core\Database;

// التحقق من تسجيل الدخول والصلاحيات
if (!isset($_SESSION['user'])) {
    header('HTTP/1.1 403 Forbidden');
    die("الوصول مرفوض: يجب تسجيل الدخول أولاً");
}

$db = App::resolve(Database::class);

// معالجة طلب POST لتحديث البحث
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // التحقق من CSRF Token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        header('HTTP/1.1 403 Forbidden');
        die("رمز الأمان غير صالح");
    }

    // فلترة وتنظيف المدخلات
    $researchId = filter_input(INPUT_POST, 'research_id', FILTER_VALIDATE_INT);
    $title = trim(htmlspecialchars($_POST['title'] ?? ''));
    $abstract = trim(htmlspecialchars($_POST['abstract'] ?? ''));
    $publication_date = $_POST['publication_date'] ?? '';
    $is_published = isset($_POST['is_published']) ? 1 : 0;

    // التحقق من صحة البيانات
    $errors = [];
    
    if (!$researchId) {
        $errors[] = "معرف البحث غير صالح";
    }
    
    if (empty($title) || strlen($title) > 255) {
        $errors[] = "عنوان البحث مطلوب ويجب ألا يتجاوز 255 حرفاً";
    }
    
    if (empty($abstract)) {
        $errors[] = "ملخص البحث مطلوب";
    }
    
    if (!empty($publication_date) && !strtotime($publication_date)) {
        $errors[] = "تاريخ النشر غير صالح";
    }

    // إذا كانت هناك أخطاء، عرضها
    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        $_SESSION['old_input'] = $_POST;
        header("Location: /research_edit.php?id=" . $researchId);
        exit;
    }

    // تحديث البحث في قاعدة البيانات
    try {
        $db->query(
            "UPDATE researches SET 
                title = :title, 
                abstract = :abstract, 
                publication_date = :publication_date, 
                is_published = :is_published, 
                updated_at = NOW() 
            WHERE research_id = :id",
            [
                'title' => $title,
                'abstract' => $abstract,
                'publication_date' => $publication_date ?: null,
                'is_published' => $is_published,
                'id' => $researchId
            ]
        );

        $_SESSION['success_message'] = "تم تحديث البحث بنجاح";
        header("Location: /manage_researches.php");
        exit;
    } catch (Exception $e) {
        error_log("Error updating research: " . $e->getMessage());
        $_SESSION['error_message'] = "حدث خطأ أثناء تحديث البحث";
        header("Location: /research_edit.php?id=" . $researchId);
        exit;
    }
}

// معالجة طلب GET لعرض نموذج التعديل
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // التحقق من معرف البحث
    if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
        header('HTTP/1.1 400 Bad Request');
        die("معرف البحث غير صالح");
    }

    $researchId = (int)$_GET['id'];

    // جلب بيانات البحث
    try {
        $research = $db->query(
            "SELECT * FROM researches WHERE research_id = :id LIMIT 1",
            ['id' => $researchId]
        )->fetch();

        if (!$research) {
            header('HTTP/1.1 404 Not Found');
            die("البحث المطلوب غير موجود");
        }
    } catch (Exception $e) {
        error_log("Error fetching research: " . $e->getMessage());
        die("حدث خطأ أثناء جلب بيانات البحث");
    }

    // إنشاء CSRF Token
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل البحث - <?= htmlspecialchars($research['title']) ?></title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --text-color: #333;
            --light-text: #666;
            --background-color: #f5f7fa;
            --card-bg: #ffffff;
            --border-color: #e0e0e0;
            --error-color: #e74c3c;
            --success-color: #2ecc71;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Tajawal', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            direction: rtl;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        h2 {
            text-align: center;
            color: var(--primary-color);
            margin: 20px 0;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
        }
        
        .form-container {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-color);
        }
        
        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .checkbox-group input {
            width: auto;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .btn-block {
            display: block;
            width: 100%;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .alert-error {
            background-color: rgba(231, 76, 60, 0.2);
            border-left: 4px solid var(--error-color);
            color: var(--error-color);
        }
        
        .alert-success {
            background-color: rgba(46, 204, 113, 0.2);
            border-left: 4px solid var(--success-color);
            color: var(--success-color);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.9rem;
            margin-top: 5px;
        }
        
        @media (max-width: 768px) {
            .form-container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>تعديل البحث</h2>
        
        <?php if (isset($_SESSION['form_errors'])): ?>
            <div class="alert alert-error">
                <ul>
                    <?php foreach ($_SESSION['form_errors'] as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['form_errors']); ?>
        <?php endif; ?>
        
        <div class="form-container">
            <form method="POST" action="">
                <input type="hidden" name="research_id" value="<?= $research['research_id'] ?>">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                
                <div class="form-group">
                    <label for="title">عنوان البحث</label>
                    <input type="text" id="title" name="title" class="form-control" 
                           value="<?= htmlspecialchars($_SESSION['old_input']['title'] ?? $research['title']) ?>" 
                           required maxlength="255">
                </div>
                
                <div class="form-group">
                    <label for="abstract">ملخص البحث</label>
                    <textarea id="abstract" name="abstract" class="form-control" required><?= 
                        htmlspecialchars($_SESSION['old_input']['abstract'] ?? $research['abstract']) 
                    ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="publication_date">تاريخ النشر</label>
                    <input type="date" id="publication_date" name="publication_date" class="form-control" 
                           value="<?= $_SESSION['old_input']['publication_date'] ?? $research['publication_date'] ?>">
                </div>
                
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="is_published" name="is_published" 
                           <?= (isset($_SESSION['old_input']['is_published']) ? 
                               ($_SESSION['old_input']['is_published'] ? 'checked' : '') : 
                               ($research['is_published'] ? 'checked' : '')) ?>>
                    <label for="is_published">منشور</label>
                </div>
                
                <button type="submit" class="btn btn-block">حفظ التعديلات</button>
            </form>
        </div>
    </div>
    
    <?php 
    if (isset($_SESSION['old_input'])) {
        unset($_SESSION['old_input']);
    }
    ?>
</body>
</html>
<?php } ?>