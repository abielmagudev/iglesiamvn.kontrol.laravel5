@extends('main')
@section('title', 'Miembros')
@section('content')

@include('partials.notifications')
@include('partials.validations')

<div class="card">
   <div class="card-header is-shadowless">
      <div class="card-header-title subtitle">Nuevo miembro</div>
   </div>
   <div class="card-content">
      <form action="{{ route('members.store') }}" enctype="multipart/form-data" method="post" autocomplete="off">
         {{ method_field('post') }}
         {{ csrf_field() }}
         @include('members.save.personal')
         @include('members.save.contact')
         @include('members.save.additional')
         @include('members.save.registry')
         <br>
         <button class="button is-success" type="submit">Guardar miembro</button>
         <a href="{{ route('members.index') }}" class="button">Cancelar</a>
      </form>
   </div>
</div>
<br>
@endsection
