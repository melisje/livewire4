<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header Sectie -->
    <div>
        <flux:heading size="xl">{{ __('Checklists Beheer') }}</flux:heading>
        <flux:subheading>{{ __('Beheer en bekijk alle checklists in het systeem.') }}</flux:subheading>
    </div>

    <!-- Formulier voor nieuwe checklist -->
    <flux:card>
        <form wire:submit="createChecklist" class="space-y-4">
            <flux:input wire:model="name" :label="__('Naam')" placeholder="Bijv. Controle op oplevering..." />

            <flux:textarea wire:model="remarks" :label="__('Opmerkingen')" placeholder="Aanvullende details of opmerkingen..." rows="3" />

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary" icon="plus">
                    {{ __('Checklist Toevoegen') }}
                </flux:button>
            </div>
        </form>
    </flux:card>

    <flux:separator />

    <!-- Lijst van checklists -->
    <div class="space-y-3">
        @forelse($checklists as $checklist)
        <flux:card class="flex items-start justify-between gap-4">
            <div class="space-y-1">
                <flux:heading size="lg">{{ $checklist->name }}</flux:heading>
                @if($checklist->remarks)
                <flux:subheading class="whitespace-pre-line">{{ $checklist->remarks }}</flux:subheading>
                @endif
            </div>

            <!-- Knop triggert de confirmDelete methode -->
            <flux:button wire:click="confirmDelete({{ $checklist->id }})" variant="danger" size="sm" icon="trash">
                {{ __('Verwijder') }}
            </flux:button>
        </flux:card>
        @empty
        <flux:card class="text-center py-8">
            <flux:subheading>{{ __('Er zijn nog geen checklists aanwezig.') }}</flux:subheading>
        </flux:card>
        @endforelse
    </div>

    <!-- Bevestigingsmodal met Flux Alpine API binding -->
    <flux:modal name="confirm-checklist-delete" class="min-w-[22rem]" x-on:open-delete-modal.window="$flux.modal('confirm-checklist-delete').show()" x-on:close-delete-modal.window="$flux.modal('confirm-checklist-delete').close()">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Checklist verwijderen?') }}</flux:heading>
                <flux:subheading>
                    {{ __('Weet je zeker dat je deze checklist wilt verwijderen? Deze actie kan niet ongedaan worden gemaakt.') }}
                </flux:subheading>
            </div>

            <div class="flex gap-2 justify-end">
                <flux:modal.close>
                    <flux:button variant="ghost">{{ __('Annuleren') }}</flux:button>
                </flux:modal.close>

                <flux:button wire:click="deleteChecklist" variant="danger">
                    {{ __('Ja, verwijderen') }}
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>