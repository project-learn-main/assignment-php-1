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
          class="border-t border-white border-opacity-20 pt-8 text-center text-sm opacity-80"
        >
          <p>&copy; 2024 ShopHub. All rights reserved.</p>
        </div>
      </div>
    </footer>
    <!-- <script src="assets/js/main.js"></script> -->
     <script>
      function showToast(message, type = "success") {
          let toastContainer = document.getElementById("toastContainer");
          if (!toastContainer) {
            toastContainer = document.createElement("div");
            toastContainer.id = "toastContainer";
            toastContainer.className = "fixed top-20 right-4 z-50 space-y-2";
            document.body.appendChild(toastContainer);
          }

          const toast = document.createElement("div");

          const typeClasses = {
            success: "bg-green-500 text-white",
            error: "bg-red-500 text-white",
            info: "bg-blue-500 text-white",
          };

          toast.className = `${typeClasses[type]} px-4 py-3 rounded-lg shadow-lg flex items-center justify-between min-w-[250px] max-w-[350px] transform translate-x-full transition-all duration-300 ease-out`;

          toast.innerHTML = `
                        <span class="flex-1">${message}</span>
                        <button type="button" class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.remove()">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    `;

          toastContainer.appendChild(toast);

          setTimeout(() => {
            toast.classList.remove("translate-x-full");
            toast.classList.add("translate-x-0");
          }, 10);

          setTimeout(() => {
            toast.classList.remove("translate-x-0");
            toast.classList.add("translate-x-full");
            setTimeout(() => toast.remove(), 300);
          }, 3000);
}
</script>

<?php if(isset($_COOKIE['register_success'])): ?>
  <script>
    showToast('Đăng ký thành công!', 'success');
    document.cookie = 'register_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
  </script>
<?php endif; ?>
  </body>
  
</html>