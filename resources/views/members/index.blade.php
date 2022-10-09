@extends('main')
@section('title', 'Miembros')
@section('content')
<div class="has-text-right">
    @include('members.index.filters')
</div>
<br>
<div class="card">
    <div class="card-header is-shadowless" >
        <div class="card-header-title subtitle">Miembros</div>
        <div class="card-header-icon">
            <a href="{{ route('members.create') }}" class="button is-link is-small">Nuevo miembro</a>
        </div>
    </div>
    <div class="card-content">
        <small class="table-container">
            <table class="table is-fullwidth is-hoverable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Casa</th>
                        <th>Móvil</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members_filtered as $member)
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
    </div>
</div>
<br>
<div class="has-text-right">
    @include('members.index.filters')
</div>
@endsection