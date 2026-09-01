@props(['title', 'description' => null])

<div class="reveal" style="--reveal-delay: 0ms;">
    <h2 class="text-3xl font-semibold tracking-tight">{{ $title }}</h2>
    @if ($description)
        <p class="mt-4 max-w-2xl leading-8 text-muted-foreground">
            {{ $description }}
        </p>
    @endif
</div>
