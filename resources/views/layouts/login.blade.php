@extends('main')
@section('title', 'Iniciar sesion')
@section('content')
<section class="hero is-link is-bold is-fullheight">
  <div class="hero-body">
    <div class="container">
        <div class="columns">
            <div class="column is-one-third is-offset-one-third">
                @include('partials.notifications')
                <div class="card">
                    <div class="card-content">
                        <form action="{{ route('logging') }}" method="post" autocomplete="on" id="form-login">
                            <p class="title has-text-dark has-text-centered">Bienvenido</p>
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input is-radiusless" placeholder="Usuario" type="email" name="email" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </p>
                            </div>
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input is-radiusless" placeholder="Contraseña" type="password" minlength="3" name="password" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                            </div>
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                        </form>
                    </div>
                </div>
                <br>
                <button class="button is-primary is-fullwidth" form="form-login">
                    <b>Iniciar sesion</b>
                </button>
            </div>
        </div>
  </div>
</section>
@endsection
