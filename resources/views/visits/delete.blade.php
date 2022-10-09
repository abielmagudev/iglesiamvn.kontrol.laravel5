@extends('main')
@section('title', 'Visitas')
@section('content')
@component('partials.confirm-delete', [
	'content' => "Eliminarás visita de <b>{$visit->fullname}</b> con fecha <b>{$visit->visited_at->format('l d M, Y')}</b>",
	'submit_route' => route('visits.destroy', $visit),
	'cancel_route' => request()->headers->get('referer'),
])
@endcomponent
@endsection