@extends('adminlte::page')

@section('title', ' Books')

@section('content_header')
    <h1>Show all Books</h1>
@stop

@section('content')
    <x-massege />
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Quentity</th>
                        <th>Q Num</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Acion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author_name }}</td>
                            <td>
                                @if (isset($book->price_after_offer))
                                    {{ $book->price_after_offer }}
                                @else
                                    {{ $book->price }}
                                @endif
                            </td>
                            <td>{{ $book->status == '1'? 'Avalible' : 'Not Avalible' }}</td>

                            <td>{{ $book->quantity >= '1'? 'Avalible' : 'Not Avalible' }}</td>
                            <td>{{ $book->quantity }}</td>

                            <td>
                                <img src="\assets\images\book\{{ $book->image }}" width="75px" height="90px">
                            </td>
                            <td>{{ $book->category->title }}</td>
                            <td>
                                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('book.destroy', $book->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class=" btn btn-danger"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        {{ $books->links() }}
   </div>

@stop

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
