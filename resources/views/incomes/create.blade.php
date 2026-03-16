@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        <div class="card-header">
            Add Income
        </div>

        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <form action="{{ route('incomes.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Amount</label>
                            <input type="number" step="0.01" name="amount" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Source</label>
                            <input type="text" name="source" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Received Date</label>
                            <input type="date" name="received_at" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('incomes.index') }}" class="btn btn-secondary">Back</a>

                            <button type="submit" class="btn btn-primary">Save Income</button>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection