@extends('main')
@section('title', 'Miembros')
@section('content')
@include('partials.notifications')
@include('partials.validations')
<div class="box">
   <p class="has-text-right">
      <a href="{{ route('members.edit', $member) }}" class="button is-warning is-small">Editar</a>
   </p>
   @include('members.show.summary')
   <div class="tabs is-fullwidth">
      <ul class="">
         <li class="is-active" data-content="information"><a>Información</a></li>
         <li data-content="family"><a>Familia</a></li>
         <li data-content="membership"><a>Membresía</a></li>
      </ul>
   </div>
   <div class="">
      @include('members.show.content-information')
      @include('members.show.content-family')
      @include('members.show.content-membership')
   </div>
</div>
<p class="has-text-right">
   <a href="{{ route('members.delete', $member) }}" class="has-text-danger">Eliminar miembro</a>
</p>
@endsection
