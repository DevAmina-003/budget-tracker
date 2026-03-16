@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        <div class="card-header">
            Edit Income
        </div>

        <div class="card-body">

             <div class="row justify-content-center">
                <div class="col-md-6">

                    <form action="{{ route('incomes.update', $income->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" name="amount" class="form-control" step="0.01" value="{{ $income->amount }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Source</label>
                            <input type="text" name="source" class="form-control" value="{{ $income->source }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Received Date</label>
                            <input type="date" name="received_at" class="form-control" value="{{ $income->received_at->format('d M Y') }}" required>
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('incomes.index') }}" class="btn btn-secondary">Back</a>

                            <button type="submit" class="btn btn-primary">Update Income</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection