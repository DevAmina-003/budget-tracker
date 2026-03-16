@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        <div class="card-header">
            Expense Details
        </div>

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <p><strong>Amount:</strong> - €{{rtrim(rtrim(number_format($expense->amount, 2), '0'), '.') }}</p>
                    <p><strong>Category:</strong> {{ $expense->category->name }}</p>
                    <p><strong>Description:</strong> {{ $expense->description }}</p>
                    <p><strong>Date:</strong> {{ $expense->spent_at->format('d M Y') }}</p>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Back</a>
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection