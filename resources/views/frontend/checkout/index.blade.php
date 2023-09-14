@extends('frontend.layouts.master')

@section('content_page')
    <main>
        <?php
        $total_price = 0;
        $total_price_after_offer = 0;
        ?>
        <x-navbar-component message="إتمام الطلب" />

        <section class="section-container my-5 py-5 d-lg-flex">

            <div class="checkout__form-cont w-50 px-3 mb-5">
                <h4>الفاتورة </h4>
                <form class="checkout__form" action="{{ route('order.store') }}" method="post">
                    @csrf
                    <div class="d-flex gap-3 mb-3">
                        <div class="w-50">
                            <label for="fname">الاسم الأول <span class="required">*</span></label>
                            <input class="form__input" type="text" id="fname" name="fname" />
                            @error('fname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-50">
                            <label for="lname">الاسم الأخير <span class="required">*</span></label>
                            <input class="form__input" type="text" id="lname" name="lname" />
                            @error('lname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="city">المدينة / المحافظة<span class="required">*</span></label>
                        <select class="form-control" id="city" name="city">
                            <option>المدينة / المحافظة</option>
                            <option>المنوفية</option>
                            <option>المنيا</option>
                            <option>الإسكندرية</option>
                            <option>الإسماعيلية</option>
                            <option>كفر الشيخ</option>
                            <option>أسوان</option>
                            <option>أسيوط</option>
                            <option>الأقصر</option>
                            <option>الوادي الجديد</option>
                            <option>شمال سيناء</option>
                            <option>البحيرة</option>
                            <option>بني سويف</option>
                            <option>بورسعيد</option>
                            <option>البحر الأحمر</option>
                            <option>الجيزة</option>
                            <option>الدقهلية</option>
                            <option>جنوب سيناء</option>
                            <option>دمياط</option>
                            <option>سوهاج</option>
                            <option>السويس</option>
                            <option>الشرقية</option>
                            <option>الغربية</option>
                            <option>الفيوم</option>
                            <option>القاهرة</option>
                            <option>القليوبية</option>
                            <option>قنا</option>
                            <option>مطروح</option>
                        </select>
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address">العنوان بالكامل ( المنطقة -الشارع - رقم المنزل)<span
                                class="required">*</span></label>
                        <input class="form__input" name="address" placeholder="رقم المنزل او الشارع / الحي" type="text"
                            id="address" />
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone">رقم الهاتف<span class="required">*</span></label>
                        <input class="form__input" type="text" id="phone" name="phone" />
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">البريد الإلكتروني (اختياري)<span class="required">*</span></label>
                        <input class="form__input" type="email" id="email" name="email" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h2>معلومات اضافية</h2>
                        <label for="note">ملاحظات الطلب (اختياري)<span class="required">*</span></label>
                        <textarea class="form__input" placeholder="ملاحظات حول الطلب, مثال: ملحوظة خاصة بتسليم الطلب." type="text"
                            id="note" name="note"></textarea>
                        @error('note')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="primary-button w-100 py-2">تاكيد الطلب</button>
                </form>
            </div>

            <div class="checkout__order-details-cont w-50 px-3">
                <h4>طلبك</h4>
                <div>
                    <table class="w-100 checkout__table">
                        <thead>
                            <tr class="border-0">
                                <th>المنتج</th>
                                <th>الكمية</th>
                                <th>المجموع</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $orders)
                                <tr>
                                    <td>{{ $orders->book->title }}</td>
                                    <td>{{ $orders->quantity }}</td>
                                    <td>
                                        <div class="product__price text-center d-flex gap-2 flex-wrap">
                                            <span class="product__price product__price--old">
                                                {{ $orders->book->price * $orders->quantity }}.00 جنيه
                                            </span>
                                            <span
                                                class="product__price">{{ ($orders->book->price_after_offer ? $orders->book->price_after_offer : $orders->book->price) * $orders->quantity }}.00
                                                جنيه </span>
                                        </div>
                                    </td>
                                </tr>
                                <?php $total_price += $orders->book->price * $orders->quantity; ?>
                                <?php $total_price_after_offer += $orders->book->price_after_offer * $orders->quantity; ?>
                            @endforeach

                            <tr>
                                <th>المجموع</th>
                                <td class="fw-bolder">{{ $total_price }}.00 جنيه</td>
                            </tr>
                            <tr class="bg-green">
                                <th>قمت بتوفير</th>
                                <td class="fw-bolder">{{ $total_price - $total_price_after_offer }}.00 جنيه</td>
                            </tr>
                            <tr>
                                <th>الإجمالي</th>
                                <td class="fw-bolder">{{ $total_price_after_offer }}.00 جنيه</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="checkout__payment py-3 px-4 mb-3">
                    <p class="m-0 fw-bolder">الدفع نقدا عند الاستلام</p>
                </div>

                <p>الدفع عند التسليم مباشرة.</p>
            </div>

        </section>
    </main>
@endsection
