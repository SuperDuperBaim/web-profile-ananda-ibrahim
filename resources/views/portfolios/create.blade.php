<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-foreground leading-tight">Tambah Portofolio Baru</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-card border border-border p-6 rounded-xl shadow-sm">
            <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <x-input-label for="title" value="Judul" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus />
                </div>
                <div>
                    <x-input-label for="description" value="Deskripsi" />
                    <textarea id="description" name="description" rows="4" required class="mt-1 block w-full rounded-lg border border-border bg-muted px-3 py-2 text-sm text-foreground placeholder-muted-foreground shadow-sm transition-colors focus:border-foreground/30 focus:outline-none focus:ring-1 focus:ring-foreground/20"></textarea>
                </div>
                <div>
                    <x-input-label for="link" value="Link Proyek (Opsional)" />
                    <x-text-input id="link" name="link" type="url" class="mt-1 block w-full" />
                </div>
                <div>
                    <x-input-label for="image" value="Gambar" />
                    <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-muted-foreground file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-muted file:text-foreground hover:file:bg-muted/80">
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('portfolios.index') }}" class="inline-flex items-center px-4 py-2 bg-muted border border-border rounded-lg font-semibold text-xs text-foreground uppercase tracking-widest shadow-sm hover:bg-muted/80 focus:outline-none transition ease-in-out duration-150">Batal</a>
                    <x-primary-button>Simpan</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
