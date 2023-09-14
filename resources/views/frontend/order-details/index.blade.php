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
                        @foreach ($order as $orders)
                        <?php $encryptedId = Crypt::encrypt($orders->book->id); ?>
                            <tr>
                                <td>
                                    <div>
                                        <a href="{{ route('single_book', $encryptedId) }}">
                                            <h5>{{ $orders->book->title }}</h5>
                                        </a>
                                    </div>
                                    <div>
                                        <span class="fw-bold">المؤلف</span>
                                        <span>{{ $orders->book->author_name }}</span>
                                    </div>
                                    <div>
                                        <span class="fw-bold">رقم الطلب</span>
                                        <span>{{ $orders->number_order }}</span>
                                    </div>
                                    <div>
                                        <span class="fw-bold"> تاريخ الطلب</span>
                                        <span>{{ $orders->created_at }}</span>
                                    </div>
                                </td>
                                <td>{{ $orders->quantity }}</td>
                                <td>{{ ($orders->book->price_after_offer ? $orders->book->price_after_offer : $orders->book->price) * $orders->quantity  }}.00
                                    جنيه</td>
                            </tr>
                            <?php $total_price += ($orders->book->price_after_offer ? $orders->book->price_after_offer : $orders->book->price) * $orders->quantity ; ?>
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
                    <p class="mb-1">{{ $user->fname }} {{ $user->lname }} </p>
                    <p class="mb-1">{{ $user->address }}  </p>
                    <p class="mb-1">{{ $user->city }}</p>
                    <p class="mb-1">{{ $user->phone }}</p>
                    <p class="mb-1">{{ $user->email }}</p>
                </div>

            </section>
        </section>
    </main>
@endsection
