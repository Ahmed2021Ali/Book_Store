@extends('frontend.layouts.master')
@section('title', 'تفاصيل الطلب')
@section('content_page')
    <main>
        <x-navbar-component message=" حسابي" />
        <?php $total_price = 0; ?>

        <section class="section-container profile my-5 py-5">
            <div class="text-center mb-5">
                <div class="success-gif m-auto">
                    <img class="w-100" src="assets/images/success.gif" alt="" />
                </div>
                <h4 class="mb-4">جاري تجهيز طلبك الآن</h4>
                <p class="mb-1">
                    سيقوم أحد ممثلي خدمة العملاء بالتواصل معك لتأكيد الطلب
                </p>
                <p>برجاء الرد على الأرقام الغير مسجلة</p>
                <a href="{{ route('books.all') }}"><button class="primary-button">تصفح منتجات اخري</button></a>
            </div>
            <div>
                <p>شكرًا لك. تم استلام طلبك.</p>
                <div class="d-flex flex-wrap gap-2">
                  <div class="success__details">
                    <p class="success__small">رقم الطلب:</p>
                    <p class="fw-bolder">{{ $address->number_order }}</p>
                  </div>
                  <div class="success__details">
                    <p class="success__small">التاريخ:</p>
                    <p class="fw-bolder">{{ $address->created_at->format('Y-m-d') }}</p>
                  </div>
                  <div class="success__details">
                    <p class="success__small">البريد الإلكتروني:</p>
                    <p class="fw-bolder">{{ $address->email }}</p>
                  </div>
                </div>
              </div>
        </section>

        <section class="section-container">
            <h2>تفاصيل الطلب</h2>
            <table class="success__table w-100 mb-5">
                <thead>
                    <tr class="border-0 bg-main text-white">
                        <th>المنتج</th>
                        <th>الكمية</th>
                        <th class="d-none d-md-table-cell">الإجمالي</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <?php $encryptedId = Crypt::encrypt($order->book->id); ?>
                        <tr>
                            <td>
                                <div>
                                    <a href="{{ route('book', $encryptedId) }}">
                                        <h5>{{ $order->book->title}}</h5>
                                    </a>
                                </div>
                                <div>
                                    <span class="fw-bold">المؤلف</span>
                                    <span>{{ $order->book->author_name }}</span>
                                </div>
                                <div>
                                    <span class="fw-bold"> تاريخ الطلب</span>
                                    <span>{{ $order->created_at->format('Y-m-d') }}</span>
                                </div>
                            </td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}.00
                                جنيه</td>
                        </tr>
                        <?php $total_price += ($order->price_after_offer ? $order->price_after_offer : $order->price) * $order->quantity; ?>
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
                <p class="mb-1">{{ $address->fname }} {{ $address->lname }} </p>
                <p class="mb-1">{{ $address->address }} </p>
                <p class="mb-1">{{ $address->city }}</p>
                <p class="mb-1">{{ $address->phone }}</p>
                <p class="mb-1">{{ $address->email }}</p>
            </div>
            <a href="{{ route('address.edit',$address) }}" ><button type="button" class="btn btn-danger">تعديل العنوان </button></a>
        </section>

    </main>
@endsection
