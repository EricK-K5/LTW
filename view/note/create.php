<?php
//nạp auht.php để dùng các hàm kiểm tra

require_once __DIR__ . '/../../middleware/auth.php';
$currentUser = current_user();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tạo ghi chú</title>
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
// lưu kết quả vào $currentUser
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
	<h2>Tạo ghi chú mới</h2>
//POST để gửi dữ liệu ẩn trong body, tạo sửa xóa dữ liệu
// bấm lưu, request sẽ đi tới route notes_store
//sẽ gọi notcontroller để xử lý
	<form method="POST" action="?page=notes_store">
		<div style="margin-bottom: 12px;">
			<label for="title">Tiêu đề</label><br>
			<input type="text" id="title" name="title" required style="width: 300px;">
		</div>

		<div style="margin-bottom: 12px;">
			<label for="content">Nội dung</label><br>
			<textarea id="content" name="content" rows="6" cols="50"></textarea>
		</div>

		<div style="margin-bottom: 12px;">
			<label for="category_id">Danh mục</label><br>
			<select name="category_id" id="category_id">
				<option value="">-- Chọn danh mục --</option>
				<?php foreach ($categories as $category): ?>
					<option value="<?= $category['id'] ?>">
						<?= htmlspecialchars($category['name']) ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>

		<button type="submit">Lưu ghi chú</button>
		<a href="?page=notes_list">Quay lại</a>
	</form>
</main>
</body>
</html>