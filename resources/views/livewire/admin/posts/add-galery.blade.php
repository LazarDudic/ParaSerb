<div class="form-group mt-3 mb-3">
    <button class="btn btn-sm btn-info mb-3" wire:click.prevent="toggleGalery()" >{{ $addGalery ? 'Remove Galery': 'AddGalery' }}</button>

    @if ($addGalery)
        @if ($oldGalery)
            @foreach ($oldGalery as $photo)
                <input type="text" class="form-control mb-1" name="galery[]" value="{{ $photo }}" required>
            @endforeach
        @else
            @for ($i = 0; $i < $photoCount; $i++)
                <input type="text" class="form-control mb-1" name="galery[]" placeholder="Image URL" required>
            @endfor
        @endif
    

        <div class="d-flex pt-2">
            <button class="btn btn-sm btn-success mr-2" wire:click.prevent="addInput()">Add Input</button>
            <button class="btn btn-sm btn-warning" wire:click.prevent="removeInput()">Remove Input</button>
        </div>
    @endif
</div>
