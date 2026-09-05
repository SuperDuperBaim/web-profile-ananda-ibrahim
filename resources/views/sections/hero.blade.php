<section
    id="home"
    class="flex min-h-dvh scroll-mt-20 flex-col items-center justify-center px-6 pt-24 pb-16 md:scroll-mt-0"
>
    <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-8 md:gap-14 w-full max-w-4xl mx-auto">
        <div class="text-center md:text-left flex-1 max-w-lg">
            <h1
                class="reveal text-3xl font-semibold tracking-tight sm:text-4xl md:text-5xl"
                style="--reveal-delay: 80ms;"
            >
                Halo, Saya {{ $site['name'] }}
            </h1>
            <p
                class="reveal mt-3 text-base md:text-lg font-medium text-muted-foreground"
                style="--reveal-delay: 160ms;"
            >
                {{ $site['title'] }}
            </p>
            <p
                class="reveal mt-5 leading-relaxed text-muted-foreground text-base md:text-lg"
                style="--reveal-delay: 240ms;"
            >
                {{ $site['intro'] }}
            </p>
        </div>

        <div class="flex-shrink-0 flex items-center justify-center">
            <img
                src="{{ asset('profile.jpg') }}"
                alt="{{ $site['name'] }}"
                class="reveal h-48 w-48 sm:h-56 sm:w-56 md:h-60 md:w-60 rounded-full object-cover border border-border/60 shadow-2xl"
                style="--reveal-delay: 0ms;"
            />
        </div>
    </div>

    <a
        href="#experience"
        aria-label="Scroll to experience section"
        class="reveal mt-14 inline-flex h-10 w-10 items-center justify-center rounded-full border border-border text-muted-foreground transition-colors hover:border-foreground hover:text-foreground"
        style="--reveal-delay: 320ms;"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"/>
            <polyline points="19 12 12 19 5 12"/>
        </svg>
    </a>
</section>
