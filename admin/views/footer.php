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

</body>

</html>