@extends('frontend.layouts.master')

@section('title','تفاصيل الطلب')
@section('content_page')
    <main>
        <x-navbar-component message=" حسابي" />

        <section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
            <div class="profile__right">
                <div class="profile__user mb-3 d-flex gap-3 align-items-center">
                    <div class="profile__user-img rounded-circle overflow-hidden">
                        <img class="w-100" src="assets/images/user.png" alt="">
                    </div>
                    <div class="profile__user-name">{{ Auth::user()->name }}</div>
                </div>
                <x-me.sidbar-profile-component />
            </div>

            <div class="profile__left mt-4 mt-md-0 w-100">
                <div class="profile__tab-content orders active">
                    <div class="orders__none d-flex justify-content-between align-items-center py-3 px-4">
                        <p class="m-0">لم يتم تنفيذ اي طلب بعد.</p>
                        <a href="{{ route('Show_all_Books') }}"><button class="primary-button">تصفح المنتجات</button></a>
                    </div>
                    <table class="orders__table w-100">
                        <thead>
                            <th class="d-none d-md-table-cell">الطلب</th>
                            <th class="d-none d-md-table-cell">التاريخ</th>
                            <th class="d-none d-md-table-cell">الحالة</th>
                            <th class="d-none d-md-table-cell">الاجمالي</th>
                            <th class="d-none d-md-table-cell">الكمية</th>
                            <th class="d-none d-md-table-cell">اجراءات</th>
                            <th class="d-none d-md-table-cell">حذف الاوردر</th>
                        </thead>
                        <tbody>
                            @foreach ($order_products as $order_product)
                            <?php $encryptedId = Crypt::encrypt($order_product->book->id); ?>
                                <tr class="order__item">
                                    <td class="d-flex justify-content-between d-md-table-cell">
                                        <div class="fw-bolder d-md-none">الطلب:</div>
                                        <div><a href="">#{{ $order_product->order->number_order }}</a></div>
                                    </td>
                                    <td class="d-flex justify-content-between d-md-table-cell">
                                        <div class="fw-bolder d-md-none">التاريخ:</div>
                                        <div> {{ $order_product->created_at->format('Y-m-d') }}</div>
                                    </td>
                                    <td class="d-flex justify-content-between d-md-table-cell">
                                        <div class="fw-bolder d-md-none">الحالة:</div>
                                        <div>قيد التنفيذ</div>
                                    </td>
                                    <td class="d-flex justify-content-between d-md-table-cell">
                                        <div class="fw-bolder d-md-none">الاجمالي:</div>
                                        <div>
                                            {{ $order_product->total_price }}.0
                                            جنيه لعنصر واحد</div>
                                    </td>
                                    <td class="d-flex justify-content-between d-md-table-cell">
                                        <div class="fw-bolder d-md-none">الكمية:</div>
                                        <div>{{ $order_product->quantity }} </div>
                                    </td>
                                    <td class="d-flex justify-content-between d-md-table-cell">
                                        <div class="fw-bolder d-md-none">اجراءات:</div>
                                        <div><a class="primary-button"
                                                href="{{ route('single_book', $encryptedId) }}">عرض</a></div>
                                    </td>
                                    <td class="d-flex justify-content-between d-md-table-cell">
                                        <div class="fw-bolder d-md-none">حذف الاوردر:</div>
                                        <form action="{{ route('order.destroy', $order_product->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
{{--                      {{ $order_products->links('pagination.pagination') }}
  --}}                </div>
            </div>
        </section>
    </main>
@endsection
