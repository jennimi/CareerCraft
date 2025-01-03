@extends('layouts.app')

@section('title', 'Chat with Gemini')

@section('content')
    <h1>Gemini Chatbot</h1>
    <div class="chat-messages" id="chatMessages"></div>
    <div class="chatbox">
        <input type="text" id="userMessage" placeholder="Type your message here..." aria-label="Type your message">
        <button onclick="sendMessage()" aria-label="Send message">Send</button>
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
@endsection
