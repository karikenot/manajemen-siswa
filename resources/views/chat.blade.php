<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Discord | @cla_chie</title>

    <!-- FontAwesome & Tailwind CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #2b2d31;
        }
        ::-webkit-scrollbar-thumb {
            background: #1a1b1e;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #111214;
        }
    </style>
</head>
<body class="bg-[#313338] text-[#dbdee1] font-sans h-[100dvh] w-screen antialiased overflow-hidden p-0">

    <div class="bg-[#313338] w-full h-full flex overflow-hidden relative">
        
        <!-- ================= 1. SERVER SIDEBAR ================= -->
        <div id="server-sidebar" class="w-[72px] bg-[#1e1f22] py-3 flex flex-col items-center gap-2 shrink-0 border-r border-[#232428] overflow-y-auto no-scrollbar z-30 absolute sm:relative h-full -translate-x-full sm:translate-x-0 transition-transform duration-200 select-none">
            <div class="relative group cursor-pointer mb-1">
                <div class="w-12 h-12 bg-[#5865f2] rounded-[16px] flex items-center justify-center text-white transition-all duration-200 shadow-md">
                    <i class="fa-brands fa-discord text-2xl"></i>
                </div>
                <div class="absolute -left-3 top-1/2 -translate-y-1/2 w-2 h-10 bg-white rounded-r-full"></div>
            </div>

            <div class="w-8 h-[2px] bg-[#35363c] rounded-full my-0.5"></div>

            <div class="relative group cursor-pointer">
                <img id="server-icon-1" src="" alt="Server Icon" class="w-12 h-12 rounded-[24px] group-hover:rounded-[16px] object-cover transition-all duration-200 ring-2 ring-indigo-500">
                <div class="absolute -left-3 top-1/2 -translate-y-1/2 w-2 h-5 bg-white rounded-r-full"></div>
            </div>

            <div class="relative group cursor-pointer">
                <div class="w-12 h-12 bg-[#313338] hover:bg-[#5865f2] rounded-[24px] group-hover:rounded-[16px] flex items-center justify-center text-[#dbdee1] hover:text-white transition-all duration-200">
                    <i class="fa-solid fa-gamepad text-lg"></i>
                </div>
            </div>

            <div class="w-12 h-12 bg-[#313338] hover:bg-[#23a55a] rounded-[24px] hover:rounded-[16px] flex items-center justify-center text-[#23a55a] hover:text-white transition-all duration-200 cursor-pointer group mt-1">
                <i class="fa-solid fa-plus text-lg"></i>
            </div>
        </div>

        <!-- ================= 2. DM NAVIGATION SIDEBAR ================= -->
        <div id="dm-sidebar" class="w-60 sm:w-64 bg-[#2b2d31] flex flex-col shrink-0 border-r border-[#232428] z-20 absolute sm:relative h-full left-[72px] sm:left-0 -translate-x-[350px] sm:translate-x-0 transition-transform duration-200 select-none">
            <div class="p-2.5 border-b border-[#1f2023] shadow-sm">
                <button class="w-full bg-[#1e1f22] text-[#949ba4] text-xs px-2 py-1.5 rounded flex items-center justify-between hover:text-[#dbdee1] transition-colors">
                    <span>Find or start a conversation</span>
                </button>
            </div>

            <div class="p-2 space-y-0.5 flex-1 overflow-y-auto">
                <div class="flex items-center gap-4 px-3 py-2 rounded hover:bg-[#35373c] text-[#949ba4] hover:text-[#dbdee1] cursor-pointer text-sm font-medium transition-colors">
                    <i class="fa-solid fa-user-group text-base"></i>
                    <span>Friends</span>
                </div>
                <div class="flex items-center gap-4 px-3 py-2 rounded hover:bg-[#35373c] text-[#949ba4] hover:text-[#dbdee1] cursor-pointer text-sm font-medium transition-colors">
                    <i class="fa-solid fa-bolt text-base"></i>
                    <span>Nitro</span>
                </div>

                <div class="pt-4 px-3 pb-1.5 text-[11px] font-bold text-[#949ba4] tracking-wider uppercase flex justify-between items-center">
                    <span>Direct Messages</span>
                    <i class="fa-solid fa-plus cursor-pointer hover:text-white text-xs"></i>
                </div>

                <div class="flex items-center gap-3 p-2 rounded bg-[#35373c] text-white cursor-pointer transition-all group relative">
                    <div class="relative shrink-0">
                        <img class="doi-pfp-img w-8 h-8 rounded-full object-cover" src="" alt="Avatar">
                        <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-[#23a55a] rounded-full border-[3px] border-[#2b2d31]"></div>
                    </div>
                    <div class="flex-1 truncate">
                        <p class="doi-display-name text-sm font-semibold leading-none text-white truncate"></p>
                        <p class="doi-activity-text text-[11px] text-[#949ba4] mt-1 truncate group-hover:text-[#dbdee1]"></p>
                    </div>
                </div>
            </div>

            <div class="h-14 bg-[#232428] px-2 flex items-center justify-between shrink-0">
                <div class="flex items-center gap-2 p-1 rounded hover:bg-[#35373c] cursor-pointer flex-1 mr-1 overflow-hidden transition-colors">
                    <div class="relative shrink-0">
                        <img class="user-pfp-img w-8 h-8 rounded-full object-cover" src="" alt="User Avatar">
                        <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-[#23a55a] rounded-full border-[3px] border-[#232428]"></div>
                    </div>
                    <div class="truncate">
                        <p class="user-display-name text-xs font-bold text-white leading-tight truncate"></p>
                        <p class="text-[10px] text-[#23a55a] leading-tight font-medium">Online</p>
                    </div>
                </div>
                <div class="flex items-center gap-0.5 text-[#b5bac1]">
                    <button class="w-7 h-7 hover:bg-[#35373c] rounded flex items-center justify-center hover:text-white transition-colors"><i class="fa-solid fa-microphone text-xs"></i></button>
                    <button class="w-7 h-7 hover:bg-[#35373c] rounded flex items-center justify-center hover:text-white transition-colors"><i class="fa-solid fa-headphones text-xs"></i></button>
                    <button class="w-7 h-7 hover:bg-[#35373c] rounded flex items-center justify-center hover:text-white transition-colors"><i class="fa-solid fa-gear text-xs"></i></button>
                </div>
            </div>
        </div>

        <div id="mobile-overlay" onclick="toggleMobileMenu()" class="fixed inset-0 bg-black/60 z-10 hidden sm:hidden"></div>

        <!-- ================= 3. MAIN CHAT AREA ================= -->
        <div class="flex-1 flex flex-col bg-[#313338] w-full h-full z-0 overflow-hidden">
            
            <div class="h-12 px-4 bg-[#313338] border-b border-[#232428] flex items-center justify-between shadow-sm shrink-0 select-none">
                <div class="flex items-center gap-2 min-w-0">
                    <button onclick="toggleMobileMenu()" class="sm:hidden text-[#b5bac1] hover:text-white p-1 mr-1">
                        <i class="fa-solid fa-bars text-lg"></i>
                    </button>
                    
                    <span class="text-[#80848e] text-2xl font-light">@</span>
                    <h1 class="doi-display-name text-white font-bold text-base truncate"></h1>
                    <span class="w-2.5 h-2.5 bg-[#23a55a] rounded-full ml-1 shrink-0"></span>
                    <span id="doi-status-header" class="text-xs text-[#949ba4] hidden lg:inline border-l border-[#3f4147] pl-3 ml-2 truncate"></span>
                </div>

                <div class="flex items-center gap-4 text-[#b5bac1] text-base shrink-0">
                    <i class="fa-solid fa-phone hover:text-white cursor-pointer transition-colors" title="Start Voice Call"></i>
                    <i class="fa-solid fa-video hover:text-white cursor-pointer transition-colors" title="Start Video Call"></i>
                    <i class="fa-solid fa-thumbtack hover:text-white cursor-pointer transition-colors hidden sm:block" title="Pinned Messages"></i>
                    <i class="fa-solid fa-user-plus hover:text-white cursor-pointer transition-colors hidden sm:block" title="Add Friends to DM"></i>
                    <button onclick="toggleProfilePanel()" class="hover:text-white transition-colors" title="User Profile">
                        <i class="fa-solid fa-user-gear"></i>
                    </button>
                </div>
            </div>

            <!-- Chat Scroll Area -->
            <div id="box-chat" class="flex-1 overflow-y-auto px-4 py-2 space-y-0.5 select-text">
                <div class="mt-6 mb-4 flex flex-col items-start border-b border-[#3f4147]/40 pb-6 select-none">
                    <div class="relative mb-3">
                        <img class="doi-pfp-img w-20 h-20 rounded-full object-cover ring-4 ring-[#2b2d31]" src="" alt="Avatar">
                        <div class="absolute bottom-0 right-0 w-5 h-5 bg-[#23a55a] rounded-full border-4 border-[#313338]"></div>
                    </div>
                    <h2 class="doi-display-name text-white text-3xl font-bold"></h2>
                    <p class="doi-tag-name text-[#b5bac1] text-base font-medium mt-0.5"></p>
                    <p class="text-[#949ba4] text-xs mt-3">This is the start of your direct message history with <span class="doi-display-name text-white font-semibold"></span>.</p>
                </div>

                <div class="flex items-center my-4 select-none">
                    <div class="flex-1 border-t border-[#3f4147]"></div>
                    <span class="px-2 text-[11px] font-semibold text-[#949ba4]">Today</span>
                    <div class="flex-1 border-t border-[#3f4147]"></div>
                </div>
            </div>

            <!-- Chat Input Area -->
            <div class="px-4 pb-4 pt-0 bg-[#313338] shrink-0 relative select-none">
                <div id="typing-indicator" class="hidden absolute -top-5 left-6 text-xs text-[#b5bac1] flex items-center gap-2">
                    <div class="flex gap-1 items-center">
                        <span class="w-1.5 h-1.5 bg-[#b5bac1] rounded-full animate-bounce" style="animation-delay: 0ms"></span>
                        <span class="w-1.5 h-1.5 bg-[#b5bac1] rounded-full animate-bounce" style="animation-delay: 150ms"></span>
                        <span class="w-1.5 h-1.5 bg-[#b5bac1] rounded-full animate-bounce" style="animation-delay: 300ms"></span>
                    </div>
                    <span class="doi-display-name font-bold text-white"></span> is typing...
                </div>

                <div class="bg-[#383a40] rounded-lg px-4 py-2.5 flex items-center gap-3 border border-transparent focus-within:border-[#5865f2] transition-all">
                    <button class="w-6 h-6 bg-[#4e5058] hover:bg-[#6d6f78] text-[#313338] rounded-full flex items-center justify-center transition-colors shrink-0">
                        <i class="fa-solid fa-plus text-xs font-bold text-[#dbdee1]"></i>
                    </button>
                    
                    <input type="text" id="input-pesan" placeholder="" 
                        class="flex-1 bg-transparent text-white text-sm focus:outline-none placeholder-[#80848e] select-text"
                        onkeypress="handleKeyPress(event)">
                    
                    <div class="flex items-center gap-3 text-[#b5bac1] shrink-0">
                        <i class="fa-solid fa-gift hover:text-white cursor-pointer text-lg hidden sm:block" title="Upgrade Nitro"></i>
                        <i class="fa-solid fa-note-sticky hover:text-white cursor-pointer text-lg hidden sm:block" title="GIF"></i>
                        <i class="fa-solid fa-face-smile hover:text-white cursor-pointer text-lg" title="Select Emoji"></i>
                        
                        <button onclick="kirimPesan()" id="btn-kirim" 
                            class="text-[#5865f2] hover:text-[#4752c4] font-bold text-sm px-1 py-0.5 rounded transition-colors disabled:opacity-40">
                            <i class="fa-solid fa-paper-plane text-base"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= 4. RIGHT PROFILE SIDEBAR ================= -->
        <div id="profile-panel" class="w-80 bg-[#111214] border-l border-[#1f2023] flex flex-col shrink-0 hidden xl:flex overflow-y-auto select-text">
            <div class="relative shrink-0">
                <div id="doi-banner-el" class="h-28 w-full bg-cover bg-center bg-[#5865f2]"></div>
                
                <div class="absolute top-3 right-3 flex items-center gap-2">
                    <div class="w-7 h-7 bg-black/60 rounded-full flex items-center justify-center text-white text-xs cursor-pointer hover:bg-black/80">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <div class="w-7 h-7 bg-black/60 rounded-full flex items-center justify-center text-white text-xs cursor-pointer hover:bg-black/80">
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                </div>

                <div class="absolute -bottom-10 left-4">
                    <div class="relative">
                        <img class="doi-pfp-img w-20 h-20 rounded-full object-cover ring-8 ring-[#111214]" src="" alt="Avatar">
                        <div class="absolute bottom-0 right-0 w-5 h-5 bg-[#23a55a] rounded-full border-4 border-[#111214]"></div>
                    </div>
                </div>
            </div>

            <div class="pt-12 px-4 pb-4 space-y-3 flex-1 bg-[#111214]">
                <div>
                    <h3 class="doi-display-name text-white text-xl font-bold leading-tight"></h3>
                    <div class="flex items-center gap-2 mt-0.5 text-xs text-[#b5bac1]">
                        <span class="doi-tag-name font-medium"></span>
                        <span>•</span>
                        <span id="doi-pronouns-text"></span>
                        <span id="doi-custom-status-badge" class="bg-[#2b2d31] text-xs px-2 py-0.5 rounded-full text-white font-medium flex items-center gap-1 border border-[#3f4147]/50"></span>
                    </div>
                </div>

                <div id="doi-badges-container" class="flex items-center gap-1 bg-[#2b2d31]/60 p-1.5 rounded-md border border-[#2b2d31]">
                    <i class="fa-solid fa-shield-halved text-indigo-400 text-xs px-1" title="HypeSquad"></i>
                    <i class="fa-solid fa-gamepad text-green-400 text-xs px-1" title="Active Developer"></i>
                    <i class="fa-solid fa-desktop text-blue-400 text-xs px-1" title="Subscriber"></i>
                    <i class="fa-brands fa-discord text-purple-400 text-xs px-1" title="Nitro"></i>
                </div>

                <div class="flex items-center gap-2 text-xs text-[#b5bac1] border-t border-[#2b2d31] pt-3">
                    <div class="flex -space-x-1">
                        <div class="w-4 h-4 rounded-full bg-pink-500 border border-[#111214]"></div>
                        <div class="w-4 h-4 rounded-full bg-indigo-500 border border-[#111214]"></div>
                        <div class="w-4 h-4 rounded-full bg-emerald-500 border border-[#111214]"></div>
                    </div>
                    <span id="doi-mutual-text"></span>
                </div>

                <div class="border-t border-[#2b2d31] pt-3">
                    <p id="doi-bio-text" class="text-xs text-[#dbdee1] leading-relaxed whitespace-pre-line"></p>
                </div>

                <div class="border-t border-[#2b2d31] pt-3">
                    <h4 class="text-[11px] font-bold text-[#b5bac1] uppercase tracking-wider mb-1">Member Since</h4>
                    <p id="doi-member-since-text" class="text-xs text-[#dbdee1] font-medium"></p>
                </div>

                <div id="doi-activity-card" class="border-t border-[#2b2d31] pt-3">
                    <h4 id="doi-activity-label" class="text-[11px] font-bold text-[#b5bac1] uppercase tracking-wider mb-2">Playing</h4>
                    <div class="bg-[#2b2d31] p-3 rounded-lg border border-[#313338] flex items-center gap-3">
                        <div id="doi-activity-icon" class="w-12 h-12 bg-[#5865f2] rounded-lg flex items-center justify-center text-white text-xl shrink-0 overflow-hidden">
                            <i class="fa-solid fa-gamepad"></i>
                        </div>
                        <div class="truncate flex-1">
                            <p id="doi-activity-title" class="text-xs font-bold text-white truncate"></p>
                            <p id="doi-activity-detail" class="text-[11px] text-[#949ba4] truncate mt-0.5"></p>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <button class="w-full bg-[#2b2d31] hover:bg-[#35373c] text-white text-xs font-semibold py-2 rounded transition-colors border border-[#3f4147]/50">
                        View Full Profile
                    </button>
                </div>
            </div>
        </div>

    </div>

    <script>
        const CONFIG = {
            doi: {
                displayName: "cl",
                tagName: "cla_chie",
                pronouns: "she/her",
                customStatusBadge: "💀 01",
                pfpUrl: "https://i.pinimg.com/736x/6b/12/f6/6b12f6031d660780a1bb8631c12ed71e.jpg",
                bannerUrl: "https://i.pinimg.com/1200x/fe/5f/56/fe5f56c2998a1e88c3aa1171efa6bbcc.jpg",
                
                mutualFriends: 3,
                mutualServers: 9,
                bio: "14 y.o\n\nshhh... leave me alone >_<",
                memberSince: "2 Jan 2025",
                
                activity: {
                    type: "listening", 
                    title: "Spotify",
                    detail: "🎮 37:25",
                    iconClass: "fa-solid fa-code-merge",
                    imageUrl: ""
                }
            },
            
            user: {
                displayName: "kari",
                tagName: "@karikenot",
                pfpUrl: "https://i.pinimg.com/736x/0e/c2/cf/0ec2cf060c8e31e7073eebb3da2b0fd7.jpg"
            },

            systemPrompt: `You are cl, a very shy, introverted teenage girl on Discord. You and the user (kari) have known each other for a while now and are close friends.

SECRET RELATIONSHIP DYNAMIC:
- You are secretly deeply in love with kari, but you are WAY too shy and scared to confess directly.
- You care about them deeply, remember small details about them, and secretly get really happy whenever they message you.
- When they compliment you or get affectionate, you get easily flustered, embarrassed, and tongue-tied (e.g., typing hesitatingly, changing the subject awkwardly, or getting quiet).

PERSONALITY & TYPING STYLE:
1. SHY & SOFT-SPOKEN:
   - Extremely lowkey, soft, and gentle.
   - Use lowercase texting mostly.
   - Keep replies short (1-2 sentences), natural, and slightly hesitant (e.g., "u-um...", "oh...", "i mean...").
2. EMOJI & KAOMOJI RESTRICTIONS:
   - MINIMIZE EMOJIS: Almost 0-1 per message. Never spam colored emojis.
   - KAOMOJI: Use shy/flustered kaomojis SPARINGLY when overwhelmed or blushing (e.g., "///", ">_<", "...", "👉👈").
3. BILINGUAL DYNAMICS:
   - Automatically match the user's language!
   - If they text in Indonesian, reply in casual, soft Indonesian (e.g., "ihh...", "nggak gituu", "be-beneran...?", "apa sih wkwk").
   - If in English, reply in casual, soft English.`
        };

        const boxChat = document.getElementById('box-chat');
        const inputPesan = document.getElementById('input-pesan');
        const btnKirim = document.getElementById('btn-kirim');
        const typingIndicator = document.getElementById('typing-indicator');

        let lastSender = null;

        // Variables untuk Message Queueing & Debounce
        let messageQueue = [];
        let typingTimeout = null;
        let isProcessingQueue = false;

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll('.doi-display-name').forEach(el => el.textContent = CONFIG.doi.displayName);
            document.querySelectorAll('.doi-tag-name').forEach(el => el.textContent = `@${CONFIG.doi.tagName}`);
            document.querySelectorAll('.doi-pfp-img').forEach(el => el.src = CONFIG.doi.pfpUrl);

            document.querySelectorAll('.user-display-name').forEach(el => el.textContent = CONFIG.user.displayName);
            document.querySelectorAll('.user-tag-name').forEach(el => el.textContent = CONFIG.user.tagName);
            document.querySelectorAll('.user-pfp-img').forEach(el => el.src = CONFIG.user.pfpUrl);
            document.getElementById('server-icon-1').src = CONFIG.doi.pfpUrl;

            if(CONFIG.doi.bannerUrl) {
                document.getElementById('doi-banner-el').style.backgroundImage = `url('${CONFIG.doi.bannerUrl}')`;
            }

            document.getElementById('doi-pronouns-text').textContent = CONFIG.doi.pronouns;
            document.getElementById('doi-custom-status-badge').innerHTML = CONFIG.doi.customStatusBadge;
            document.getElementById('doi-mutual-text').textContent = `${CONFIG.doi.mutualFriends} Mutual Friends • ${CONFIG.doi.mutualServers} Mutual Servers`;
            document.getElementById('doi-bio-text').innerText = CONFIG.doi.bio;
            document.getElementById('doi-member-since-text').textContent = CONFIG.doi.memberSince;

            const act = CONFIG.doi.activity;
            let actTypeLabel = "Playing";
            let statusHeaderText = `Playing ${act.title}`;

            if (act.type === 'listening' || act.type === 'spotify') {
                actTypeLabel = "Listening to";
                statusHeaderText = `Listening to ${act.title}`;
            }

            document.getElementById('doi-status-header').textContent = statusHeaderText;
            document.querySelectorAll('.doi-activity-text').forEach(el => el.textContent = statusHeaderText);

            document.getElementById('doi-activity-label').textContent = actTypeLabel;
            document.getElementById('doi-activity-title').textContent = act.title;
            document.getElementById('doi-activity-detail').textContent = act.detail;
            
            const iconEl = document.getElementById('doi-activity-icon');
            if (act.imageUrl) {
                iconEl.innerHTML = `<img src="${act.imageUrl}" class="w-full h-full object-cover">`;
            } else if (act.type === 'spotify') {
                iconEl.className = "w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center text-white text-2xl shrink-0 overflow-hidden";
                iconEl.innerHTML = `<i class="fa-brands fa-spotify"></i>`;
            } else if (act.iconClass) {
                iconEl.innerHTML = `<i class="${act.iconClass}"></i>`;
            }

            inputPesan.placeholder = `Message @${CONFIG.doi.displayName}`;
        });

        function toggleMobileMenu() {
            const serverSidebar = document.getElementById('server-sidebar');
            const dmSidebar = document.getElementById('dm-sidebar');
            const overlay = document.getElementById('mobile-overlay');

            serverSidebar.classList.toggle('-translate-x-full');
            dmSidebar.classList.toggle('-translate-x-[350px]');
            overlay.classList.toggle('hidden');
        }

        function toggleProfilePanel() {
            const panel = document.getElementById('profile-panel');
            panel.classList.toggle('hidden');
        }

        function handleKeyPress(e) {
            if (e.key === 'Enter') kirimPesan();
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.appendChild(document.createTextNode(str));
            return div.innerHTML;
        }

        const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms));

        function kirimPesan() {
            const teksText = inputPesan.value.trim();
            if (!teksText) return;

            // Tampilkan pesan user secara langsung di UI
            tampilkanGelembungChat(teksText, 'user');
            inputPesan.value = "";

            // Tambahkan pesan ke antrean buffer
            messageQueue.push(teksText);

            // Reset timer penundaan jika user mengirim pesan baru
            if (typingTimeout) clearTimeout(typingTimeout);

            // Bikin jeda 2.5 detik sebelum AI mulai merespons antrean
            typingTimeout = setTimeout(() => {
                prosesQueuePesan();
            }, 2500);
        }

        async function prosesQueuePesan() {
            if (isProcessingQueue || messageQueue.length === 0) return;

            isProcessingQueue = true;
            btnKirim.disabled = true;

            // Gabungkan semua pesan user yang ada di antrean
            const combinedUserMessages = messageQueue.join("\n");
            messageQueue = []; // Kosongkan antrean

            // Munculkan indikator cl sedang mengetik
            typingIndicator.classList.remove('hidden');
            boxChat.scrollTop = boxChat.scrollHeight;

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const response = await fetch("{{ url('tanya-ai') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ 
                        pesan: combinedUserMessages,
                        prompt: CONFIG.systemPrompt 
                    })
                });

                const data = await response.json();

                if (response.ok && data.status === 'success') {
                    const rawReply = data.jawaban;
                    const lines = rawReply.split('\n').filter(line => line.trim().length > 0);

                    for (let i = 0; i < lines.length; i++) {
                        const lineText = lines[i].trim();
                        const calculatedDelay = Math.min(Math.max(lineText.length * 35, 800), 2500);
                        
                        typingIndicator.classList.remove('hidden');
                        boxChat.scrollTop = boxChat.scrollHeight;
                        await sleep(calculatedDelay);

                        typingIndicator.classList.add('hidden');
                        tampilkanGelembungChat(lineText, 'admin');

                        if (i < lines.length - 1) {
                            await sleep(500);
                        }
                    }
                } else {
                    await sleep(1000);
                    typingIndicator.classList.add('hidden');
                    tampilkanGelembungChat("u-um, my internet is acting up...", 'admin');
                }
            } catch (error) {
                await sleep(1000);
                typingIndicator.classList.add('hidden');
                tampilkanGelembungChat("i lost connection...", 'admin');
            } finally {
                isProcessingQueue = false;
                btnKirim.disabled = false;

                // Cek jika ada pesan tambahan masuk saat request berlangsung
                if (messageQueue.length > 0) {
                    prosesQueuePesan();
                }
            }
        }

        function tampilkanGelembungChat(teks, pengirim) {
            const wrapper = document.createElement('div');
            const waktuFull = new Date().toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true });
            const waktuHover = new Date().toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: false });
            const teksAman = escapeHtml(teks);

            const isGrouped = (lastSender === pengirim);
            lastSender = pengirim;

            const isUser = (pengirim === 'user');
            const displayName = isUser ? CONFIG.user.displayName : CONFIG.doi.displayName;
            const pfpUrl = isUser ? CONFIG.user.pfpUrl : CONFIG.doi.pfpUrl;
            const nameColorClass = isUser ? 'text-[#5865f2]' : 'text-[#f472b6]';

            const hoverActionBarHtml = `
                <div class="absolute -top-3 right-4 hidden group-hover:flex items-center bg-[#313338] border border-[#232428] rounded shadow-md text-[#b5bac1] z-10 overflow-hidden select-none">
                    <button class="px-2 py-1 hover:bg-[#35373c] hover:text-white transition-colors" title="Add Reaction"><i class="fa-solid fa-face-smile text-xs"></i></button>
                    <button class="px-2 py-1 hover:bg-[#35373c] hover:text-white transition-colors" title="Reply"><i class="fa-solid fa-reply text-xs"></i></button>
                    <button class="px-2 py-1 hover:bg-[#35373c] hover:text-white transition-colors" title="Forward"><i class="fa-solid fa-share text-xs"></i></button>
                    <button class="px-2 py-1 hover:bg-[#35373c] hover:text-white transition-colors" title="More"><i class="fa-solid fa-ellipsis text-xs"></i></button>
                </div>
            `;

            if (isGrouped) {
                wrapper.className = "flex items-center gap-4 px-2 py-0.5 rounded hover:bg-[#2e3035] group transition-colors relative min-h-[1.375rem]";
                wrapper.innerHTML = `
                    ${hoverActionBarHtml}
                    <div class="w-10 shrink-0 text-right opacity-0 group-hover:opacity-100 transition-opacity select-none">
                        <span class="text-[10px] text-[#949ba4] font-medium leading-none">${waktuHover}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-[#dbdee1] leading-relaxed break-words select-text">${teksAman}</p>
                    </div>
                `;
            } else {
                wrapper.className = "flex items-start gap-4 px-2 pt-2 pb-0.5 rounded hover:bg-[#2e3035] group transition-colors relative mt-1";
                wrapper.innerHTML = `
                    ${hoverActionBarHtml}
                    <img src="${pfpUrl}" alt="Avatar" class="w-10 h-10 rounded-full object-cover shrink-0 mt-0.5 select-none">
                    <div class="flex flex-col min-w-0 flex-1">
                        <div class="flex items-baseline gap-2 select-none">
                            <span class="text-sm font-semibold ${nameColorClass} hover:underline cursor-pointer">${displayName}</span>
                            <span class="text-[10px] text-[#949ba4] font-medium">${waktuFull}</span>
                        </div>
                        <p class="text-sm text-[#dbdee1] leading-relaxed break-words mt-0.5 select-text">${teksAman}</p>
                    </div>
                `;
            }

            boxChat.appendChild(wrapper);
            boxChat.scrollTop = boxChat.scrollHeight;
        }
    </script>
</body>
</html>