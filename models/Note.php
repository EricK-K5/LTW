<?php
// Model `Note` cho các thao tác CRUD cơ bản với bảng `notes`.
require_once __DIR__ . '/../config/db.php';

class Note
{
	// Lấy tất cả ghi chú của một người dùng
	public static function allByUser($user_id)
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM notes WHERE user_id = :user_id ORDER BY created_at DESC');
		$stmt->execute(['user_id' => $user_id]);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Lấy ghi chú theo danh mục và người dùng
	public static function allByCategoryAndUser($category_id, $user_id)
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM notes WHERE category_id = :category_id AND user_id = :user_id ORDER BY created_at DESC');
		$stmt->execute([
			'category_id' => $category_id,
			'user_id' => $user_id,
		]);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// Đếm số ghi chú trong một danh mục của người dùng hiện tại
	public static function countByCategoryAndUser($category_id, $user_id)
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT COUNT(*) AS total FROM notes WHERE category_id = :category_id AND user_id = :user_id');
		$stmt->execute([
			'category_id' => $category_id,
			'user_id' => $user_id,
		]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return (int) ($row['total'] ?? 0);
	}

	// Tìm ghi chú theo id
	public static function find($id)
	{
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM notes WHERE id = :id LIMIT 1');
		$stmt->execute(['id' => $id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	// Tạo ghi chú mới (mảng dữ liệu gồm title, content, category_id, user_id)
	public static function create($data)
	{
		global $pdo;
		$stmt = $pdo->prepare('INSERT INTO notes (title, content, category_id, user_id) VALUES (:title, :content, :category_id, :user_id)');
		return $stmt->execute([
			'title' => $data['title'],
			'content' => $data['content'] ?? null,
			'category_id' => $data['category_id'] ?? null,
			'user_id' => $data['user_id']
		]);
	}

	// Cập nhật ghi chú
	public static function update($id, $data)
	{
		global $pdo;
		$stmt = $pdo->prepare('UPDATE notes SET title = :title, content = :content, category_id = :category_id, updated_at = NOW() WHERE id = :id');
		return $stmt->execute([
			'title' => $data['title'],
			'content' => $data['content'] ?? null,
			'category_id' => $data['category_id'] ?? null,
			'id' => $id
		]);
	}

	// Xóa ghi chú
	public static function delete($id)
	{
		global $pdo;
		$stmt = $pdo->prepare('DELETE FROM notes WHERE id = :id');
		return $stmt->execute(['id' => $id]);
	}
}
