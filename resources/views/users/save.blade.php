{{ csrf_field() }}
<div class="field">
    <label class="label has-text-weight-normal">Nombre</label>
    <div class="control">
        <input type="text" class="input" name="name" value="{{ old('name', $user->name) }}" required>
    </div>
</div>
<div class="field">
    <label class="label has-text-weight-normal">Nivel</label>
    <div class="control">
        <div class="select">
            <select name="level" required>
                @foreach($levels as $value => $label)
                <option value="{{ $value }}" {{ old('level', $user->level) === $value ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="field">
    <label class="label has-text-weight-normal">Correo electrónico</label>
    <div class="control">
        <input type="email" class="input" name="email" value="{{ old('email', $user->email) }}" required>
    </div>
</div>
<div class="field">

    @if( is_null($user->id) )
    <label class="label has-text-weight-normal">Contrase&ntilde;a</label>
    <div class="control">
        <input type="password" class="input" name="password" required>
    </div>

    @else
    <label class="label has-text-weight-normal">Nueva contrase&ntilde;a</label>
    <div class="control">
        <input type="password" class="input" name="password" placeholder="Para mantener las misma contraseña, ignorar este campo">
    </div>

    @endif
    <p class="help">* Minimo 6 caracteres</p>
</div>