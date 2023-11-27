@extends('frontend.layouts.master')

@section('title', 'الصفحة الرئيسية')


@section('content_page')
    <main class="pt-4">

        <!-- Hero Section Start -->
        <section class="section-container hero">
            <div class="owl-carousel hero__carousel owl-theme">
                @foreach ($sliders as $slider)
                    <div class="hero__item">
                        <img class="hero__img" src="assets\images\slider\{{ $slider->image }}" alt="">
                    </div>
                @endforeach

            </div>
        </section>
        <!-- Hero Section End -->

        <!-- Offer Section Start -->
        <section class="section-container mb-5 mt-3">
            <div class="offer d-flex align-items-center justify-content-between rounded-3 p-3 text-white">
                <div class="offer__title fw-bolder">
                    عروض اليوم
                </div>
                <div class="offer__time d-flex gap-2 fs-6">
                    <div class="d-flex flex-column align-items-center">
                        <span class="fw-bolder">{{ date('H') }}</span>
                        <div>ساعات</div>
                    </div>:
                    <div class="d-flex flex-column align-items-center">
                        <span class="fw-bolder">{{ date('i') }}</span>
                        <div>دقائق</div>
                    </div>:
                    <div class="d-flex flex-column align-items-center">
                        <span class="fw-bolder">{{ date('s') }}</span>
                        <div>ثواني</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Offer Section End -->

        <!-- Products Section Start -->
        <section class="section-container mb-4">
            <div class="owl-carousel products__slider owl-theme">
                @foreach ($offers as $offer)
                <?php $encryptedId = Crypt::encrypt($offer->id); ?>
                    <div class="products__item">
                        <div class="product__header mb-3">
                            <a href="{{ route('single_book', $encryptedId) }}">
                                <div class="product__img-cont">
                                    <img class="product__img w-100 h-100 object-fit-cover"
                                        src="assets\images\book\{{ $offer->image }}" data-id="white">
                                </div>
                            </a>
                            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                                وفر {{ $offer->offer }}%
                            </div>

                            <a href="{{ route('fav.store', $offer->id) }}"
                                class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                                <i class="fa-regular fa-heart"></i></a>
                        </div>
                        <div class="product__title text-center">
                            <a class="text-black text-decoration-none" href="{{ route('single_book', $encryptedId) }}">
                                {{ $offer->title }}
                            </a>
                        </div>
                        <div class="product__author text-center">
                            {{ $offer->author_name }}
                        </div>
                        <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                            <span class="product__price product__price--old">
                                {{ $offer->price }}.00 جنيه
                            </span>
                            <span class="product__price">
                                {{ $offer->price_after_offer ? $offer->price_after_offer : $offer->price }}.00 جنيه </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Products Section End -->

        <!-- Categories Section Start -->
        <section class="section-container mb-5">
            <div class="categories row gx-4">
                @foreach ($banners as $banner)
                    <div class="col-md-6 p-2">
                        <div class="p-4 border rounded-3">
                            <img class="w-100" src="assets\images\banner\{{ $banner->image }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Categories Section End -->

        <!-- Best Sales Section Start -->
        <section class="section-container mb-5">
            <div class="products__header mb-4 d-flex align-items-center justify-content-between">
                <h4 class="m-0">الاكثر مبيعا</h4>
                <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
            </div>
            <div class="owl-carousel products__slider owl-theme">
                @foreach ($bestseller as $bestseller)
                <?php $encryptedId = Crypt::encrypt($bestseller->id); ?>
                    <div class="products__item">
                        <div class="product__header mb-3">
                            <a href="{{ route('single_book', $encryptedId) }}">
                                <div class="product__img-cont">
                                    <img class="product__img w-100 h-100 object-fit-cover"
                                        src="assets\images\book\{{ $bestseller->image }}" data-id="white">
                                </div>
                            </a>
                            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                                وفر {{ $bestseller->offer }}%
                            </div>
                            <div>
                                <a href="{{ route('fav.store', $bestseller->id) }}"
                                    class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                                    <i class="fa-regular fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product__title text-center">
                            <a class="text-black text-decoration-none"
                                href="{{ route('single_book', $encryptedId) }}">
                                {{ $bestseller->title }}
                            </a>
                        </div>
                        <div class="product__author text-center">
                            {{ $bestseller->author_name }}
                        </div>
                        <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                            <span class="product__price product__price--old">
                                {{ $bestseller->price }}.00 جنيه
                            </span>
                            <span class="product__price">
                                {{ $bestseller->price_after_offer ? $bestseller->price_after_offer : $bestseller->price }}.00
                                جنيه
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Best Sales Section End -->

        <!-- Newest Section Start -->
        <section class="section-container mb-5">
            <div class="products__header mb-4 d-flex align-items-center justify-content-between">
                <h4 class="m-0">وصل حديثا</h4>
                <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
            </div>
            <div class="owl-carousel products__slider owl-theme">
                @foreach ($newly as $newly)
                <?php $encryptedId = Crypt::encrypt($newly->id); ?>
                    <div class="products__item">
                        <div class="product__header mb-3">
                            <a href="{{ route('single_book', $encryptedId) }}">
                                <div class="product__img-cont">
                                    <img class="product__img w-100 h-100 object-fit-cover"
                                        src="assets\images\book\{{ $newly->image }}" data-id="white">
                                </div>
                            </a>
                            <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                                وفر {{ $newly->offer }}%
                            </div>
                            <div>
                                <a href="{{ route('fav.store', $newly->id) }}"
                                    class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                                    <i class="fa-regular fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product__title text-center">
                            <a class="text-black text-decoration-none" href="{{ route('single_book', $encryptedId) }}">
                                {{ $newly->title }}
                            </a>
                        </div>
                        <div class="product__author text-center">
                            {{ $newly->author_name }}
                        </div>
                        <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                            <span class="product__price product__price--old">
                                {{ $newly->price }}.00 جنيه
                            </span>
                            <span class="product__price">
                                {{ $newly->price_after_offer ? $newly->price_after_offer : $newly->price }}.00 جنيه
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Newest Section End -->
    </main>
@endsection
