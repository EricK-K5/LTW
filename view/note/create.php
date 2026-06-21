<?php
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
