<div id="content-family" style="display:none">
    @if( count( $member->family() ) )
    <small class="table-container">
        <table class="table is-fullwidth is-hoverable">
            <thead>
                <tr>
                    <th style="border:0">Nombre</th>
                    <th style="border:0">Relación</th>
                    <th style="border:0">Teléfono</th>
                    <th style="border:0" colspan="2">Móvil</th>
                </tr>
            </thead>
            <tbody>
                @foreach($member->family() as $family)
                <tr>
                    <td style="white-space:nowrap;width:1%">
                        <a href="{{ route('members.show', $family) }}">{{ $family->fullname }}</a>
                    </td>
                    <td>{{  $family->pivot->member_id === $member->id ? $family->pivot->family_relationship : $family->pivot->member_relationship }}</td>
                    <td style="white-space:nowrap">{{ $family->homephone }}</td>
                    <td style="white-space:nowrap">{{ $family->mobilephone }}</td>
                    <td class="has-text-right">
                        <a href="{{ route('members.remove', [$member->id, $family->pivot->id]) }}" class="button is-danger is-small">
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
    @endif
    <br>
    <div class="has-text-right">
        <a href="{{ route('members.add', $member) }}" class="button is-link is-small">
            @component('components.icon', [
                'icon' => 'plus'
            ])
            @endcomponent
            <span>Agregar familiar</span>
        </a>
    </div>
</div>