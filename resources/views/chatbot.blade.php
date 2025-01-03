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
            height: 100vh;
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
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        textarea {
            width: 80%;
            height: 50px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
            font-size: 14px;
        }

        button {
            width: 15%;
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

        /* To style the response box */
        .response-box {
            margin-top: 10px;
            padding: 10px;
            background-color: #e1bee7;
            border-radius: 5px;
            color: #4b0082;
            font-size: 14px;
            line-height: 1.5;
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
            </div>
    
            <div class="message-box">
                <textarea id="userMessage" placeholder="Type your message..."></textarea>
                <button onclick="sendMessage()">Send</button>
            </div>
        </div>
    </div>

    <script>
        function appendMessage(message, type) {
            const chatBox = document.getElementById('chatBox');
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message');
            messageDiv.classList.add(type);

            messageDiv.innerHTML = message;
            chatBox.appendChild(messageDiv);

            // Scroll to the bottom to show the latest message
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        async function sendMessage() {
            const userMessage = document.getElementById('userMessage').value;
            if (userMessage.trim() === '') return;

            // Display user's message
            appendMessage(userMessage, 'user-message');
            document.getElementById('userMessage').value = ''; // Clear input field

            try {
                // Make the POST request to the backend
                const response = await axios.post('/chatbot', { message: userMessage });

                // Display Llama's response
                const reply = response.data.reply || 'No response from Llama.';
                appendMessage(reply, 'llama-message');
            } catch (error) {
                console.error('Error sending message:', error);
                appendMessage('An error occurred. Please try again.', 'llama-message');
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>