<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-foreground leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Visitor Stat Card -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-card border border-border overflow-hidden shadow-sm rounded-xl p-6 flex flex-col items-center justify-center">
                    <span class="text-sm font-medium text-muted-foreground uppercase tracking-wider">Total Pengunjung</span>
                    <span class="mt-2 text-4xl font-bold text-foreground">{{ $visitorCount ?? 0 }}</span>
                </div>
            </div>

            <div class="bg-card border border-border overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6 text-card-foreground">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
