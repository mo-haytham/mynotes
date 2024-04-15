<div>
    @if ($isSuccess)
        <span class="mb-4 text-green-500">Note saved successfully.</span>
    @endif

    <div>
        <form wire:submit="save">
            <div>
                <input type="text" wire:model="form.name" class="block mt-1">
                @error('form.name')
                    <span class="mb-4 text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">{{ $isEditMode ? 'Update' : 'Save' }}</button>
            @if ($isEditMode)
                <button type="button" wire:click="cancelEditMode">Cancel</button>
            @endif
        </form>
    </div>

    <div>
        <div>
            <select wire:model.live="categoryId">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <span>Notes</span>
        </div>
        <table>
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->title }}</td>
                    <td>{{ $note->body }}</td>
                </tr>
            @endforeach
        </table>
    </div>


</div>
