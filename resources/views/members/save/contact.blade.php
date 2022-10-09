<p class="has-text-gray" style="margin-bottom:1rem"><b>Contacto:</b></p>
<!-- Direccion -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Dirección</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input type="text" class="input" name="address" value="{{ old('address', $member->address) }}" placeholder="(Opcional) Calle">
            </div>
        </div>
        <div class="field is-narrow">
            <div class="control">
                <input type="text" class="input" name="postcode" value="{{ old('postcode', $member->postcode) }}" placeholder="(Opcional) Postal">
            </div>
        </div>
    </div>
</div>
<!-- Locacion -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Locación</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <?php $value_city = is_null($member->city) ? 'Nuevo Laredo' : '' ?>
                <input type="text" class="input" name="city" value="{{ old('city', $member->city) ?? $value_city }}" placeholder="(Opcional) Ciudad">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <?php $value_state = is_null($member->state) ? 'Tamaulipas' : '' ?>
                <input type="text" class="input" name="state" value="{{ old('state', $member->state) ?? $value_state }}" placeholder="(Opcional) Estado">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <?php $value_country = is_null($member->country) ? 'México' : '' ?>
                <input type="text" class="input" name="country" value="{{ old('country', $member->country) ?? $value_country }}" placeholder="(Opcional) Pais">
            </div>
        </div>
    </div>
</div>
<!-- Telefono -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Teléfono</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input type="text" class="input" name="homephone" value="{{ old('homephone', $member->homephone) }}" placeholder="(Opcional)">
            </div>
        </div>
    </div>
</div>
<!-- Movil -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Móvil</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input type="text" class="input" name="mobilephone" value="{{ old('mobilephone', $member->mobilephone) }}" placeholder="(Opcional)">
            </div>
        </div>
    </div>
</div>
<!-- Email -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Email</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input type="email" class="input" name="email" value="{{ old('email', $member->email) }}" placeholder="(Opcional)">
            </div>
        </div>
    </div>
</div>
<!-- Emergencia -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Emergencia</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <textarea class="textarea" name="emergency" placeholder="Escribe los nombres y números de contacto posibles">{{ old('emergency', $member->emergency) }}</textarea>
            </div>
        </div>
    </div>
</div>
<br>
