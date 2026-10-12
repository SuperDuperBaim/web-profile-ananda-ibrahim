<!-- Mobile Top Header Bar (visible on mobile < md) -->
<header
    id="mobile-header-bar"
    class="fixed top-0 inset-x-0 z-40 h-14 border-b border-border bg-background/80 backdrop-blur-md flex items-center justify-between px-5 md:hidden"
>
    <span class="text-base font-bold tracking-tight text-foreground font-mono">foolstuck_</span>
    <button
        id="open-mobile-sidebar-btn"
        type="button"
        aria-label="Open menu"
        class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-border bg-muted/50 text-foreground transition-colors hover:bg-muted"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="18" height="18" x="3" y="3" rx="2"/>
            <path d="M9 3v18"/>
        </svg>
    </button>
</header>

<!-- Mobile Overlay Backdrop -->
<div
    id="sidebar-overlay"
    class="fixed inset-0 z-40 bg-black/60 backdrop-blur-xs hidden md:hidden transition-opacity duration-300"
></div>

<!-- Gemini-style Collapsible Sidebar -->
<aside
    id="site-sidebar"
    class="fixed inset-y-0 left-0 z-50 flex flex-col border-r border-border bg-sidebar transition-all duration-300 ease-in-out -translate-x-full md:translate-x-0 w-[240px]"
>
    <!-- Header: foolstuck_ & Gemini-style Toggle Button -->
    <div class="sidebar-header flex items-center justify-between px-4 pt-5 pb-3 transition-all duration-300">
        <span class="sidebar-brand text-base font-bold tracking-tight text-foreground font-mono whitespace-nowrap overflow-hidden transition-all duration-300">
            foolstuck_
        </span>
        <button
            id="toggle-sidebar-btn"
            type="button"
            aria-label="Toggle sidebar"
            title="Toggle sidebar"
            class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-lg text-muted-foreground transition-all duration-200 hover:bg-muted hover:text-foreground active:scale-95"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2"/>
                <path d="M9 3v18"/>
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 space-y-1.5 px-3 mt-3">
        @foreach ($navItems as $item)
            @php
                $isActive = $item['href'] === '#home';
            @endphp
            <a
                href="{{ $item['href'] }}"
                title="{{ $item['label'] }}"
                class="nav-link group relative flex items-center gap-3.5 rounded-xl px-3 py-2.5 text-sm transition-all duration-200 {{ $isActive ? 'bg-muted font-medium text-foreground' : 'text-muted-foreground hover:bg-muted/60 hover:text-foreground' }}"
                @if($isActive) aria-current="page" @endif
            >
                <div class="flex h-5 w-5 shrink-0 items-center justify-center">
                    @if ($item['href'] === '#home')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    @elseif ($item['href'] === '#experience')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="7" rx="2" ry="2"/>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                        </svg>
                    @elseif ($item['href'] === '#projects')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"/>
                            <path d="M8 10v4"/>
                            <path d="M12 10v2"/>
                            <path d="M16 10v6"/>
                        </svg>
                    @elseif ($item['href'] === '#skills')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    @elseif ($item['href'] === '#contact')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2"/>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                    @endif
                </div>
                <span class="nav-label whitespace-nowrap overflow-hidden transition-all duration-200">
                    {{ $item['label'] }}
                </span>
            </a>
        @endforeach
    </nav>
</aside>
