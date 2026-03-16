@extends('layouts.app')
@section('content')

<div class="container text-center mt-5">

    <h1 class="mb-3">Budget Tracker</h1>

    <p class="text-muted mb-4">
        Track your incomes, expenses and manage your budget easily.
    </p>

    <a href="{{ route('login') }}" class="btn btn-primary me-2">
        Login
    </a>

    <a href="{{ route('register') }}" class="btn btn-outline-primary">
        Register
    </a>

</div>

@endsection
