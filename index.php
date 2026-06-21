<?php
// Entry point ứng dụng
// - Bật hiển thị lỗi tạm cho môi trường phát triển
// - Khởi session nếu chưa có
// - Nạp cấu hình DB và router

// Hiển thị lỗi (cho phát triển). Bỏ hoặc tắt khi vào production.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Khởi session an toàn
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tự động xác định base URL để nạp CSS/JS đúng khi chạy trong subfolder
if (!defined('BASE_URL')) {
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    define('BASE_URL', rtrim(dirname($scriptName), '/'));
}

// Nạp cấu hình DB (biến $pdo). Sửa file config/db.php nếu cần cho XAMPP.
require_once __DIR__ . '/config/db.php';

// Router chính — xử lý các page query
require_once __DIR__ . '/routes/web.php';

// Nếu router chưa trả response gì, có thể in thông báo đơn giản (tùy ý)
// echo "Application loaded.";
