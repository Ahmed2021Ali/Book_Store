@extends('adminlte::page')

@section('title',' FAQ')

@section('content_header')
    <h1>Show all  FAQ</h1>
@stop

@section('content')
<x-massege/>
<div class="row">
    <div class="col-12">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Acion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($FAQs as $FAQ)
                    <tr>
                        <td>{{ $FAQ->id }}</td>
                        <td>{{ $FAQ->question }}</td>
                        <td>{{ $FAQ->answer }}</td>
                        <td>{{ $FAQ->status == 1 ? "معروضة ":"غير معروضة" }}</td>
                        <td>
                            <a href="{{route('FAQ.edit', $FAQ->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('FAQ.destroy', $FAQ->id) }}" method="post"
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
        {{ $FAQs->links() }}
    </div>
</div>
@stop
