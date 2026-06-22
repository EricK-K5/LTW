```php
<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Chi tiết ghi chú</h2>

<div class="note-detail">

    <p>
        <strong>Tiêu đề:</strong><br>
        <?= htmlspecialchars($note['title']) ?>
    </p>

    <hr>

    <p>
        <strong>Nội dung:</strong><br>
        <?= nl2br(htmlspecialchars($note['content'])) ?>
    </p>

    <hr>

    <?php if (!empty($note['category_name'])): ?>
        <p>
            <strong>Danh mục:</strong>
            <?= htmlspecialchars($note['category_name']) ?>
        </p>
    <?php endif; ?>

    <?php if (!empty($note['created_at'])): ?>
        <p>
            <strong>Ngày tạo:</strong>
            <?= htmlspecialchars($note['created_at']) ?>
        </p>
    <?php endif; ?>

</div>

<br>

<a href="?page=notes_edit&id=<?= $note['id'] ?>">
    Chỉnh sửa
</a>

|

<a href="?page=notes_list">
    Quay lại danh sách
</a>

<?php include __DIR__ . '/../layout/footer.php'; ?>
```
