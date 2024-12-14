<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemini Chatbot</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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

        .content h1 {
            color: #6a5acd;
            margin-bottom: 20px;
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .chat-messages p {
            margin: 5px 0;
        }

        .chatbox {
            display: flex;
            margin-top: 10px;
        }

        .chatbox input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-right: 10px;
        }

        .chatbox button {
            padding: 10px 20px;
            background-color: #6a5acd;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .chatbox button:hover {
            background-color: #483d8b;
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
        <h1>Gemini Chatbot</h1>
        <div class="chat-messages" id="chatMessages"></div>
        <div class="chatbox">
            <input type="text" id="userMessage" placeholder="Type your message here...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script>
        async function sendMessage() {
            const userMessage = document.getElementById('userMessage').value;
            if (!userMessage) return;

            const chatMessages = document.getElementById('chatMessages');
            chatMessages.innerHTML += `<p><strong>You:</strong> ${userMessage}</p>`;
            document.getElementById('userMessage').value = '';

            try {
                const response = await axios.post('/chatbot', { message: userMessage });
                const reply = response.data.reply || 'No response from Gemini.';
                chatMessages.innerHTML += `<p><strong>Bot:</strong> ${reply}</p>`;
                chatMessages.scrollTop = chatMessages.scrollHeight;
            } catch (error) {
                chatMessages.innerHTML += `<p><strong>Bot:</strong> Sorry, something went wrong.</p>`;
            }
        }
    </script>
</body>
</html>
