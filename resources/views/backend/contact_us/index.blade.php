  @extends('adminlte::page')

@section('title', ' Contact')

@section('content_header')
    <h1>Show all Contacts</h1>
@stop

@section('content')
    <x-messages/>
    <x-adminlte-modal id="create" title="Add Contact Us" theme="purple" icon="fas fa-bolt" size='lg' disable-animations>
        @include('backend.contact_us.create')
        <x-slot name="footerSlot">
        </x-slot>
    </x-adminlte-modal>
    <x-adminlte-button label="Add Contact Us" data-toggle="modal" data-target="#create" class="bg-purple"/>
    <div class="row">
        <div class="col-12">
            <br>
            <table id="example1" class="table table-bordered table-striped" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Reason for communication</th>
                        <th>Massege</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->reason_for_communication }}</td>
                            <td>{{ $contact->massage }}</td>
                            <td>

                                <x-adminlte-modal id="edit_{{$contact->id}}" title="Edit contact us" theme="teal"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    @include('backend.contact_us.edit',['contact'=>$contact])
                                    <x-slot name="footerSlot">
                                    </x-slot>
                                </x-adminlte-modal>
                                <x-adminlte-button label="Edit contact us" data-toggle="modal"
                                                   data-target="#edit_{{$contact->id}}" class="bg-teal"/>

                                {{--  delete  --}}
                                <x-adminlte-modal id="delete_{{ $contact->id }}" title="Delete" theme="purple"
                                                  icon="fas fa-bolt" size='lg' disable-animations>
                                    <form action="{{ route('contact.destroy', $contact) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <h3> Are you sure to delete ? </h3>
                                        <button class="btn btn-danger btn-lg btn-block"> Yes</button>
                                    </form>
                                    <x-slot name="footerSlot">
                                    </x-slot>
                                </x-adminlte-modal>
                                <x-adminlte-button label="Delete" data-toggle="modal"
                                                   data-target="#delete_{{ $contact->id }}" class="bg-danger"/>
                                {{-- End  delete  --}}


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $contacts->links() }}
        </div>
    </div>
@stop

