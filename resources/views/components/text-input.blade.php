@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full rounded-lg border border-border bg-muted px-3 py-2 text-sm text-foreground placeholder-muted-foreground shadow-sm transition-colors focus:border-foreground/30 focus:outline-none focus:ring-1 focus:ring-foreground/20']) }}>
