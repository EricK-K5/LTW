<?php
// Controller cho các thao tác CRUD ghi chú
require_once __DIR__ . '/../models/Note.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../middleware/auth.php';

class NoteController
{
	// Hiển thị danh sách ghi chú của người dùng hiện tại
	public static function index()
	{
		ensure_auth();
		$user = current_user();
		$notes = Note::allByUser($user['id']);
		include __DIR__ . '/../view/note/list.php';
	}

	// Hiển thị form tạo ghi chú
	public static function create()
	{
		ensure_auth();
		$categories = Category::all();
		include __DIR__ . '/../view/note/create.php';
	}

	// Lưu ghi chú mới (POST)
	public static function store()
	{
		ensure_auth();
		$user = current_user();
		$data = [
			'title' => $_POST['title'] ?? '',
			'content' => $_POST['content'] ?? '',
			'category_id' => !empty($_POST['category_id']) ? $_POST['category_id'] : null,
			'user_id' => $user['id']
		];
		Note::create($data);
		// Redirect tương đối
		header('Location: index.php?page=notes_list');
		exit;
	}

	// Hiển thị form chỉnh sửa
	public static function edit()
	{
		ensure_auth();
		$user = current_user();
		$id = $_GET['id'] ?? null;
		$note = Note::find($id);
		if (!$note || $note['user_id'] != $user['id']) {
			header('Location: index.php?page=notes_list');
			exit;
		}
		$categories = Category::all();
		include __DIR__ . '/../view/note/edit.php';
	}

	// Cập nhật ghi chú (POST)
	public static function update()
	{
		ensure_auth();
		$user = current_user();
		$id = $_POST['id'] ?? null;
		$note = Note::find($id);
		if (!$note || $note['user_id'] != $user['id']) {
			header('Location: index.php?page=notes_list');
			exit;
		}
		$data = [
			'title' => $_POST['title'] ?? '',
			'content' => $_POST['content'] ?? '',
			'category_id' => !empty($_POST['category_id']) ? $_POST['category_id'] : null,
		];
		Note::update($id, $data);
		header('Location: index.php?page=notes_list');
		exit;
	}

	// Xóa ghi chú
	public static function delete()
	{
		ensure_auth();
		$user = current_user();
		$id = $_GET['id'] ?? null;
		$note = Note::find($id);
		if ($note && $note['user_id'] == $user['id']) {
			Note::delete($id);
		}
		header('Location: index.php?page=notes_list');
		exit;
	}

	// Xem chi tiết ghi chú
	public static function show()
	{
		ensure_auth();
		$user = current_user();
		$id = $_GET['id'] ?? null;
		$note = Note::find($id);
		if (!$note || $note['user_id'] != $user['id']) {
			header('Location: index.php?page=notes_list');
			exit;
		}
		include __DIR__ . '/../view/note/detail.php';
	}
	// hàm tìm kiếm ghi chú
	public static function search()
{
    ensure_auth();

    $user = current_user();
    $keyword = trim($_GET['keyword'] ?? '');

    if ($keyword === '') {
        $notes = [];
    } else {
        $notes = Note::searchByUser($keyword, $user['id']);
    }

    include __DIR__ . '/../view/note/search.php';
}
}
