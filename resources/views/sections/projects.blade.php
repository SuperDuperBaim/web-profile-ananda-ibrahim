<section
    id="projects"
    class="scroll-mt-24 px-6 py-20"
>
    <div class="mx-auto w-full max-w-5xl">
        <x-section-heading title="Projects" />
        
        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($projects as $index => $project)
                <article
                    class="reveal flex flex-col overflow-hidden rounded-xl border border-border bg-card transition-all hover:border-foreground/30 hover:shadow-lg"
                    style="--reveal-delay: {{ 80 + ($index % 3) * 120 }}ms;"
                >
                    <!-- Square Project Image / Banner (Compact for 3-col) -->
                    @if (!empty($project->image))
                        <div class="aspect-square w-full overflow-hidden border-b border-border bg-muted">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition-transform duration-500 hover:scale-105">
                        </div>
                    @else
                        <div
                            class="aspect-square w-full flex items-center justify-center border-b border-border bg-gradient-to-br {{ $project->accent ?? 'from-zinc-900 to-zinc-800' }}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-muted-foreground/40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h8"/>
                                <path d="M10 19v-3.96 3.15"/>
                                <path d="M7 19h5"/>
                                <rect width="6" height="10" x="16" y="12" rx="2"/>
                            </svg>
                        </div>
                    @endif

                    <div class="flex flex-1 flex-col p-5 space-y-3">
                        <div class="space-y-1">
                            <h3 class="text-lg font-bold tracking-tight text-foreground">
                                {{ $project->title }}
                            </h3>
                            @if (!empty($project->role))
                                <div>
                                    <span class="inline-block rounded-full border border-border bg-muted/60 px-2 py-0.5 text-[11px] text-muted-foreground">
                                        {{ $project->role }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <p class="flex-1 text-sm md:text-base leading-relaxed text-muted-foreground line-clamp-3">
                            {{ $project->description }}
                        </p>

                        <div class="flex flex-wrap gap-1.5 pt-1">
                            @if(isset($project->tech) && is_array($project->tech))
                                @foreach ($project->tech as $tech)
                                    <span class="rounded-full border border-border px-2.5 py-0.5 text-xs text-muted-foreground">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            @endif
                        </div>

                        <div class="pt-2 flex flex-wrap gap-4">
                            @if (!empty($project->link))
                                <a
                                    href="{{ $project->link }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-1.5 text-xs font-medium text-muted-foreground transition-colors hover:text-foreground"
                                >
                                    View Link
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M7 7h10v10"/>
                                        <path d="M7 17 17 7"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
