@extends('main')
@section('title', 'Ministerios')
@section('content')
@include('partials.notifications')
@include('partials.validations')
<div class="card">
   <div class="card-header is-shadowless">
      <div class="card-header-title subtitle">Nuevo ministerio</div>
   </div>
   <div class="card-content">
      <form action="{{ route('ministries.update', $ministry) }}" method="post" autocomplete="off">
         @include('ministries.save')
         {{ method_field('put') }}
         <div>
            <button class="button is-warning" type="submit">Actualizar ministerio</button>
            <a href="{{ route('ministries.show', $ministry) }}" class="button">Regresar</a>
         </div>
      </form>
   </div>
</div>
@endsection