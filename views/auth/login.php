<?php
// View form đăng nhập
require_once __DIR__ . '/../layout/header.php';
?>
<h2 class="auth-title">Đăng nhập</h2>
<?php if (!empty($error)): ?>
	<p class="auth-message" style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form class="auth-form" method="post" action="?page=login">
	<label>Tên đăng nhập<br>
	<input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"></label><br>
	<label> Mật khẩu<br>
    	<input type="password" id="password" name="password">
	</label><br>

	<label>
		<input type="checkbox" onclick="togglePassword()">
		Hiện mật khẩu
	</label><br>

	<script>
	function togglePassword() {
		let pw = document.getElementById("password");
		pw.type = pw.type === "password" ? "text" : "password";
	}
	</script>
		<button type="submit">Đăng nhập</button>
	</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
