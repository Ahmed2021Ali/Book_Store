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
                        <th>Title</th>
                        <th>Show Book</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_products as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->book->title }}</td>
                            <td>
                                <?php $encryptedId = Crypt::encrypt($order->book_id) ?>
                                <a href="{{ route('single_book', $encryptedId) }}" class="btn btn-primary">Show Book</a>
                            </td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->order->fname." ".$order->order->lname }}</td>
                            <td>{{ $order->order->address }}</td>
                            <td>{{ $order->order->phone }}</td>
                            <td>{{ $order->order->email }}</td>
                            <td>
                                <form action="{{ route('delete_order', $order->id) }}" method="post" class="d-inline">
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
        {{ $order_products->links() }}
   </div>

@stop
