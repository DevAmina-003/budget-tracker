@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        <div class="card-header">
            Add Expense
        </div>

        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <form action="{{ route('expenses.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" name="amount" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Select category</option>

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>

                            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary mt-2">
                                + Create Category
                            </a>
                        </div>

                        <div>
                            <label class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" required>
                        </div>

                        <div>
                            <label class="form-label">Date</label>
                            <input type="date" name="spent_at" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Save Expense</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection