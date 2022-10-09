@extends('main')
@section('title', 'Ministerios')
@section('content')
@include('partials.notifications')
<div class="card">
   <div class="card-header is-shadowless">
      <div class="card-header-title subtitle">Ministerios</div>
      <div class="card-header-icon">
         <a href="{{ route('ministries.create') }}" class="button is-link is-small">Nuevo ministerio</a>
      </div>
   </div>
   <div class="card-content">
      <small class="table-container">
         <table class="table is-fullwidth is-hoverable">
            <thead>
               <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Miembros</th>
               </tr>
            </thead>
            <tbody>
               @foreach($ministries as $ministry)
               <tr>
                  <td class="has-text-nowrap">
                     <a href="{{ route('ministries.show', $ministry) }}">{{ $ministry->name }}</a>
                  </td>
                  <td>{{ $ministry->description }}</td>
                  <td>{{ $ministry->members_count }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </small>
   </div>
</div>
@endsection