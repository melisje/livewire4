<?php

namespace App\Livewire;

use App\Models\Production\Checklist;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ChecklistManager extends Component
{
    #[Rule('required|min:3|max:255')]
    public string $name = '';

    #[Rule('nullable|string')]
    public string $remarks = '';

    // ID van de te verwijderen checklist
    public ?int $deletingId = null;

    public function createChecklist(): void
    {
        $this->validate();

        Checklist::create([
            'name' => $this->name,
            'remarks' => $this->remarks,
        ]);

        $this->reset(['name', 'remarks']);
    }

    // ID opslaan en event uitsturen naar de browser
    public function confirmDelete(int $id): void
    {
        $this->deletingId = $id;
        $this->dispatch('open-delete-modal');
    }

    // Verwijderen en modal sluiten
    public function deleteChecklist(): void
    {
        if ($this->deletingId) {
            Checklist::destroy($this->deletingId);
            $this->deletingId = null;
        }

        $this->dispatch('close-delete-modal');
    }

    public function render()
    {
        return view('livewire.checklist-manager', [
            'checklists' => Checklist::latest()->get(),
        ]);
    }
}
