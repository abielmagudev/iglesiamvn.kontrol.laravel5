@extends('main')
@section('title', 'Usuarios')
@section('content')
@include('partials.notifications')
@include('partials.validations')
@component('partials.confirm-delete', [
	'content' => "Eliminaras el usuario <b>{$user->name}</b> ({$user->email})",
	'submit_route' => route('users.destroy', $user),
	'cancel_route' => route('users.index'),
])

@slot('inputs')
<input type="hidden" name="name" value="{{ $user->name }}">
@endslot
@endcomponent
@endsection