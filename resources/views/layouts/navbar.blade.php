<nav class="navbar is-light" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('assets/mvn-favicon-b.png') }}" alt="{{ config('app.name') }}" width="32" height="32">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-modal="nav-mobile">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item">
                    @component('components.search-members')
                    @endcomponent
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link is-arrowless">
                        @component('components.icon', [
                            'icon' => 'user-circle-border',
                            'size' => 'large',
                        ])
                        @endcomponent
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
