  @extends('adminlte::page')

@section('title', ' Contact')

@section('content_header')
    <h1>Show all Contacts</h1>
@stop

@section('content')
    <x-massege />
    <div class="row">
        <div class="col-12">
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
                                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('contact.destroy', $contact->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class=" btn btn-danger"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $contacts->links() }}
        </div>
    </div>
@stop

