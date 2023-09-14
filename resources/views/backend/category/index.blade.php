@extends('adminlte::page')

@section('title', ' categories')

@section('content_header')
    <h1>Show all categories</h1>
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
                        <th>Acion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $categories)
                        <tr>
                            <td>{{ $categories->id }}</td>
                            <td>{{ $categories->title }}</td>
                            <td>
                                <a href="{{ route('category.edit', $categories->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('category.destroy', $categories->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class=" btn btn-danger"> Delete </button>
                                </form>
                                <a href="{{ route('category.show', $categories->id) }}" class="btn btn-info">Show Books in the categories</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
           {{ $category->links() }}
      </div>
    </div>
@stop
