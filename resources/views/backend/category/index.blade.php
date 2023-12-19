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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                {{--  edit  --}}

                                <x-adminlte-modal id="edit_{{$category->id}}" title="Edit Category" theme="teal"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('backend.category.edit',['category'=>$category])
                                    <x-slot name="footerSlot">
                                    </x-slot>
                                </x-adminlte-modal>

                                <x-adminlte-button label="Edit Category" data-toggle="modal"
                                                   data-target="#edit_{{$category->id}}" class="bg-teal"/>
                                {{-- end  edit  --}}

                                {{--  delete  --}}
                                <x-adminlte-modal id="delete_{{ $category->id }}" title="Delete" theme="purple"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    <form action="{{ route('category.destroy', $category) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <h3> Are you sure to delete ? </h3>
                                        <button class="btn btn-danger btn-lg btn-block"> Yes</button>
                                    </form>
                                    <x-slot name="footerSlot">
                                    </x-slot>
                                </x-adminlte-modal>
                                <x-adminlte-button label="Delete" data-toggle="modal"
                                                   data-target="#delete_{{ $category->id }}" class="bg-danger"/>
                                {{-- End  delete  --}}

                                <a href="{{ route('category.show', $category) }}" class="btn btn-info">Show Books in the categories</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
           {{ $categories->links() }}
      </div>
    </div>
@stop
