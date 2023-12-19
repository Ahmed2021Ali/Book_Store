@extends('adminlte::page')

@section('title',' banner')

@section('content_header')
    <h1>Show all Banner</h1>
@stop

@section('content')
    <x-messages/>
    <x-adminlte-modal id="create" title="Add banner" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('backend.banner.create')
        <x-slot name="footerSlot">
        </x-slot>
    </x-adminlte-modal>
    <x-adminlte-button label="Add banner" data-toggle="modal" data-target="#create" class="bg-purple"/>

    <div class="row">
        <div class="col-12">
            <br>
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
                            <img src="images\banners\{{ $banner->image }}" width="150px" height="50px">
                        </td>
                        <td>{{ $banner->status == 1 ? "معروضة ":"غير معروضة" }}</td>
                        <td>
                            {{--  Edit  --}}

                            <x-adminlte-modal id="edit_{{$banner->id}}" title="Edit banner" theme="teal"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('backend.banner.edit',['banner'=>$banner])
                                <x-slot name="footerSlot">
                                </x-slot>
                            </x-adminlte-modal>
                            <x-adminlte-button label="Edit banner" data-toggle="modal"
                                               data-target="#edit_{{$banner->id}}" class="bg-teal"/>
                            {{-- end Edit  --}}

                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $banner->id }}" title="Delete" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                <form action="{{ route('banner.destroy', $banner) }}" method="post"
                                      class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <h3> Are you sure to delete ? </h3>
                                    <button class="btn btn-danger btn-lg btn-block"> Yes</button>
                                </form>
                                <x-slot name="footerSlot">
                                </x-slot>
                            </x-adminlte-modal>
                            <x-adminlte-button label="Delete" data-toggle="modal"
                                               data-target="#delete_{{ $banner->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $banners->links() }}
        </div>
    </div>
@stop
