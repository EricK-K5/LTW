```php
<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Chỉnh sửa ghi chú</h2>

<form action="?page=notes_update" method="POST">

    <input type="hidden" name="id" value="<?= $note['id'] ?>">

    <div class="form-group">
        <label>Tiêu đề</label><br>
        <input
            type="text"
            name="title"
            value="<?= htmlspecialchars($note['title']) ?>"
            required
        >
    </div>

    <br>

    <div class="form-group">
        <label>Nội dung</label><br>
        <textarea
            name="content"
            rows="8"
            cols="60"
            required><?= htmlspecialchars($note['content']) ?></textarea>
    </div>

    <br>

    <div class="form-group">
        <label>Danh mục</label><br>

        <select name="category_id">

            <?php foreach ($categories as $category): ?>

                <option
                    value="<?= $category['id'] ?>"
                    <?= ($category['id'] == $note['category_id']) ? 'selected' : '' ?>>

                    <?= htmlspecialchars($category['name']) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <br>

    <button type="submit">
        Cập nhật
    </button>

    <a href="?page=notes_list">
        Hủy
    </a>

</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>
```
