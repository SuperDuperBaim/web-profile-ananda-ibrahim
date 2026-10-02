<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-foreground leading-tight">Tambah Portofolio Baru</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-card border border-border p-6 rounded-xl shadow-sm">
            <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <x-input-label for="title" value="Judul Proyek" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus placeholder="Contoh: Aplikasi Kasir UMKM" />
                    @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-input-label for="role" value="Role / Kategori" />
                    <select id="role" name="role" class="mt-1 block w-full rounded-lg border border-border bg-muted px-3 py-2 text-sm text-foreground shadow-sm transition-colors focus:border-foreground/30 focus:outline-none focus:ring-1 focus:ring-foreground/20">
                        <option value="">-- Pilih Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-input-label for="description" value="Deskripsi" />
                    <textarea id="description" name="description" rows="4" required placeholder="Jelaskan fitur dan teknologi yang kamu gunakan pada proyek ini..." class="mt-1 block w-full rounded-lg border border-border bg-muted px-3 py-2 text-sm text-foreground placeholder-muted-foreground shadow-sm transition-colors focus:border-foreground/30 focus:outline-none focus:ring-1 focus:ring-foreground/20">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-input-label for="tech" value="Tech Stack (Pisahkan dengan koma, contoh: Laravel, HTML, Tailwind CSS)" />
                    <x-text-input id="tech" name="tech" type="text" class="mt-1 block w-full" placeholder="Laravel, HTML, Tailwind CSS" value="{{ old('tech') }}" />
                    @error('tech')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-input-label for="link" value="Link Proyek (Opsional)" />
                    <x-text-input id="link" name="link" type="url" class="mt-1 block w-full" placeholder="https://github.com/..." value="{{ old('link') }}" />
                    @error('link')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar Proyek: Opsi File ATAU URL -->
                <div x-data="{ imgMode: 'file' }" class="space-y-2">
                    <div class="flex items-center justify-between">
                        <x-input-label value="Gambar Proyek (Opsional)" />
                        
                        <div class="flex items-center bg-zinc-900 border border-zinc-800 rounded-lg p-0.5 text-xs font-medium">
                            <button 
                                type="button" 
                                @click="imgMode = 'file'" 
                                :class="imgMode === 'file' ? 'bg-zinc-800 text-zinc-100 shadow' : 'text-zinc-400 hover:text-zinc-200'"
                                class="px-2.5 py-1 rounded-md transition-colors"
                            >
                                📁 Upload File
                            </button>
                            <button 
                                type="button" 
                                @click="imgMode = 'url'" 
                                :class="imgMode === 'url' ? 'bg-zinc-800 text-zinc-100 shadow' : 'text-zinc-400 hover:text-zinc-200'"
                                class="px-2.5 py-1 rounded-md transition-colors"
                            >
                                🔗 Pakai URL
                            </button>
                        </div>
                    </div>

                    <!-- Mode File -->
                    <div x-show="imgMode === 'file'">
                        <input 
                            type="file" 
                            id="image" 
                            name="image" 
                            accept="image/jpeg,image/png,image/jpg,image/webp"
                            class="mt-1 block w-full text-sm text-muted-foreground file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-muted file:text-foreground hover:file:bg-muted/80 cursor-pointer"
                        >
                    </div>

                    <!-- Mode URL -->
                    <div x-show="imgMode === 'url'" style="display: none;">
                        <input 
                            type="url" 
                            id="image_url" 
                            name="image_url" 
                            placeholder="https://images.unsplash.com/... atau link gambar online lainnya"
                            class="mt-1 block w-full rounded-lg border border-border bg-zinc-950/80 px-3 py-2 text-sm text-foreground placeholder-zinc-600 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500"
                        >
                    </div>

                    @error('image')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    @error('image_url')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-border/50">
                    <a href="{{ route('portfolios.index') }}" class="inline-flex items-center px-4 py-2 bg-muted border border-border rounded-lg font-semibold text-xs text-foreground uppercase tracking-widest shadow-sm hover:bg-muted/80 focus:outline-none transition ease-in-out duration-150">Batal</a>
                    <x-primary-button>Simpan Portofolio</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
