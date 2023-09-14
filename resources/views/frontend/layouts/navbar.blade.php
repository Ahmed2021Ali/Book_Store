<nav class="nav">
    <div class="section-container w-100 d-flex align-items-center gap-4 h-100">
        <div class="nav__categories-btn align-items-center justify-content-center rounded-1 d-none d-lg-flex">
            <button class="border-0 bg-transparent" data-bs-toggle="offcanvas" data-bs-target="#nav__categories">
                <i class="fa-solid fa-align-center fa-rotate-180"></i>
            </button>
        </div>
        <div class="nav__logo">
            <a href="{{ route('homepage') }}">
                <img class="h-100" src="/assets/images/logo.png" alt="">
            </a>
        </div>
        <div class="nav__search w-100">
            <form method="post" action="{{ route('search') }}">
                @csrf
                <input class="nav__search-input w-100" name="search" type="search"
                    placeholder="أبحث هنا عن اي شئ تريده...">
                <span class="nav__search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
            </form>
        </div>
        <ul class="nav__links gap-3 list-unstyled d-none d-lg-flex m-0">
            @auth
                <li class="nav__link nav__link-user">
                    <a class="d-flex align-items-center gap-2">
                        حسابي
                        <i class="fa-regular fa-user"></i>
                        <i class="fa-solid fa-chevron-down fa-2xs"></i>
                    </a>
                    <ul class="nav__user-list position-absolute p-0 list-unstyled bg-white">
                        @if (auth()->user()->type == 'admin')
                            <li class="nav__link nav__user-link"><a href="{{ route('dashbord') }}">لوحة التحكم</a></li>
                        @endif
                        <li class="nav__link nav__user-link"><a href="{{ route('order.show') }}">الطلبات</a></li>
                        <li class="nav__link nav__user-link"><a href="{{ route('account_details') }}">تفاصيل الحساب</a></li>
                        <li class="nav__link nav__user-link"><a href="{{ route('fav.show') }}">المفضلة</a></li>
                        <form action="{{ route('logout') }}" method="POST" class="nav__link nav__user-link">
                            @csrf
                            <button class="btn btn-light" type="submit">تسجيل الخروج </button>

                        </form>
                    </ul>
                </li>
            @endauth
            @guest
                <li class="nav__link">
                    <a class="d-flex align-items-center gap-2" href="{{ route('login') }}">
                        تسجيل الدخول
                        <i class="fa-regular fa-user"></i>
                    </a>
                </li>
            @endguest
            <x-me.count-component/>
        </ul>
    </div>
    {{--      <div class="nav-mobile fixed-bottom d-block d-lg-none">
        <ul class="nav-mobile__list d-flex justify-content-around gap-2 list-unstyled  m-0 border-top">
            <li class="nav-mobile__link">
                <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="index.html">
                    <i class="fa-solid fa-house"></i>
                    الرئيسية
                </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
                data-bs-target="#nav__categories">
                <i class="fa-solid fa-align-center fa-rotate-180"></i>
                الاقسام
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
                <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="profile.html">
                    <i class="fa-regular fa-user"></i>
                    حسابي
                </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
                <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="favourites.html">
                    <i class="fa-regular fa-heart"></i>
                    المفضلة
                </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
                data-bs-target="#nav__cart">
                <i class="fa-solid fa-cart-shopping"></i>
                السلة
            </li>
        </ul>
        <!--  -->
    </div>  --}}
</nav>
