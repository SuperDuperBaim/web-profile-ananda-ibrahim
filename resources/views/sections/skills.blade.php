<section
    id="skills"
    class="scroll-mt-20 px-6 py-20 md:scroll-mt-0"
>
    <div class="mx-auto w-full max-w-5xl">
        <x-section-heading title="Skills" />
        <div class="mt-10 grid gap-8 sm:grid-cols-2">
            @foreach ($skillGroups as $groupIndex => $group)
                <div>
                    <h3
                        class="reveal text-sm font-medium text-muted-foreground"
                        style="--reveal-delay: {{ 100 + $groupIndex * 100 }}ms;"
                    >
                        {{ $group['title'] }}
                    </h3>
                    <div class="mt-3 flex flex-wrap gap-2">
                        @foreach ($group['skills'] as $chipIndex => $skill)
                            <span
                                class="reveal rounded-full border border-border px-3 py-1.5 text-sm transition-colors hover:border-foreground"
                                style="--reveal-delay: {{ 100 + $groupIndex * 100 + $chipIndex * 80 }}ms;"
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
