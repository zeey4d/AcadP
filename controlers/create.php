<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //dd("we are in creat.php");
    // استلام البيانات من النموذج
    $title = trim($_POST['research_title'] ?? '');
    $abstract = trim($_POST['research_abstract'] ?? '');
    $full_text = trim($_POST['research_fulltext'] ?? '');
    $pdf_url = trim($_POST['research_pdf'] ?? '');
    $thumbnail_url = trim($_POST['research_thumbnail'] ?? '');
    $publication_date = $_POST['publication_date'] ?? date('Y-m-d');
    $page_count = $_POST['page_count'] ?? "45";
    $doi = trim($_POST['doi'] ?? '2');
    $volume = trim($_POST['volume'] ?? '34');
    $issue = trim($_POST['issue'] ?? '4');
    $is_published = isset($_POST['is_published']) ? 1 : 0;
    $category_id=2;

    // $query1="INSERT INTO researches (title,abstract)values('ali','mosu')";
    $db->query(
        "INSERT INTO researches (title, abstract) VALUES (:title, :abstract)",
        [
            'title' => $title,
            'abstract' => $abstract
        ]
    );
    

    $db->query(
        "INSERT INTO researches (
            category_id, title, full_text, abstract, pdf_url, thumbnail_url, 
            publication_date, page_count, doi, volume, issue, is_published
        ) VALUES (
            :category_id, :title, :full_text, :abstract, :pdf_url, :thumbnail_url, 
            :publication_date, :page_count, :doi, :volume, :issue, :is_published
        )",
        [
            'category_id'      => $category_id,
            'title'            => $title,
            'full_text'        => $full_text,
            'abstract'         => $abstract,
            'pdf_url'          => $pdf_url,
            'thumbnail_url'    => $thumbnail_url,
            'publication_date' => $publication_date,
            'page_count'       => $page_count,
            'doi'              => $doi,
            'volume'           => $volume,
            'issue'            => $issue,
            'is_published'     => $is_published
        ]
    );
    
//     // التحقق من القيم الأساسية
//     if (empty($title) || empty($abstract)) {
//         die("❌ العنوان أو الملخص مطلوب.");
//     }
//     // حفظ البحث في قاعدة البيانات
//     // $query = "INSERT INTO researches 
//     //     (title, abstract, full_text, pdf_url, thumbnail_url, publication_date, page_count, doi, volume, issue, is_published)
//     //     VALUES 
//     //     (:title, :abstract, :full_text, :pdf_url, :thumbnail_url, :publication_date, :page_count, :doi, :volume, :issue, :is_published)";

//     $stmt = $db->prepare($query);

//     $stmt->execute([
//         'category_id'=>$category_id,
//         'title' => $title,
//         'full_text' => $full_text,
//         'abstract' => $abstract,
       
//         'pdf_url' => $pdf_url,
//         'thumbnail_url' => $thumbnail_url,
//         'publication_date' => $publication_date,
//         'page_count' => $page_count,
//         'doi'=>$doi,
//         'volume' => $volume,
      
//         'issue' => $issue,
//         'is_published' => $is_published
//     ]);

    echo "<p style='color: green;'>✅ تم إضافة البحث بنجاح!</p>";
} else {
    echo "❌ يجب إرسال النموذج باستخدام POST.";
}
require "views/research/create_view.php";
?>
