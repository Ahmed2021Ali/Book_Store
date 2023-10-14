@extends('frontend.layouts.master')

@section('title', 'books')
@section('content_page')
    <main>
        <x-navbar-component message=" المتجر" />
        <div class="section-container d-block d-lg-flex gap-5 shop mt-5 pt-5">
            <div class="shop__filter mb-4">
                <div class="mb-4">
                    <h6 class="shop__filter-title">بتدور علي ايه؟</h6>
                    <form method="post" action="{{ route('search') }}">
                        @csrf
                        <div class="filter__search position-relative">
                            <input class="w-100 py-1 ps-2" type="text" name="search" placeholder="بتدور علي ايه؟" />
                            <div
                                class="filter__search-icon position-absolute h-100 top-0 end-0 p-2 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </div>
                    </form>
                </div>
                <x-me.search-component />
            </div>
            <div class="shop__products w-100">
                <div class="row products__list">
                    @foreach ($books as $book)
                    <?php $encryptedId = Crypt::encrypt($book->id); ?>
                        <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
                            <div class="product__header mb-3">
                                <a href="{{ route('single_book', $encryptedId) }}">
                                    <div class="product__img-cont">
                                        <img class="product__img w-100 h-100 object-fit-cover"
                                            src="\assets\images\book\{{ $book->image }}" data-id="white" />
                                    </div>
                                </a>
                                <div
                                    class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                                    وفر {{ $book->offer }}%
                                </div>
                            </div>
                            <div class="product__author text-center">{{ $book->author_name }}</div>
                            <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                                <span class="product__price product__price--old">
                                    {{ $book->price }}.00 جنيه
                                </span>
                                <span class="product__price">
                                    {{ $book->price_after_offer ? $book->price_after_offer : $book->price }}.00 جنيه
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $books->links('pagination.pagination') }}
            </div>
        </div>
    </main>
@endsection
