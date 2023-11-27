@auth
    <li class="nav__link">
        <a class="d-flex align-items-center gap-2" href="{{ route('fav.show') }}">
            المفضلة
            <div class="position-relative">
                <i class="fa-regular fa-heart"></i>
                <div class="nav__link-floating-icon">
                   {{$fav}}
                </div>
            </div>
        </a>
    </li>

    <li class="nav__link">
        <a class="d-flex align-items-center gap-2" data-bs-toggle="offcanvas" data-bs-target="#nav__cart">
            عربة التسوق
            <div class="position-relative">
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="nav__link-floating-icon">
                   {{$card}}
                </div>
            </div>
        </a>
    </li>
@endauth
