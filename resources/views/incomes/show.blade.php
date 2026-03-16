@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">

        <div class="card-header">
            Income Details
        </div>

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <p><strong>Amount:</strong> €{{ rtrim(rtrim(number_format($income->amount, 2), '0'), '.') }}</p>
                    <p><strong>Source:</strong> {{ ucfirst($income->source) }}</p>
                    <p><strong>Received Date:</strong> {{ $income->received_at->format('d M Y') }}</p>


                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('incomes.index') }}" class="btn btn-secondary">Back</a>
                        <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection