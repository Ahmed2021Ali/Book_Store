@extends('frontend.layouts.master')
@section('title','اتمام الطلب');
@section('content_page')
    <main>
        <?php
        $total_price = 0;
        $total_price_after_offer = 0;
        ?>
        <x-navbar-component message="إتمام الطلب"/>

        <br>

        <div class="text-center">
            <a href="{{route('address.create')}}" type="button" class="btn btn-primary btn-lg">اضافة عنوان جديد </a>
        </div>

        <br>

        <div class="card-group">
            @if($addresses)
                @foreach($addresses as $address)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$address->city}}</h5>
                            <p class="card-text">{{$address->address}}</p>
                            <p class="card-text">{{$address->phone}}</p>
                            <p class="card-text"><small
                                    class="text-muted">{{$address->created_at->diffForHumans(null, false, false)}}</small>
                            </p>
                            <a href="{{route('address.edit',$address)}}" class="btn btn-info">تعديل العنوان </a>
                            <form action="{{route('address.destroy',$address)}}" method="post">
                                @method('delete')
                                @csrf
                                <a class="btn btn-danger">حذف العنوان</a>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <section class="section-container my-5 py-5 d-lg-flex">
            <div class="checkout__order-details-cont w-50 px-3">

                <form class="checkout__form" action="{{ route('order.status_payment') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="status" style="color:blue"> اختار طريقة الدفع <span
                                class="required">*</span></label>
                        <select name="statusPayment" id="status" class="form-control" required>
                            <option style="display: none" value=""> اختار طريقة الدفع</option>
                            <option value="كاش"> الدفع عند الاستلام طلبك</option>
                            <option value="فيزا"> باستخدام باي بال </option>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" style="color:blue"> اختار عنوان التوصيل <span
                                class="required">*</span></label>
                        <select name="address_id" id="address" class="form-control" required>
                            <option style="display: none" value=""> اختار عنوان التوصيل</option>
                            @if($addresses)
                                @foreach($addresses as $address)
                                    <option value="{{$address->id}}">{{$address->city." ".$address->address}} </option>
                                @endforeach
                            @endif
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
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
                    <p class="m-0 fw-bolder">الدفع باستخدام </p>
                </div>

                <img src="{{ asset('assets/images/Paypal-logo.png') }}" alt="HTML5 Icon"
                     style="width:300px;height:180px;">
            </div>
        </section>
    </main>
@endsection
