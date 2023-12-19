@extends('adminlte::page')
@section('content_header')
<a href="{{ route('book.index') }}" class="btn btn-info">Show All Books</a>
    <h1>Update Book </h1>
@stop

@section('content')
    <x-messages />
    <div class="col-12">
        <form action="{{ route('book.update', $book) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="col-6">
                    <label for="title">Title OF Book</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ $book->title }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="author_name">Author Name</label>
                    <input type="text" name="author_name" id="author_name" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ $book->author_name }}">
                    @error('author_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <label for="book_page_number">Book Page Number</label>
                    <input type="number" name="book_page_number" id="book_page_number" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ $book->book_page_number }}">
                    @error('book_page_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="code">Code</label>
                    <input type="number" name="code" id="code" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ $book->code }}">
                    @error('code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="Quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ $book->quantity }}">
                    @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-3">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ $book->price }}">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="offer">offer </label>
                    <input type="number" name="offer" id="offer" class="form-control" placeholder="%"
                        aria-describedby="helpId" value="{{ $book->offer }}">
                    @error('offer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option {{ $book->status == 1 ? 'selected' : '' }} value="1">Available</option>
                        <option {{ $book->status == 0 ? 'selected' : '' }} value="0">Not Available</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="category_id"> Category Name</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option {{ $category->id == $book->category_id ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-6">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="10" rows="3" class="form-control">{{ $book->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <img src="\images\books\{{ $book->image }}" width="90px" height="110px">
                </div>
            </div>
            <div class="form-row my-3">
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button class="btn btn-success btn-lg" value="back"> Update Book </button>
                </div>
            </div>
        </form>
    </div>
@stop
