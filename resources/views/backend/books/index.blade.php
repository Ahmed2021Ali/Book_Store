@extends('adminlte::page')

@section('title', ' Books')

@section('content_header')
    <h1>Show all Books</h1>
@stop

@section('content')
    <x-massege />
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Acion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author_name }}</td>
                            <td>
                                @if (isset($book->price_after_offer))
                                    {{ $book->price_after_offer }}
                                @else
                                    {{ $book->price }}
                                @endif
                            </td>
                            <td>{{ $book->status == 1 ? 'Avalible' : 'Not Avalible' }}</td>
                            <td>
                                <img src="\assets\images\book\{{ $book->image }}" width="75px" height="90px">
                            </td>
                            <td>{{ $book->category->title }}</td>
                            <td>
                                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('book.destroy', $book->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class=" btn btn-danger"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        {{ $books->links() }}
   </div>

@stop
