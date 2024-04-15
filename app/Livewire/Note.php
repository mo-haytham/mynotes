<?php

namespace App\Livewire;

use App\Livewire\Forms\Note as FormsNote;
use App\Models\Note as ModelsNote;
use App\Models\NoteCategory;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Note extends Component
{
    public bool $isSuccess = false;

    public ?Collection $notes;

    public FormsNote $form;

    public ?ModelsNote $note = null;

    public ?Collection $note_categories;

    public bool $isEditMode = false;

    public function mount(): void
    {
        $this->note_categories = NoteCategory::select('id', 'name')->get();
        $this->form->note_category_id = $this->note_categories[0]->id;
    }


    public function save(): void
    {
        $this->validate();
        $this->form->save($this->isEditMode, $this->note);
        $this->cancelEditMode();
        $this->isSuccess = true;
    }

    public function enableEditMode(ModelsNote $note): void
    {
        $this->form->title = $note->title;
        $this->form->body = $note->body;
        $this->form->note_category_id = $note->note_category_id;

        $this->note = $note;
        $this->isEditMode = true;
    }

    public function cancelEditMode(): void
    {
        $this->isEditMode = false;
        $this->form->reset('title', 'body', 'note_category_id');
        $this->form->note_category_id = $this->note_categories[0]->id;
    }

    public function delete(ModelsNote $note): void
    {
        $note->delete();
    }

    public function render()
    {
        $this->notes = ModelsNote::all();
        return view('livewire.note');
    }
}
