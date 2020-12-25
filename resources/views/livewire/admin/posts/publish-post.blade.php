<div>
    @if($showDateInput)
        <form wire:submit.prevent="publishDate()">
            <input wire:model="publishDate" type="datetime-local" value="{{ $publishDate }}">

            <button type="submit" class="btn-sm btn btn-primary mt-1">Publish At
            </button>
        </form>
    @else
        <button wire:click="publishOrUnpublish({{ $post->id }})" class="btn btn-sm {{ $published ? 'btn-success' : 'btn-secondary'}}">
            <i class="{{ $published ? 'fas fa-check-square' : 'far fa-window-close'  }}"></i>
            {{ $published ? 'Yes' : 'No' }}
        </button>
    @endif
        <p wire:click="showDateInput('true')" class="pointer">{{ $showDateInput ? 'Back >>': 'Date' }}</p>

</div>
