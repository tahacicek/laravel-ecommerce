<div class="p-3 bg-dark text-white">
    <div class="flexMain">
        <div class="flex1">

        </div>
        <div class="flex2 text-center">
            <div class="row">
                <div class="col-4">
                    <strong><i class="fa fa-phone" aria-hidden="true"></i> 646465165 </strong>
                </div>
                <div class="col-4">
                    <strong><i class="fa fa-envelope" aria-hidden="true"></i> ttahacicek@gmail.com </strong>
                </div>
                <div class="col-4">
                    <strong><i class="fa fa-building" aria-hidden="true"></i> exmaple </strong>
                </div>
            </div>

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
                <a class="navbar-brand float-left" href="#">

                    <strong class="text-dark m-2 title-site">Floware E-Commerce</strong>
                    <img src="https://yandex-images.clstorage.net/i5sw0J184/3846d3Rw/pcHfJuew8VWIXJ1tYcWHE5yJm_UXNJ4veQ-ohI_DqyFevGYKTWq9R7P9rcvNn-uFVlBsq3WYdU2E6LWFdyW1EUDVunKTcUCxePyNbVEVFqMM-St157TfbwkqLfU6Rm9R653XGo1sKzCxivsJHv08crGUeevw2EGMNMgVQaKxw3eh0C2W1pEDUDpNXgjDx4agzlhsdWUXSLz__Arh-SReJwuvRk4JL4nQkxjLmqz8PZKjV_tLo7oBCMYJlXfzkoDHVLI9ZTYzYoMYXAyKgIUG8l-IfJVWNEuczo5qcPqGXARKbDRuSu9IIGGL2elMTM5CEkWa6hHZsMgnyfcEMlHTxEch7AfX0bABus_9WiKm5-E_uVxFZZbqPW1ti-P7FN3WSZ63j6ieWBIR6Moozy9MYkLUyxhh-RJatkq1RjEA8ZTnwk2W5SDyUMu8HAgQtvWAfFttdNYlOK6tnVhhi_X8x_pMxt46HPhTM7goSo_uzJCBl1upUCsTSvW6t4ZhAUO0pxOdpWfw4sI4Hc7YsKSF4U_aTGcnpLqdTe55g9n3HXYa7_c9eU75weCYqXh_XY4hAuVpq-OYsEilukcGENICJ2eCbXS3MLJRi74OK1J19IEcqlyVdZeIvN1fWZHLJO6EmswXLYrsuaCDW8porw0OsaO1SapRmNE7htpE9wLAYdYkcsyVVgGwI5oc7jmg1uZxnYt9pYT0u31frYmy-VaONUiudI-aLquxMMp4u539HGCzxRiJ8CqxO9QZZWQxgkJlZMJvhOTRosDIvi4ao8S0ky3bHEeXVFpe_6wIMdtGXtdbX2V_Ch6r8HLJiJiOjp0wcaW62VP4YamnWEb2clCi5fegzaYFgSLBi73O2_EmNzEOqN2ndxU6XMwtqqMLFI3Xe3wED2nsmuECysmLbSzuw4MnO-kBGHJp5Jo11MFCEPUXg62lh0GDUgge_OjS9LazTYm_lofUSu8834jRqyUuw"
                        width="30" height="30" alt="LOGO">
                </a>

            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <a href="{{ url('/') }}" class="nav-menu-item"><i class="fa fa-home me-3"></i>Ana Sayfa</a>

                        <a href="#" class="nav-menu-item"><i class="fa fa-search me-3"></i>Trendler</a>
                        <a href="#" class="nav-menu-item"><i class="fa fa-wrench me-3"></i>Elektronik</a>
                        <a href="#" class="nav-menu-item"><i class="fa fa-dollar me-3"></i>Moda</a>
                        <a href="#" class="nav-menu-item"><i class="fa fa-file me-3"></i>Aksesuar</a>
                        {{-- <a href="#" class="nav-menu-item"><i class="fa fa-building me-3"></i>About Us</a> --}}
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="blackLink text-white nav-menu-item"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="blackLink text-white nav-menu-item"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="blackLink siteLink text-white nav-menu-item dropdown-toggle"
                                    style="border-right:1px solid #eaeaea" class="" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }}

                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item " href="#"><i class="fa fa-user"></i> Profile</a></li>
                                    <li><a class="dropdown-item whiteLink siteLink" href="#"><i
                                                class="fa fa-list"></i> My Orders</a>
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
                <form class="searchform cf mt-3 mb-1">
                    <input type="text"  placeholder="Ara...">
                    <button class="col-md-2" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
            </div>

        </div>

        <div cl style="text-transform: uppercase;">
            <a href="{{ route('categories') }}" class="nav-menu-item"><i
                class="fa fa-globe me-3"></i>Tüm Kategoriler</a>
            @foreach ($categories as $category)
                <a target="_blank" href="{{ url('/kategori/' . $category->slug) }}" class="nav-menu-item"><i
                        class="fa fa-bars me-3"></i>{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</div>
