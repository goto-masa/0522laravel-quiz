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
    </body>
</html>
