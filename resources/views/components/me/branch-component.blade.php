<div>
    @foreach ($branches as $branches )
    <div class="d-flex gap-3 mb-3">
        <div class="fs-5"><i class="fa-solid fa-location-dot"></i></div>
        <div class="text-gray">{{ $branches->address_detail }}</div>
    </div>
    @endforeach

</div>
