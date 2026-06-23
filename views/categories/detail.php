<?php
// Hiển thị chi tiết danh mục
require_once __DIR__ . '/../layout/header.php';
?>
<section class="card">
	<div class="section-head">
		<div>
			<h2 class="auth-title"><?= htmlspecialchars($category['name']) ?></h2>
			<p class="auth-message">Danh mục này đang có <?= (int) $noteCount ?> ghi chú.</p>
		</div>
		<a class="footer-link" href="?page=categories_list">Quay lại danh mục</a>
	</div>
	<p class="footer-copy">ID danh mục: <?= $category['id'] ?></p>
</section>

<section class="card">
	<h3>Ghi chú trong danh mục</h3>
	<?php if (empty($notes)): ?>
		<p>Chưa có ghi chú nào trong danh mục này.</p>
	<?php else: ?>
		<div class="note-list">
			<?php foreach ($notes as $note): ?>
				<a class="note-item" href="?page=notes_show&id=<?= $note['id'] ?>">
					<strong><?= htmlspecialchars($note['title']) ?></strong>
					<span>Xem chi tiết</span>
				</a>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</section>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
