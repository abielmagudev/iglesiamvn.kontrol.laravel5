<div class="box">
    <p class="heading"><span class="tag is-rounded has-text-weight-bold">{{ $birthdays->count() }}</span> Cumpleaños en <b>{{ $months[ $today->format('n') ] }}</b></p>
    <br>
    <small class="table-container">
        <table class="table is-fullwidth is-hoverable">
            <thead>
                <tr>
                    <th>Dia</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Movil</th>
                </tr>
            </thead>
            <tbody>
                @foreach($birthdays as $member)
                <?php $happy_birthday = $member->birth_day === $today->format('d') ?>
                <tr class="{{ $happy_birthday ? 'has-text-weight-bold' : '' }}" style="{{ $happy_birthday ? 'background-color:#F0FAF3' : '' }}">
                    <td>{{ $member->birth_day }}</td>
                    <td style="white-space:nowrap">
                        <a href="{{ route('members.show', $member) }}">{{ $member->fullname }}</a>
                    </td>
                    <td>{{ $member->email }}</td>
                    <td style="white-space:nowrap">{{ $member->homephone }}</td>
                    <td style="white-space:nowrap">{{ $member->mobilephone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </small>
</div>