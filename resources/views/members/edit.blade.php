@extends('main')
@section('title', 'Miembros')
@section('content')

@include('partials.notifications')
@include('partials.validations')

<div class="card">
   <div class="card-header is-shadowless">
      <div class="card-header-title subtitle">Editar miembro</div>
   </div>
   <div class="card-content">
      <form action="{{ route('members.update', $member) }}" enctype="multipart/form-data" method="post" autocomplete="off">
         {{ method_field('put') }}
         {{ csrf_field() }}
         @include('members.save.personal')
         @include('members.save.contact')
         @include('members.save.additional')
         @include('members.save.registry')
         <br>
         <button class="button is-warning" type="submit">Actualizar miembro</button>
         <a href="{{ route('members.show', $member) }}" class="button">Regresar</a>
      </form>
   </div>
</div>
<br>
@endsection
