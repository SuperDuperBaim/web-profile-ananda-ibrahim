<section
    id="contact"
    class="scroll-mt-20 px-6 py-20 md:scroll-mt-0"
>
    <div class="mx-auto w-full max-w-5xl">
        <x-section-heading title="Contact" />
        <h3
            class="reveal mt-6 text-2xl font-semibold tracking-tight"
            style="--reveal-delay: 100ms;"
        >
            Let's work together.
        </h3>
        <p
            class="reveal mt-3 max-w-2xl leading-7 text-muted-foreground"
            style="--reveal-delay: 200ms;"
        >
            Have a project, opportunity, or idea you'd like to discuss?
            Feel free to contact me.
        </p>

        <div class="mt-8 grid gap-3 sm:grid-cols-3">
            @foreach ($contactLinks as $index => $link)
                <a
                    href="{{ $link['href'] }}"
                    @if (str_starts_with($link['href'], 'http'))
                        target="_blank"
                        rel="noopener noreferrer"
                    @endif
                    class="reveal flex items-center gap-3 rounded-md border border-border bg-card p-4 transition-colors hover:border-foreground"
                    style="--reveal-delay: {{ 300 + $index * 80 }}ms;"
                >
                    @if ($link['type'] === 'mail')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 text-muted-foreground" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2"/>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                    @elseif ($link['type'] === 'github')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 text-muted-foreground" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="6" x2="6" y1="3" y2="15"/>
                            <circle cx="18" cy="6" r="3"/>
                            <circle cx="6" cy="18" r="3"/>
                            <path d="M18 9a9 9 0 0 1-9 9"/>
                        </svg>
                    @elseif ($link['type'] === 'linkedin')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 text-muted-foreground" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 17H7A5 5 0 0 1 7 7h2"/>
                            <path d="M15 7h2a5 5 0 1 1 0 10h-2"/>
                            <line x1="8" x2="16" y1="12" y2="12"/>
                        </svg>
                    @endif

                    <div class="min-w-0">
                        <p class="text-sm font-medium">{{ $link['label'] }}</p>
                        <p class="truncate text-sm text-muted-foreground">
                            {{ $link['value'] }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
