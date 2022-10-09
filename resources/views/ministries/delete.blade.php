@extends('main')
@section('title', 'Ministerios')
@section('content')
@component('partials.confirm-delete', [
	'content' => "Eliminarás el ministerio <b>{$ministry->name}</b>",
	'submit_route' => route('ministries.destroy', $ministry),
	'cancel_route' => route('ministries.show', $ministry)
])
@endcomponent
@endsection