<?php

namespace App\Livewire;

use App\Livewire\Forms\NoteCategory as FormsNoteCategory;
use App\Models\NoteCategory as ModelsNoteCategory;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class NoteCategory extends Component
{
    public FormsNoteCategory $form;

    public bool $isSuccess = false;

    public bool $isEditMode = false;

    public ?Collection $categories = null;

    public ?Collection $notes = null;

    public int $categoryId;

    public ModelsNoteCategory $category;

    public function mount(): void
    {
        $this->categories = ModelsNoteCategory::all();
        $this->category = $this->categories[0];
        $this->categoryId = $this->category->id;
        $this->notes = $this->category->notes;
    }

    public function updatedCategoryId(ModelsNoteCategory $value): void
    {
        $this->category = $value;
        $this->notes = $this->category->notes;
    }

    public function save(): void
    {
        $this->form->save();
        $this->categories = ModelsNoteCategory::all();
    }

    public function render()
    {
        return view('livewire.note-category');
    }
}
