@extends('main')
@section('title', 'Miembros')
@section('content')
@component('partials.confirm-delete', [
   'content' => "Si eliminas a <b>{$member->fullname}</b> no podras recuperar su información",
   'submit_label' => "Si, eliminar miembro",
   'submit_route' => route('members.destroy', $member),
   'cancel_route' => route('members.show', $member),
])
@endcomponent
@endsection