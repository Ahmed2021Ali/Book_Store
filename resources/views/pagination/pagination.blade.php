@if ($paginator->hasPages())
    <div class="products__pagination mb-5 d-flex justify-content-center gap-2">
        @foreach ($elements as $element)
            @foreach ($element as $page => $url)
               <a href="{{ $url }}"><span class="pagination__btn rounded-1 active">{{ $page }}</span></a>
            @endforeach
        @endforeach
    </div>
@endif
