<div class="p-3 bg-dark text-white">
    <div class="flexMain">
        <div class="flex1">

        </div>
        <div class="flex2 text-center">
            <div><strong>This site design is awesome. Try it</strong></div>
        </div>
        <div class="flex1">

        </div>
    </div>
</div>
<div id="menuHolder">
    <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
        <div class="flexMain">
            <div class="flex2">

                <button class="whiteLink siteLink" style="border-right:1px solid #eaeaea" onclick="menuToggle()"><i
                        class="fa fa-bars" aria-hidden="true"></i> KATEGORİLER </button>


            </div>
            <a class="navbar-brand" href="#">
                <img src="" width="30" height="30" alt="LOGO">
              </a>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <a href="{{ url('/') }}" class="nav-menu-item"><i class="fa fa-home me-3"></i>Ana Sayfa</a>
                        <a href="{{ route("categories") }}" class="nav-menu-item"><i class="fa fa-product-hunt me-3"></i>Kategoriler</a>
                        <a href="#" class="nav-menu-item"><i class="fa fa-search me-3"></i>Trendler</a>
                        <a href="#" class="nav-menu-item"><i class="fa fa-wrench me-3"></i>Elektronik</a>
                        <a href="#" class="nav-menu-item"><i class="fa fa-dollar me-3"></i>Moda</a>
                        <a href="#" class="nav-menu-item"><i class="fa fa-file me-3"></i>Aksesuar</a>
                        {{-- <a href="#" class="nav-menu-item"><i class="fa fa-building me-3"></i>About Us</a> --}}
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-menu-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-menu-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a  class="whiteLink siteLink nav-menu-item dropdown-toggle" style="border-right:1px solid #eaeaea" class="" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }}

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item " href="#"><i class="fa fa-user"></i> Profile</a></li>
                                    <li><a class="dropdown-item whiteLink siteLink" href="#"><i class="fa fa-list"></i> My Orders</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My
                                            Cart</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>

    </div>

    <div id="menuDrawer">
        <div class="p-4 border-bottom">
            <div class='row'>
                <div class="col">
                    <select class="noStyle">
                        <option value="english">English</option>
                        <option value="spanish">Spanish</option>
                        <option value="french">French</option>
                        <option value="italian">Italian</option>
                        <option value="hebrew">Hebrew</option>
                    </select>
                </div>
                <div class="col text-end ">
                    <i class="fa fa-times" role="btn" onclick="menuToggle()"></i>
                </div>
            </div>
        </div>
        <div>
            <a href="#" class="nav-menu-item"><i class="fa fa-home me-3"></i>Home</a>
            <a href="#" class="nav-menu-item"><i class="fa fa-product-hunt me-3"></i>Products</a>
            <a href="#" class="nav-menu-item"><i class="fa fa-search me-3"></i>Explore</a>
            <a href="#" class="nav-menu-item"><i class="fa fa-wrench me-3"></i>Services</a>
            <a href="#" class="nav-menu-item"><i class="fa fa-dollar me-3"></i>Pricing</a>
            <a href="#" class="nav-menu-item"><i class="fa fa-file me-3"></i>Blog</a>
            <a href="#" class="nav-menu-item"><i class="fa fa-building me-3"></i>About Us</a>
        </div>
    </div>
</div>
