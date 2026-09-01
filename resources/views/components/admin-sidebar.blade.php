<!-- Mobile Menu Toggle Button -->
<button
    id="admin-open-sidebar-btn"
    type="button"
    aria-label="Open menu"
    class="fixed top-4 left-4 z-50 inline-flex h-10 w-10 items-center justify-center rounded-lg border border-border bg-background text-muted-foreground transition-colors hover:bg-muted hover:text-foreground md:hidden"
>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="4" x2="20" y1="12" y2="12"/>
        <line x1="4" x2="20" y1="6" y2="6"/>
        <line x1="4" x2="20" y1="18" y2="18"/>
    </svg>
</button>

<!-- Mobile Overlay Backdrop -->
<div
    id="admin-sidebar-overlay"
    class="fixed inset-0 z-40 bg-black/50 hidden md:hidden"
></div>

<!-- Left Sidebar -->
<aside
    id="admin-sidebar"
    class="fixed inset-y-0 left-0 z-50 flex w-[260px] flex-col border-r border-border bg-sidebar transition-transform duration-300 -translate-x-full md:translate-x-0"
>
    <!-- Header -->
    <div class="flex items-center justify-between gap-3 px-5 pt-5 pb-6">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-foreground">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="16 18 22 12 16 6"/>
                <polyline points="8 6 2 12 8 18"/>
            </svg>
            <span class="text-sm font-semibold tracking-tight">Admin Panel</span>
        </a>
        <button
            id="admin-close-sidebar-btn"
            type="button"
            aria-label="Close menu"
            class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-muted-foreground transition-colors hover:bg-muted hover:text-foreground md:hidden"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"/>
                <path d="m6 6 12 12"/>
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 space-y-1 px-3">
        @php
            $navItems = [
                ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'dashboard'],
                ['label' => 'Portofolio', 'route' => 'portfolios.*', 'href' => route('portfolios.index'), 'icon' => 'folder'],
                ['label' => 'Experience', 'route' => 'experiences.*', 'href' => route('experiences.index'), 'icon' => 'experience'],
                ['label' => 'Profile', 'route' => 'profile.*', 'href' => route('profile.edit'), 'icon' => 'user'],
            ];
        @endphp

        @foreach ($navItems as $item)
            @php
                $isActive = request()->routeIs($item['route']);
                $href = $item['href'] ?? route(str_replace('.*', '', $item['route']));
            @endphp
            <a
                href="{{ $href }}"
                class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition-colors {{ $isActive ? 'bg-muted font-medium text-foreground' : 'text-muted-foreground hover:bg-muted/60 hover:text-foreground' }}"
                @if($isActive) aria-current="page" @endif
            >
                @if ($item['icon'] === 'dashboard')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="7" height="9" x="3" y="3" rx="1"/>
                        <rect width="7" height="5" x="14" y="3" rx="1"/>
                        <rect width="7" height="9" x="14" y="12" rx="1"/>
                        <rect width="7" height="5" x="3" y="16" rx="1"/>
                    </svg>
                @elseif ($item['icon'] === 'folder')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"/>
                        <path d="M8 10v4"/>
                        <path d="M12 10v2"/>
                        <path d="M16 10v6"/>
                    </svg>
                @elseif ($item['icon'] === 'experience')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="14" x="2" y="7" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                @elseif ($item['icon'] === 'user')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                @endif
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>

    <!-- Footer: User & Logout -->
    <div class="border-t border-border p-3">
        <div class="flex items-center gap-3 rounded-lg px-3 py-2">
            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-muted text-sm font-medium text-foreground">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="truncate text-sm font-medium text-foreground">{{ Auth::user()->name }}</p>
                <p class="truncate text-xs text-muted-foreground">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="mt-1 flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm text-muted-foreground transition-colors hover:bg-muted/60 hover:text-foreground"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" x2="9" y1="12" y2="12"/>
                </svg>
                Log Out
            </button>
        </form>
    </div>
</aside>
