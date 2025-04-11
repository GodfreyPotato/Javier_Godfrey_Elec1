@extends('books.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Book</h1>

        <form action="{{ route('books.update', $book->id) }}" method="POST" class="card p-4 shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $book->title) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ old('author', $book->author) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="published_date" class="form-label">Published Date</label>
                <input type="date" id="published_date" name="published_date" class="form-control"
                    value="{{ old('published_date', $book->published_date) }}" required>
            </div>

            <div class="d-flex justify-content-between w-25">
                <button type="submit" class="btn btn-success" style="width:40%;">Save Changes</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary" style="width: 40%;">Cancel</a>
            </div>
        </form>
    </div>
@endsection