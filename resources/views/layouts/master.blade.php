<!DOCTYPE html>
<html>
    <head>
        @include('layouts.head') 
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                @include('layouts.header')
            </header>
            <aside class="main-sidebar">
                @include('layouts.sidebar')
            </aside>
            <div class="content-wrapper">
                <section class="content container-fluid">
                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                @include('layouts.footer') 
            </footer>
        </div>
        @include('layouts.foot')
    </body>
</html>