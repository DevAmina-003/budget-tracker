@extends('layouts.app')
@section('content')

<div class="container">

   <!-- Add Category -->
    <div class="card mb-4">

        <div class="card-header">
            <h4 class="mb-0">Add Category</h4>
        </div>

        <div class="card-body">

            <div class="row justify-content-center mb-4">
                <div class="col-md-6">

                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">New Category</label>
                            <input type="text" name="name" class="form-control" placeholder="Category name" required>
                        </div>

                        <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto">
                            Add Category
                        </button>
                    </form>

                </div>
            </div>
            
        </div>
    </div>

    <!-- Categories Table -->
    <div class="card">
        <div class="card-header">
            Your Categories
        </div>

        <div class="card-body">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($categories as $category)
                    <tr>

                        <td>
                            {{ ucfirst($category->name) }}
                        </td>

                        <td class="text-center">

                        @if($category->user_id === auth()->id())

                            <form method="POST"
                                action="{{ route('categories.destroy', $category->id) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>

                        @endif

                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection