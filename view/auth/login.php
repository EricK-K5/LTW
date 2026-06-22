<?php
// View form đăng nhập
require_once __DIR__ . '/../layout/header.php';
?>
<h2 class="auth-title">Đăng nhập</h2>
<?php if (!empty($error)): ?>
	<p class="auth-message" style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form class="auth-form" method="post" action="?page=login">
	<label>Tên đăng nhập<br><input type="text" name="username"></label><br>
	<label>Mật khẩu<br><input type="password" name="password"></label><br>
	<button type="submit">Đăng nhập</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
