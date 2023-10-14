@extends('frontend.layouts.master')
@section('title', 'اتمام الطلب');
@section('content_page')
    <main>
        <x-navbar-component message="تعديل العنوان " />

        <section class="section-container my-5 py-5 d-lg-flex">
            <div class="checkout__form-cont w-50 px-3 mb-5">
                <form class="checkout__form" action="{{ route('order.update.address',$address->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="d-flex gap-3 mb-3">
                        <div class="w-50">
                            <label for="fname">الاسم الأول <span class="required">*</span></label>
                            <input class="form__input" type="text" id="fname" name="fname"
                                value="{{ $address->fname }}" />
                            @error('fname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-50">
                            <label for="lname">الاسم الأخير <span class="required">*</span></label>
                            <input class="form__input" type="text" id="lname" name="lname"
                                value="{{ $address->lname }}" />
                            @error('lname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="city">المدينة / المحافظة<span class="required">*</span></label>
                        <select class="form-control" id="city" name="city" >
                            <option>المنيا</option>
                            <option>المنوفية</option>
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
                        <input class="form__input" name="address" value="{{ $address->address }}"
                            placeholder="رقم المنزل او الشارع / الحي" type="text" id="address" />
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone">رقم الهاتف<span class="required">*</span></label>
                        <input class="form__input" type="text" id="phone" name="phone"
                            value="{{ $address->phone }}" />
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">البريد الإلكتروني (اختياري)<span class="required">*</span></label>
                        <input class="form__input" type="email" id="email" name="email"
                            value="{{ $address->email }}" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <h2>معلومات اضافية</h2>
                        <label for="note">ملاحظات الطلب (اختياري)<span class="required">*</span></label>
                        <textarea class="form__input" placeholder="ملاحظات حول الطلب, مثال: ملحوظة خاصة بتسليم الطلب." type="text"
                            id="note" name="note"  value="{{ $address->note }}" ></textarea>
                        @error('note')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="primary-button w-100 py-2">تاكيد العنوان</button>
                </form>
            </div>
        </section>

    </main>
@endsection
