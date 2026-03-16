@extends('layouts.app')
@section('content')

<div class="container">

    <!-- SUMMARY CARD -->
    <div class="card mb-4">
        <div class="card-header">
            Dashboard
        </div>

        <div class="card-body">

            <div class="row text-center">

                <div class="col-md-4">
                    <h6>Total Income</h6>
                    <p class="fs-4 text-success">€{{ rtrim(rtrim(number_format($totalIncome, 2), '0'), '.') }}</p>
                </div>

                <div class="col-md-4">
                    <h6>Total Expenses</h6>
                    <p class="fs-4 text-danger">- €{{ rtrim(rtrim(number_format($totalExpenses, 2), '0'), '.') }}</p>
                </div>

                <div class="col-md-4">
                    <h6>Balance</h6>
                    <p class="fs-4">€{{ rtrim(rtrim( number_format($balance, 2), '0'), '.') }}</p>
                </div>

            </div>
        </div>
    </div>


    <!-- RECENT EXPENSES CARD -->
    <div class="card">
        <div class="card-header">
            Recent Expenses
        </div>

        <div class="card-body">

            <ul class="list-group list-group-flush">

                @forelse($recentExpenses as $expense)

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $expense->category->name }}</strong><br>
                            <small class="text-muted">
                                {{ $expense->spent_at->format('d M Y') }}
                            </small>
                        </div>

                        <span class="text-danger">
                           - €{{ rtrim(rtrim(number_format($expense->amount, 2), '0'), '.') }}
                        </span>
                    </li>

                @empty

                    <p class="text-muted">No expenses yet.</p>

                @endforelse

            </ul>

        </div>
    </div>

</div>
@endsection
