<div class="form-group">
    <x-input-label :for="$name" :value="$label" />
    <input type="text" id="{{ $name }}" name="{{ $name }}" class="form-control" />
    <x-input-error :message="$errors->first($name)" />
</div>