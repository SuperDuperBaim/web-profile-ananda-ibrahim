<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-foreground border border-transparent rounded-lg font-semibold text-xs text-background uppercase tracking-widest hover:bg-foreground/90 focus:bg-foreground/90 active:bg-foreground/80 focus:outline-none focus:ring-2 focus:ring-foreground/30 focus:ring-offset-2 focus:ring-offset-background transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
