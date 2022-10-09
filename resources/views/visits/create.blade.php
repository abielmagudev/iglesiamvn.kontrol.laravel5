@extends('main')
@section('title', 'Nueva visita')
@section('content')
@include('partials.notifications')
@include('partials.validations')
<div class="card">
	<div class="card-header is-shadowless">
		<div class="card-header-title subtitle">Nueva visita</div>
	</div>
	<div class="card-content">
		<form action="{{ route('visits.store') }}" method="post">
			@include('visits.save')
			<br>
			<button class="button is-success" type="submit">Guardar visita</button>
			<a href="{{ route('visits.index') }}" class="button">Cancelar</a>
		</form>
	</div>
</div>
@endsection