<?php
// Router rất đơn giản: dùng query param `page` để xác định hành động
// Ví dụ: /?page=login, /?page=notes_list, /?page=notes_create, /?page=notes_store

require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/NoteController.php';
require_once __DIR__ . '/../controllers/CategoryController.php';


$page = $_GET['page'] ?? 'notes_list';

switch ($page) {
	// Auth
	case 'login':
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			AuthController::login();
		} else {
			AuthController::showLogin();
		}
		break;
	case 'register':
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			AuthController::register();
		} else {
			AuthController::showRegister();
		}
		break;
	case 'logout':
		AuthController::logout();
		break;

	// Notes
	case 'notes_list':
		NoteController::index();
		break;
	case 'notes_create':
		NoteController::create();
		break;
	case 'notes_store':
		NoteController::store();
		break;
	case 'notes_edit':
		NoteController::edit();
		break;
	case 'notes_update':
		NoteController::update();
		break;
	case 'notes_delete':
		NoteController::delete();
		break;
	case 'notes_show':
		NoteController::show();
		break;

	// Categories
	case 'categories_list':
		CategoryController::index();
		break;
	case 'categories_store':
		CategoryController::store();
		break;
	case 'categories_show':
		CategoryController::show();
		break;

	default:
		// Trang mặc định
		NoteController::index();
		break;
}
