<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Llama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar styles */
        .sidebar {
            width: 250px;
            background-color: #6a5acd;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .sidebar .menu-item {
            margin: 15px 0;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            width: 100%;
            padding: 10px;
            transition: background 0.3s;
        }

        .sidebar .menu-item:hover {
            background-color: #594aad;
        }

        .sidebar .active {
            background-color: #483d8b;
        }

        .sidebar .profile {
            width: 80px;
            height: 80px;
            background-color: white;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        /* Main content styles */
        .content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            background-color: white;
            border-radius: 12px;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .chat-container {
            display: flex;
            flex-direction: column;
            height: calc(100vh - 40px);
            background-color: #f6f6f6;
        }

        .chat-box {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .message {
            max-width: 75%;
            padding: 10px;
            border-radius: 10px;
            font-size: 14px;
            line-height: 1.5;
            position: relative;
        }

        .user-message {
            background-color: #7e57c2;
            color: white;
            align-self: flex-end;
            border-bottom-left-radius: 0;
        }

        .llama-message {
            background-color: #e1bee7;
            color: #4b0082;
            align-self: flex-start;
            border-bottom-right-radius: 0;
        }

        .message-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 10px;
            background-color: #fff;
        }

        textarea {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
            font-size: 14px;
            height: 50px;
            width: 75vw;
        }

        button {
            width: 80px;
            background-color: #7e57c2;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #5e35b1;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="profile"></div>
        <div class="menu-item">Home</div>
        <div class="menu-item active">Chat</div>
        <div class="menu-item">Settings</div>
        <div class="menu-item">Profile</div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="chat-container">
            <div class="chat-box" id="chatBox">
                <!-- User and Llama messages will appear here -->
                @foreach ($messages as $message)
                    <div class="message {{ $message['sender'] == 'user' ? 'user-message' : 'llama-message' }}">
                        {!! $message['text'] !!}
                    </div>
                @endforeach
            </div>

            <div class="message-box">
                <form action="{{ route('chat.generate') }}" method="POST" id="chatForm">
                    @csrf
                    <textarea id="userMessage" name="prompt" placeholder="Type your message..." onkeydown="handleKeyDown(event)">{{ old('prompt') }}</textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const chatBox = document.getElementById('chatBox');

        // Scroll to the bottom of the chat box on page load
        window.onload = () => {
            chatBox.scrollTop = chatBox.scrollHeight;
        };

        function handleKeyDown(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault(); // Prevent default behavior (new line)
                document.getElementById('chatForm').submit(); // Submit the form
            }
        }
    </script>
</body>

</html>
