<?php
// Model `User` đơn giản sử dụng PDO
// Chú thích: file này chứa các hàm truy vấn cơ sở dữ liệu liên quan đến bảng `users`.
require_once __DIR__ . '/../config/db.php';

class User
{
	// Tìm người dùng theo username, trả về mảng kết quả hoặc false
	public static function findByUsername($username)
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
		$stmt->execute(['username' => $username]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	// Tìm người dùng theo id
	public static function findById($id)
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
		$stmt->execute(['id' => $id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	// Tạo người dùng mới (username, plain password)
	public static function create($username, $password)
	{
		global $pdo;
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
		return $stmt->execute(['username' => $username, 'password' => $hash]);
	}

	// Kiểm tra đăng nhập: trả về user nếu đúng, false nếu sai
	public static function verifyCredentials($username, $password)
	{
		$user = self::findByUsername($username);
		if ($user && password_verify($password, $user['password'])) {
			return $user;
		}
		return false;
	}
}

