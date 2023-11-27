@extends('adminlte::page')

@section('title', ' Category')

@section('content_header')
    <h1>Show all Branch</h1>
@stop

@section('content')
    <x-messages/>
    <x-adminlte-modal id="create" title="Add Branch" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('backend.branch.create')
        <x-slot name="footerSlot">
        </x-slot>
    </x-adminlte-modal>
    <x-adminlte-button label="Add Branch" data-toggle="modal" data-target="#create" class="bg-purple"/>
    <div class="row">
        <div class="col-12">
            <br>
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

                                <x-adminlte-modal id="edit_{{$branch->id}}" title="Edit FAQ" theme="teal"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('backend.branch.edit',['branch'=>$branch])
                                    <x-slot name="footerSlot">
                                    </x-slot>
                                </x-adminlte-modal>
                                <x-adminlte-button label="Edit FAQ" data-toggle="modal"
                                                   data-target="#edit_{{$branch->id}}" class="bg-teal"/>



                                {{--  delete  --}}
                                <x-adminlte-modal id="delete_{{ $branch->id }}" title="Delete" theme="purple"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    <form action="{{ route('branch.destroy', $branch->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <h3> Are you sure to delete ? </h3>
                                        <button class="btn btn-danger btn-lg btn-block"> Yes</button>
                                    </form>
                                    <x-slot name="footerSlot">
                                    </x-slot>
                                </x-adminlte-modal>
                                <x-adminlte-button label="Delete" data-toggle="modal"
                                                   data-target="#delete_{{ $branch->id }}" class="bg-danger"/>
                                {{-- End  delete  --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $branches->links() }}
        </div>
    </div>
@stop
