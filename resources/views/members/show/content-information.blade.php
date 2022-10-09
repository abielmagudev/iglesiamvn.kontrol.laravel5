<div id="content-information">
    <small class="table-container">
        <table class="table is-hoverable is-fullwidth is-completely-borderless">
            <tr>
                <td style="width:1%"><b>Dirección</b></td>
                <td>
                    <p style="margin:0">{{ $member->address }}, C.P. {{ $member->postcode ?? '?' }}</p>
                    <p><small>{{ $member->city }}, {{ $member->state }}, {{ $member->country }}</small></p>
                </td>
            </tr>
            <tr>
                <td><b>Nacimiento</b></td>
                <td>{{ $member->birthday->format('d F, Y') }} ({{ $member->age }} años)</td>
            </tr>
            <tr>
                <td><b>Nacionalidad</b></td>
                <td>{{ $member->citizenship }}</td>
            </tr>
            <tr>
                <td><b>Genéro</b></td>
                <td>{{ $member->gender === 'f' ? 'Femenino' : 'Masculino' }}</td>
            </tr>
            <tr>
                <td><b>Estado civil</b></td>
                <td>{{ ucfirst($member->marital_status) }}</td>
            </tr>
            <tr>
                <td><b>Profesiones</b></td>
                <td>{{ $member->professions }}</td>
            </tr>
            <tr>
                <td><b>Ocupaciones</b></td>
                <td>{{ $member->occupations }}</td>
            </tr>
        </table>
    </small>
</div>