<div class="columns is-vcentered">
    <div class="column">
        <figure class="image is-square">
            <img class="is-rounded" src="{{ getPictureMember($member) }}">
        </figure>
    </div>
    <div class="column is-two-thirds">
        <small class="table-container">
            <table class="table is-hoverable is-fullwidth is-completely-borderless">
                <tbody>
                    <tr>
                        <td colspan="2">
                            @include('members.show.happy-birthday')
                        </td>
                    </tr>
                    <tr>
                        <td class="subtitle" colspan="2"><b>{{ $member->fullname }}</b> <small>({{ $member->is_active ? 'Activo' : 'Inactivo' }})</small></td>
                    </tr>
                    <tr>
                        <td class="has-text-danger" style="width:1%"><b>Emergencia</b></td>
                        <td>{{ $member->emergency }}</td>
                    </tr>
                    <tr>
                        <td class=""><b>Teléfono</b></td>
                        <td>{{ $member->homephone }}</td>
                    </tr>
                    <tr>
                        <td class=""><b>Móvil</b></td>
                        <td>{{ $member->mobilephone }}</td>
                    </tr>
                    <tr>
                        <td class=""><b>Email</b></td>
                        <td>{{ $member->email }}</td>
                    </tr>
                </tbody>
            </table>
        </small>
    </div>
</div>
<br>