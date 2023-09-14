@extends('adminlte::page')

@section('title',' Slider')

@section('content_header')
    <h1>Show all  Slider</h1>
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
                @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>
                            <img src="\assets\images\slider\{{ $slider->image }}" width="150px" height="50px" >
                        </td>
                        <td>{{ $slider->status == 1 ? "معروضة ":"غير معروضة" }}</td>
                        <td>
                            <a href="{{route('slider.edit', $slider->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('slider.destroy', $slider->id) }}" method="post"
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
        {{ $sliders->links() }}
    </div>
</div>
@stop
