<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-foreground leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <span class="text-xs px-2.5 py-1 rounded-full bg-emerald-500/10 text-emerald-500 font-medium border border-emerald-500/20">
                Online
            </span>
        </div>
    </x-slot>

    <div 
        class="space-y-6"
        x-data="{ 
            visitorCount: {{ $visitorCount ?? 0 }},
            portfolioCount: {{ \App\Models\Portfolio::count() }},
            experienceCount: {{ \App\Models\Experience::count() }},
            init() {
                setInterval(() => {
                    fetch('{{ route('dashboard.stats') }}')
                        .then(r => r.json())
                        .then(data => {
                            this.visitorCount = data.visitorCount;
                            this.portfolioCount = data.portfolioCount;
                            this.experienceCount = data.experienceCount;
                        })
                        .catch(() => {});
                }, 3000);
            }
        }"
    >
        @if (session('status') === 'avatar-updated')
            <div x-data="{ show: true }" x-show="show" x-transition class="p-4 rounded-xl bg-emerald-950/60 border border-emerald-500/30 text-emerald-300 text-sm flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500/20 text-emerald-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                    </div>
                    <span>Foto profil website & admin berhasil diperbarui!</span>
                </div>
                <button @click="show = false" class="text-emerald-400 hover:text-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>
        @endif

        <!-- Stats Overview (Realtime Dynamic) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Pengunjung -->
            <div class="bg-card border border-border overflow-hidden shadow-sm rounded-xl p-6 flex items-center gap-4 hover:border-zinc-700 transition-colors">
                <div class="p-3.5 rounded-xl bg-zinc-900 border border-zinc-800 text-emerald-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </div>
                <div>
                    <span class="text-xs font-medium text-muted-foreground uppercase tracking-wider">Total Pengunjung</span>
                    <p class="mt-1 text-2xl font-bold text-foreground font-mono" x-text="visitorCount">{{ $visitorCount ?? 0 }}</p>
                </div>
            </div>

            <!-- Total Portofolio -->
            <div class="bg-card border border-border overflow-hidden shadow-sm rounded-xl p-6 flex items-center gap-4 hover:border-zinc-700 transition-colors">
                <div class="p-3.5 rounded-xl bg-zinc-900 border border-zinc-800 text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"/>
                    </svg>
                </div>
                <div>
                    <span class="text-xs font-medium text-muted-foreground uppercase tracking-wider">Total Portofolio</span>
                    <p class="mt-1 text-2xl font-bold text-foreground font-mono" x-text="portfolioCount">{{ \App\Models\Portfolio::count() }}</p>
                </div>
            </div>

            <!-- Total Experience -->
            <div class="bg-card border border-border overflow-hidden shadow-sm rounded-xl p-6 flex items-center gap-4 hover:border-zinc-700 transition-colors">
                <div class="p-3.5 rounded-xl bg-zinc-900 border border-zinc-800 text-purple-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="14" x="2" y="7" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                </div>
                <div>
                    <span class="text-xs font-medium text-muted-foreground uppercase tracking-wider">Total Experience</span>
                    <p class="mt-1 text-2xl font-bold text-foreground font-mono" x-text="experienceCount">{{ \App\Models\Experience::count() }}</p>
                </div>
            </div>
        </div>

        <!-- Profile Photo & Account Management -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Ganti Foto Profil (File ATAU URL) -->
            <div 
                class="bg-card border border-border overflow-hidden shadow-sm rounded-xl p-6 flex flex-col justify-between"
                x-data="{ mode: 'file', urlPreview: '' }"
            >
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-base font-semibold text-foreground">Ganti Foto Profil Website</h3>
                            <p class="text-xs text-muted-foreground mt-0.5">Tampil di beranda website & panel admin.</p>
                        </div>
                        
                        <!-- Mode Selector Tabs -->
                        <div class="flex items-center bg-zinc-900 border border-zinc-800 rounded-lg p-0.5 text-xs font-medium">
                            <button 
                                type="button" 
                                @click="mode = 'file'" 
                                :class="mode === 'file' ? 'bg-zinc-800 text-zinc-100 shadow' : 'text-zinc-400 hover:text-zinc-200'"
                                class="px-2.5 py-1 rounded-md transition-colors"
                            >
                                📁 Upload File
                            </button>
                            <button 
                                type="button" 
                                @click="mode = 'url'" 
                                :class="mode === 'url' ? 'bg-zinc-800 text-zinc-100 shadow' : 'text-zinc-400 hover:text-zinc-200'"
                                class="px-2.5 py-1 rounded-md transition-colors"
                            >
                                🔗 Pakai URL
                            </button>
                        </div>
                    </div>

                    <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div class="flex items-center gap-5">
                            <div class="relative shrink-0">
                                @php
                                    $currentAvatar = Auth::user()->avatar;
                                    $avatarSrc = !empty($currentAvatar) 
                                        ? (str_starts_with($currentAvatar, 'http') ? $currentAvatar : asset('storage/' . $currentAvatar)) 
                                        : null;
                                @endphp
                                @if ($avatarSrc)
                                    <img src="{{ $avatarSrc }}" alt="{{ Auth::user()->name }}" class="h-20 w-20 rounded-full object-cover border-2 border-border shadow-sm">
                                @else
                                    <div class="h-20 w-20 rounded-full bg-muted flex items-center justify-center text-xl font-bold text-foreground border-2 border-border">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1 space-y-2">
                                <!-- Mode File Upload -->
                                <div x-show="mode === 'file'">
                                    <label for="avatar" class="block text-xs font-medium text-muted-foreground">Pilih file foto (PNG, JPG, WEBP maks 2MB)</label>
                                    <input 
                                        type="file" 
                                        name="avatar" 
                                        id="avatar" 
                                        accept="image/jpeg,image/png,image/jpg,image/webp" 
                                        class="mt-1 block w-full text-xs text-muted-foreground file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-muted file:text-foreground hover:file:bg-muted/80 cursor-pointer"
                                    >
                                </div>

                                <!-- Mode URL Gambar -->
                                <div x-show="mode === 'url'" style="display: none;">
                                    <label for="avatar_url" class="block text-xs font-medium text-muted-foreground">Masukkan Link / URL Gambar</label>
                                    <input 
                                        type="url" 
                                        name="avatar_url" 
                                        id="avatar_url" 
                                        placeholder="https://images.unsplash.com/... atau link gambar online"
                                        class="mt-1 block w-full rounded-lg border border-border bg-zinc-950/80 px-3 py-2 text-xs text-foreground placeholder-zinc-600 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500"
                                    >
                                </div>

                                @error('avatar')
                                    <p class="text-xs text-red-500">{{ $message }}</p>
                                @enderror
                                @error('avatar_url')
                                    <p class="text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-2 flex justify-end">
                            <x-primary-button>
                                {{ __('Simpan Foto') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Detail Akun -->
            <div class="bg-card border border-border overflow-hidden shadow-sm rounded-xl p-6 flex flex-col justify-between">
                <div>
                    <h3 class="text-base font-semibold text-foreground">Informasi Akun</h3>
                    <p class="text-xs text-muted-foreground mt-1">Detail akun administrator yang sedang aktif.</p>

                    <div class="mt-5 space-y-3 text-sm">
                        <div class="flex justify-between py-2 border-b border-border/50">
                            <span class="text-muted-foreground">Nama</span>
                            <span class="font-medium text-foreground">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-border/50">
                            <span class="text-muted-foreground">Email</span>
                            <span class="font-medium text-foreground">{{ Auth::user()->email }}</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-muted-foreground">Terdaftar Sejak</span>
                            <span class="font-medium text-foreground">{{ Auth::user()->created_at ? Auth::user()->created_at->format('d M Y') : '-' }}</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-muted border border-border rounded-lg font-semibold text-xs text-foreground uppercase tracking-widest hover:bg-muted/80 transition ease-in-out duration-150">
                        Edit Akun & Password
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
