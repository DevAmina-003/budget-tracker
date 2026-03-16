@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        <div class="card-header">
            Edit Expense
        </div>

        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" name="amount" class="form-control" step="0.01" value="{{ $expense->amount }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>

                            <select name="category_id" class="form-select" required>

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $expense->category_id == $category->id ? 'selected' : '' }}>

                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $expense->description }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="spent_at" class="form-control" value="{{ $expense->spent_at->format('d M Y') }}" required>
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('incomes.index') }}" class="btn btn-secondary">Back</a>

                            <button type="submit" class="btn btn-primary">Update Expense</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection