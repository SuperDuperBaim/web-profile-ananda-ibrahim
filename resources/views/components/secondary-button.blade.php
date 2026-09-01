<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-muted border border-border rounded-lg font-semibold text-xs text-foreground uppercase tracking-widest shadow-sm hover:bg-muted/80 focus:outline-none focus:ring-2 focus:ring-foreground/20 focus:ring-offset-2 focus:ring-offset-background disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
