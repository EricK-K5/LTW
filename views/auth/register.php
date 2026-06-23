<?php
// View form đăng ký
require_once __DIR__ . '/../layout/header.php';
?>
<h2 class="auth-title">Đăng ký</h2>
<?php if (!empty($error)): ?>
	<p class="auth-message" style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form class="auth-form" method="post" action="?page=register">
	<label>Tên đăng nhập<br><input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"></label><br>
	<label>Mật khẩu<br><input type="password" id="password" name="password"></label><br>
	
	<!-- Xac nhan mat khau -->
	<label>Xác nhận mật khẩu<br>
    	<input type="password" id="confirm_password" name="confirm_password">
	</label><br>

	<label>
    <input type="checkbox" onclick="togglePassword()">Hiện mật khẩu</label><br>

	<script>
	function togglePassword() {
		let pw = document.getElementById("password");
		let cpw = document.getElementById("confirm_password")
		pw.type = pw.type === "password" ? "text" : "password";
		cpw.type = cpw.type === "password" ? "text" : "password";
	}
	</script>
	<button type="submit">Đăng ký</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
