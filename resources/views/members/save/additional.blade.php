<p class="has-text-gray" style="margin-bottom:1rem"><b>Adicional:</b></p>
<!-- Profesiones -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Profesiónes</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input type="text" class="input" name="professions" value="{{ old('professions', $member->professions) }}" placeholder="(Opcional) Ej. Licenciado en derecho, técnico...">
            </div>
        </div>
    </div>
</div>
<!-- Ocupaciones -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Ocupaciones</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input type="text" class="input" name="occupations" value="{{ old('occupations', $member->occupations) }}" placeholder="(Opcional) Ej. Ama de casa, empresario">
            </div>
        </div>
    </div>
</div>
<br>
