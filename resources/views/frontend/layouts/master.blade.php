@include('frontend.layouts.head')

<body>
    <!-- Header Content Start -->
    <div>
        <div class="header-container fixed-top border-bottom">
            @include('frontend.layouts.header')
            <!--    -->
            @include('frontend.layouts.navbar')

            @include('frontend.layouts.sidbar')

            @include('frontend.layouts.sidbar_card')
        </div>
    </div>
    <!-- Header Content End -->

    <!-- Page Content Start -->
    @yield('content_page')
    <!-- Page Content End -->

    @include('frontend.layouts.footer')
