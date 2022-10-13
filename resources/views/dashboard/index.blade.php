@extends('main')
@section('title', 'Dashboard')
@section('content')
    @include('dashboard.index.contadores')
    @include('dashboard.index.contadores-visitas')
    @include('dashboard.index.cumpleanos')
@endsection
