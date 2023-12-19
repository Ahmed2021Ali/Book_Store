@extends('adminlte::page')

@section('title', ' Order')

@section('content_header')
    <h1>Show all Order</h1>
@stop

@section('content')
    <x-massege />
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Show Book</th>
                        <th>Title Book</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status For Pay</th>
                        <th>Has it been delivered?</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                <?php $encryptedId = Crypt::encrypt($order->book_id) ?>
                                <a href="{{ route('single_book', $encryptedId) }}" class="btn btn-primary">Show Book</a>
                            </td>
                            <td>{{ $order->book->title }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->order->fname." ".$order->order->lname }}</td>
                            <td>{{ $order->order->address }}</td>
                            <td>{{ $order->order->phone }}</td>
                            <td>{{ $order->order->email }}</td>
                            <td>{{ $order->status}}</td>
                            <td>
                                @if($order->delivery_status_of_orders != null)
                                    تم التوسيل بنجاح
                                @else
                                <form action="{{ route('order.delete', $order) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class=" btn btn-success"> Delete Order </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        {{ $order_products->links() }}
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
