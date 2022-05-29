    <!DOCTYPE html>
    <html lang="ja">
         @yield('head-section')
    <body>
        <main>
            @yield('header-section')
            <div class="container">
                @yield('content')

            </div>
        </main>
        @yield('footer-section')
        @if(Auth::check())
            <script>
                document.getElementById('logout').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
                });
            </script>
        @endif
        @yield('scripts')
    </body>
</html>
