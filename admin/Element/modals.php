
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


<!-- Add Customer Modal -->
<div id="addCustomerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Add New Customer</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('addCustomerModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/add_customer.php" enctype="multipart/form-data">
            <div class="p-4">
                <div class="mb-4">
                    <label for="customerName" class="block text-gray-300 font-medium mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="customerName" name="name" required>
                </div>
                <div class="grid grid-cols-2 gap-4 items-center">
                    <div class="mb-4">
                    <label for="dateOfBirth" class="block text-gray-300 font-medium mb-2">Date of Birth</label>
                    <input type="date" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="dateOfBirth" name="dateOfBirth" required>
                    </div>
                    <div class="mb-4">
                    <label for="gender" class="block text-gray-300 font-medium mb-2">Gender</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="customerPhone" class="block text-gray-300 font-medium mb-2">Phone Number</label>
                    <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="customerPhone" name="phone" required>
                </div>
                <div class="mb-4">
                    <label for="customerPhone" class="block text-gray-300 font-medium mb-2">Address</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="customerPhone" name="address" required>
                </div>
                <div class="mb-4">
                    <label for="customerImage" class="block text-gray-300 font-medium mb-2">Profile Image</label>
                    <input type="file" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="customerImage" name="image" required accept="image/*">
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('addCustomerModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Add Customer</button>
            </div>
        </form>
    </div>
</div>

<!-- Update Customer Modal -->
<div id="updateCustomerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Update Customer</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('updateCustomerModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/update_customer.php" enctype="multipart/form-data">
            <input type="hidden" id="updateCustomerId" name="id">
            <div class="p-4">
                <div class="mb-4">
                    <label for="updateCustomerName" class="block text-gray-300 font-medium mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateCustomerName" name="name" required>
                </div>

                <div class="mb-4">
                    <label for="updateCustomerPhone" class="block text-gray-300 font-medium mb-2">Phone Number</label>
                    <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateCustomerPhone" name="phone" required>
                </div>
                <div class="mb-4">
                    <label for="updateCustomerDateOfBirth" class="block text-gray-300 font-medium mb-2">Date Of Birth</label>
                    <input type="date" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateCustomerDateOfBirth" name="dateOfBirth" required>
                </div>
                <div class="mb-4">
                    <label for="updateCustomerGender" class="block text-gray-300 font-medium mb-2">Gender</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateCustomerGender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="updateCustomerAddress" class="block text-gray-300 font-medium mb-2">Address</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateCustomerAddress" name="address" required>
                </div>
                <div class="mb-4">
                    <label for="updateCustomerPersonalImage" class="block text-gray-300 font-medium mb-2">Personal Image</label>
                    <div class="space-y-3">
                        <!-- Current Image Display -->
                        <div class="flex items-center space-x-4">
                            <img id="currentCustomerImage" src="https://via.placeholder.com/50" alt="Current Image" class="w-16 h-16 rounded-full object-cover">
                            <div>
                                <p class="text-sm text-gray-400">Current Image</p>
                                <p id="currentCustomerImagePath" class="text-xs text-gray-500">No image</p>
                            </div>
                        </div>
                        <!-- New Image Upload -->
                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Upload New Image (Optional)</label>
                            <input type="file" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:text-gray-400"
                                id="updateCustomerPersonalImage" name="personal_image" accept="image/*">
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

<!-- Delete Customer Modal -->
<div id="deleteCustomerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Delete Customer</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('deleteCustomerModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/delete_customer.php">
            <input type="hidden" id="deleteCustomerId" name="id">
            <div class="p-4">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white text-center mb-2">Delete Customer</h3>
                <p class="text-gray-300 text-center mb-4">Are you sure you want to delete this customer? This action cannot be undone.</p>
                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-sm text-gray-400 mb-1">Customer Information:</p>
                    <p class="text-white font-semibold" id="deleteCustomerInfo"></p>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('deleteCustomerModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Delete Customer</button>
            </div>
        </form>
    </div>
</div>

<!-- View Customer Details Modal -->
<div id="viewCustomerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Customer Details</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('viewCustomerModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <!-- Customer Profile Image -->
            <div class="flex justify-center mb-6">
                <div class="relative">
                    <img id="viewCustomerImage" src="" alt="" class="w-24 h-24 rounded-full object-cover border-4 border-gray-700">
                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 rounded-full border-2 border-gray-800"></div>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="space-y-4">
                <div class="text-center">
                    <h3 id="viewCustomerName" class="text-xl font-semibold text-white mb-1"></h3>
                    <p id="viewCustomerId" class="text-sm text-gray-400"></p>
                </div>

                <div class="border-t border-gray-700 pt-4">
                    <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Contact Information</h6>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span id="viewCustomerPhone" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span id="viewCustomerAddress" class="text-white"></span>
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
                            <span id="viewCustomerDateOfBirth" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-gray-400 mr-2">Gender:</span>
                            <span id="viewCustomerGender" class="text-white"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
            <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('viewCustomerModal')">Close</button>
        </div>
    </div>
</div>

<!-- Add Student Modal -->
<div id="addStudentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Add New Student</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('addStudentModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/add_student.php" enctype="multipart/form-data">
            <div class="p-4">
                <div class="mb-4">
                    <label for="studentName" class="block text-gray-300 font-medium mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="studentName" name="name" required>
                </div>
                <div class="grid grid-cols-2 gap-4 items-center">
                    <div class="mb-4">
                        <label for="dateOfBirth" class="block text-gray-300 font-medium mb-2">Date of Birth</label>
                        <input type="date" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            id="dateOfBirth" name="dateOfBirth" required>
                    </div>
                    <div class="mb-4">
                        <label for="gender" class="block text-gray-300 font-medium mb-2">Gender</label>
                        <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="studentPhone" class="block text-gray-300 font-medium mb-2">Phone Number</label>
                    <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="studentPhone" name="phone" required>
                </div>
                <div class="mb-4">
                    <label for="studentEmail" class="block text-gray-300 font-medium mb-2">Email</label>
                    <input type="email" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="studentEmail" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="studentAddress" class="block text-gray-300 font-medium mb-2">Address</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="studentAddress" name="address" required>
                </div>
                <div class="mb-4">
                    <label for="studentImage" class="block text-gray-300 font-medium mb-2">Profile Image</label>
                    <input type="file" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="studentImage" name="image" required accept="image/*">
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('addStudentModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Add Student</button>
            </div>
        </form>
    </div>
</div>

<!-- Update Student Modal -->
<div id="updateStudentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 max-h-[50rem] overflow-y-auto text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Update Student</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('updateStudentModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/update_student.php" enctype="multipart/form-data">
            <input type="hidden" id="updateStudentId" name="id">
            <div class="p-4">
                <div class="mb-4">
                    <label for="updateStudentName" class="block text-gray-300 font-medium mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateStudentName" name="name" required>
                </div>
                <div class="mb-4">
                    <label for="updateStudentEmail" class="block text-gray-300 font-medium mb-2">Email Address</label>
                    <input type="email" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateStudentEmail" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="updateStudentIdNum" class="block text-gray-300 font-medium mb-2">Student ID</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateStudentIdNum" name="studentId" readonly>
                </div>
                <div class="mb-4">
                    <label for="updateStudentPhone" class="block text-gray-300 font-medium mb-2">Sô diên thoai</label>
                    <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateStudentPhone" name="phone" required>
                </div>
                <div class="mb-4">
                    <label for="updateStudentGender" class="block text-gray-300 font-medium mb-2">Giói tính</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="updateStudentGender" name="gender" required>
                        <option value="">Chon giói tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="updateStudentAddress" class="block text-gray-300 font-medium mb-2">Quê quán</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="updateStudentAddress" name="address" required>
                </div>
                <div class="mb-4">
                    <label for="updateStudentStatus" class="block text-gray-300 font-medium mb-2">Trang thái</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="updateStudentStatus" name="status" required>
                        <option value="">Chon trang thái</option>
                        <option value="Đang học">Đang học</option>
                        <option value="Bảo lưu">Bảo lưu</option>
                        <option value="Thôi học">Thôi học</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="updateStudentImage" class="block text-gray-300 font-medium mb-2">Hinh anh</label>
                    <div class="space-y-3">
                        <!-- Current Image Display -->
                        <div class="flex items-center space-x-4">
                            <img id="currentStudentImage" src="https://via.placeholder.com/50" alt="Current Image" class="w-16 h-16 rounded-full object-cover">
                            <div>
                                <p class="text-sm text-gray-400">Current Image</p>
                                <p id="currentStudentImagePath" class="text-xs text-gray-500">No image</p>
                            </div>
                        </div>
                        <!-- New Image Upload -->
                        <div>
                            <label class="block text-sm text-gray-400 mb-1">Upload New Image (Optional)</label>
                            <input type="file" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:text-gray-400"
                                id="updateStudentImage" name="image" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('updateStudentModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Update Student</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Student Modal -->
<div id="deleteStudentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Delete Student</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('deleteStudentModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/delete_student.php">
            <input type="hidden" id="deleteStudentId" name="id">
            <div class="p-4">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white text-center mb-2">Delete Student</h3>
                <p class="text-gray-300 text-center mb-4">Are you sure you want to delete this student? This action cannot be undone.</p>
                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-sm text-gray-400 mb-1">Student Information:</p>
                    <p class="text-white font-semibold" id="deleteStudentInfo"></p>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('deleteStudentModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Delete Student</button>
            </div>
        </form>
    </div>
</div>

<!-- View Student Details Modal -->
<div id="viewStudentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Student Details</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('viewStudentModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <!-- Student Profile Image -->
            <div class="flex justify-center mb-6">
                <div class="relative">
                    <img id="viewStudentImage" src="" alt="" class="w-24 h-24 rounded-full object-cover border-4 border-gray-700">
                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-blue-500 rounded-full border-2 border-gray-800"></div>
                </div>
            </div>

            <!-- Student Information -->
            <div class="space-y-4">
                <div class="text-center">
                    <h3 id="viewStudentName" class="text-xl font-semibold text-white mb-1"></h3>
                    <p id="viewStudentId" class="text-sm text-gray-400"></p>
                </div>

                <div class="border-t border-gray-700 pt-4">
                    <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Contact Information</h6>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span id="viewStudentEmail" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span id="viewStudentPhone" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span id="viewStudentAddress" class="text-white"></span>
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
                            <span id="viewStudentDateOfBirth" class="text-white"></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-gray-400 mr-2">Gender:</span>
                            <span id="viewStudentGender" class="text-white"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
            <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('viewStudentModal')">Close</button>
        </div>
    </div>
</div>