<?php if (isset($_COOKIE['login_success'])): ?>
   <script>
      showToast('Login Successfully !', 'success');
      document.cookie = 'login_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif; ?>

<?php if (isset($_COOKIE['login_error'])): ?>
   <script>
      showToast('Email hoặc mật khẩu không đúng !', 'error');
      document.cookie = 'login_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif; ?>

<?php if (isset($_COOKIE['category_add_success'])): ?>
   <script>
      showToast('Add Category Successfully !', 'success');
      document.cookie = 'category_add_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif; ?>

<?php if (isset($_COOKIE['category_update_success'])): ?>
   <script>
      showToast('Update Category Successfully !', 'success');
      document.cookie = 'category_update_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['category_update_error'])): ?>
   <script>
      showToast('Update category errro', 'error');
      document.cookie = 'category_update_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['category_delete_success'])): ?>
   <script>
      showToast('Delete Category Successfully !', 'success');
      document.cookie = 'category_delete_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['category_delete_error'])): ?>
   <script>
      showToast('Không thể xóa danh mục vì vẫn còn sản phẩm thuộc danh mục này.', 'error');
      document.cookie = 'category_delete_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['category_add_error'])): ?>
   <script>
      showToast('Add Category error', 'error');
      document.cookie = 'category_add_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['user_add_success'])): ?>
   <script>
      showToast('Add Category Successfully !', 'success');
      document.cookie = 'user_add_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['user_add_error'])): ?>
   <script>
      showToast('Add Category error', 'error');
      document.cookie = 'user_add_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['product_add_success'])): ?>
   <script>
      showToast('Add Product Successfully !', 'success');
      document.cookie = 'product_add_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['product_add_error'])): ?>
   <script>
      showToast('Add Product error', 'error');
      document.cookie = 'product_add_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['product_delete_success'])): ?>
   <script>
      showToast('Delete Product Successfully !', 'success');
      document.cookie = 'product_delete_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['product_delete_error'])): ?>
   <script>
      showToast('Delete Product error', 'error');
      document.cookie = 'product_delete_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['order_update_success'])): ?>
   <script>
      showToast('Update Status Order Successfully !', 'success');
      document.cookie = 'order_update_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>

<?php if (isset($_COOKIE['order_update_error'])): ?>
   <script>
      showToast('Update Status Order error', 'error');
      document.cookie = 'order_update_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
   </script>
<?php endif;
?>
<script src="assets/js/dashboard.js"></script>

</body>

</html>