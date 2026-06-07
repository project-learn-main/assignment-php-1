<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./assets/css/output.css">

    <script>
        // Hàm showToast - dùng Tailwind CSS
        function showToast(message, type = 'success') {
            console.log('showToast called:', message, type);

            // Tìm container
            let toastContainer = document.getElementById('toastContainer');
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'toastContainer';
                toastContainer.className = 'fixed top-4 right-4 z-50 space-y-2';
                document.body.appendChild(toastContainer);
                console.log('Toast container created');
            }

            // T toast
            const toastId = 'toast-' + Date.now();
            const toast = document.createElement('div');
            toast.id = toastId;

            // Tailwind classes theo type
            const typeClasses = {
                success: 'bg-green-500 text-white',
                error: 'bg-red-500 text-white',
                info: 'bg-blue-500 text-white'
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

            // Animation - slide vào
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
                toast.classList.add('translate-x-0');
            }, 10);

            // Auto remove - slide ra
            setTimeout(() => {
                toast.classList.remove('translate-x-0');
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, 1500);

        }
    </script>

</head>

<body class="bg-dark min-h-screen">
    <!-- Main Dashboard Container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-secondary flex-shrink-0">
            <div class="h-full flex flex-col">
                <!-- Logo -->
                <div class="flex items-center justify-between p-6 border-b border-slate-700">
                    <!-- Logo bên trái -->
                    <div class="bg-primary rounded-lg flex items-center justify-center w-10 h-10">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h1 class="text-white text-xl font-bold">Manager Admin</h1>
                </div>

                <!-- Navigation -->
                <ul class="flex-1 px-3 py-2">
                    <li class="mb-1">
                        <a class="flex items-center px-3 py-2 text-white rounded-lg hover:bg-primary transition-colors <?php //echo $activeTab == 'dashboard' ? 'bg-primary' : ''; 
                                                                                                                        ?>" href="?tab=dashboard" data-tab="dashboard">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="flex items-center px-3 py-2 text-white rounded-lg hover:bg-primary transition-colors <?php //echo $activeTab == 'orders' ? 'bg-primary' : ''; 
                                                                                                                        ?>" href="?tab=order&page=1" data-tab="order">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"></path>
                            </svg>
                            Orders
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="flex items-center px-3 py-2 text-white rounded-lg hover:bg-primary transition-colors <?php //echo $activeTab == 'category' ? 'bg-primary' : ''; 
                                                                                                                        ?>" href="?tab=category&page=1" data-tab="category">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                            </svg>
                            Category
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="flex items-center px-3 py-2 text-white rounded-lg hover:bg-primary transition-colors <?php //echo $activeTab == 'product' ? 'bg-primary' : ''; 
                                                                                                                        ?>" href="?tab=product&page=1" data-tab="product">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                            Product
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="flex items-center px-3 py-2 text-white rounded-lg hover:bg-primary transition-colors <?php //echo $activeTab == 'user' ? 'bg-primary' : ''; 
                                                                                                                        ?>" href="?tab=user&page=1" data-tab="user">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                            Users
                        </a>
                    </li>

                </ul>

                <!-- User Info -->
                <div class="flex justify-center px-3 py-4 bg-slate-700 rounded-lg">
                    <a href="auth/logout.php" class="flex items-center text-red-400 hover:opacity-80">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </nav>