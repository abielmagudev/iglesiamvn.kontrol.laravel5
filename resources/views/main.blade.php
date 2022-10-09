<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name=”robots” content=”noindex, nofollow”>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css" integrity="sha512-ZRv40llEogRmoWgZwnsqke3HNzJ0kiI0+pcMgiz2bxO6Ew1DVBtWjVn0qjrXdT3+u+pSN36gLgmJiiQ3cQtyzA==" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css" integrity="sha256-qS+snwBgqr+iFVpBB58C9UCxKFhyL03YHpZfdNUhSEw=" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ asset('assets/bulma-helpers-0.3.10.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <div id="app">
    @if( Auth::user() )
        @include('layouts.navbar')
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth is-hidden-touch">
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