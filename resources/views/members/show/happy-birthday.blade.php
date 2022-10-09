@if( $member->happy_birthday )
<p class="notification is-primary is-light has-text-centered">
    @component('components.icon', [
        'icon' => 'cake',
        'size' => 'large'
    ])
    @endcomponent
    <b class="is-uppercase">Hoy cumplea&ntilde;os!</b>
</p>
@endif