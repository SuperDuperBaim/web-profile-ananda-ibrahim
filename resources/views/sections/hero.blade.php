<section
    id="home"
    class="flex min-h-dvh scroll-mt-20 flex-col items-center justify-center px-6 pt-32 pb-20 md:scroll-mt-0"
>
    <div class="flex flex-col-reverse md:flex-row items-center justify-center gap-12 md:gap-24 w-full max-w-5xl">
        <div class="text-center md:text-left flex-1">
            <h1
                class="reveal text-4xl font-semibold tracking-tight sm:text-5xl"
                style="--reveal-delay: 80ms;"
            >
                Halo, Saya {{ $site['name'] }}
            </h1>
            <p
                class="reveal mt-3 text-lg font-medium text-muted-foreground"
                style="--reveal-delay: 160ms;"
            >
                {{ $site['title'] }}
            </p>
            <p
                class="reveal mt-5 max-w-xl leading-8 text-muted-foreground"
                style="--reveal-delay: 240ms;"
            >
                {{ $site['intro'] }}
            </p>
        </div>

        <div class="flex-shrink-0">
            <img
                src="{{ asset('profile.jpg') }}"
                alt="{{ $site['name'] }}"
                class="reveal h-48 w-48 md:h-64 md:w-64 rounded-full object-cover"
                style="--reveal-delay: 0ms;"
            />
        </div>
    </div>

    <a
        href="#about"
        aria-label="Scroll to about section"
        class="reveal mt-16 inline-flex h-10 w-10 items-center justify-center rounded-full border border-border text-muted-foreground transition-colors hover:border-foreground hover:text-foreground"
        style="--reveal-delay: 400ms;"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"/>
            <polyline points="19 12 12 19 5 12"/>
        </svg>
    </a>
</section>
