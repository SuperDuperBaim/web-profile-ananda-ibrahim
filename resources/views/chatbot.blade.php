<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AI Chatbot Integration</title>
    <!-- Tailwind CSS CDN untuk styling cepat dan rapi -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex flex-col justify-between">

    <!-- Header -->
    <header class="bg-blue-600 text-white p-4 shadow-md text-center font-bold text-lg">
        AI Chatbot (Powered by FastAPI & antiX Linux)
    </header>

    <!-- Chat Container -->
    <div id="chat-container" class="flex-1 overflow-y-auto p-4 space-y-4 max-w-2xl w-full mx-auto">
        <!-- Pesan Sambutan Bot -->
        <div class="flex items-start">
            <div class="bg-white text-gray-800 p-3 rounded-lg shadow max-w-xs md:max-w-md">
                Halo! Ada yang bisa saya bantu hari ini?
            </div>
        </div>
    </div>

    <!-- Input Form -->
    <div class="bg-white border-t p-4">
        <form id="chat-form" class="max-w-2xl mx-auto flex gap-2">
            <input type="text" id="user-input" placeholder="Ketik pesan ke AI..." required
                class="flex-1 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" 
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Kirim
            </button>
        </form>
    </div>

    <!-- JavaScript untuk Fetch ke FastAPI -->
    <script>
        const chatForm = document.getElementById('chat-form');
        const userInput = document.getElementById('user-input');
        const chatContainer = document.getElementById('chat-container');

        // Mengarah ke Proxy Controller Laravel
        const FASTAPI_URL = '/chatbot/send';

        chatForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const messageText = userInput.value.trim();
            if (!messageText) return;

            // 1. Tampilkan pesan user ke layar
            appendMessage(messageText, 'user');
            userInput.value = '';

            // 2. Kirim ke Laravel Proxy via Fetch API
            try {
                const response = await fetch(FASTAPI_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: messageText })
                });

                const data = await response.json();
                
                if (response.ok) {
                    // 3. Tampilkan balasan dari AI FastAPI
                    appendMessage(data.reply, 'bot');
                } else {
                    appendMessage('Maaf, terjadi kesalahan pada server AI.', 'bot');
                }
            } catch (error) {
                console.error('Error:', error);
                appendMessage('Gagal terhubung ke server FastAPI di laptop ASUS.', 'bot');
            }
        });

        function appendMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `flex ${sender === 'user' ? 'justify-end' : 'items-start'}`;
            
            const bubble = document.createElement('div');
            bubble.className = `p-3 rounded-lg shadow max-w-xs md:max-w-md ${
                sender === 'user' 
                    ? 'bg-blue-600 text-white rounded-br-none' 
                    : 'bg-white text-gray-800 rounded-bl-none'
            }`;
            bubble.textContent = text;
            
            messageDiv.appendChild(bubble);
            chatContainer.appendChild(messageDiv);
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    </script>
</body>
</html>