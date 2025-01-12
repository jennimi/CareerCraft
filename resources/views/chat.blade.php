<div class="chat-container h-full flex flex-col">
    <!-- Chat Messages -->
    <div id="chatBox" class="flex-1 overflow-y-auto p-4 bg-[#F8FAFF]">
        @if (!empty($messages) && is_array($messages))
            @foreach ($messages as $message)
                <div class="message {{ $message['sender'] === 'user' ? 'user-message' : 'bot-message' }} mb-2">
                    <div
                        class="p-3 rounded-lg max-w-[80%] {{ $message['sender'] === 'user' ? 'bg-[#766FFF] text-white ml-auto' : 'bg-gray-200 text-gray-900 mr-auto' }}">
                        {!! nl2br(e($message['text'])) !!}
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-gray-500">No messages yet. Start the conversation!</p>
        @endif
    </div>

    <!-- Message Input -->
    <div class="chat-input p-4 bg-gray-100 flex gap-2">
        <form id="chatForm" action="{{ route('chat.generate') }}" method="POST" class="flex flex-1 gap-2">
            @csrf
            <textarea id="userMessage" name="prompt" rows="1" placeholder="Type your message..."
                class="flex-1 resize-none rounded-lg border-gray-300 focus:ring-[#766FFF] focus:border-[#766FFF] p-2"></textarea>
            <button type="submit"
                class="py-2 px-4 bg-[#766FFF] text-white rounded-lg hover:bg-[#6858f2]">Send</button>
        </form>
    </div>
</div>

<script>
    const chatBox = document.getElementById('chatBox');

    // Scroll to the bottom of the chat box on load
    window.onload = () => {
        if (chatBox) {
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    };
</script>
