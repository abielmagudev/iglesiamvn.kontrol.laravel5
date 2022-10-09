@extends('main')
@section('title', 'Miembro')
@section('content')
@include('partials.notifications')
@include('partials.validations')
<div class="card">
   <div class="card-header is-shadowless">
      <div class="card-header-title subtitle">Agregar familiar</div>
   </div>
   <div class="card-content">
      <form action="{{ route('members.attach', $member->id) }}" method="post" autocomplete="off">
         {{ csrf_field() }}
         
         <div class="columns">
            <div class="column">
               <label class="label">Miembro</label>
               <div class="field">
                  <div class="control">
                     <input type="text" name="member_fullname" class="input" value="{{ $member->fullname }}" readonly>
                  </div>
               </div>
               <div class="field has-addons">
                  <div class="control is-expanded">
                     <input type="text" class="input" name="member_relationship" list="relationships" placeholder="Ejemplo: Padre..." required>
                  </div>
                  <div class="control">
                     <span class="button is-static">
                        <i class="fa fa-arrow-circle-right"></i>
                     </span>
                  </div>
               </div>
            </div>
            
            <div class="column">
               <div class="field">
                  <label class="label">Familiar</label>
                  <div class="control">
                     <members-suggestion route="{{ route('members.search') . '?value=' }}"></members-suggestion>
                  </div>
               </div>

               <div class="field has-addons">
                  <div class="control">
                     <span class="button is-static">
                        <i class="fa fa-arrow-circle-left"></i>
                     </span>
                  </div>
                  <div class="control is-expanded">
                     <input type="text" class="input" name="family_relationship" list="relationships" placeholder="Ejemplo: Hijo..." required>
                  </div>
               </div>
            </div>
         </div>
         
         <datalist id="relationships">
            @foreach($relationships as $value)
            <option value="{{ $value }}"></option>
            @endforeach
         </datalist>
         <br>
         
         <button class="button is-success" type="submit" tabindex="4">Agregar familiar</button>
         <a href="{{ route('members.show', $member->id) }}" class="button">Regresar</a>
      </form>
   </div>
</div>
@endsection