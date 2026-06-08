       <script src="assets/js/dashboard.js"></script>

       <?php if (isset($_COOKIE['category_add_success'])): ?>
          <script>
             showToast('Add Category Successfully !', 'success');
             document.cookie = 'category_add_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
          </script>
       <?php endif; ?>

       <?php if (isset($_COOKIE['category_add_error'])): ?>
          <script>
             showToast('Add Category error', 'error');
             document.cookie = 'category_add_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
          </script>
       <?php endif;
         ?>
       </body>

       </html>