<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('experiences.index') }}" class="text-muted-foreground hover:text-foreground transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-foreground leading-tight">Edit Experience</h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-card border border-border p-6 rounded-xl shadow-sm">
            <form action="{{ route('experiences.update', $experience->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="period" value="Periode (Contoh: 2021 - Present)" />
                    <x-text-input id="period" name="period" type="text" class="mt-1 block w-full" required autofocus
                        value="{{ old('period', $experience->period) }}" />
                    @error('period')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-input-label for="role" value="Peran (Role)" />
                    <select id="role" name="role" required
                        class="mt-1 block w-full rounded-lg border border-border bg-muted px-3 py-2 text-sm text-foreground shadow-sm transition-colors focus:border-foreground/30 focus:outline-none focus:ring-1 focus:ring-foreground/20">
                        <option value="">-- Pilih Role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ old('role', $experience->role) === $role ? 'selected' : '' }}>{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-input-label for="company" value="Perusahaan" />
                    <x-text-input id="company" name="company" type="text" class="mt-1 block w-full" required
                        value="{{ old('company', $experience->company) }}" />
                    @error('company')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-input-label for="description" value="Deskripsi" />
                    <textarea id="description" name="description" rows="4" required
                        class="mt-1 block w-full rounded-lg border border-border bg-muted px-3 py-2 text-sm text-foreground placeholder-muted-foreground shadow-sm transition-colors focus:border-foreground/30 focus:outline-none focus:ring-1 focus:ring-foreground/20">{{ old('description', $experience->description) }}</textarea>
                    @error('description')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-input-label for="tech" value="Teknologi (Pisahkan dengan koma)" />
                    <x-text-input id="tech" name="tech" type="text" class="mt-1 block w-full"
                        placeholder="Laravel, Tailwind CSS, Vue.js"
                        value="{{ old('tech', is_array($experience->tech) ? implode(', ', $experience->tech) : $experience->tech) }}" />
                    @error('tech')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-border/50">
                    <a href="{{ route('experiences.index') }}" class="inline-flex items-center px-4 py-2 bg-muted border border-border rounded-lg font-semibold text-xs text-foreground uppercase tracking-widest shadow-sm hover:bg-muted/80 focus:outline-none transition ease-in-out duration-150">Batal</a>
                    <x-primary-button>Simpan Perubahan</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
