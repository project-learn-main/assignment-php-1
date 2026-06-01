<?php
session_start();
$dataAdmin = require '../data/admis.php';
$error = "";
if (!isset($_SESSION['danhsachAdmin'])) {
    $_SESSION['danhsachAdmin'] = $dataAdmin;
}
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    foreach ($_SESSION['danhsachAdmin'] as $index => $admin) {
        if ($admin[0] == $email && $admin[1] == $password) {
            setcookie('email', $email, time() + 3600, "/");
            setcookie('name', $admin[2], time() + 3600, "/");
            setcookie('login_success', 'true', time() + 10, "/");
            header('Location: ../index.php');
            break;
        }
    }
    $error = "Sai email hoặc mật khẩu";
    setcookie('login_error', 'true', time() + 10, "/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1f3b63',
                        secondary: '#0b1a33',
                        dark: '#1a1a1a',
                        light: '#f8f9fa'
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-gradient-to-br from-secondary via-primary to-secondary flex items-center justify-center">
    <div class="w-full max-w-md mx-auto px-4">
        <!-- Logo/Title -->
        <div class="text-center mb-6">
            <h1 class="text-white text-4xl font-bold mb-2">Admin Dashboard</h1>
            <p class="text-gray-400">Sign in to your account</p>
        </div>

        <!-- Card -->
        <div class="bg-gray-800 bg-opacity-90 backdrop-blur-lg rounded-xl border border-gray-700 shadow-2xl">
            <div class="p-6">
                <?php if ($error): ?>
                    <div class="bg-red-900 bg-opacity-20 border border-red-800 text-red-300 rounded-lg p-3 mb-4 flex items-center animate-pulse">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <div><?php echo htmlspecialchars($error); ?></div>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-300 font-medium mb-2">Email Address</label>
                        <input type="email" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-500"
                            id="email" name="email" placeholder="you@example.com" required>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-300 font-medium mb-2">Password</label>
                        <input type="password" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-500"
                            id="password" name="password" placeholder="••••••••" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-all transform hover:-translate-y-0.5 hover:shadow-lg">
                        Sign In
                    </button>
                </form>

            </div>
        </div>
    </div>
    <script>
        function showToast(message, type = 'success') {
            let toastContainer = document.getElementById('toastContainer');
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'toastContainer';
                toastContainer.className = 'fixed top-4 right-4 z-50 space-y-2';
                document.body.appendChild(toastContainer);
            }

            const toastId = 'toast-' + Date.now();
            const toast = document.createElement('div');
            
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

            setTimeout(() => {
                toast.classList.remove('translate-x-full');
                toast.classList.add('translate-x-0');
            }, 10);
            
            setTimeout(() => {
                toast.classList.remove('translate-x-0');
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    </script>
    <?php if(isset($_COOKIE['login_error'])): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast('Email hoặc mật khẩu sai!', 'error');
        });
    </script>
    <?php endif; ?>
</body>

</html>