@extends('main')
@section('title', 'Usuarios')
@section('content')
@include('partials.notifications')
@include('partials.validations')
<div class="card">
	<div class="card-header is-shadowless">
		<div class="card-header-title subtitle">Nuevo usuario</div>
	</div>
	<div class="card-content">
		<form action="{{ route('users.update', $user) }}" method="post" autocomplete="off">
			{{ method_field('put') }}
			@include('users.save')
			<br>
			<button class="button is-warning" type="submit">Actualizar usuario</button>
			<a href="{{ route('users.index') }}" class="button">Regresar</a>
		</form>
	</div>
</div>
@endsection