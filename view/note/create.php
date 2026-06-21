<?php
<<<<<<< HEAD
// Form tạo ghi chú mới
require_once __DIR__ . '/../layout/header.php';
?>
<h2>Tạo ghi chú mới</h2>
<form method="post" action="?page=notes_store">
	<label>Tiêu đề<br><input type="text" name="title" required></label><br>
	<label>Nội dung<br><textarea name="content" rows="6"></textarea></label><br>
	<label>Danh mục (tùy chọn)<br>
		<select name="category_id">
			<option value="">-- Chọn --</option>
			<?php foreach ($categories as $c): ?>
				<option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
			<?php endforeach; ?>
		</select>
	</label><br>
	<button type="submit">Lưu</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
=======
// Header chung cho các view: hiển thị menu và trạng thái người dùng
require_once __DIR__ . '/../../middleware/auth.php';
$currentUser = current_user();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Simple Notes App</title>
	<base href="<?= htmlspecialchars((BASE_URL ?: '') . '/') ?>">
	<link rel="stylesheet" href="<?= htmlspecialchars((BASE_URL ?: '') . '/public/css/style.css') ?>">
</head>
<body>
<header>
	<h1>Simple Notes App</h1>
	<nav>
		<a href="?page=notes_list">Ghi chú</a>
		<a href="?page=categories_list">Danh mục</a>
		<a href="?page=notes_create">Tạo mới</a>
		<?php if ($currentUser): ?>
			<span>Xin chào, <?= htmlspecialchars($currentUser['username']) ?></span>
			<a href="?page=logout">Đăng xuất</a>
		<?php else: ?>
			<a href="?page=login">Đăng nhập</a>
			<a href="?page=register">Đăng ký</a>
		<?php endif; ?>
	</nav>
</header>
<main>
>>>>>>> 319bea0672a1ca1eb809b3398801d803f4ac906f
