@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">My Incomes</h4>

            <a href="{{ route('incomes.create') }}" class="btn btn-primary">
                + Add Income
            </a>
        </div>

        <div class="card-body">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Source</th>
                        <th>Date</th>
                        <th class="text-center text-nowrap">Actions</th>
                    </tr>
                </thead>

            <tbody>

            @forelse($incomes as $income)

                <tr>
                    <td>
                        €{{ rtrim(rtrim(number_format($income->amount, 2), '0'), '.') }}
                    </td>

                    <td>{{ ucfirst($income->source) }}</td>

                    <td>{{ $income->received_at->format('d M Y') }}</td>

                    <td class="text-center text-nowrap">

                        <a href="{{ route('incomes.show', $income->id) }}"
                            class="btn btn-sm btn-secondary">View
                        </a>

                        <a href="{{ route('incomes.edit', $income->id) }}"
                            class="btn btn-sm btn-primary">Edit
                        </a>

                        <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center text-muted">
                        No incomes yet
                    </td>
                </tr>

            @endforelse

            </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
