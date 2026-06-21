<?php
<<<<<<< HEAD
// Entry point ung dung.
=======
// Entry point ứng dụng
// - Bật hiển thị lỗi tạm cho môi trường phát triển
// - Khởi session nếu chưa có
// - Nạp cấu hình DB và router

// Hiển thị lỗi (cho phát triển). Bỏ hoặc tắt khi vào production.
>>>>>>> 319bea0672a1ca1eb809b3398801d803f4ac906f
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

<<<<<<< HEAD
if (session_status() === PHP_SESSION_NONE) {
    $sessionPath = __DIR__ . '/tmp/sessions';
    if (!is_dir($sessionPath)) {
        mkdir($sessionPath, 0777, true);
    }
    session_save_path($sessionPath);
    session_start();
}

=======
// Khởi session an toàn
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tự động xác định base URL để nạp CSS/JS đúng khi chạy trong subfolder
>>>>>>> 319bea0672a1ca1eb809b3398801d803f4ac906f
if (!defined('BASE_URL')) {
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    define('BASE_URL', rtrim(dirname($scriptName), '/'));
}

<<<<<<< HEAD
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/routes/web.php';
=======
// Nạp cấu hình DB (biến $pdo). Sửa file config/db.php nếu cần cho XAMPP.
require_once __DIR__ . '/config/db.php';

// Router chính — xử lý các page query
require_once __DIR__ . '/routes/web.php';

// Nếu router chưa trả response gì, có thể in thông báo đơn giản (tùy ý)
// echo "Application loaded.";
>>>>>>> 319bea0672a1ca1eb809b3398801d803f4ac906f
