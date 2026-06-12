 <section class="py-20" style="background: linear-gradient(135deg, var(--light-bg) 0%, #f5f0eb 100%);">
        <div class="max-w-md mx-auto px-4">
            <div class="bg-white rounded-lg p-8 border" style="border-color: var(--border-light);">
                <h1 class="text-3xl font-bold mb-2" style="color: var(--primary);">Quên mật khẩu</h1>
                <!-- <p class="text-sm mb-8 text-gray-600">Mật khẩu ban đầu của bạn: <span style="color: red;"><?= htmlspecialchars($user['password']) ?></span></p> -->

                <form id="loginForm" action="?page=changepassword" method="POST">
                    <!-- Password -->
                    <div class="mb-8">
                        <label for="password" class="block text-sm font-bold mb-2" style="color: var(--primary);">
                            Mật Khẩu mới
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
                    </div>

                     <div class="mb-8">
                        <label for="password" class="block text-sm font-bold mb-2" style="color: var(--primary);">
                            Nhập Lại Mật Khẩu
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

                    <!-- Remember & Forgot -->
                    <div class="flex justify-end items-center mb-8">
                        <a href="?page=login" class="text-sm no-underline" style="color: var(--accent);">Quay lại đăng nhập</a>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="w-full py-3 text-lg text-white rounded transition-all duration-300 mb-4" style="background-color: var(--primary);">
                        Gửi yêu cầu
                    </button>
                </form>

                <!-- Signup Link -->
                <p class="text-center text-sm text-gray-600">
                    Chưa có tài khoản? 
                    <a href="?page=register" class="no-underline" style="color: var(--accent);">Đăng ký ngay</a>
                </p>
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