<?php
// Entry point ung dung.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    $sessionPath = __DIR__ . '/tmp/sessions';
    if (!is_dir($sessionPath)) {
        mkdir($sessionPath, 0777, true);
    }
    session_save_path($sessionPath);
    session_start();
}

if (!defined('BASE_URL')) {
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    define('BASE_URL', rtrim(dirname($scriptName), '/'));
}

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/routes/web.php';
