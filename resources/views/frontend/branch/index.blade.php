@extends('frontend.layouts.master')


@section('content_page')
    <main>
        <x-navbar-component  message=" فروعنا" />

        <section class="branches section-container my-5 py-5">
            <div class="row">
                @foreach ($branches as $branches)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="branches__item h-100">
                            <h3>فرع: {{ $branches->city }}</h3>
                            <p>
                                {{ $branches->address_detail }}
                            </p>
                            <div class="branches__contact d-flex align-items-center gap-2 mb-3">
                                <div class="branches__icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <p class="mb-0 fw-bolder">اتصل بنا</p>
                                    <p class="mb-0">{{ $branches->branch_number }}</p>
                                </div>
                            </div>
                            <div class="branches__location d-flex align-items-center gap-2">
                                <div class="branches__icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <p class="mb-0 fw-bolder">زورنا في الفرع</p>
                                    <p class="mb-0">{{ $branches->city }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
