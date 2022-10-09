<p class="has-text-gray" style="margin-bottom:1rem"><b>Registro:</b></p>
<!-- Desde -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Desde</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <?php $registered_input = !is_null($member->id) ? $member->registered->format('Y-m-d') : date('Y-m-d') ?>
                <input type="date" class="input" name="registered" value="{{ old('registered', $registered_input) }}">
            </div>
        </div>
    </div>
</div>
<!-- Fotografia -->
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="" class="label has-text-weight-normal has-text-left">Fotografía</label>
    </div>
    <div class="field-body">
        <div class="field">
        
            <div id="file-js-picture" class="file has-name">
                <label class="file-label">
                    <input class="file-input" type="file" name="picture">
                    <div class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">Seleccionar</span>
                    </div>
                    <span class="file-name">(Opcional)</span>
                </label>
            </div>
            <p class="has-text-grey"><small>* Peso máximo de 1MB y formato en JPG</small></p>

            <script>
                const fileInput = document.querySelector('#file-js-picture input[type=file]');
                fileInput.onchange = () => 
                {
                    if (fileInput.files.length > 0)
                    {
                        const fileName = document.querySelector('#file-js-picture .file-name');
                        fileName.textContent = fileInput.files[0].name;
                    }
                }
            </script>

        </div>
    </div>
</div>
<br>
<!-- Activo -->
<label class="checkbox">
  <input type="checkbox" name="is_active" value="1" {{ $member->is_active ? 'checked' : '' }}>
  <b style="margin-right:0.25rem">Activo:</b> <span>Actualmente asiste a nuestros servicios.</span>
</label>
<br>