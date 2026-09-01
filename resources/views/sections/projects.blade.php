<section
    id="projects"
    class="scroll-mt-20 px-6 py-20 md:scroll-mt-0"
>
    <div class="mx-auto w-full max-w-5xl">
        <x-section-heading title="Projects" />
        <div class="mt-10 grid gap-6 sm:grid-cols-2">
            @foreach ($projects as $index => $project)
                <article
                    class="reveal flex flex-col overflow-hidden rounded-xl border border-border bg-card"
                    style="--reveal-delay: {{ 100 + $index * 100 }}ms;"
                >
                    <div
                        class="flex h-44 items-center justify-center border-b border-border bg-gradient-to-br {{ $project->accent ?? 'from-zinc-900 to-zinc-800' }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-muted-foreground" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h8"/>
                            <path d="M10 19v-3.96 3.15"/>
                            <path d="M7 19h5"/>
                            <rect width="6" height="10" x="16" y="12" rx="2"/>
                        </svg>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="text-lg font-semibold tracking-tight">
                            {{ $project->title }}
                        </h3>
                        <p class="mt-2 flex-1 text-sm leading-6 text-muted-foreground">
                            {{ $project->description }}
                        </p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            @if(isset($project->tech) && is_array($project->tech))
                                @foreach ($project->tech as $tech)
                                    <span class="rounded-full border border-border px-2.5 py-1 text-xs">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            @endif
                        </div>
                        <div class="mt-5 flex flex-wrap gap-4">
                            @if (!empty($project->link))
                                <a
                                    href="{{ $project->link }}"
                                    class="inline-flex items-center gap-1 text-sm font-medium text-muted-foreground transition-colors hover:text-foreground"
                                >
                                    View Link
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
