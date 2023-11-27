@extends('adminlte::page')

@section('title', ' categories')

@section('content_header')
    <h1>Show all categories</h1>
@stop

@section('content')
    <x-messages/>

    <x-adminlte-modal id="create" title="Add Slider" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('backend.category.create')
        <x-slot name="footerSlot">
        </x-slot>
    </x-adminlte-modal>
    <x-adminlte-button label="Add Slider" data-toggle="modal" data-target="#create" class="bg-purple"/>

    <div class="row">
        <div class="col-12">
            <br>
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
                                <x-adminlte-modal id="edit_{{$categories->id}}" title="Edit Category" theme="teal"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('backend.category.edit',['category'=>$categories])
                                    <x-slot name="footerSlot">
                                    </x-slot>
                                </x-adminlte-modal>
                                <x-adminlte-button label="Edit Category" data-toggle="modal"
                                                   data-target="#edit_{{$categories->id}}" class="bg-teal"/>

                                {{--  delete  --}}
                                <x-adminlte-modal id="delete_{{ $categories->id }}" title="Delete" theme="purple"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    <form action="{{ route('category.destroy', $categories->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <h3> Are you sure to delete ? </h3>
                                        <button class="btn btn-danger btn-lg btn-block"> Yes</button>
                                    </form>
                                    <x-slot name="footerSlot">
                                    </x-slot>
                                </x-adminlte-modal>
                                <x-adminlte-button label="Delete" data-toggle="modal"
                                                   data-target="#delete_{{ $categories->id }}" class="bg-danger"/>
                                {{-- End  delete  --}}

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
