@extends('layouts.main')
@section('title', 'Iniciar sesion')
@section('content')

	<div class="columns">
		<div class="column is-two-fifths is-offset-one-third">
			<div class="box">
				@include('partials.notifications')
				@include('partials.errors')
				
				<p class="title">Bienvenido</p>
				<form action="{{ route('logging') }}" method="post" autocomplete="on">
					{{ csrf_field() }}

					<div class="field">
						<label class="label">Email</label>
						<div class="control">
							<input type="email" name="email" value="{{ old('name') }}" class="input" required>
						</div>
					</div>
					<div class="field">
						<label class="label">Password</label>
						<div class="control">
							<input type="password" name="password" class="input" required>
						</div>
					</div>

					<button class="button is-primary">
						<span>Iniciar sesion</span>
					</button>
				</form>
			</div>
		</div>
	</div>

@stop