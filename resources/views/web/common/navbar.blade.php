<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <form action="#" class="searchform order-lg-last">
            <div class="form-group d-flex">
                <input type="text" class="form-control pl-3" placeholder="Search">
                <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
            </div>
        </form>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item text-nowrap @yield('home')"><a href="/" class="nav-link">{{ __('Home') }}</a></li>
                <li class="nav-item text-nowrap @yield('services')"><a href="{{ route('services') }}" class="nav-link">{{ __('Services') }}</a></li>
                <li class="nav-item text-nowrap @yield('booking')"><a href="{{ route('booking') }}" class="nav-link">{{ __('Booking') }}</a></li>
                <li class="nav-item text-nowrap @yield('blogs')"><a href="{{ route('blogs') }}" class="nav-link">{{ __('Blogs') }}</a></li>
                <li class="nav-item text-nowrap @yield('about')"><a href="{{ route('about') }}" class="nav-link">{{ __('About') }}</a></li>
                <li class="nav-item text-nowrap @yield('warranty')"><a href="{{ route('warranty') }}" class="nav-link">{{ __('Warranty Status') }}</a></li>
                <li class="nav-item text-nowrap @yield('contact')"><a href="{{ route('contact') }}" class="nav-link">{{ __('Contact') }}</a></li>
            </ul>
        </div>
    </div>
</nav>
