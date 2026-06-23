<?php
// Hiển thị chi tiết một ghi chú
require_once __DIR__ . '/../layout/header.php';
?>
<h2><?= htmlspecialchars($note['title']) ?></h2>
<p><?= nl2br(htmlspecialchars($note['content'])) ?></p>
<p><a href="?page=notes_edit&id=<?= $note['id'] ?>">Sửa</a> | <a href="?page=notes_list">Quay lại</a></p>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
