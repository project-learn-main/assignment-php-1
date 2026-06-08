<footer class="text-white py-12" style="background-color: var(--primary)">
  <div class="max-w-6xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
      <div>
        <h4 class="font-bold mb-4">ShopHub</h4>
        <p class="text-sm opacity-80">
          Mua sắm trực tuyến dễ dàng, an toàn và tiết kiệm
        </p>
      </div>
      <div>
        <h4 class="font-bold mb-4">Về Chúng Tôi</h4>
        <ul class="text-sm space-y-2 opacity-80">
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="#">Liên hệ</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold mb-4">Hỗ Trợ</h4>
        <ul class="text-sm space-y-2 opacity-80">
          <li><a href="#">Trả về</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Chính sách</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold mb-4">Kết Nối</h4>
        <ul class="text-sm space-y-2 opacity-80">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Twitter</a></li>
        </ul>
      </div>
    </div>
    <div
      class="border-t border-white border-opacity-20 pt-8 text-center text-sm opacity-80">
      <p>&copy; 2024 ShopHub. All rights reserved.</p>
    </div>
  </div>
</footer>
<script src="assets/js/main.js"></script>

<!-- toast -->
<?php if (isset($_COOKIE['register_success'])): ?>
  <script>
    showToast('Đăng ký thành công!', 'success');
    document.cookie = 'register_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
  </script>
<?php endif; ?>

<?php if (isset($_COOKIE['login_success'])): ?>
  <script>
    showToast('Đăng nhập thành công!', 'success');
    document.cookie = 'login_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
  </script>
<?php endif; ?>

<?php if (isset($_COOKIE['login_error'])): ?>
  <script>
    showToast('Sai tên tài khoản hoặc mật khẩu', 'error');
    document.cookie = 'login_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
  </script>
<?php endif; ?>

</body>

</html>