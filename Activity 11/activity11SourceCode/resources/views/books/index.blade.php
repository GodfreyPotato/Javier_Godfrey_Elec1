@extends('books.master')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">All Books</h1>
            <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
        </div>

        @if($books->isEmpty())
            <div class="alert alert-info">No books available.</div>
        @else
            <div class="d-flex flex-wrap gap-4 ">
                @foreach ($books as $book)
                    <div style="width: 32%">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">by {{ $book->author }}</h6>
                                <p class="card-text"><strong>Published:</strong> {{ $book->published_date }}</p>
                            </div>
                            <div class="card-footer bg-white d-flex justify-content-between">
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection