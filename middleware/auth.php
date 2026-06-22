<?php
// Middleware đơn giản cho xác thực phiên
// Chú thích: include file này ở đầu các trang cần bảo vệ.

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Trả về user hiện tại (mảng) hoặc null
function current_user()
{
	if (!empty($_SESSION['user_id'])) {
		require_once __DIR__ . '/../models/User.php';
		return User::findById($_SESSION['user_id']);
	}
	return null;
}

// Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
function ensure_auth()
{
	if (empty($_SESSION['user_id'])) {
		// Chuyển hướng tương đối để giữ nguyên thư mục hiện tại (hữu ích khi chạy trong subfolder)
		header('Location: index.php?page=login');
		exit;
	}
}
