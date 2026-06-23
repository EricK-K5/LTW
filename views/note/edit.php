<?php
// Form chỉnh sửa ghi chú
require_once __DIR__ . '/../layout/header.php';
?>
<h2>Chỉnh sửa ghi chú</h2>
<form method="post" action="?page=notes_update">
	<input type="hidden" name="id" value="<?= $note['id'] ?>">
	<label>Tiêu đề<br><input type="text" name="title" value="<?= htmlspecialchars($note['title']) ?>" required></label><br>
	<label>Nội dung<br><textarea name="content" rows="6"><?= htmlspecialchars($note['content']) ?></textarea></label><br>
	<label>Danh mục (tùy chọn)<br>
		<select name="category_id">
			<option value="">-- Chọn --</option>
			<?php foreach ($categories as $c): ?>
				<option value="<?= $c['id'] ?>" <?= ($note['category_id'] == $c['id']) ? 'selected' : '' ?>><?= htmlspecialchars($c['name']) ?></option>
			<?php endforeach; ?>
		</select>
	</label><br>
	<button type="submit">Cập nhật</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
