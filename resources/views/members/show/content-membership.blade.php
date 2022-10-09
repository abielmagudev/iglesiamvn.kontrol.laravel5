<div id="content-membership" style="display:none">
    <div class="">
        <small>
            <p><b style="margin-right:0.75rem">Registro</b> {{ $member->registered->format('d F, Y') }} ({{ $member->registered_years }} años)</p>
        </small>
    </div>
    <br>
    @if( count($member->ministries) )
    <small class="table-container">
        <table class="table is-fullwidth is-hoverable">
            <thead>
                <tr>
                    <th style="border:0">Ministerio</th>
                    <th style="border:0">Posición</th>
                    <th style="border:0">Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($member->ministries as $ministry)
                <tr>
                    <td style="white-space:nowrap;width:1%">
                        <a href="{{ route('ministries.show', $ministry) }}">{{ $ministry->name }}</a>
                     </td>
                     <td style="white-space:nowrap">{{ $positions[ $ministry->pivot->position ] }}</td>
                     <td>{{ $ministry->pivot->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </small>
    @endif
    <br>
    <div class="has-text-right">
        <a href="{{ route('ministries.index') }}" class="button is-link is-small">
            @component('components.icon', [
                'icon' => 'plus'
            ])
            @endcomponent
            <span>Unir a ministerio</span>
        </a>
    </div>
</div>