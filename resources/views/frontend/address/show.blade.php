@extends('frontend.layouts.master')

@section('title','عنوان التوصيل')
@section('content_page')
    <main>
        <x-navbar-component message=" عنوان التوصيل"/>

        <section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
            <div class="profile__right">
                <div class="profile__user mb-3 d-flex gap-3 align-items-center">
                    <div class="profile__user-img rounded-circle overflow-hidden">
                        <img class="w-100" src="assets/images/user.png" alt="">
                    </div>
                    <div class="profile__user-name">{{ Auth::user()->name }}</div>
                </div>
                <x-me.sidbar-profile-component/>
            </div>

            <br>

            <div class="profile__left mt-4 mt-md-0 w-100">
                <div class="profile__tab-content orders active">
                    <table class="orders__table w-100">
                        <thead>
                        <th class="d-none d-md-table-cell">اسم الستلم</th>
                        <th class="d-none d-md-table-cell">المدينة</th>
                        <th class="d-none d-md-table-cell">العنوان</th>
                        <th class="d-none d-md-table-cell">رقم التليفون</th>
                        <th class="d-none d-md-table-cell">الاميل</th>
                        <th class="d-none d-md-table-cell">الحذف</th>
                        <th class="d-none d-md-table-cell">التعديل</th>

                        </thead>
                        <tbody>
                        @foreach ($addresses as $address)
                            <tr class="order__item">
                                <td class="d-flex justify-content-between d-md-table-cell">
                                    <div class="fw-bolder d-md-none">اسم المستلم:</div>
                                    <div>{{ $address->fname }}</div>
                                </td>
                                <td class="d-flex justify-content-between d-md-table-cell">
                                    <div class="fw-bolder d-md-none">المدينة:</div>
                                    <div> {{ $address->city }}</div>
                                </td>
                                <td class="d-flex justify-content-between d-md-table-cell">
                                    <div class="fw-bolder d-md-none">العنوان:</div>
                                    <div>{{ $address->address }}</div>
                                </td>
                                <td class="d-flex justify-content-between d-md-table-cell">
                                    <div class="fw-bolder d-md-none">رقم التواصل:</div>
                                    <div>
                                        {{ $address->phone }}
                                    </div>
                                </td>
                                <td class="d-flex justify-content-between d-md-table-cell">
                                    <div class="fw-bolder d-md-none">الاميل :</div>
                                    <div>{{ $address->email }} </div>
                                </td>
                                <td class="d-flex justify-content-between d-md-table-cell">
                                    <div class="fw-bolder d-md-none">حذف الاوردر:</div>
                                    <form action="{{ route('address.destroy', $address) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                                <td class="d-flex justify-content-between d-md-table-cell">
                                    <div class="fw-bolder d-md-none">تعديل الاوردر:</div>
                                    <a href="{{route('address.edit',$address)}}" class="btn btn-info">تعديل  </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </section>
    </main>
@endsection
