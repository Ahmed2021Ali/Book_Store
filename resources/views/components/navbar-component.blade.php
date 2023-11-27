<div>
    <section class="page-top d-flex justify-content-center align-items-center flex-column text-center ">
        <div class="page-top__overlay"></div>
        <div class="position-relative">
            <div class="page-top__title mb-3">
                <h2>{{ $message }}</h2>
            </div>
            <div class="page-top__breadcrumb">
                <a class="text-gray" href="{{ route('homepage') }}">الرئيسية</a> /
                <span class="text-gray">{{ $message }} </span>
            </div>
        </div>
    </section>
</div>
