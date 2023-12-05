<div>
    @include('backend.layouts._header')
    @include('backend.layouts._sidebar')
    <main id="main" class="min-vh-100 main">
        @yield('content')
    </main>

    @include('backend.layouts._footer')
</div>
