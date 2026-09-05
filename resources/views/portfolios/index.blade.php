<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-foreground leading-tight">Kelola Portofolio</h2>
            <a href="{{ route('portfolios.create') }}" class="inline-flex items-center px-4 py-2 bg-foreground border border-transparent rounded-lg font-semibold text-xs text-background uppercase tracking-widest hover:bg-foreground/90 transition ease-in-out duration-150">Tambah Portofolio</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-card border border-border overflow-hidden shadow-sm sm:rounded-xl p-6">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-900/50 border border-green-500/50 text-green-400 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-border">
                                <th class="py-3 px-4 font-semibold text-muted-foreground">Judul</th>
                                <th class="py-3 px-4 font-semibold text-muted-foreground">Role</th>
                                <th class="py-3 px-4 font-semibold text-muted-foreground">Deskripsi</th>
                                <th class="py-3 px-4 font-semibold text-muted-foreground">Gambar</th>
                                <th class="py-3 px-4 font-semibold text-muted-foreground">Link</th>
                                <th class="py-3 px-4 font-semibold text-muted-foreground">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolios as $portfolio)
                                <tr class="border-b border-border/50 hover:bg-muted/50 transition-colors">
                                    <td class="py-3 px-4 text-foreground font-medium">{{ $portfolio->title }}</td>
                                    <td class="py-3 px-4">
                                        @if($portfolio->role)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-muted text-foreground border border-border">
                                                {{ $portfolio->role }}
                                            </span>
                                        @else
                                            <span class="text-xs text-muted-foreground">-</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-muted-foreground">{{ Str::limit($portfolio->description, 40) }}</td>
                                    <td class="py-3 px-4">
                                        @if($portfolio->image)
                                            <img src="{{ asset('storage/' . $portfolio->image) }}" class="w-12 h-12 object-cover rounded-md border border-border">
                                        @else
                                            <span class="text-xs text-muted-foreground">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        @if($portfolio->link)
                                            <a href="{{ $portfolio->link }}" target="_blank" rel="noopener noreferrer" class="text-xs text-blue-400 hover:underline truncate max-w-[120px] inline-block">
                                                Lihat
                                            </a>
                                        @else
                                            <span class="text-xs text-muted-foreground">-</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-400 font-semibold" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($portfolios->isEmpty())
                                <tr>
                                    <td colspan="6" class="py-8 text-center text-muted-foreground">Belum ada portofolio.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
