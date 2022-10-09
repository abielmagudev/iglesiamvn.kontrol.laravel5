@extends('main')
@section('title', 'Editar visita')
@section('content')
@include('partials.notifications')
@include('partials.validations')
<div class="card">
	<div class="card-header is-shadowless">
		<div class="card-header-title subtitle">Editar visita</div>
	</div>
	<div class="card-content">
		<form action="{{ route('visits.update', $visit) }}" method="post">
			{{ method_field('put') }}
			@include('visits.save')
			<br>
			<button class="button is-warning" type="submit">Actualizar visita</button>
			<a href="{{ route('visits.index') }}" class="button">Regresar</a>
		</form>
	</div>
</div>
@endsection