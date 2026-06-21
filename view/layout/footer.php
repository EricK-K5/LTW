<?php
// Hiển thị danh sách danh mục
require_once __DIR__ . '/../layout/header.php';
?>
<section class="card">
	<h2 class="auth-title">Danh mục</h2>
	<p class="auth-message">Các danh mục mẫu như Work, Study, Personal đã được thêm sẵn để bạn dùng ngay. Bạn cũng có thể tạo thêm danh mục riêng.</p>
	<?php if (($_GET['error'] ?? '') === 'duplicate'): ?>
		<p class="auth-message" style="color: var(--danger);">Danh mục này đã tồn tại rồi, vui lòng nhập tên khác.</p>
	<?php endif; ?>
	<form method="post" action="?page=categories_store" class="category-form">
		<label>
			Tên danh mục
			<input type="text" name="name" placeholder="Ví dụ: Ideas, Finance, Travel" maxlength="150" required>
		</label>
		<button type="submit">Thêm danh mục</button>
	</form>
</section>

<section class="card">
	<div class="section-head">
		<h3>Danh sách hiện có</h3>
		<span class="section-meta"><?= count($categories) ?> mục</span>
	</div>
	<?php if (empty($categories)): ?>
		<p>Chưa có danh mục nào.</p>
	<?php else: ?>
		<div class="category-grid">
			<?php foreach ($categories as $c): ?>
				<?php $count = Note::countByCategoryAndUser($c['id'], $currentUser['id']); ?>
				<a class="category-card" href="?page=categories_show&id=<?= $c['id'] ?>">
					<strong><?= htmlspecialchars($c['name']) ?></strong>
					<span><?= $count ?> ghi chú</span>
				</a>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
