@extends('frontend.layouts.master')

@section('title','تفاصيل الطلب')
@section('content_page')
<?php
$total_price = 0;
$total_price_after_offer = 0;
?>
    <main>
        <x-navbar-component  message=" تتبع طلبك" />

        <section class="section-container my-5 py-5">
            <section class="section-container">
                <h2>تفاصيل الطلب</h2>
                <table class="success__table w-100 mb-5">
                    <thead>
                        <tr class="border-0 bg-danger text-white">
                            <th>المنتج</th>
                            <th>الكمية</th>
                            <th class="d-none d-md-table-cell">الإجمالي</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_products as $order_products)
                        <?php $encryptedId = Crypt::encrypt($order_products->book->id); ?>
                            <tr>
                                <td>
                                    <div>
                                        <a href="{{ route('single_book', $encryptedId) }}">
                                            <h5>{{ $order_products->book->title }}</h5>
                                        </a>
                                    </div>
                                    <div>
                                        <span class="fw-bold">المؤلف</span>
                                        <span>{{ $order_products->book->author_name }}</span>
                                    </div>
                                    <div>
                                        <span class="fw-bold">رقم الطلب</span>
                                        <span>{{ $order_products->order->number_order }}</span>
                                    </div>
                                    <div>
                                        <span class="fw-bold"> تاريخ الطلب</span>
                                        <span>{{ $order_products->created_at->format('Y-m-d') }}</span>
                                    </div>
                                </td>
                                <td>{{ $order_products->quantity }}</td>
                                <td>{{ $order_products->total_price  }}.00
                                    جنيه</td>
                            </tr>
                            <?php $total_price += $order_products->total_price; ?>
                        @endforeach
                        <tr>
                            <th>الإجمالي:</th>
                            <td class="fw-bold">{{ $total_price }}.00 جنيه</td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section class="section-container mb-5">
                <h2>عنوان الفاتورة</h2>
                <div class="border p-3 rounded-3">
                    <p class="mb-1"> الاسم : {{ $order->fname }} {{ $order->lname }} </p>
                    <p class="mb-1">  العنوان : {{ $order->address }}  </p>
                    <p class="mb-1"> المحافظة : {{ $order->city }}</p>
                    <p class="mb-1"> الرقم التواصل : {{ $order->phone }}</p>
                    <p class="mb-1"> الاميل  {{ $order->email }}</p>
                </div>
                <br>
                <a href="{{ route('order.edit.address',$order->id) }}" ><button type=b"utton" class="btn btn-danger">تعديل العنوان </button></a>
            </section>
        </section>
    </main>
@endsection
