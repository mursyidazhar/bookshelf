<nav class="navbar navbar-expand-md navbar-transparent">
    <div class="container d-flex justify-content-between container2">
        <a class="navbar-brand text-white brand">Books(h)elf</a>
        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-white">
                <li class="nav-item">
                    <a class="nav-link text-white @yield('home-active')" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white @yield('categories-active')" href="{{ route('categories') }}">Categories</a>
                </li>
                @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('collection') }}" class="nav-link text-white @yield('nav-collection')">Collection</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" id="dropdown-toggler" class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button">{{ Auth::user()->name }}</a> 
                        <ul class="dropdown-menu dropdown-menu-dark p-2" aria-labelledby="dropdown-toggler">
                            <li>
                                <a href="{{ route('dashboard') }}" class="dropdown-item" role="button">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item" role="button">Settings</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>