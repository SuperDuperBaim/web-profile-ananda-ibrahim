<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-foreground leading-tight">Tambah Experience Baru</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-card border border-border p-6 rounded-xl shadow-sm">
            <form action="{{ route('experiences.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <x-input-label for="period" value="Periode (Contoh: 2021 - Present)" />
                    <x-text-input id="period" name="period" type="text" class="mt-1 block w-full" required autofocus />
                </div>
                <div>
                    <x-input-label for="role" value="Peran (Role)" />
                    <select id="role" name="role" required
                        class="mt-1 block w-full rounded-lg border border-border bg-muted px-3 py-2 text-sm text-foreground shadow-sm transition-colors focus:border-foreground/30 focus:outline-none focus:ring-1 focus:ring-foreground/20">
                        <option value="">-- Pilih Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-input-label for="company" value="Perusahaan" />
                    <x-text-input id="company" name="company" type="text" class="mt-1 block w-full" required />
                </div>
                <div>
                    <x-input-label for="description" value="Deskripsi" />
                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-lg border border-border bg-muted px-3 py-2 text-sm text-foreground placeholder-muted-foreground shadow-sm transition-colors focus:border-foreground/30 focus:outline-none focus:ring-1 focus:ring-foreground/20" required></textarea>
                </div>
                <div>
                    <x-input-label for="tech" value="Teknologi (Pisahkan dengan koma)" />
                    <x-text-input id="tech" name="tech" type="text" class="mt-1 block w-full" placeholder="Laravel, Tailwind CSS, Vue.js" />
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('experiences.index') }}" class="inline-flex items-center px-4 py-2 bg-muted border border-border rounded-lg font-semibold text-xs text-foreground uppercase tracking-widest shadow-sm hover:bg-muted/80 focus:outline-none transition ease-in-out duration-150">Batal</a>
                    <x-primary-button>Simpan</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
