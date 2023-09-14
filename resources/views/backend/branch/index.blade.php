@extends('adminlte::page')

@section('title', ' Category')

@section('content_header')
    <h1>Show all Branch</h1>
@stop

@section('content')
    <x-massege />
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>status</th>
                        <th>City</th>
                        <th>Address Detalis</th>
                        <th>Number of Branch</th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($branches as $branch)
                        <tr>
                            <td>{{ $branch->id }}</td>
                            <td>{{ $branch->status == 1 ? 'معروضة' : 'غير معروضة' }}</td>
                            <td>{{ $branch->city }}</td>
                            <td>{{ $branch->address_detail }}</td>
                            <td>{{ $branch->branch_number }}</td>
                            <td>
                                <a href="{{ route('branch.edit', $branch->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('branch.destroy', $branch->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class=" btn btn-danger"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $branches->links() }}
        </div>
    </div>
@stop
