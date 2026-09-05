<section
    id="experience"
    class="scroll-mt-24 px-6 py-20"
>
    <div class="mx-auto w-full max-w-5xl">
        <!-- Section Heading -->
        <x-section-heading title="Experience" />

        <!-- Experience List -->
        <div class="mt-10 space-y-12">
            @foreach ($experiences as $index => $item)
                @php
                    $techList = is_array($item->tech) ? $item->tech : (is_string($item->tech) ? explode(',', $item->tech) : []);
                    $techString = implode(' · ', array_map('trim', array_filter($techList)));
                @endphp
                <article
                    class="reveal pb-12 border-b border-border last:border-0"
                    style="--reveal-delay: {{ $index * 120 }}ms;"
                >
                    <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-14 md:gap-20">
                        <!-- Year / Period on the LEFT -->
                        <div class="w-20 sm:w-28 shrink-0 text-sm md:text-base font-medium text-muted-foreground">
                            {{ $item->period }}
                        </div>

                        <!-- Details on the RIGHT -->
                        <div class="flex-1 space-y-3">
                            <div>
                                <h3 class="text-xl md:text-2xl font-bold text-foreground">
                                    {{ $item->role }}
                                </h3>
                                <p class="text-base md:text-lg font-medium text-muted-foreground mt-1">
                                    {{ $item->company }}
                                </p>
                            </div>

                            <p class="text-base md:text-lg leading-relaxed text-muted-foreground max-w-3xl">
                                {{ $item->description }}
                            </p>

                            @if(!empty($techString))
                                <p class="text-sm md:text-base text-muted-foreground/80">
                                    {{ $techString }}
                                </p>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
