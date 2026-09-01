<section
    id="experience"
    class="scroll-mt-20 px-6 py-20 md:scroll-mt-0"
>
    <div class="mx-auto w-full max-w-5xl">
        <x-section-heading title="Experience" />
        <div class="mt-10 space-y-12 border-l border-border pl-8">
            @foreach ($experiences as $index => $item)
                <article
                    class="reveal relative"
                    style="--reveal-delay: {{ 100 + $index * 100 }}ms;"
                >
                    <span
                        aria-hidden="true"
                        class="absolute -left-[37px] top-1.5 h-3 w-3 rounded-full bg-foreground"
                    ></span>
                    <p class="text-sm text-muted-foreground">{{ $item->period }}</p>
                    <h3 class="mt-1 text-xl font-semibold tracking-tight">
                        {{ $item->role }}
                    </h3>
                    <p class="mt-0.5 text-sm font-medium text-muted-foreground">
                        {{ $item->company }}
                    </p>
                    <p class="mt-3 max-w-2xl leading-7 text-muted-foreground">
                        {{ $item->description }}
                    </p>
                    @if(is_array($item->tech))
                        <p class="mt-3 text-sm">{{ implode(' · ', $item->tech) }}</p>
                    @endif
                </article>
            @endforeach
        </div>
    </div>
</section>
