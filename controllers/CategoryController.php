<?php
// Controller cho danh mục ghi chú
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Note.php';
require_once __DIR__ . '/../middleware/auth.php';

class CategoryController
{
	// Hiển thị danh sách danh mục
	public static function index()
	{
		ensure_auth();
		$categories = Category::all();
		$currentUser = current_user();
		include __DIR__ . '/../views/categories/list.php';
	}

	// Lưu danh mục mới
	public static function store()
	{
		ensure_auth();
		$name = trim($_POST['name'] ?? '');

		if ($name !== '') {
			if (Category::existsByName($name)) {
				header('Location: index.php?page=categories_list&error=duplicate');
				exit;
			}

			$currentUser = current_user();
			Category::create($name, $currentUser['id']);
		}

		header('Location: index.php?page=categories_list');
		exit;
	}

	// Hiển thị chi tiết danh mục
	public static function show()
	{
		ensure_auth();
		$id = $_GET['id'] ?? null;
		$category = Category::find($id);
		$currentUser = current_user();

		if (!$category) {
			header('Location: index.php?page=categories_list');
			exit;
		}

		$notes = Note::allByCategoryAndUser($category['id'], $currentUser['id']);
		$noteCount = count($notes);
		include __DIR__ . '/../views/categories/detail.php';
	}
}
