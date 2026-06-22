 <section class="py-20" style="background: linear-gradient(135deg, var(--light-bg) 0%, #f5f0eb 100%);">
        <div class="max-w-md mx-auto px-4">
            <div class="bg-white rounded-lg p-8 border" style="border-color: var(--border-light);">
                <h1 class="text-3xl font-bold mb-2" style="color: var(--primary);">Đăng Nhập</h1>
                <p class="text-sm mb-8 text-gray-600">Đăng nhập vào tài khoản của bạn</p>

                <form id="loginForm" action="index.php?page=login&action=submit" method="POST">
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
                    <div class="mb-8">
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
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex justify-end items-center mb-8">
                        <a href="?page=forgotpassword" class="text-sm no-underline" style="color: var(--accent);">Quên mật khẩu?</a>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="w-full py-3 text-lg text-white rounded transition-all duration-300 mb-4" style="background-color: var(--primary);">
                        Đăng Nhập
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