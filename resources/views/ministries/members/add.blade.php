@extends('main')
@section('title', 'Ministerios')
@section('content')
@include('partials.notifications')
@include('partials.validations')
<div class="card">
   <div class="card-header is-shadowless">
      <div class="card-header-title has-text-weight-normal subtitle"><b>Ministerio {{ $ministry->name }}</b>&nbsp;| Agregar miembro</div>
   </div>
   <div class="card-content">
      <form action="{{ route('ministries.attach', $ministry) }}" method="post" autocomplete="off">
         @include('ministries.members.save')
         <button type="submit" class="button is-success">Agregar miembro</button>
         <a href="{{ route('ministries.show', $ministry) }}" class="button">Regresar</a>
      </form>
   </div>
</div>
@endsection