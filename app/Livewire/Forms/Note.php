<?php

namespace App\Livewire\Forms;

use App\Models\Note as ModelsNote;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Note extends Form
{
    #[Validate('required')]
    public ?string $title = '';

    #[Validate('required')]
    public ?string $body = '';

    #[Validate('required')]
    public ?int $note_category_id = null;

    public function save(bool $isEditMode, ?ModelsNote $note = null): void
    {
        if ($isEditMode) {
            $note->update([
                "title" => $this->title,
                "body" => $this->body,
                "note_category_id" => $this->note_category_id,
            ]);
        } else {
            ModelsNote::create([
                "user_id" => auth()->id(),
                "title" => $this->title,
                "body" => $this->body,
                "note_category_id" => $this->note_category_id,
            ]);
        }

        $this->reset(['title', 'body', 'note_category_id']);
    }
}
