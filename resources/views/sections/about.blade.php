<section
    id="about"
    class="scroll-mt-20 px-6 py-20 md:scroll-mt-0"
>
    <div class="mx-auto w-full max-w-5xl">
        <x-section-heading title="About Me" />
        <div
            class="reveal mt-8 rounded-md border border-border bg-card p-8 sm:p-10"
            style="--reveal-delay: 100ms;"
        >
            <p class="text-lg leading-8 text-muted-foreground">
                {{ $site['about'] }}
            </p>
        </div>
    </div>
</section>
