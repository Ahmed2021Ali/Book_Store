<div>
    <h6 class="shop__filter-title mb-3">التصنيف</h6>
    <form method="post" action="{{ route('search') }}">
        @csrf
        <div class="filter__size">
            @foreach ($category as $category)
                <div class="mb-3">
                    <input type="checkbox" name="search" value="{{ $category->title }}"  id="search" />
                    <label for="search">{{ $category->title }}</label>
                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <input type="submit" class="primary-button" value="ابحث" />
        </div>
    </form>
</div>
