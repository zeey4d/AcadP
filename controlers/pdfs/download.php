<?php
$filename = isset($_GET['file']) ? basename($_GET['file']) : null;
$filePath = __DIR__ . 'views/media/pdfs/' . $filename;

if ($filename && file_exists($filePath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . filesize($filePath));
    readfile($filePath);
    exit;
} else {
    http_response_code(404);
    echo "الملف غير موجود.";
}

