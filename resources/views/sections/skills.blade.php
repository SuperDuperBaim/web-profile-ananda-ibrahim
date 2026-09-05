<section
    id="skills"
    class="scroll-mt-24 px-6 py-20"
>
    <div class="mx-auto w-full max-w-5xl">
        <x-section-heading title="Skills" />
        <div class="mt-10 grid gap-8 sm:grid-cols-2">
            @foreach ($skillGroups as $groupIndex => $group)
                <div class="reveal" style="--reveal-delay: {{ 80 + $groupIndex * 120 }}ms;">
                    <h3
                        class="text-xl md:text-2xl font-bold tracking-tight text-foreground"
                    >
                        {{ $group['title'] }}
                    </h3>
                    <div class="mt-4 flex flex-wrap gap-2.5">
                        @foreach ($group['skills'] as $chipIndex => $skill)
                            <span
                                class="rounded-full border border-border px-3.5 py-1.5 text-sm md:text-base text-muted-foreground transition-colors hover:border-foreground hover:text-foreground"
                            >
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
