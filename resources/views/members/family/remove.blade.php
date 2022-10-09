@extends('main')
@section('title', 'Miembros')
@section('content')
<?php
$relationship = $member->id === $member->family->pivot->member_id
              ? "<b>{$member->fullname}</b> ({$member->family->pivot->member_relationship}) y <b>{$member->family->fullname}</b> ({$member->family->pivot->family_relationship})"
              : "<b>{$member->fullname}</b> ({$member->family->pivot->family_relationship}) y <b>{$member->family->fullname}</b> ({$member->family->pivot->member_relationship})";
?>
@component('partials.confirm-delete', [
   'content' => "Eliminaras relacion familiar entre <br>{$relationship}",
   'submit_label' => "Si, eliminar relación",
   'submit_route' => route('members.detach', [$member->id, $member->family->pivot->id]),
   'cancel_route' => route('members.show', $member),
])
@endcomponent
@endsection
