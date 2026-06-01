       
 <script src="assets/js/dashboard.js"></script>
 <?php if(isset($_COOKIE['login_success'])): ?>
 <script>
    showToast('Chào <?php echo $_COOKIE['name']; ?>!', 'success');
    document.cookie = 'login_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>

  <?php if(isset($_COOKIE['order_update_success'])): ?>
 <script>
    showToast('Cập nhật đơn hàng thành công!', 'success');
    // Xóa cookie ngay lập tức
    document.cookie = 'order_update_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>

  <?php if(isset($_COOKIE['order_delete_success'])): ?>
 <script>
    showToast('Xóa đơn hàng thành công!', 'success');
    // Xóa cookie ngay lập tức
    document.cookie = 'order_delete_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>
 
 <?php if(isset($_COOKIE['customer_add_success'])): ?>
 <script>
    showToast('Thêm khách hàng thành công!', 'success');
    // Xóa cookie ngay lập tức
    document.cookie = 'customer_add_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>
 
 <?php if(isset($_COOKIE['customer_delete_success'])): ?>
 <script>
    showToast('Xóa khách hàng thành công!', 'success');
    // Xóa cookie ngay lập tức
    document.cookie = 'customer_delete_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>
 
 <?php if(isset($_COOKIE['customer_update_success'])): ?>
 <script>
    showToast('Cập nhật khách hàng thành công!', 'success');
    // Xóa cookie ngay lập tức
    document.cookie = 'customer_update_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>
 
 <?php if(isset($_COOKIE['customer_add_error'])): ?>
 <script>
    showToast('Thêm khách hàng không thành công!', 'error');
    // Xóa cookie ngay lập tức
    document.cookie = 'customer_add_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>
 
 <?php if(isset($_COOKIE['student_add_success'])): ?>
 <script>
    showToast('Thêm sinh viên thành công!', 'success');
    // Xóa cookie ngay lập tức
    document.cookie = 'student_add_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>
 
 <?php if(isset($_COOKIE['student_update_success'])): ?>
 <script>
    showToast('Cập nhật sinh viên thành công!', 'success');
    // Xóa cookie ngay lập tức
    document.cookie = 'student_update_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>
 
 <?php if(isset($_COOKIE['student_delete_success'])): ?>
 <script>
    showToast('Xóa sinh viên thành công!', 'success');
    // Xóa cookie ngay lập tức
    document.cookie = 'student_delete_success=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>
 
 <?php if(isset($_COOKIE['student_add_error'])): ?>
 <script>
    showToast('Thêm sinh viên không thành công!', 'error');
    // Xóa cookie ngay lập tức
    document.cookie = 'student_add_error=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
 </script>
 <?php endif; ?>
</body>
</html>
