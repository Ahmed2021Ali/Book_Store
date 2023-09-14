@extends('frontend.layouts.master')
@section('title', 'بحث ع الطلب ')
@section('content_page')
    <main>
        <x-navbar-component message=" تتبع طلبك" />
        <section class="section-container my-5 py-5">
            <p class="mb-5">فضلًا أدخل رقم طلبك في الصندوق أدناه وأضغط زر لتتبعه "تتبع الطلب" لعرض حالته. بإمكانك العثور
                على رقم الطلب في البريد المرسل إليك والذي يحتوي على فاتورة تأكيد الطلب.</p>
            <form action="{{ route('order.data_search') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="number_order">رقم الطلب</label>
                    <input class="form__input" placeholder="ستجده في رسالة تأكيد طلبك." type="text" name="number_order">
                    @error('number_order')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email">البريد الالكتروني للفاتورة</label>
                    <input class="form__input" placeholder="البريد الالكتروني الذي استخدمته اثناء اتمام الطلب"
                        type="text" name="email">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="primary-button">تتبع طلبك</button>
            </form>
        </section>
    </main>
@endsection
