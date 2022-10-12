<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name=”robots” content=”noindex, nofollow”>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/jpg" href="{{ asset('images/mvn-favicon-w.png') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>@yield('title')</title>
</head>
<body style="background-color:hsl(0, 0%, 94%)">

    <div id="app">
    @if( Auth::user() )
    
        @include('layouts.navbar')
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-one-fifth is-hidden-touch" style="min-height:100vh">
                    @include('layouts.menu')
                </div>
                <div class="column">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('modals.nav-mobile')

    @else
        @yield('content')

    @endif
    </div>

    @include('layouts.scripts')
</body>
</html>
