<?php
// View form đăng ký
require_once __DIR__ . '/../layout/header.php';
?>
<h2 class="auth-title">Đăng ký</h2>
<?php if (!empty($error)): ?>
	<p class="auth-message" style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form class="auth-form" method="post" action="?page=register">
	<label>Tên đăng nhập<br><input type="text" name="username"></label><br>
	<label>Mật khẩu<br><input type="password" name="password"></label><br>
	<button type="submit">Đăng ký</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
