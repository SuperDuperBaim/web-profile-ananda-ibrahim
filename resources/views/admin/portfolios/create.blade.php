<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-foreground leading-tight">
            {{ __('Tambah Portofolio') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-card border border-border overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6 text-card-foreground">
                    <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="title" value="Judul" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="description" value="Deskripsi" />
                            <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-lg border border-border bg-muted px-3 py-2 text-sm text-foreground placeholder-muted-foreground shadow-sm transition-colors focus:border-foreground/30 focus:outline-none focus:ring-1 focus:ring-foreground/20" required></textarea>
                        </div>
                        <div>
                            <x-input-label for="image" value="Gambar" />
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-muted-foreground file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-muted file:text-foreground hover:file:bg-muted/80" accept="image/jpeg,image/png,image/jpg">
                        </div>
                        <div class="flex justify-end gap-3">
                            <x-primary-button>Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
