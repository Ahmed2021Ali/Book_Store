<div>
    <ul class="profile__tabs list-unstyled ps-3">
        @if (auth()->user()->type == 'admin')
            <li class="profile__tab">
                <a class="py-2 px-3 text-black text-decoration-none" href="{{ route('dashbord') }}">لوحة التحكم</a>
            </li>
        @endif

        <li class="profile__tab">
            <a class="py-2 px-3 text-black text-decoration-none" href="{{ route('order.show') }}">الطلبات</a>
        </li>

        <li class="profile__tab active">
            <a class="py-2 px-3 text-black text-decoration-none" href="{{ route('account_details') }}">تفاصيل الحساب</a>
        </li>
        <li class="profile__tab">
            <a class="py-2 px-3 text-black text-decoration-none" href="{{ route('fav.show') }}">المفضلة</a>
        </li>
        <li class="profile__tab">
            <form action="{{ route('logout') }}" method="POST" class="nav__link nav__user-link">
                @csrf
                <button class="btn btn-light" type="submit">تسجيل الخروج </button>
            </form>
        </li>
    </ul>
</div>
