<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CareerCraft | @yield('title', 'CareerCraft')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Apply Inter font as the default */
        body {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 16px;
            /* padding-left: 50px;
            padding-right: 50px; */
        }

        /* Floating Button */
        .floating-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 50;
        }

        /* Chat Popup */
    .chat-popup {
        position: fixed;
        bottom: 90px;
        right: 30px;
        width: 400px; /* Increased width */
        height: 550px; /* Increased height */
        background-color: white;
        border-radius: 15px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 60;
        display: none;
        flex-direction: column;
        overflow: hidden;
    }

    .chat-popup-header {
        background-color: #766FFF;
        color: white;
        padding: 10px 15px;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chat-popup-content {
        flex: 1;
        padding: 10px;
        overflow-y: auto;
        background-color: #f8f9fa;
        font-size: 14px; /* Reduced font size */
    }

    .chat-popup-footer {
        padding: 10px;
        background-color: #f8f9fa;
        display: flex;
        gap: 10px;
    }

    .chat-popup-footer textarea {
        flex: 1;
        resize: none;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
        font-size: 14px; /* Reduced font size */
    }

    .chat-popup-footer button {
        background-color: #766FFF;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 14px; /* Reduced font size */
    }
    </style>
</head>

<body class="bg-[#F8FAFF] text-gray-900">
    <div style="padding-right: 50px; padding-left: 50px;">
        <!-- Navbar -->
        <nav class="flex justify-between items-center py-4 px-8 bg-[#F8FAFF]">
            <div>
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="CareerCraft Logo" style="width: 100px">
                </a>
            </div>
            <ul class="flex space-x-10">
                <li><a href="/" class="hover:text-[#766FFF]">Home</a></li>
                <li><a href="services" class="hover:text-[#766FFF]">Services</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-[#766FFF]">About</a></li>
            </ul>
            <a href="{{ route('login') }}" class="py-2 px-4 text-white rounded theme-bg theme-hover">Log In</a>
        </nav>

        <!-- Dynamic Content -->
        <main class="px-8 py-8">
            @yield('content')
        </main>

        <!-- Floating Button -->
        <div class="relative group">
            <button onclick="toggleChatPopup()"
                class="floating-button rounded-full shadow-lg px-5 py-3 flex items-center justify-center space-x-3 transition-transform transform hover:scale-105"
                style="background-color: #766FFF; color: white;">
                <i class="fas fa-comments"></i>
                <span class="hidden md:inline">Chat with AI</span>
            </button>
            <!-- Tooltip -->
            <div
                class="absolute bottom-full mb-2 hidden group-hover:block px-3 py-1 bg-white text-gray-900 text-sm rounded-lg shadow-md transition-opacity opacity-0 group-hover:opacity-100">
                Start chatting with AI!
            </div>
        </div>

        <!-- Chat Popup -->
        <div id="chatPopup" class="chat-popup">
            <div class="chat-popup-header flex items-center gap-3">
                <!-- Bot Image -->
                <img src="{{ asset('images/bot.png') }}" alt="Bot" class="w-10 h-10 rounded-full">
                <span>CareerCraft Mentor</span>
                <button onclick="toggleChatPopup()"
                    style="background: none; border: none; color: white; margin-left: auto;">&times;</button>
            </div>
            <div id="chatContent" class="chat-popup-content">
                <!-- Messages will load dynamically here -->
            </div>
            <div class="chat-popup-footer">
                <textarea id="userMessage" placeholder="Type your message..." class="flex-1 p-2 border rounded"></textarea>
                <button onclick="sendMessage()"
                    class="px-4 py-2 bg-[#766FFF] text-white rounded hover:bg-[#6858f2]">Send</button>
            </div>
        </div>
    </div>

    <div style="height: 100px"></div>

    <footer class="bg-gray-100 py-8">
        <div class="container mx-auto text-center">
            <p class="text-gray-600 text-sm">
                © 2025 CareerCraft. All rights reserved.
            </p>
            <div class="flex justify-center space-x-4 mt-2">
                <a href="https://facebook.com" target="_blank" class="text-gray-500 hover:text-[#766FFF]">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com" target="_blank" class="text-gray-500 hover:text-[#766FFF]">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://linkedin.com" target="_blank" class="text-gray-500 hover:text-[#766FFF]">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </footer>

    <script>
        function toggleChatPopup() {
            const chatPopup = document.getElementById('chatPopup');
            const chatContent = document.getElementById('chatContent');

            if (chatPopup.style.display === 'flex') {
                chatPopup.style.display = 'none';
            } else {
                chatPopup.style.display = 'flex';

                // Fetch chat history when the popup is opened
                $.ajax({
                    url: "{{ route('chat.messages') }}",
                    method: "GET",
                    success: function(response) {
                        chatContent.innerHTML = ''; // Clear existing content

                        if (response.messages && response.messages.length > 0) {
                            response.messages.forEach(message => {
                                const alignment = message.sender === 'user' ? 'text-right' :
                                    'text-left';
                                const bgColor = message.sender === 'user' ? 'bg-[#766FFF] text-white' :
                                    'bg-gray-200 text-gray-900';

                                chatContent.innerHTML += `
                            <div class="mb-2 ${alignment}">
                                <div class="inline-block ${bgColor} p-2 rounded-lg max-w-[70%]">
                                    ${message.text}
                                </div>
                            </div>
                        `;
                            });
                        } else {
                            chatContent.innerHTML =
                                '<p class="text-center text-gray-500">No messages yet. Start the conversation!</p>';
                        }

                        chatContent.scrollTop = chatContent.scrollHeight; // Scroll to the bottom
                    },
                    error: function() {
                        alert('An error occurred while fetching chat history. Please try again.');
                    }
                });
            }
        }


        function sendMessage() {
            const userMessage = document.getElementById('userMessage').value;
            if (!userMessage.trim()) return;

            // Append user's message
            const chatContent = document.getElementById('chatContent');
            chatContent.innerHTML += `
                <div class="mb-2 text-right">
                    <div class="inline-block bg-[#766FFF] text-white p-2 rounded-lg max-w-[70%]">
                        ${userMessage}
                    </div>
                </div>
            `;
            document.getElementById('userMessage').value = '';

            // Send the message to the server
            $.ajax({
                url: "{{ route('chat.generate') }}",
                method: "POST",
                data: {
                    prompt: userMessage,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Append bot's response
                    chatContent.innerHTML += `
                        <div class="mb-2 text-left">
                            <div class="inline-block bg-gray-200 text-gray-900 p-2 rounded-lg max-w-[70%]">
                                ${response.text}
                            </div>
                        </div>
                    `;
                    chatContent.scrollTop = chatContent.scrollHeight; // Scroll to bottom
                },
                error: function() {
                    alert('An error occurred. Please try again.');
                }
            });
        }
    </script>

</body>

</html>
