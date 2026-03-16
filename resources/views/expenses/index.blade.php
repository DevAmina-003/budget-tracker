@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">My Expenses</h4>

            <a href="{{ route('expenses.create') }}" class="btn btn-primary">
                + Add Expense
            </a>
        </div>

        <div class="card-body">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th class="text-center text-nowrap">Actions</th>
                    </tr>
                </thead>

            <tbody>

            @forelse($expenses as $expense)

                <tr>
                    <td class="text-danger">-€{{ rtrim(rtrim(number_format($expense->amount, 2), '0'), '.') }}</td>
                    <td>{{ ucfirst($expense->category->name) }}</td>
                    <td class="text-truncate" style="max-width:200px;">{{ $expense->description }}</td>
                    <td>{{ $expense->spent_at->format('d M Y')}}</td>

                    <td class="text-center text-nowrap">

                        <a href="{{ route('expenses.show', $expense->id) }}" 
                            class="btn btn-sm btn-secondary">View
                        </a>

                        <a href="{{ route('expenses.edit', $expense->id) }}" 
                            class="btn btn-sm btn-primary">Edit
                        </a>

                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                        </form>

                    </td>
                </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            No expenses yet
                        </td>
                    </tr>
                
            @endforelse

            </tbody>

            </table>
        </div>
    </div>
</div>
@endsection