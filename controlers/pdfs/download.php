
<?php
$file = 'views/media/images/acad.png';

header('Content-Type: application/png');
header('Content-Disposition: inline; filename="' . basename($file) . '"');
header('Content-Length: ' . filesize($file));
readfile($file);
exit;
