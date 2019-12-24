<title>Sistem Informasi Pencatatan Invoice</title>

<!-- Logo -->
<a href="{{ url('/dashboard') }}" class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
<span class="logo-mini"><b>SI</b>PI</span>
<!-- logo for regular state and mobile devices -->
<span class="logo-lg"><b>SIPI</b></span>
</a>
<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="{{ url('/authi/logout') }}">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">Keluar</span>
            </a>
        </li>
        </ul>
    </div>
</nav>