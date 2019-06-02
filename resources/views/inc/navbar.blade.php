{{-- Navbar --}}

<nav class="navbar navbar-expand-md navbar-costum navbar-laravel">
        <div class="container">
            <a class="navbar-brand text-light" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">                
                    <a class="nav-item nav-link active text-light" href="/">Forside</a>

                    <a class="nav-item nav-link text-light" href="/products">Plakater</a>

                    <a class="nav-item nav-link text-light" href="/omos">Om Os</a>

                    <a class="nav-item nav-link text-light" href="/kontakt">Kontakt</a>

                    <a class="nav-item nav-link text-light" href="/posts">Inspirations Blog</a>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                <a href="{{ route('shopping.cart') }}">
                     <li class="nav-item mr-2 pt-2">
                        <i class="fas fa-shopping-cart text-light"></i>
                     <span class="badge badge-light">{{ session()->has('cart') ? session()->get('cart')->totalQty : '' }}</span>
                     </li>
                    </a>
                     
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item text-light">
                            @if (Route::has('register'))
                                <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else

                        
                        <li class="nav-item dropdown">
                            
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                        
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    