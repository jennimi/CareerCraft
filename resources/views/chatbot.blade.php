@extends('layouts.app')

@section('title', 'Chat with Llama')

@section('content')
    <div class="flex h-screen bg-gray-100">

        <!-- Main Content -->
        <div class="flex-1 flex flex-col m-4 p-6 bg-white rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-[#6a5acd] mb-6">Chat with CareerBot</h1>

            <div class="flex-1 flex flex-col bg-gray-50 p-4 rounded-lg border border-gray-200 overflow-y-auto mb-4" id="chatBox">
                <!-- User and Llama messages will appear here -->
            </div>

            <div class="flex gap-4 items-center">
                <textarea id="userMessage" class="flex-1 p-3 border rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-[#6a5acd]" rows="2" placeholder="Type your message..."></textarea>
                <button onclick="sendMessage()" class="px-6 py-3 bg-[#6a5acd] text-white rounded-lg hover:bg-[#594aad]">
                    Send
                </button>
            </div>
        </div>
    </div>

    <script>
        function appendMessage(message, type) {
            const chatBox = document.getElementById('chatBox');
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', 'p-3', 'rounded-lg', 'mb-3', 'max-w-xs', 'text-sm', 'relative');

            if (type === 'user-message') {
                messageDiv.classList.add('bg-[#7e57c2]', 'text-white', 'ml-auto', 'rounded-bl-none');
            } else {
                messageDiv.classList.add('bg-[#e1bee7]', 'text-[#4b0082]', 'mr-auto', 'rounded-br-none');
            }

            messageDiv.innerHTML = message;
            chatBox.appendChild(messageDiv);
            chatBox.scrollTop = chatBox.scrollHeight; // Auto-scroll to latest message
        }

        async function sendMessage() {
            const userMessage = document.getElementById('userMessage').value.trim();
            if (!userMessage) return;

            appendMessage(userMessage, 'user-message');
            document.getElementById('userMessage').value = '';

            try {
                const response = await axios.post('/chatbot', { message: userMessage });
                const reply = response.data.reply || 'No response from Llama.';
                appendMessage(reply, 'llama-message');
            } catch (error) {
                console.error('Error sending message:', error);
                appendMessage('An error occurred. Please try again.', 'llama-message');
            }
        }

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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
