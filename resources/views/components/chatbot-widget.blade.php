<!-- Floating Chatbot Widget -->
<div id="ai-chatbot-widget" style="position: fixed; bottom: 24px; right: 24px; z-index: 9999; display: flex; flex-direction: column; align-items: flex-end; font-family: 'Courier New', Courier, monospace;">
    
    <!-- Chat Window Popup -->
    <div id="chat-popup-window" 
         style="display: none; width: min(380px, calc(100vw - 32px)); height: min(560px, calc(100vh - 120px)); background: rgba(18, 18, 20, 0.96); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 16px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6); margin-bottom: 16px; flex-direction: column; overflow: hidden; transform-origin: bottom right; transition: all 0.25s ease;">
        
        <!-- Header -->
        <div style="padding: 12px 16px; background: rgba(24, 24, 27, 0.9); border-bottom: 1px solid rgba(255, 255, 255, 0.08); display: flex; align-items: center; justify-content: space-between; user-select: none;">
            <div style="display: flex; items-center: center; gap: 10px; align-items: center;">
                <div style="position: relative; width: 34px; height: 34px; border-radius: 50%; background: #27272a; border: 1px solid rgba(255, 255, 255, 0.15); display: flex; align-items: center; justify-content: center; color: #ffffff;">
                    <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                    <span style="position: absolute; bottom: 0; right: 0; width: 8px; height: 8px; border-radius: 50%; background: #10b981; border: 2px solid #18181b;"></span>
                </div>
                <div>
                    <div style="font-size: 13px; font-weight: 600; color: #f4f4f5; line-height: 1.2;">
                        AI Assistant
                    </div>
                    <div style="font-size: 11px; color: #a1a1aa; margin-top: 2px;">Powered by antiX Linux</div>
                </div>
            </div>
            
            <div style="display: flex; align-items: center; gap: 4px;">
                <!-- Open Full Page -->
                <a href="{{ url('/chatbot') }}" target="_blank" title="Buka di tab baru"
                   style="padding: 6px; border-radius: 8px; color: #a1a1aa; display: flex; align-items: center; justify-content: center; text-decoration: none; cursor: pointer; transition: background 0.2s;"
                   onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#fff'"
                   onmouseout="this.style.background='transparent'; this.style.color='#a1a1aa'">
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                </a>
                <!-- Close Button -->
                <button type="button" id="close-chatbot-btn" title="Tutup"
                        style="padding: 6px; border-radius: 8px; color: #a1a1aa; background: transparent; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background 0.2s;"
                        onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.color='#fff'"
                        onmouseout="this.style.background='transparent'; this.style.color='#a1a1aa'">
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Messages Area -->
        <div id="widget-messages-container" style="flex: 1; overflow-y: auto; padding: 16px; display: flex; flex-direction: column; gap: 12px; font-size: 13px; scroll-behavior: smooth;">
            <!-- Pesan Sambutan Bot -->
            <div style="display: flex; align-items: flex-start; gap: 8px;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: #27272a; color: #f4f4f5; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 600; flex-shrink: 0; border: 1px solid rgba(255, 255, 255, 0.1);">
                    AI
                </div>
                <div style="background: #27272a; color: #f4f4f5; padding: 10px 14px; border-radius: 14px; border-top-left-radius: 2px; border: 1px solid rgba(255, 255, 255, 0.08); max-width: 82%; line-height: 1.5; word-break: break-word;">
                    Halo! Silakan pilih topik di bawah atau tanyakan seputar portofolio Ananda Ibrahim.
                </div>
            </div>
        </div>

        <!-- Typing Indicator (Diatas Quick Chips) -->
        <div id="widget-typing-indicator" style="display: none; padding: 8px 16px; font-size: 11.5px; color: #a1a1aa; align-items: center; gap: 8px; background: rgba(24, 24, 27, 0.5); border-top: 1px solid rgba(255, 255, 255, 0.05);">
            <div style="display: flex; gap: 4px;">
                <span class="chat-dot"></span>
                <span class="chat-dot" style="animation-delay: 0.15s;"></span>
                <span class="chat-dot" style="animation-delay: 0.3s;"></span>
            </div>
            <span>AI sedang mengetik...</span>
        </div>

        <!-- Tombol Rekomendasi Pertanyaan (Tanpa Emoji, Desain Minimalis Putih-Gelap) -->
        <div id="widget-quick-chips" style="padding: 8px 12px; display: grid; grid-template-columns: 1fr 1fr; gap: 6px; background: rgba(24, 24, 27, 0.7); border-top: 1px solid rgba(255, 255, 255, 0.06);">
            <button type="button" onclick="window.sendQuickMessage('Siapa Ananda Ibrahim?')" 
                    style="background: #27272a; color: #f4f4f5; border: 1px solid rgba(255, 255, 255, 0.15); padding: 6px 8px; border-radius: 10px; font-size: 11.5px; font-weight: 500; font-family: inherit; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" 
                    onmouseover="this.style.background='#3f3f46'; this.style.borderColor='#ffffff'" 
                    onmouseout="this.style.background='#27272a'; this.style.borderColor='rgba(255, 255, 255, 0.15)'">Siapa Ananda?</button>
            <button type="button" onclick="window.sendQuickMessage('Apa saja proyek unggulannya?')" 
                    style="background: #27272a; color: #f4f4f5; border: 1px solid rgba(255, 255, 255, 0.15); padding: 6px 8px; border-radius: 10px; font-size: 11.5px; font-weight: 500; font-family: inherit; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" 
                    onmouseover="this.style.background='#3f3f46'; this.style.borderColor='#ffffff'" 
                    onmouseout="this.style.background='#27272a'; this.style.borderColor='rgba(255, 255, 255, 0.15)'">Proyek Unggulan</button>
            <button type="button" onclick="window.sendQuickMessage('Apa keahlian & tech stacknya?')" 
                    style="background: #27272a; color: #f4f4f5; border: 1px solid rgba(255, 255, 255, 0.15); padding: 6px 8px; border-radius: 10px; font-size: 11.5px; font-weight: 500; font-family: inherit; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" 
                    onmouseover="this.style.background='#3f3f46'; this.style.borderColor='#ffffff'" 
                    onmouseout="this.style.background='#27272a'; this.style.borderColor='rgba(255, 255, 255, 0.15)'">Keahlian Tech</button>
            <button type="button" onclick="window.sendQuickMessage('Bagaimana cara menghubungi Ananda?')" 
                    style="background: #27272a; color: #f4f4f5; border: 1px solid rgba(255, 255, 255, 0.15); padding: 6px 8px; border-radius: 10px; font-size: 11.5px; font-weight: 500; font-family: inherit; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" 
                    onmouseover="this.style.background='#3f3f46'; this.style.borderColor='#ffffff'" 
                    onmouseout="this.style.background='#27272a'; this.style.borderColor='rgba(255, 255, 255, 0.15)'">Kontak Ananda</button>
        </div>

        <!-- Input Area -->
        <div style="padding: 12px; background: rgba(24, 24, 27, 0.95); border-top: 1px solid rgba(255, 255, 255, 0.08);">
            <form id="widget-chat-form" style="display: flex; align-items: center; gap: 8px; margin: 0;">
                <input type="text" id="widget-user-input" placeholder="Tanya sesuatu ke AI..." autocomplete="off" required
                       style="flex: 1; background: #27272a; border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 10px; padding: 8px 12px; font-size: 13px; font-family: inherit; color: #fff; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#ffffff'"
                       onblur="this.style.borderColor='rgba(255, 255, 255, 0.12)'">
                <button type="submit" id="widget-send-btn" title="Kirim"
                        style="width: 36px; height: 36px; background: #ffffff; color: #18181b; border: none; border-radius: 10px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background 0.2s; flex-shrink: 0;"
                        onmouseover="this.style.background='#e4e4e7'"
                        onmouseout="this.style.background='#ffffff'">
                    <svg style="width: 16px; height: 16px; margin-left: 2px;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Floating Toggle Button (Putih Bersih Monokrom) -->
    <button type="button" id="toggle-chatbot-btn"
            style="position: relative; width: 56px; height: 56px; border-radius: 50%; background: #ffffff; color: #18181b; border: none; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.4); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: transform 0.2s, background 0.2s; outline: none;"
            onmouseover="this.style.transform='scale(1.06)'; this.style.background='#f4f4f5'"
            onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff'"
            aria-label="Buka Chatbot AI">
        
        <!-- Chat Icon -->
        <svg id="icon-chat" style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>

        <!-- Close Icon -->
        <svg id="icon-close" style="width: 24px; height: 24px; display: none;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>

<style>
    @keyframes chatDotBounce {
        0%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-4px); }
    }
    .chat-dot {
        display: inline-block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background-color: #a1a1aa;
        animation: chatDotBounce 1s infinite ease-in-out;
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
    (function() {
        const FASTAPI_URL = '/chatbot/send';
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

        const toggleBtn = document.getElementById('toggle-chatbot-btn');
        const closeBtn = document.getElementById('close-chatbot-btn');
        const popup = document.getElementById('chat-popup-window');
        const iconChat = document.getElementById('icon-chat');
        const iconClose = document.getElementById('icon-close');
        
        const chatForm = document.getElementById('widget-chat-form');
        const userInput = document.getElementById('widget-user-input');
        const messagesContainer = document.getElementById('widget-messages-container');
        const typingIndicator = document.getElementById('widget-typing-indicator');

        function toggleChat() {
            const isHidden = popup.style.display === 'none' || popup.style.display === '';
            if (isHidden) {
                popup.style.display = 'flex';
                iconChat.style.display = 'none';
                iconClose.style.display = 'block';
                setTimeout(() => userInput.focus(), 150);
            } else {
                popup.style.display = 'none';
                iconChat.style.display = 'block';
                iconClose.style.display = 'none';
            }
        }

        toggleBtn.addEventListener('click', toggleChat);
        closeBtn.addEventListener('click', toggleChat);

        // Fungsi agar tombol rekomendasi bisa langsung diklik dan mengirim pesan
        window.sendQuickMessage = function(text) {
            submitMessage(text);
        };

        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const messageText = userInput.value.trim();
            if (!messageText) return;
            userInput.value = '';
            submitMessage(messageText);
        });

        async function submitMessage(messageText) {
            // 1. Tampilkan pesan user
            appendMessage(messageText, 'user');

            // Tampilkan typing indicator
            typingIndicator.style.display = 'flex';
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            try {
                const response = await fetch(FASTAPI_URL, {
                    method: 'POST',
                    headers: { 
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ message: messageText })
                });

                const data = await response.json();
                typingIndicator.style.display = 'none';

                if (response.ok && data.reply) {
                    appendMessage(data.reply, 'bot');
                } else {
                    appendMessage('Maaf, server AI mengembalikan respons tidak terduga.', 'bot');
                }
            } catch (error) {
                console.error('FastAPI error:', error);
                typingIndicator.style.display = 'none';
                appendMessage('Gagal terhubung ke server FastAPI di laptop ASUS. Pastikan server FastAPI sedang berjalan.', 'bot');
            }
        }

        function appendMessage(text, sender) {
            const wrapper = document.createElement('div');
            wrapper.style.display = 'flex';
            wrapper.style.width = '100%';
            
            if (sender === 'user') {
                wrapper.style.justifyContent = 'flex-end';
                wrapper.innerHTML = `
                    <div style="background: #ffffff; color: #18181b; font-weight: 500; padding: 10px 14px; border-radius: 14px; border-top-right-radius: 2px; max-width: 82%; line-height: 1.5; word-break: break-word; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                        ${escapeHTML(text)}
                    </div>
                `;
            } else {
                wrapper.style.justifyContent = 'flex-start';
                wrapper.style.alignItems = 'flex-start';
                wrapper.style.gap = '8px';
                wrapper.innerHTML = `
                    <div style="width: 28px; height: 28px; border-radius: 50%; background: #27272a; color: #f4f4f5; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 600; flex-shrink: 0; border: 1px solid rgba(255, 255, 255, 0.1);">
                        AI
                    </div>
                    <div style="background: #27272a; color: #f4f4f5; padding: 10px 14px; border-radius: 14px; border-top-left-radius: 2px; border: 1px solid rgba(255, 255, 255, 0.08); max-width: 82%; line-height: 1.5; word-break: break-word; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                        ${text}
                    </div>
                `;
            }

            messagesContainer.appendChild(wrapper);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function escapeHTML(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }
    })();
</script>
