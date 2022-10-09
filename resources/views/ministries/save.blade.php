{{ csrf_field() }}
<div class="field">
    <label class="label has-text-weight-normal">Nombre</label>
    <div class="control">
        <input type="text" class="input" name="name" value="{{ old('name', $ministry->name) }}" required>
    </div>
    <p class="help is-secondary">Mínimo 3 caracteres</p>
</div>

<div class="field">
    <label class="label has-text-weight-normal">Descripci&oacute;n</label>
    <div class="control">
        <textarea name="description" class="textarea">{{ old('description', $ministry->description) }}</textarea>
    </div>
</div>