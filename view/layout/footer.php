<?php
// Footer chung, đóng các thẻ HTML
?>
</main>
<footer class="app-footer">
	<div class="footer-shell">
		<div class="footer-grid">
			<div class="footer-panel">
				<h3 class="footer-heading">Simple Notes App</h3>
				<p class="footer-copy">Một không gian nhỏ gọn để ghi chú, theo dõi ý tưởng và quay lại công việc dang dở nhanh hơn.</p>
			</div>
			<div class="footer-panel">
				<h4 class="footer-heading">Điểm mạnh</h4>
				<div class="footer-badges">
					<span class="footer-badge">Nhanh</span>
					<span class="footer-badge">Gọn</span>
					<span class="footer-badge">Dễ dùng</span>
				</div>
				<p class="footer-copy">Dữ liệu được quản lý trực tiếp trên hệ thống hiện tại, phù hợp cho sử dụng nội bộ và thử nghiệm.</p>
			</div>
		</div>
		<div class="footer-bottom">
			<p class="footer-copy">&copy; <?= date('Y') ?> Simple Notes App</p>
			
		</div>
	</div>
</footer>
	<script src="<?= htmlspecialchars((BASE_URL ?: '') . '/public/js/app.js') ?>" defer></script>
</body>
</html>
