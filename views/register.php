 <section class="py-20" style="background: linear-gradient(135deg, var(--light-bg) 0%, #f5f0eb 100%);">
        <div class="max-w-md mx-auto px-4">
            <div class="bg-white rounded-lg p-8 border" style="border-color: var(--border-light);">
                <h1 class="text-3xl font-bold mb-2" style="color: var(--primary);">Đăng Ký</h1>
                <p class="text-sm mb-8 text-gray-600">Tạo tài khoản ShopHub mới của bạn</p>

                <form id="registerForm" action="index.php?page=register&action=submit" method="POST">
                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-bold mb-2" style="color: var(--primary);">
                            Họ Và Tên
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" 
                            placeholder="Nguyễn Văn A"
                            style="border-color: var(--border-light);"
                            name="name"
                            required
                        >
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-bold mb-2" style="color: var(--primary);">
                            Email
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" 
                            placeholder="your@email.com"
                            style="border-color: var(--border-light);"
                            name="email"
                            required
                        >
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-bold mb-2" style="color: var(--primary);">
                            Mật Khẩu
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" 
                            placeholder="••••••••"
                            style="border-color: var(--border-light);"
                            name="password"
                            required
                        >
                        <p class="text-xs mt-2 text-gray-500">Mật khẩu phải có ít nhất 6 ký tự</p>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-8">
                        <label for="confirmPassword" class="block text-sm font-bold mb-2" style="color: var(--primary);">
                            Xác Nhận Mật Khẩu
                        </label>
                        <input 
                            type="password" 
                            id="confirmPassword" 
                            class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" 
                            placeholder="••••••••"
                            style="border-color: var(--border-light);"
                            name="confirmPassword"
                            required
                        >
                        <p class="text-xs mt-2 text-red-600" id="error"></p>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="w-full py-3 text-lg text-white rounded transition-all duration-300 mb-4" style="background-color: var(--primary);">
                        Tạo Tài Khoản
                    </button>
                </form>
                <div>

                    <!-- Login Link -->
                    <p class="text-center text-sm text-gray-600">
                        Đã có tài khoản? 
                        <a href="?page=login" class="no-underline" style="color: var(--accent);">Đăng nhập ngay</a>
                    </p>

                    <!-- forgot password Link -->
                    <p class="text-center text-sm text-gray-600">
                        Quên mật khẩu? 
                        <a href="?page=forgotpassword" class="no-underline" style="color: var(--accent);">Khôi phục ngay</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <script>
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");
    const error = document.getElementById("error");

    confirmPassword.addEventListener("input", function () {
    if (password.value !== confirmPassword.value) {
        confirmPassword.setCustomValidity("Mật khẩu xác nhận không khớp");
        error.textContent = "Mật khẩu xác nhận không khớp!";
    } else {
        confirmPassword.setCustomValidity("");
        error.textContent = "";
    }
});
</script>