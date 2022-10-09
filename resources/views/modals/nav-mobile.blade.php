<?php
$menu = config('kontrol.menu');

?>

<!-- Modal Nav-mobile -->
<div class="modal" id="nav-mobile">
    <div class="modal-background"></div>
    <div class="modal-content" style="padding-left:1rem;padding-right:1rem">
        <div class="box">
            <div class="menu">
                <ul class="menu-list">
                    <li>
                        @component('components.search-members')
                            @slot('placeholder', 'Buscar miembros')
                        @endcomponent
                        <br>
                    </li>
                    @foreach($menu as $option)
                    <li><a href="{{ route($option['route']) }}">{{ $option['label'] }}</a></li>
                    @endforeach
                    <li><a href="{{ route('account.edit') }}" class="has-text-link">Mi cuenta</a></li>
                    <li><a href="{{ route('logout') }}" class="has-text-danger">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
</div>