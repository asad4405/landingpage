@include('Backend.includes.meta-tag')
<body>
    <div class="main-wrapper">

        @include('Backend.includes.sidebar')

        <div class="page-wrapper">

            @include('Backend.includes.header')

            <div class="page-content">

                @yield('content')

                

            </div>

            @include('Backend.includes.footer')

        </div>
    </div>

    @include('Backend.includes.script')
</body>

</html>
