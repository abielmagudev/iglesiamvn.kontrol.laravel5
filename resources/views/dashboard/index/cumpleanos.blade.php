<div class="card">
    <div class="card-header">
        <div class="card-header-title">
            <span class="tag is-dark">{{ $happy_birthdays->count() }}</span>
            <span class='ml-3'>Cumpleaños de {{ $mes->nombre }}</span>
        </div>
    </div>
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth is-hoverable">
                <thead>
                    <tr>
                        <th>Dia</th>
                        <th>Nombre</th>
                        <th>M&oacute;vil</th>
                        <th>Tel&eacute;fono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($happy_birthdays as $member)
                    <tr class="{{ $member->isHappyBirthday() ? 'has-text-weight-bold has-background-link-light' : '' }}">
                        <td>{{ $member->day_birth }}</td>
                        <td style="white-space:nowrap">
                            <a href="{{ route('members.show', $member) }}">{{ $member->fullname }}</a>
                        </td>
                        <td style="white-space:nowrap">{{ $member->mobilephone }}</td>
                        <td style="white-space:nowrap">{{ $member->homephone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>