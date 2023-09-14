@extends('frontend.layouts.master')

@section('content_page')
    <main>
        <x-navbar-component  message=" حسابي" />

        <section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
            <div class="profile__right mb-5">
                <div class="profile__user mb-3 d-flex gap-3 align-items-center">
                    <div class="profile__user-img rounded-circle overflow-hidden">
                        <img class="w-100" src="assets/images/user.png" alt="" />
                    </div>
                    <div class="profile__user-name">moamenyt</div>
                </div>
                <ul class="profile__tabs list-unstyled ps-3">
                    <li class="profile__tab active">
                        <a class="py-2 px-3 text-black text-decoration-none" href="profile.html">لوحة التحكم</a>
                    </li>
                    <li class="profile__tab">
                        <a class="py-2 px-3 text-black text-decoration-none" href="orders.html">الطلبات</a>
                    </li>
                    <li class="profile__tab">
                        <a class="py-2 px-3 text-black text-decoration-none" href="account_details.html">تفاصيل الحساب</a>
                    </li>
                    <li class="profile__tab">
                        <a class="py-2 px-3 text-black text-decoration-none" href="favourites.html">المفضلة</a>
                    </li>
                    <li class="profile__tab">
                        <a class="py-2 px-3 text-black text-decoration-none" href="">تسجيل الخروج</a>
                    </li>
                </ul>
            </div>
            <div class="profile__left mt-4 mt-md-0 w-100">
                <div class="profile__tab-content active">
                    <p class="mb-5">
                        مرحبا <span class="fw-bolder">moamenyt</span> (لست
                        <span class="fw-bolder">moamenyt</span>?
                        <a class="text-danger" href="">تسجيل الخروج</a>)
                    </p>

                    <p>
                        من خلال لوحة تحكم الحساب الخاص بك، يمكنك استعراض
                        <a class="text-danger" href="orders.html">أحدث الطلبات</a>،
                        والفواتير
                        الخاصة بك، بالإضافة إلى
                        <a class="text-danger" href="account_details.html">تعديل كلمة المرور وتفاصيل حسابك</a>.
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection
