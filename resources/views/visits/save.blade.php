{{ csrf_field() }}
<div class="field" style="margin-bottom:1rem">
    <label class="checkbox">
        <input type="checkbox" name="attended" value="1" {{ old('attended', $visit->attended) ? 'checked' : '' }}>
        <span><b>Atendida:</b> Se logro contactar y recibir respuesta de la visita.</span>
    </label>
</div>
<div class="field">
    <label class="label has-text-weight-normal">Nombre</label>
    <div class="control">
        <input type="text" class="input" name="fullname" value="{{ old('fullname', $visit->fullname) }}" required>
    </div>
</div>
<div class="field">
    <label class="label has-text-weight-normal">Fecha de visita</label>
    <div class="control">
        <?php $visited_at = !is_null($visit->id) ? $visit->visited_at->format('Y-m-d') : null ?>
        <input type="date" class="input" name="visited_at" value="{{ old('visited_at', $visited_at) }}" required>
    </div>
</div>
<div class="field">
    <label class="label has-text-weight-normal">Contacto</label>
    <div class="control">
        <input type="text" class="input" name="contact" value="{{ old('contact', $visit->contact) }}" required>
    </div>
</div>
<div class="field">
    <label class="label has-text-weight-normal">Como llego a nosotros?</label>
    <div class="control">
        <textarea class="textarea" name="came_us" required>{{ old('came_us', $visit->came_us) }}</textarea>
    </div>
</div>
<div class="field">
    <label class="label has-text-weight-normal">Notas</label>
    <div class="control">
        <textarea class="textarea" name="notes">{{ old('notes', $visit->notes) }}</textarea>
    </div>
</div>