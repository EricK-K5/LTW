<?php
// Controller xử lý đăng ký, đăng nhập và đăng xuất
require_once __DIR__ . '/../models/User.php';

class AuthController
{
	// Hiển thị form đăng nhập
	public static function showLogin()
	{
		include __DIR__ . '/../views/auth/login.php';
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
			// $_SESSION['user_id'] = $user['id'];
			// Chống Session Fixation khi đăng nhập
			session_regenerate_id(true);
    		$_SESSION['user_id'] = $user['id'];
			// Dùng redirect tương đối để tránh chuyển về root của server
			header('Location: index.php?page=notes_list');
			exit;
		}

		// Nếu sai thì hiển thị lại form kèm thông báo lỗi
		$error = 'Tên đăng nhập hoặc mật khẩu không đúng.';
		include __DIR__ . '/../views/auth/login.php';
	}

	// Hiển thị form đăng ký
	public static function showRegister()
	{
		include __DIR__ . '/../views/auth/register.php';
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
		$confirmPassword = $_POST['confirm_password'] ?? '';
		// them kiem tra xac nhan lai mat khau
		if (empty($username) || empty($password) || empty($confirmPassword)) {
			$error = 'Vui lòng nhập đủ tên đăng nhập và mật khẩu.';
			include __DIR__ . '/../views/auth/register.php';
			return;
		}
		
		// Kiểm tra độ dài tên đăng nhập
		if (strlen($username) < 4 || strlen($username) >12) {
			$error = 'Tên đăng nhập phải có từ 4 đến 12 ký tự.';
			include __DIR__ . '/../views/auth/register.php';
			return;
		}

		// Chỉ cho phép chữ, số và dấu "_"
		if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
			$error = 'Tên đăng nhập chỉ được chứa chữ cái, chữ số và dấu _.';
			include __DIR__ . '/../views/auth/register.php';
			return;
		}

		// Kiểm tra cơ bản
		// Kiem tra xac nhan mat khau
		if ($password !== $confirmPassword) {
			$error = 'Mật khẩu xác nhận không khớp.';
			include __DIR__ . '/../views/auth/register.php';
			return;
		}
		// Kiem tra do manh cua mat khau
		// check do dai
		if (strlen($password) < 8) {
			$error = 'Mật khẩu phải có ít nhất 8 ký tự.';
			include __DIR__ . '/../views/auth/register.php';
			return;
		}

		// check ki tu
		if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/', $password)) {
			$error = 'Mật khẩu phải có chữ hoa, chữ thường và số.';
			include __DIR__ . '/../views/auth/register.php';
			return;
		}

		// Nếu user đã tồn tại thì báo lỗi
		if (User::findByUsername($username)) {
			$error = 'Tên đăng nhập đã tồn tại.';
			include __DIR__ . '/../views/auth/register.php';
			return;
		}

		// Tạo user mới
		$ok = User::create($username, $password);
		if ($ok) {
			header('Location: index.php?page=login');
			exit;
		}

		$error = 'Không thể tạo tài khoản. Vui lòng thử lại.';
		include __DIR__ . '/../views/auth/register.php';
	}

	// Đăng xuất
	// public static function logout()
	// {
	// 	if (session_status() === PHP_SESSION_NONE) session_start();
	// 	session_destroy();
	// 	header('Location: index.php?page=login');
	// 	exit;
	// }

	public static function logout()
	{
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}

		// Xóa toàn bộ dữ liệu session
		$_SESSION = [];

		// Hủy session
		session_destroy();

		header('Location: index.php?page=login');
		exit;
	}
}

