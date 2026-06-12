<!-- View Order Details Modal -->
<div id="viewOrderDetailsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Order Details</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('viewOrderDetailsModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <!-- Order Information -->
            <div class="mb-6">
                <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Order Information</h6>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-400">Order ID</p>
                        <p class="text-white font-semibold" id="viewOrderId"></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-400">Customer</p>
                        <p class="text-white font-semibold" id="viewOrderCustomer"></p>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="mb-6">
                <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Products</h6>
                <div class="space-y-3" id="viewOrderItems">
                    <!-- Items will be populated by JavaScript -->
                </div>
            </div>

            <!-- Order Total
            <div class="border-t border-gray-700 pt-4">
                <div class="flex justify-between items-center">
                    <span class="text-lg font-semibold text-white">Total:</span>
                    <span class="text-xl font-bold text-primary" id="viewOrderTotal"></span>
                </div>
            </div> -->
        </div>

    </div>
</div>



<!-- Add Product Modal -->
<div id="addProductModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Add New Product</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('addProductModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <?php
        ?>
        <form method="POST" action="actions/add_product.php" enctype="multipart/form-data">
            <div class="p-4">
                <div class="mb-4">
                    <label for="productName" class="block text-gray-300 font-medium mb-2">Product Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="productName" name="name" required>
                </div>
                <div class="mb-4">
                    <label for="categoryId" class="block text-gray-300 font-medium mb-2">Category</label>
                    <select
                        id="categoryId"
                        name="categoryId"
                        required
                        class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">-- Chọn danh mục --</option>

                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>">
                                <?= htmlspecialchars($category['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="productPrice" class="block text-gray-300 font-medium mb-2">Price</label>
                        <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            id="productPrice" name="price" required>
                    </div>
                    <div class="mb-4">
                        <label for="productStock" class="block text-gray-300 font-medium mb-2">Stock</label>
                        <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            id="productStock" name="stock" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="productDescription" class="block text-gray-300 font-medium mb-2">Description</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="productDescription" name="description">
                </div>
                <div class="mb-4">
                    <label for="productImage" class="block text-gray-300 font-medium mb-2">Product Image</label>
                    <input type="file" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="productImage" name="image" required accept="image/*">
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('addProductModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Add Product</button>
            </div>
        </form>
    </div>
</div>

<!-- Update Product Modal -->
<div id="updateProductModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Update Product</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('updateProductModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/update_customer.php" enctype="multipart/form-data">
            <input type="hidden" id="updateProductId" name="id">
            <div class="p-4">
                <div class="mb-4">
                    <label for="updateProductName" class="block text-gray-300 font-medium mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateProductName" name="name" required>
                </div>

                <div class="mb-4">
                    <label for="updateProductPhone" class="block text-gray-300 font-medium mb-2">Phone Number</label>
                    <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateProductPhone" name="phone" required>
                </div>
                <div class="mb-4">
                    <label for="updateProductDateOfBirth" class="block text-gray-300 font-medium mb-2">Date Of Birth</label>
                    <input type="date" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateProductDateOfBirth" name="dateOfBirth" required>
                </div>
                <div class="mb-4">
                    <label for="updateProductGender" class="block text-gray-300 font-medium mb-2">Gender</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateProductGender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="updateProductAddress" class="block text-gray-300 font-medium mb-2">Address</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateProductAddress" name="address" required>
                </div>
                <div class="mb-4">
                    <label for="updateProductPersonalImage" class="block text-gray-300 font-medium mb-2">Personal Image</label>
                    <div class="space-y-3">
                        <!-- Current Image Display -->
                        <div class="flex items-center space-x-4">
                            <img id="currentProductImage" src="https://via.placeholder.com/50" alt="Current Image" class="w-16 h-16 rounded-full object-cover">
                            <div>
                                <p class="text-sm text-gray-400">Current Image</p>
                                <p id="currentProductImagePath" class="text-xs text-gray-500">No image</p>
                            </div>
                        </div>
                        <!-- New Image Upload -->
                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Upload New Image (Optional)</label>
                            <input type="file" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:text-gray-400"
                                id="updateProductPersonalImage" name="personal_image" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('updateProductModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Update Product</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Product Modal -->
<div id="deleteProductModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Delete Product</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('deleteProductModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/delete_product.php">
            <input type="hidden" id="deleteProductId" name="id">
            <div class="p-4">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white text-center mb-2">Delete Product</h3>
                <p class="text-gray-300 text-center mb-4">Are you sure you want to delete this customer? This action cannot be undone.</p>
                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-sm text-gray-400 mb-1">Product Information:</p>
                    <p class="text-white font-semibold" id="deleteProductInfo"></p>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('deleteCustomerModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Delete Customer</button>
            </div>
        </form>
    </div>
</div>

<!-- View Product Details Modal -->
<div id="viewProductModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Product Details</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('viewProductModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <!-- Product Image -->
            <div class="flex justify-center mb-6">
                <div class="relative">
                    <img id="viewProductImage" src="" alt="" class="w-24 h-24 rounded-full object-cover border-4 border-gray-700">
                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 rounded-full border-2 border-gray-800"></div>
                </div>
            </div>

            <!-- Product Information -->
            <div class="space-y-4">
                <div class="text-center">
                    <h3 id="viewProductName" class="text-xl font-semibold text-white mb-1"></h3>
                    <p id="viewProductId" class="text-sm text-gray-400"></p>
                </div>

                <div class="border-t border-gray-700 pt-4">
                    <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Contact Information</h6>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span id="viewProductPhone" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span id="viewProductAddress" class="text-white"></span>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-700 pt-4">
                    <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Personal Information</h6>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-400 mr-2">Date of Birth:</span>
                            <span id="viewProductDateOfBirth" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-gray-400 mr-2">Gender:</span>
                            <span id="viewProductGender" class="text-white"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
            <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('viewProductModal')">Close</button>
        </div>
    </div>
</div>

<!-- Update User Modal -->
<div id="updateUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Update User</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('updateUserModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/update_customer.php" enctype="multipart/form-data">
            <input type="hidden" id="updateUserId" name="id">
            <div class="p-4">
                <div class="mb-4">
                    <label for="updateUserName" class="block text-gray-300 font-medium mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateUserName" name="name" required>
                </div>

                <div class="mb-4">
                    <label for="updateUserPhone" class="block text-gray-300 font-medium mb-2">Phone Number</label>
                    <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateUserPhone" name="phone" required>
                </div>
                <div class="mb-4">
                    <label for="updateUserDateOfBirth" class="block text-gray-300 font-medium mb-2">Date Of Birth</label>
                    <input type="date" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateUserDateOfBirth" name="dateOfBirth" required>
                </div>
                <div class="mb-4">
                    <label for="updateUserGender" class="block text-gray-300 font-medium mb-2">Gender</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateUserGender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="updateUserAddress" class="block text-gray-300 font-medium mb-2">Address</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateUserAddress" name="address" required>
                </div>
                <div class="mb-4">
                    <label for="updateUserPersonalImage" class="block text-gray-300 font-medium mb-2">Personal Image</label>
                    <div class="space-y-3">
                        <!-- Current Image Display -->
                        <div class="flex items-center space-x-4">
                            <img id="currentUserImage" src="https://via.placeholder.com/50" alt="Current Image" class="w-16 h-16 rounded-full object-cover">
                            <div>
                                <p class="text-sm text-gray-400">Current Image</p>
                                <p id="currentUserImagePath" class="text-xs text-gray-500">No image</p>
                            </div>
                        </div>
                        <!-- New Image Upload -->
                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Upload New Image (Optional)</label>
                            <input type="file" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:text-gray-400"
                                id="updateUserPersonalImage" name="personal_image" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('updateCustomerModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Update Customer</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete User Modal -->
<div id="deleteUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Delete User</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('deleteUserModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/delete_customer.php">
            <input type="hidden" id="deleteUserId" name="id">
            <div class="p-4">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white text-center mb-2">Delete User</h3>
                <p class="text-gray-300 text-center mb-4">Are you sure you want to delete this customer? This action cannot be undone.</p>
                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-sm text-gray-400 mb-1">User Information:</p>
                    <p class="text-white font-semibold" id="deleteUserInfo"></p>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('deleteUserModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Delete User</button>
            </div>
        </form>
    </div>
</div>

<!-- View User Details Modal -->
<div id="viewUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">User Details</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('viewUserModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <!-- User Image -->
            <div class="flex justify-center mb-6">
                <div class="relative">
                    <img id="viewUserImage" src="" alt="" class="w-24 h-24 rounded-full object-cover border-4 border-gray-700">
                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 rounded-full border-2 border-gray-800"></div>
                </div>
            </div>

            <!-- User Information -->
            <div class="space-y-4">
                <div class="text-center">
                    <h3 id="viewUserName" class="text-xl font-semibold text-white mb-1"></h3>
                    <p id="viewUserId" class="text-sm text-gray-400"></p>
                </div>

                <div class="border-t border-gray-700 pt-4">
                    <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Contact Information</h6>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span id="viewUserPhone" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span id="viewUserAddress" class="text-white"></span>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-700 pt-4">
                    <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Personal Information</h6>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-400 mr-2">Date of Birth:</span>
                            <span id="viewUserDateOfBirth" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-gray-400 mr-2">Gender:</span>
                            <span id="viewUserGender" class="text-white"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
            <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('viewProductModal')">Close</button>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Add New Category</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('addCategoryModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/add_category.php" method="post">
            <div class="p-4">
                <div class="mb-4">
                    <label for="CategoryName" class="block text-gray-300 font-medium mb-2">Category Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="CategoryName" name="name" required>
                </div>

                <div class="mb-4">
                    <label for="CategoryDescription" class="block text-gray-300 font-medium mb-2">Description</label>
                    <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="CategoryDescription" name="description">
                </div>

            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('addCategoryModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Add Category</button>
            </div>
        </form>
    </div>
</div>

<!-- Update Category Modal -->
<div id="updateCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 max-h-[50rem] overflow-y-auto text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Update Category</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('updateCategoryModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/update_student.php" enctype="multipart/form-data">
            <input type="hidden" id="updateCategoryId" name="id">
            <div class="p-4">
                <div class="mb-4">
                    <label for="updateCategoryName" class="block text-gray-300 font-medium mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateCategoryName" name="name" required>
                </div>
                <div class="mb-4">
                    <label for="updateCategoryEmail" class="block text-gray-300 font-medium mb-2">Email Address</label>
                    <input type="email" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateCategoryEmail" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="updateCategoryIdNum" class="block text-gray-300 font-medium mb-2">Category ID</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateCategoryIdNum" name="studentId" readonly>
                </div>
                <div class="mb-4">
                    <label for="updateCategoryPhone" class="block text-gray-300 font-medium mb-2">Sô diên thoai</label>
                    <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateCategoryPhone" name="phone" required>
                </div>
                <div class="mb-4">
                    <label for="updateCategoryGender" class="block text-gray-300 font-medium mb-2">Giói tính</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="updateCategoryGender" name="gender" required>
                        <option value="">Chon giói tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="updateCategoryAddress" class="block text-gray-300 font-medium mb-2">Quê quán</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateCategoryAddress" name="address" required>
                </div>
                <div class="mb-4">
                    <label for="updateCategoryStatus" class="block text-gray-300 font-medium mb-2">Trang thái</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="updateCategoryStatus" name="status" required>
                        <option value="">Chon trang thái</option>
                        <option value="Đang học">Đang học</option>
                        <option value="Bảo lưu">Bảo lưu</option>
                        <option value="Thôi học">Thôi học</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="updateCategoryImage" class="block text-gray-300 font-medium mb-2">Hinh anh</label>
                    <div class="space-y-3">
                        <!-- Current Image Display -->
                        <div class="flex items-center space-x-4">
                            <img id="currentCategoryImage" src="https://via.placeholder.com/50" alt="Current Image" class="w-16 h-16 rounded-full object-cover">
                            <div>
                                <p class="text-sm text-gray-400">Current Image</p>
                                <p id="currentCategoryImagePath" class="text-xs text-gray-500">No image</p>
                            </div>
                        </div>
                        <!-- New Image Upload -->
                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Upload New Image (Optional)</label>
                            <input type="file" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:text-gray-400"
                                id="updateCategoryImage" name="image" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('updateCategoryModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Update Category</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Category Modal -->
<div id="deleteCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Delete Category</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('deleteCategoryModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/delete_category.php">
            <input type="hidden" id="deleteCategoryId" name="id">
            <div class="p-4">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white text-center mb-2">Delete Category</h3>
                <p class="text-gray-300 text-center mb-4">Are you sure you want to delete this student? This action cannot be undone.</p>
                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-sm text-gray-400 mb-1">Category Information:</p>
                    <p class="text-white font-semibold" id="deleteCategoryInfo"></p>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('deleteCategoryModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Delete Category</button>
            </div>
        </form>
    </div>
</div>

<!-- View Category Details Modal -->
<div id="viewCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Category Details</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('viewCategoryModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <!-- Category Profile Image -->
            <div class="flex justify-center mb-6">
                <div class="relative">
                    <img id="viewCategoryImage" src="" alt="" class="w-24 h-24 rounded-full object-cover border-4 border-gray-700">
                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-blue-500 rounded-full border-2 border-gray-800"></div>
                </div>
            </div>

            <!-- Category Information -->
            <div class="space-y-4">
                <div class="text-center">
                    <h3 id="viewCategoryName" class="text-xl font-semibold text-white mb-1"></h3>
                    <p id="viewCategoryId" class="text-sm text-gray-400"></p>
                </div>

                <div class="border-t border-gray-700 pt-4">
                    <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Contact Information</h6>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span id="viewCategoryEmail" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span id="viewCategoryPhone" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span id="viewCategoryAddress" class="text-white"></span>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-700 pt-4">
                    <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Personal Information</h6>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-400 mr-2">Date of Birth:</span>
                            <span id="viewCategoryDateOfBirth" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-gray-400 mr-2">Gender:</span>
                            <span id="viewCategoryGender" class="text-white"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
            <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('viewCategoryModal')">Close</button>
        </div>
    </div>
</div>