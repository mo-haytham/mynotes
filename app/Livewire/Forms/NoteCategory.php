<?php

namespace App\Livewire\Forms;

use App\Models\NoteCategory as ModelsNoteCategory;
use Livewire\Attributes\Validate;
use Livewire\Form;

class NoteCategory extends Form
{
    #[Validate('required')]
    public ?string $name;

    public function save(): void
    {
        $this->validate();
        ModelsNoteCategory::create([
            "name" => $this->name,
        ]);

        $this->reset('name');
    }
}
