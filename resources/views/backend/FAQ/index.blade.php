@extends('adminlte::page')

@section('title',' FAQ')

@section('content_header')
    <h1>Show all FAQ</h1>
@stop

@section('content')
    <x-messages/>
    <x-adminlte-modal id="create" title="Add FAQ" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('backend.FAQ.create')
        <x-slot name="footerSlot">
        </x-slot>
    </x-adminlte-modal>
    <x-adminlte-button label="Add FAQ" data-toggle="modal" data-target="#create" class="bg-purple"/>

    <div class="row">
        <div class="col-12">
            <br>
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
                            <x-adminlte-modal id="edit_{{$FAQ->id}}" title="Edit FAQ" theme="teal"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                @include('backend.FAQ.edit',['fAQ'=>$FAQ])
                                <x-slot name="footerSlot">
                                </x-slot>
                            </x-adminlte-modal>
                            <x-adminlte-button label="Edit FAQ" data-toggle="modal"
                                               data-target="#edit_{{$FAQ->id}}" class="bg-teal"/>

                            {{--  delete  --}}
                            <x-adminlte-modal id="delete_{{ $FAQ->id }}" title="Delete" theme="purple"
                                              icon="fas fa-bolt" size='lg' disable-animations>
                                <form action="{{ route('FAQ.destroy', $FAQ->id) }}" method="post"
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
                                               data-target="#delete_{{ $FAQ->id }}" class="bg-danger"/>
                            {{-- End  delete  --}}
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $FAQs->links() }}
        </div>
    </div>
@stop
