@extends('main')
@section('title', 'Nuevo usuario')
@section('content')
@include('partials.notifications')
@include('partials.validations')
<div class="card">
	<div class="card-header is-shadowless">
		<div class="card-header-title subtitle">Nuevo usuario</div>
	</div>
	<div class="card-content">
		<form action="{{ route('users.store') }}" method="post" autocomplete="off">
			@include('users.save')
			<br>
			<button class="button is-success" type="submit">Guardar usuario</button>
			<a href="{{ route('users.index') }}" class="button">Cancelar</a>
		</form>
	</div>
</div>
@endsection