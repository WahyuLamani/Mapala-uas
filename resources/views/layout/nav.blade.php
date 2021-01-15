<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo"></i> <a href="/">katulistiwa</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">

            <ul>
                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="/about">About</a></li>
                <li class="{{ request()->is('schedule') ? 'active' : '' }}"><a href="/schedule">Schedule</a></li>
                <li class="{{ request()->is('galery') ? 'active' : '' }}"><a href="/galery">Galery</a></li>
                <li class="{{ request()->is('blog') ? 'active' : '' }}"><a href="/blog">Blog</a></li>
                <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
                @guest
                <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="/login">Login</a></li>
                @endguest



            </ul>

        </nav><!-- .nav-menu -->

        {{-- name of user session login --}}
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->

            @auth
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endauth
        </ul>


    </div>
</header><!-- End Header -->