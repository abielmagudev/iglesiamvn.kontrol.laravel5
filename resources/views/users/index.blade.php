@extends('main')
@section('title', 'Usuarios')
@section('content')
@include('partials.notifications')

@if( $users_filtered->count() > 20 )
<div class="has-text-right">
	@include('partials.pagination-simple')
</div>
<br>
@endif

<div class="card">
	<div class="card-header is-shadowless">
		<div class="card-header-title subtitle">Usuarios</div>
		<div class="card-header-icon">
			<a href="{{ route('users.create') }}" class="button is-link is-small">Nuevo usuario</a>	
		</div>
	</div>
	<div class="card-content">
		<small class="table-container">
			<table class="table is-hoverable is-fullwidth">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Email</th>
						<th colspan="2">Nivel</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users_filtered as $user)
					<tr>
						<td style="white-space:nowrap">{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $levels[ $user->level ] }}</td>
						<td class="has-text-right has-text-nowrap">
							<a href="{{ route('users.edit', $user) }}" class="button is-warning is-small">
								@component('components.icon')
									@slot('icon', 'pencil')
								@endcomponent
							</a>
							<a href="{{ route('users.delete', $user) }}" class="button is-danger is-small">
								@component('components.icon')
									@slot('icon', 'trash')
								@endcomponent
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</small>
	</div>
</div>
@endsection