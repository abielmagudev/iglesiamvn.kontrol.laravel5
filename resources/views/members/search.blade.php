@extends('main')
@section('title', 'Miembros')
@section('content')

<div class="card">
   <div class="card-header is-shadowless">
      <div class="card-header-title subtitle">
         <p>Busqueda de <em>"{{ $value }}"</em>  <span class="tag is-primary is-rounded">{{ count($members) }}</span></p>
      </div>
   </div>
   <div class="card-content">

      @if( count($members) )  
      <small class="table-container">
         <table class="table is-hoverable is-fullwidth">
            <thead>
               <tr>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>Móvil</th>
                  <th>Email</th>
               </tr>
            </thead>
            <tbody>
              @foreach($members as $member)
               <tr>
                  <td style="white-space:nowrap">
                     <a href="{{ route('members.show', $member) }}">{{ $member->fullname }}</a>
                  </td>
                  <td style="white-space:nowrap">{{ $member->homephone }}</td>
                  <td style="white-space:nowrap">{{ $member->mobilephone }}</td>
                  <td style="white-space:nowrap">{{ $member->email }}</td>
               </tr>
              @endforeach
            </tbody>
         </table>
      </small>
      @endif
   
   </div>
</div>
@endsection