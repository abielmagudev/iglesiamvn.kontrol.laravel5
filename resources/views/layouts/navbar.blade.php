<nav class="navbar is-link" role="navigation" aria-label="main navigation">
    <div class="container is-fluid">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('dashboard.index') }}">
                <b class='is-uppercase'>Kontrol</b>
            </a>

            <div class="navbar-item is-hidden-desktop">
                {{ auth()->user()->name }}
            </div>
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-modal="nav-mobile">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu">
            <div class="navbar-start">
                <div class="navbar-item iis-flex-grow-1">
                    @component('components.search-members')
                    @endcomponent
                </div>
            </div>
            <div class="navbar-end">

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <span class='ml-3'>{{ auth()->user()->name }}</span>
                    </a>

                    <div class="navbar-dropdown is-right">
                        <a href="{{ route('account.edit') }}" class="navbar-item">Mi cuenta</a>
                        <a href="{{ route('logout') }}" class="navbar-item has-text-danger">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<br class="is-hidden-touch">
