@extends('adminlte::page')

@section('title',' banner')

@section('content_header')
    <h1>Show all  Banner</h1>
@stop

@section('content')
<x-massege/>
<div class="row">
    <div class="col-12">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td>
                            <img src="\assets\images\banner\{{ $banner->image }}" width="150px" height="50px" >
                        </td>
                        <td>{{ $banner->status == 1 ? "معروضة ":"غير معروضة" }}</td>
                        <td>
                            <a href="{{route('banner.edit', $banner->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('banner.destroy', $banner->id) }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class=" btn btn-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $banners->links() }}
    </div>
</div>
@stop
