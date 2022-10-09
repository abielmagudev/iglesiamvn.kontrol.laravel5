@if( is_string($pagination->previous) )
<a class="button" href="{{ $pagination->previous }}">Anterior</a>
@else
<button class="button" type="button">Anterior</button>
@endif

@if( is_string($pagination->next) )
<a class="button" href="{{ $pagination->next }}">Siguiente</a>
@else
<button class="button" type="button">Siguiente</button>
@endif