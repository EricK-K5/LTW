<?php
// Danh sách ghi chú của người dùng
require_once __DIR__ . '/../layout/header.php';
?>
<h2>Danh sách ghi chú</h2>
<?php if (empty($notes)): ?>
	<p>Không có ghi chú nào.</p>
<?php else: ?>
	<ul>
	<?php foreach ($notes as $n): ?>
		<li>
			<a href="?page=notes_show&id=<?= $n['id'] ?>"><?= htmlspecialchars($n['title']) ?></a>
			- <a href="?page=notes_edit&id=<?= $n['id'] ?>">Sửa</a>
			- <a href="?page=notes_delete&id=<?= $n['id'] ?>" data-confirm="Xóa ghi chú này?">Xóa</a>
		</li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
