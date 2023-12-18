@extends('frontend.layouts.master')

@section('title','المفضلة')
@section('content_page')
    <main>
        <x-navbar-component message=" المفضلة" />
        <div class="my-5 py-5">
            <section class="section-container favourites">
                <table class="w-100">
                    <thead>
                        <th class="d-none d-md-table-cell"></th>
                        <th class="d-none d-md-table-cell"></th>
                        <th class="d-none d-md-table-cell">الاسم</th>
                        <th class="d-none d-md-table-cell">السعر</th>
                        <th class="d-none d-md-table-cell">تاريخ الاضافه</th>
                        <th class="d-none d-md-table-cell">المخزون</th>
                        <th class="d-table-cell d-md-none">product</th>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($favs as $fav)
                        <?php $encryptedId = Crypt::encrypt($fav->book->id); ?>
                            <tr>
                                <td class="d-block d-md-table-cell">
                                    <form action="{{ route('fav.delete', $fav) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="favourites__remove m-auto"><i class="fa-solid fa-xmark"></i></button>
                                    </form>

                                </td>
                                <td class="d-block d-md-table-cell favourites__img">
                                    <img src="\assets\images\book\{{ $fav->book->image }}" alt="" />
                                </td>
                                <td class="d-block d-md-table-cell">
                                    <a href="{{ route('book', $encryptedId) }}"> {{ $fav->book->title }} </a>
                                </td>
                                <td class="d-block d-md-table-cell">
                                    <span class="product__price product__price--old">{{ $fav->book->price }} جنية</span>
                                    <span
                                        class="product__price">{{ $fav->book->price_after_offer ? $fav->book->price_after_offer : $fav->book->price }}
                                        جنية</span>
                                </td>
                                <td class="d-block d-md-table-cell">{{ $fav->created_at }}</td>
                                <td class="d-block d-md-table-cell">
                                    <span class="me-2"><i class="fa-solid fa-check"></i></span>
                                    <span class="d-inline-block d-md-none d-lg-inline-block">متوفر بالمخزون</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
            <br>
            {{ $favs->links('pagination.pagination') }}
        </div>
    </main>
@endsection
