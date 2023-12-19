@extends('adminlte::page')

@section('title',' Slider')

@section('content_header')
    <h1>Show all  Slider</h1>
@stop

@section('content')

    <x-adminlte-modal id="create" title="Add Slider" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('backend.slider.create')
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
                            <img src="\images\sliders\{{ $slider->image }}" width="150px" height="50px" >
                        </td>
                        <td>{{ $slider->status == 1 ? "معروضة ":"غير معروضة" }}</td>
                        <td>
                            <x-adminlte-modal id="edit_{{$slider->id}}" title="Edit Slider" theme="teal"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('backend.slider.edit',['slider'=>$slider])
                                <x-slot name="footerSlot">
                                </x-slot>
                            </x-adminlte-modal>
                            <x-adminlte-button label="Edit Slider" data-toggle="modal"
                                               data-target="#edit_{{$slider->id}}" class="bg-teal"/>

                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $slider->id }}" title="Delete" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                <form action="{{ route('slider.destroy', $slider) }}" method="post"
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
                                               data-target="#delete_{{ $slider->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@stop
