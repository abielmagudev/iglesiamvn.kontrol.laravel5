@extends('main')
@section('title', 'Ministerios')
@section('content')
@component('partials.confirm-delete', [
	'content' => "Eliminarás del ministerio {$ministry->name} a <b>{$member->fullname}</b>",
	'submit_route' => route('ministries.detach', [$ministry->id, $member->pivot->id]),
	'cancel_route' => route('ministries.show', $ministry)
])
	@slot('inputs')
	<input type="hidden" name="member_fullname" value="{{ $member->fullname }}">
	@endslot
@endcomponent
@endsection