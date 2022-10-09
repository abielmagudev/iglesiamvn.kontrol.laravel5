{{ csrf_field() }}
         
<!-- Search members -->
<?php
$json = '{
    "bind":"members", 
    "url":"'.route('members.search').'", 
    "index":"fullname",
    "storage_path":"' . url('/pictures/') . '"
}'
?>
<div class="field">
    <label class="label has-text-weight-normal">Miembro</label>
    <div class="control">
        @if( is_null($member->id) )
        <members-suggestion route="{{ route('members.search') . '?value=' }}"></members-suggestion>

        @else
        <input type="text" name="member_fullname" value="{{ $member->fullname }}" class="input" readonly>
        <p class="help">* Para cambiar de miembro, eliminar el actual y agregarlo de nuevo</p>

        @endif
    </div>
</div>

<!-- Positions -->
<?php $member_position = isset($member->pivot) ? $member->pivot->position : null ?>
<div class="field">
    <label class="label has-text-weight-normal">Posici&oacute;n</label>
    <div class="control">
        <div class="select is-fullwidth">
            <select name="position" required>
                <option disabled selected></option>
                @foreach( $positions as $key => $position )
                <option value="{{ $key }}" {{ old('position', $member_position) === $key ? 'selected' : '' }}>{{ $position }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<!-- Description -->
<?php $member_description = isset($member->pivot) ? $member->pivot->description : null ?>
<div class="field">
    <label class="label has-text-weight-normal">Descripci&oacute;n</label>
    <div class="control">
        <textarea name="description" class="textarea">{{ old('description', $member_description) }}</textarea>
    </div>
</div>
<br>