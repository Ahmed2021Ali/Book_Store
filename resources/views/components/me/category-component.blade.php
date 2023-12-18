<div>
    <div class="nav__categories-body offcanvas-body pt-0">
        <div class="nav__side-logo mb-2">
            <img class="w-100" src="{{ url('/assets/images/logo.png ')}}" alt="">
        </div>
        <ul class="nav__list list-unstyled">
            <li class="nav__link nav__side-link"><a href="{{ route('books.all') }}" class="py-3">جميع المنتجات</a></li>
            @foreach ($category as $category)
            <?php $encryptedId = Crypt::encrypt($category->id); ?>
                <li class="nav__link nav__side-link"><a href="{{ route('books.category',$encryptedId)}}" class="py-3"> {{ $category->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
