<div>
    @if ($isSuccess)
        <span class="mb-4 text-green-500">Note saved successfully.</span>
    @endif

    <form wire:submit="save">
        <div>
            <input type="text" wire:model="form.title" class="block mt-1">
            @error('form.title')
                <span class="mb-4 text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <textarea wire:model="form.body" class="block mt-1"></textarea>
            @error('form.body')
                <span class="mb-4 text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <select wire:model.live="form.note_category_id" class="block mt-1">
                @foreach ($note_categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('form.note_category_id')
                <span class="mb-4 text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">{{ $isEditMode ? 'Update' : 'Save' }}</button>
        @if ($isEditMode)
            <button type="button" wire:click="cancelEditMode">Cancel</button>
        @endif
    </form>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="p-40">
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td>{{ $note->title }}</td>
                    <td>{{ $note->note_category->name }}</td>
                    <td>
                        <button wire:click="enableEditMode({{ $note->id }})">Edit</button>
                        <button wire:click="delete({{ $note->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
