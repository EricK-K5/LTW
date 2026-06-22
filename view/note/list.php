```php
<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Danh sách ghi chú</h2>

<p>
    <a href="?page=notes_create">+ Tạo ghi chú mới</a>
</p>

<?php if (empty($notes)): ?>

    <p>Chưa có ghi chú nào.</p>

<?php else: ?>

<table border="1" cellpadding="8" cellspacing="0">

    <tr>
        <th>ID</th>
        <th>Tiêu đề</th>
        <th>Danh mục</th>
        <th>Ngày tạo</th>
        <th>Thao tác</th>
    </tr>

    <?php foreach ($notes as $note): ?>

        <tr>

            <td><?= $note['id'] ?></td>

            <td><?= htmlspecialchars($note['title']) ?></td>

            <td>
                <?= htmlspecialchars($note['category_name'] ?? 'Không có') ?>
            </td>

            <td>
                <?= htmlspecialchars($note['created_at']) ?>
            </td>

            <td>

                <a href="?page=notes_show&id=<?= $note['id'] ?>">
                    Xem
                </a>

                |

                <a href="?page=notes_edit&id=<?= $note['id'] ?>">
                    Sửa
                </a>

                |

                <a href="?page=notes_delete&id=<?= $note['id'] ?>"
                   onclick="return confirm('Bạn có chắc muốn xóa ghi chú này?');">
                    Xóa
                </a>

            </td>

        </tr>

    <?php endforeach; ?>

</table>

<?php endif; ?>

<?php include __DIR__ . '/../layout/footer.php'; ?>
```
