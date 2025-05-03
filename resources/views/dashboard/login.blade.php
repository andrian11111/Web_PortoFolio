<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi untuk input focus */
        .input-focus:focus {
            border-color: #6b21a8; /* Warna ungu */
            box-shadow: 0 0 10px rgba(107, 23, 168, 0.5); /* Efek glow ungu */
        }

        /* Animasi untuk tombol */
        .btn:hover {
            background-color: #4c1d95; /* Ungu lebih gelap */
            transform: scale(1.05);
            transition: transform 0.3s, background-color 0.3s;
        }

        /* Animasi muncul untuk form */
        .form-container {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen">
    <div class="w-96 bg-white p-6 rounded-lg shadow-lg form-container">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-900">Login</h1>

        @if (session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="name" id="name" placeholder="Enter your username"
                    class="mt-1 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md input-focus transition duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password"
                    class="mt-1 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md input-focus transition duration-200"
                    required>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md btn">
                Login
            </button>
        </form>
    </div>
</body>
</html>
