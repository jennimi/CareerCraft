<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CareerCraft')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Apply Inter font as the default */
        body {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 16px;
            padding-left: 50px;
            padding-right: 50px;
        }

        /* Floating Button Animation */
        .floating-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 50;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        /* Hover Info */
        .hover-info {
            display: none;
            position: absolute;
            bottom: 70px;
            right: 30px;
            background-color: white;
            color: #766FFF;
            padding: 8px 12px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            z-index: 60;

            opacity: 0;
            transform: translateY(10px);
            transition: opacity 1s ease, transform 1s ease;
        }

        /* Show on Hover */
        .floating-button:hover+.hover-info {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Theme Colors */
        .theme-bg {
            background-color: #766FFF;
        }

        .theme-hover:hover {
            background-color: #6858f2;
        }

        .theme-text {
            color: #766FFF;
        }

        .theme-text-hover:hover {
            color: #6858f2;
        }
    </style>
</head>

<body class="bg-[#F8FAFF] text-gray-900">

    <!-- Navbar -->
    <nav class="flex justify-between items-center py-4 px-8 bg-[#F8FAFF]">
        <!-- Logo -->
        <div>
            <a href="javascript:void(0);">
                <img src="{{ asset('images/logo.png') }}" alt="CareerCraft Logo" style="width: 100px">
            </a>
        </div>

        <!-- Navigation Links -->
        <ul class="flex space-x-10">
            <li><a href="/" class="hover:text-[#766FFF]">Home</a></li>
            <li><a href="services" class="hover:text-[#766FFF]">Services</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-[#766FFF]">About</a></li>
            <li><a href="#" class="hover:text-[#766FFF]">Contact Us</a></li>
        </ul>

        <!-- Login Button -->
        <a href="{{ route('login') }}" class="py-2 px-4 text-white rounded theme-bg theme-hover">Log In</a>
    </nav>

    <!-- Dynamic Content -->
    <main class="px-8 py-8">
        @yield('content')
    </main>

    <a href="/chat"
        class="floating-button text-white rounded-full shadow-lg px-4 py-3 flex items-center space-x-2 theme-bg theme-hover">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path
                d="M18 13a9 9 0 11-8-8.93V3a7 7 0 10-2.93 12.75L4 16v2a1 1 0 001.8.6l1.45-1.45A8.96 8.96 0 0118 13z" />
        </svg>
        <span>Chat with AI</span>
    </a>
    <div class="hover-info mb-8">
        Start chatting with our AI assistant!
    </div>

    <!-- Footer -->
    <footer class="bg-gray-100 text-center py-4">
        © 2025 CareerCraft. All rights reserved.
    </footer>
</body>

</html>
