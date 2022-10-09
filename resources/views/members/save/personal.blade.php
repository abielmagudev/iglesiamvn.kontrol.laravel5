<p class="has-text-gray" style="margin-bottom:1rem"><b>Personal:</b></p>
<!-- Nombre completo -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Nombre completo</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input type="text" class="input" placeholder="Nombre(s)" name="names" value="{{ old('names', $member->names) }}">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input type="text" class="input" placeholder="Apellido(s)" name="lastnames" value="{{ old('lastnames', $member->lastnames) }}">
            </div>
        </div>
    </div>
</div>
<!-- Fecha de nacimiento -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Nacimiento</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <?php $birthday_input = !is_null($member->id) ? $member->birthday->format('Y-m-d') : null ?>
                <input class="input" type="date" name="birthday" value="{{ old('birthday', $birthday_input) }}">
            </div>
        </div>
    </div>
</div>
<!-- Nacionalidad -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Nacionalidad</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input type="text" class="input" placeholder="(Opcional) Ej. Mexicana" name="citizenship" value="{{ old('citizenship', $member->citizenship) }}">
            </div>
        </div>
    </div>
</div>
<!-- Genero -->
<div class="field is-horizontal">
    <div class="field-label">
        <label for="" class="label has-text-weight-normal has-text-left">Género</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <label class="radio">
                    <?php $checked_gender = is_null($member->gender) ? 'checked' : '' ?>
                    <input type="radio" name="gender" value="f" {{ old('gender', $member->gender) === 'f' ? 'checked' : $checked_gender }}>
                    Femenino
                </label>
                <label class="radio">
                    <input type="radio" name="gender" value="m" {{ old('gender', $member->gender) === 'm' ? 'checked' : '' }}>
                    Masculino
                </label>
            </div>
        </div>
    </div>
</div>
<!-- Estado civil -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Estado civil</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <div class="select">
                    <select name="marital_status">
                        <option label="Desconocido" disaled></option>
                        @foreach($marital_status as $item)
                        <option value="{{ $item }}" {{ old('marital_status', $member->marital_status) === $item ? 'selected' : '' }}>{{ ucfirst($item) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<br>