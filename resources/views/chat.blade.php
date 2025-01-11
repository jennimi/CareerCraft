<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerCraft Chatbot</title>

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
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Adjust main content to fill available space */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
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

        /* Main Content Styling
        .main-content {
            background-color: #F8FAFF;
            color: #1a1a1a;
            padding: 2rem;
            margin: 2rem auto;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 80%;
        } */

        .message {
            max-width: 75%;
            padding: 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            display: inline-block;
        }

        .user-message {
            background-color: #7E3FF2;
            color: white;
            align-self: flex-end;
            text-align: right;
            border-bottom-left-radius: 0;
        }

        .chatbot-message {
            background-color: #E0CFFB;
            color: #5A20A8;
            align-self: flex-start;
            text-align: left;
            border-bottom-right-radius: 0;
        }

        .chat-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        #chatBox .flex {
            display: flex;
        }

        #chatBox {
            max-height: 400px;
            /* Adjust height as needed */
            overflow-y: auto;
        }


        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .main-content {
                max-width: 95%;
                padding: 1rem;
            }
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

    <!-- Main Content -->
    <main class="main-content">
        <div class="w-full max-w-4xl p-6 bg-white rounded-lg shadow-lg">
            <div class="flex flex-col h-full bg-[#F8FAFF]">
                <div id="chatBox" class="flex-1 overflow-y-auto p-4 space-y-4">
                    @foreach ($messages as $message)
                        <div class="flex {{ $message['sender'] == 'user' ? 'justify-end' : 'justify-start' }}">
                            <div
                                class="message {{ $message['sender'] == 'user' ? 'user-message' : 'chatbot-message' }}">
                                {!! $message['text'] !!}
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="flex items-center gap-4 p-4 bg-white">
                    <form action="{{ route('chat.generate') }}" method="POST" id="chatForm"
                        class="flex items-center w-full gap-4">
                        @csrf
                        <textarea id="userMessage" name="prompt" placeholder="Type your message..."
                            class="flex-1 p-2 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-purple-500"
                            rows="1" onkeydown="handleKeyDown(event)">{{ old('prompt') }}</textarea>
                        <button type="submit"
                            class="w-20 px-4 py-2 text-white bg-purple-600 rounded-lg hover:bg-purple-700">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 text-center py-4">
        © 2025 CareerCraft. All rights reserved.
    </footer>

    <script>
        function handleKeyDown(event) {
            // Detect Enter key
            if (event.key === 'Enter') {
                if (event.ctrlKey) {
                    // If Ctrl + Enter, insert a newline
                    event.preventDefault(); // Prevent form submission
                    insertNewLineAtCursor();
                } else {
                    // If only Enter, submit the form
                    event.preventDefault(); // Prevent the default action
                    document.getElementById('chatForm').submit();
                }
            }
        }

        function insertNewLineAtCursor() {
            const textarea = document.getElementById('userMessage');
            const cursorPos = textarea.selectionStart;
            const textBeforeCursor = textarea.value.substring(0, cursorPos);
            const textAfterCursor = textarea.value.substring(cursorPos);
            textarea.value = textBeforeCursor + "\n" + textAfterCursor;
            textarea.selectionStart = textarea.selectionEnd = cursorPos + 1; // Move cursor after the newline
        }

        // Function to scroll to the bottom of the chatBox
        function scrollToBottom() {
            const chatBox = document.getElementById('chatBox');
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        // Scroll to bottom on page load
        window.onload = scrollToBottom;

        // Scroll to bottom after form submission
        document.getElementById('chatForm').addEventListener('submit', function() {
            setTimeout(scrollToBottom, 100); // Delay to allow for new messages to be rendered
        });
    </script>
</body>


</html>
