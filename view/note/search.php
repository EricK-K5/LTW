<?php
require_once __DIR__ . '/../layout/header.php';
?>

<h2>Tìm kiếm ghi chú</h2>

<form method="GET" action="index.php" style="margin-bottom: 16px;">
    <input type="hidden" name="page" value="notes_search">

    <label for="keyword">Nhập từ khóa:</label><br>
    <input
        type="text"
        id="keyword"
        name="keyword"
        value="<?= htmlspecialchars($keyword ?? '') ?>"
        placeholder="Nhập tiêu đề hoặc nội dung ghi chú..."
        style="width: 300px;"
    >

    <button type="submit">Tìm kiếm</button>
    <a href="?page=notes_list">Quay lại danh sách</a>
</form>

<?php if (!empty($keyword ?? '')): ?>
    <p>Kết quả tìm kiếm cho từ khóa: <strong><?= htmlspecialchars($keyword) ?></strong></p>
<?php endif; ?>

<?php if (empty($notes)): ?>
    <p>Không tìm thấy ghi chú nào.</p>
<?php else: ?>
    <ul>
        <?php foreach ($notes as $note): ?>
            <li>
                <a href="?page=notes_show&id=<?= $note['id'] ?>">
                    <?= htmlspecialchars($note['title']) ?>
                </a>
                - <a href="?page=notes_edit&id=<?= $note['id'] ?>">Sửa</a>
                - <a href="?page=notes_delete&id=<?= $note['id'] ?>" onclick="return confirm('Xóa ghi chú này?')">Xóa</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>