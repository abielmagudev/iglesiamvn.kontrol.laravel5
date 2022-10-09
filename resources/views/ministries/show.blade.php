@extends('main')
@section('title', 'Ministerios')
@section('content')
<div class="card">
   <div class="is-flex" style="justify-content:space-between;padding:1rem">
      <div style="flex-grow:1">
         <p class="subtitle" style="margin:0"><b>{{ $ministry->name }}</b></p>
         <small class="has-text-weigth-normal">{{ $ministry->description }}</small>
      </div>
      <div>
         <a href="{{ route('ministries.edit', $ministry) }}" class="button is-warning is-small">Editar</a>  
      </div>
   </div>
   <div class="card-content">
      <p class="has-text-right">
         <a href="{{ route('ministries.add', $ministry) }}" class="button is-link is-small">Agregar miembro</a>
      </p>
      <small class="table-container">
         <table class="table is-fullwidth is-hoverable">
            <thead>
               <tr>
                  <th>Nombre</th>
                  <th>Posicion</th>
                  <th colspan="2">Descripcion</th>
               </tr>
            </thead>
            <tbody>
               @foreach($ministry->members as $member)
               <tr>
                  <td style="white-space:nowrap;width:1%">
                     <a href="{{ route('members.show', $member) }}">{{ $member->fullname }}</a>
                  </td>
                  <td>{{ $positions[$member->pivot->position] }}</td>
                  <td>{{ $member->pivot->description }}</td>
                  <td class="has-text-right">
                     <a href="{{ route('ministries.change', [$ministry->id, $member->pivot->id]) }}" class="button is-warning is-small">
                        @component('components.icon', [
                           'icon' => 'pencil'
                        ])
                        @endcomponent
                     </a>
                     <a href="{{ route('ministries.remove', [$ministry->id, $member->pivot->id]) }}" class="button is-danger is-small">
                        @component('components.icon', [
                           'icon' => 'minus'
                        ])
                        @endcomponent
                     </a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </small>
   </div>
</div>
<br>
<p class="has-text-right">
   <a href="{{ route('ministries.delete', $ministry) }}" class="has-text-danger">Eliminar ministerio</a>     
</p>
@endsection