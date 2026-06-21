<?php
<<<<<<< HEAD
// Footer chung, đóng các thẻ HTML
?>
</main>
<footer class="app-footer">
	<div class="footer-shell">
		<div class="footer-grid">
			<div class="footer-panel">
				<h3 class="footer-heading">Simple Notes App</h3>
				<p class="footer-copy">Một không gian nhỏ gọn để ghi chú, theo dõi ý tưởng và quay lại công việc dang dở nhanh hơn.</p>
			</div>
			<div class="footer-panel">
				<h4 class="footer-heading">Điểm mạnh</h4>
				<div class="footer-badges">
					<span class="footer-badge">Nhanh</span>
					<span class="footer-badge">Gọn</span>
					<span class="footer-badge">Dễ dùng</span>
				</div>
				<p class="footer-copy">Dữ liệu được quản lý trực tiếp trên hệ thống hiện tại, phù hợp cho sử dụng nội bộ và thử nghiệm.</p>
			</div>
		</div>
		<div class="footer-bottom">
			<p class="footer-copy">&copy; <?= date('Y') ?> Simple Notes App</p>
			
		</div>
	</div>
</footer>
	<script src="<?= htmlspecialchars((BASE_URL ?: '') . '/public/js/app.js') ?>" defer></script>
</body>
</html>
=======
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
>>>>>>> 319bea0672a1ca1eb809b3398801d803f4ac906f
