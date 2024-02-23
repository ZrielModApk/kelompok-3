<x-filament-panels::page>
    <form method="post" wire:submit="save">
        {{ $this->form }}
        <button type="submit">Save</button>
    </form>
</x-filament-panels::page>
