<?php
// Controller xử lý đăng ký, đăng nhập và đăng xuất
require_once __DIR__ . '/../models/User.php';

class AuthController
{
	// Hiển thị form đăng nhập
	public static function showLogin()
	{
		include __DIR__ . '/../view/auth/login.php';
	}

	// Xử lý đăng nhập (POST)
	public static function login()
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			header('Location: index.php?page=login');
			exit;
		}

		$username = $_POST['username'] ?? '';
		$password = $_POST['password'] ?? '';

		$user = User::verifyCredentials($username, $password);
		if ($user) {
			// Lưu user id vào session
			if (session_status() === PHP_SESSION_NONE) session_start();
			$_SESSION['user_id'] = $user['id'];
			// Dùng redirect tương đối để tránh chuyển về root của server
			header('Location: index.php?page=notes_list');
			exit;
		}

		// Nếu sai thì hiển thị lại form kèm thông báo lỗi
		$error = 'Tên đăng nhập hoặc mật khẩu không đúng.';
		include __DIR__ . '/../view/auth/login.php';
	}

	// Hiển thị form đăng ký
	public static function showRegister()
	{
		include __DIR__ . '/../view/auth/register.php';
	}

	// Xử lý đăng ký (POST) - rất đơn giản
	public static function register()
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			header('Location: index.php?page=register');
			exit;
		}

		$username = trim($_POST['username'] ?? '');
		$password = $_POST['password'] ?? '';

		// Kiểm tra cơ bản
		if (empty($username) || empty($password)) {
			$error = 'Vui lòng nhập đủ tên đăng nhập và mật khẩu.';
			include __DIR__ . '/../view/auth/register.php';
			return;
		}

		// Nếu user đã tồn tại thì báo lỗi
		if (User::findByUsername($username)) {
			$error = 'Tên đăng nhập đã tồn tại.';
			include __DIR__ . '/../view/auth/register.php';
			return;
		}

		// Tạo user mới
		$ok = User::create($username, $password);
		if ($ok) {
			header('Location: index.php?page=login');
			exit;
		}

		$error = 'Không thể tạo tài khoản. Vui lòng thử lại.';
		include __DIR__ . '/../view/auth/register.php';
	}

	// Đăng xuất
	public static function logout()
	{
		if (session_status() === PHP_SESSION_NONE) session_start();
		session_destroy();
		header('Location: index.php?page=login');
		exit;
	}
}
