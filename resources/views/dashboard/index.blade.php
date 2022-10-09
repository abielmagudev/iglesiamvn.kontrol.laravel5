@extends('main')
@section('title', 'Dashboard')
@section('content')
    @include('dashboard.index.members-count')
    @include('dashboard.index.visits-count')
    @include('dashboard.index.members-birthday')
@endsection