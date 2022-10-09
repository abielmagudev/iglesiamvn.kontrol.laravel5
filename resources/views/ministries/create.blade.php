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
      <form action="{{ route('ministries.store') }}" method="post" autocomplete="off">
         @include('ministries.save')
         <div>
            <button class="button is-success" type="submit">Guardar ministerio</button>
            <a href="{{ route('ministries.index') }}" class="button">Cancelar</a>
         </div>
      </form>
   </div>
</div>
@endsection