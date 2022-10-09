@extends('main')
@section('title', 'Ministerios')
@section('content')
@include('partials.notifications')
@include('partials.validations')
<div class="card">
   <div class="card-header is-shadowless">
      <div class="card-header-title has-text-weight-normal subtitle"><b>Ministerio {{ $ministry->name }}</b>&nbsp;| Actualizar miembro</div>
   </div>
   <div class="card-content">
      <form action="{{ route('ministries.retach', [$ministry->id, $member->pivot->id]) }}" method="post" autocomplete="off">
         {{ method_field('put') }}
         <input type="hidden" name="current_member_fullname" value="{{ $member->fullname }}">
         <input type="hidden" name="current_member_id" value="{{ $member->id }}">
         @include('ministries.members.save')
         <button type="submit" class="button is-warning">Actualizar miembro</button>
         <a href="{{ route('ministries.show', $ministry) }}" class="button">Regresar</a>
      </form>
   </div>
</div>
@endsection