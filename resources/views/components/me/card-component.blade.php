@auth
    <div class="nav__categories-body offcanvas-body pt-4">
        @if ($cards->isNotEmpty())
            <?php $total_price = 0; ?>
            <div class="cart-products">
                @foreach ($cards as $card)
                <?php $encryptedId = Crypt::encrypt($card->book->id); ?>
                    <ul class="nav__list list-unstyled">
                        <li class="cart-products__item d-flex justify-content-between gap-2">
                            <div class="d-flex gap-2">
                                <div>
                                    <form method="post" action="{{ route('card.delete',$card) }}">
                                        @csrf
                                        @method('delete')
                                        <button  class="cart-products__remove" type="submit">x</button>
                                    </form>
                                </div>
                                <div>
                                    <p class="cart-products__name m-0 fw-bolder">{{ $card->book->title }}</p>
                                    <p class="cart-products__price m-0">
                                        {{ $card->book->price_after_offer ? $card->book->price_after_offer : $card->book->price }}<span
                                            style="color: #e91616">X</span>{{ $card->quantity }}<span>
                                        </span> جنيه </p>
                                    {{ $total = ($card->book->price_after_offer ? $card->book->price_after_offer : $card->book->price) * $card->quantity }}<span>.00</span>
                                    جنيه </p>
                                    <?php $total_price += ($card->book->price_after_offer ? $card->book->price_after_offer : $card->book->price) * $card->quantity; ?>
                                </div>
                            </div>
                            <a href="{{ route('book', $encryptedId) }}">
                                <div class="cart-products__img">
                                    <img class="w-100" src="/images/books/{{ $card->book->image }}" alt="">
                                </div>
                            </a>

                        </li>
                    </ul>
                @endforeach
                <div class="d-flex justify-content-between">
                    <p class="fw-bolder">المجموع:</p>
                    <p>{{ $total_price }}.00 جنيه</p>
                </div>
            </div>

           <a href="{{ route('order.create') }}" ><button class="nav__cart-btn text-center text-white w-100 border-0 mb-3 py-2 px-3 bg-success">اتمام
            الطلب</button></a>

          <a href="{{ route('books.all') }}"><button  class="nav__cart-btn text-center w-100 py-2 px-3 bg-transparent">تابع التسوق</button></a>
        @else
            <p>لا توجد منتجات في سلة المشتريات</p>
        @endif
    </div>
@endauth
