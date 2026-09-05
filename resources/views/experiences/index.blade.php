<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-foreground leading-tight">Kelola Experience</h2>
            <a href="{{ route('experiences.create') }}" class="inline-flex items-center px-4 py-2 bg-foreground border border-transparent rounded-lg font-semibold text-xs text-background uppercase tracking-widest hover:bg-foreground/90 transition ease-in-out duration-150">Tambah Experience</a>
        </div>
    </x-slot>

    <div class="py-6" x-data="{ showDeleteModal: false, deleteUrl: '', itemTitle: '' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-card border border-border overflow-hidden shadow-sm sm:rounded-xl p-6">
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-transition class="mb-6 flex items-center justify-between p-4 bg-emerald-950/60 border border-emerald-500/30 text-emerald-300 rounded-xl">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-500/20 text-emerald-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium">{{ session('success') }}</span>
                        </div>
                        <button @click="show = false" class="text-emerald-400 hover:text-emerald-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"/>
                                <line x1="6" y1="6" x2="18" y2="18"/>
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-border">
                                <th class="py-3 px-4 font-semibold text-muted-foreground">Periode</th>
                                <th class="py-3 px-4 font-semibold text-muted-foreground">Peran (Role)</th>
                                <th class="py-3 px-4 font-semibold text-muted-foreground">Perusahaan</th>
                                <th class="py-3 px-4 font-semibold text-muted-foreground text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($experiences as $experience)
                                <tr class="border-b border-border/50 hover:bg-muted/50 transition-colors">
                                    <td class="py-3 px-4 text-foreground font-mono text-xs">{{ $experience->period }}</td>
                                    <td class="py-3 px-4 text-foreground font-medium">{{ $experience->role }}</td>
                                    <td class="py-3 px-4 text-muted-foreground">{{ $experience->company }}</td>
                                    <td class="py-3 px-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a
                                                href="{{ route('experiences.edit', $experience->id) }}"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-amber-400 bg-amber-500/10 border border-amber-500/20 hover:bg-amber-500/20 hover:text-amber-300 transition-colors"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            <button
                                                type="button"
                                                @click="showDeleteModal = true; deleteUrl = '{{ route('experiences.destroy', $experience->id) }}'; itemTitle = '{{ e($experience->role . ' - ' . $experience->company) }}'"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-rose-400 bg-rose-500/10 border border-rose-500/20 hover:bg-rose-500/20 hover:text-rose-300 transition-colors"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6"/>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if($experiences->isEmpty())
                                <tr>
                                    <td colspan="4" class="py-8 text-center text-muted-foreground">Belum ada data experience.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Custom Dark Glassmorphism Delete Confirmation Modal -->
        <div 
            x-show="showDeleteModal" 
            x-cloak
            x-transition:enter="ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
        >
            <div 
                @click.away="showDeleteModal = false"
                x-show="showDeleteModal"
                x-transition:enter="ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="w-full max-w-md bg-zinc-900 border border-zinc-800 rounded-2xl p-6 shadow-2xl space-y-5"
            >
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-rose-500/10 text-rose-400 border border-rose-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18"/>
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                            <line x1="10" y1="11" x2="10" y2="17"/>
                            <line x1="14" y1="11" x2="14" y2="17"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-zinc-100">Konfirmasi Hapus</h3>
                        <p class="text-xs text-zinc-400 mt-0.5" x-text="itemTitle"></p>
                    </div>
                </div>

                <p class="text-sm text-zinc-300 leading-relaxed">
                    Apakah Anda yakin ingin menghapus data experience ini? Tindakan ini <span class="text-rose-400 font-medium">tidak dapat dibatalkan</span>.
                </p>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button 
                        type="button" 
                        @click="showDeleteModal = false"
                        class="px-4 py-2 text-xs font-semibold text-zinc-400 hover:text-zinc-200 bg-zinc-800 hover:bg-zinc-700 rounded-xl transition-colors"
                    >
                        Batal
                    </button>

                    <form :action="deleteUrl" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit"
                            class="px-4 py-2 text-xs font-semibold text-white bg-rose-600 hover:bg-rose-500 rounded-xl shadow-lg shadow-rose-600/20 transition-all"
                        >
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
