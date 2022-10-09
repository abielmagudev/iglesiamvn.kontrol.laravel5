@extends('main')
@section('title', 'Mi cuenta')
@section('content')
@include('partials.notifications')
@include('partials.validations')
<div class="card">
	<div class="card-header is-shadowless">
		<div class="card-header-title subtitle">Mi cuenta</div>
	</div>
	<div class="card-content">
		<form action="{{ route('account.update') }}" method="post" autocomplete="off">
			{{ method_field('put') }}
			{{ csrf_field() }}

			<div class="field">
				<label class="label has-text-weight-normal">Nombre</label>
				<div class="control">
					<input type="text" class="input" name="name" value="{{ $auth->name }}" required>
				</div>
			</div>
			<div class="field">
				<label class="label has-text-weight-normal">Email</label>
				<div class="control">
					<input type="text" class="input" value="{{ $auth->email }}" disabled>
				</div>
				<p class="help has-text-danger">* NO MODIFICABLE</p>
			</div>
			<div class="field">
				<label class="label has-text-weight-normal">Nueva contraseña</label>
				<div class="control">
					<input type="text" class="input" name="password">
					<p class="help">* Minimo 6 caracteres</p>
				</div>
			</div>
			<br>
			<button class="button is-warning">Actualizar mi cuenta</button>
		</form>
	</div>
</div>
<br>
<p class="has-text-right">
	<small>Ultima actualización {{ $auth->updated_at }}</small>
</p>
@stop